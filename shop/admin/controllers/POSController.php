<?php
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/Order.php';
require_once __DIR__ . '/../../services/PDFService.php';
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/helpers.php';

class POSController {

    private Product $productModel;
    private Order $orderModel;
    private PDO $db;

    public function __construct() {
        $this->productModel = new Product();
        $this->orderModel   = new Order();
        $this->db           = DB::getInstance();
    }

    public function index(): void {
        $page_title   = 'Point of Sale';
        $current_page = 'pos';
        $products     = $this->db->query(
            "SELECT p.*, c.name AS category_name,
             (SELECT image_path FROM product_images WHERE product_id = p.id AND is_primary = 1 LIMIT 1) AS primary_image
             FROM products p JOIN categories c ON p.category_id = c.id
             WHERE p.deleted = 0 AND p.availability_status = 'available' AND p.stock_quantity > 0
             ORDER BY p.name ASC"
        )->fetchAll();
        include __DIR__ . '/../../views/admin/pos/index.php';
    }

    public function completeSale(): void {
        if (!isPost()) redirect('shop/admin/index.php?page=pos');

        $items         = json_decode(post('items', '[]'), true);
        $paymentMethod = sanitize(post('payment_method', 'cash'));
        $customerName  = sanitize(post('customer_name', 'Walk-in Customer'));
        $customerEmail = sanitize(post('customer_email', ''));

        if (empty($items)) {
            flash('error', 'No items in cart.', 'error');
            redirect('shop/admin/index.php?page=pos');
        }

        // Validate stock
        foreach ($items as $item) {
            $stmt = $this->db->prepare('SELECT stock_quantity FROM products WHERE id = ? LIMIT 1');
            $stmt->execute([$item['id']]);
            $product = $stmt->fetch();
            if (!$product || $product['stock_quantity'] < $item['qty']) {
                flash('error', "Insufficient stock for item ID {$item['id']}.", 'error');
                redirect('shop/admin/index.php?page=pos');
            }
        }

        // Find or create walk-in customer
        $customerId = $this->getOrCreateWalkInCustomer($customerName, $customerEmail);

        // Build order items array
        $orderItems = [];
        $total      = 0;
        foreach ($items as $item) {
            $stmt = $this->db->prepare('SELECT name, price FROM products WHERE id = ? LIMIT 1');
            $stmt->execute([$item['id']]);
            $product = $stmt->fetch();
            $orderItems[] = ['product_id' => $item['id'], 'quantity' => $item['qty'], 'price' => $product['price']];
            $total += $product['price'] * $item['qty'];
        }

        // Create order (POS orders skip delivery)
        $this->db->beginTransaction();
        try {
            $stmt = $this->db->prepare(
                'INSERT INTO orders (customer_id, status, total_amount, payment_status) VALUES (?, "confirmed", ?, "paid")'
            );
            $stmt->execute([$customerId, $total]);
            $orderId = (int) $this->db->lastInsertId();

            $itemStmt = $this->db->prepare('INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES (?, ?, ?, ?)');
            foreach ($orderItems as $oi) {
                $itemStmt->execute([$orderId, $oi['product_id'], $oi['quantity'], $oi['price']]);
                $this->productModel->decrementStock($oi['product_id'], $oi['quantity']);
            }

            $this->db->prepare('INSERT INTO payments (order_id, payment_method, amount, status) VALUES (?, ?, ?, "paid")')
                     ->execute([$orderId, $paymentMethod, $total]);

            $this->db->commit();

            // Generate and stream PDF receipt
            $order = $this->orderModel->findById($orderId);
            $_SESSION['pos_receipt_order_id'] = $orderId;
            flash('success', 'Sale completed! Order #' . str_pad($orderId, 6, '0', STR_PAD_LEFT), 'success');
            redirect('shop/admin/index.php?page=order-receipt&id=' . $orderId);

        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log('POS error: ' . $e->getMessage());
            flash('error', 'Sale failed. Please try again.', 'error');
            redirect('shop/admin/index.php?page=pos');
        }
    }

    private function getOrCreateWalkInCustomer(string $name, string $email): int {
        if ($email) {
            $stmt = $this->db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            if ($user) return $user['id'];
        }

        $stmt = $this->db->prepare(
            'INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, "customer")'
        );
        $fakeEmail = $email ?: 'walkin-' . time() . '@pos.local';
        $stmt->execute([$name, $fakeEmail, password_hash(uniqid(), PASSWORD_BCRYPT)]);
        return (int) $this->db->lastInsertId();
    }
}
