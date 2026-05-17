<?php
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../services/MailService.php';

class CheckoutController {

    private Cart $cart;
    private Order $orderModel;
    private Product $productModel;

    public function __construct() {
        $this->cart         = new Cart();
        $this->orderModel   = new Order();
        $this->productModel = new Product();
    }

    public function index(): void {
        $items = $this->cart->getItems(currentUserId());
        if (empty($items)) {
            flash('error', 'Your cart is empty.', 'warning');
            redirect('shop/index.php?page=cart');
        }
        $total = $this->cart->getTotal(currentUserId());
        include __DIR__ . '/../views/shop/checkout.php';
    }

    public function confirm(): void {
        if (!isPost()) redirect('shop/index.php?page=checkout');

        $customerId = currentUserId();
        $items      = $this->cart->getItems($customerId);

        if (empty($items)) {
            flash('error', 'Your cart is empty.', 'warning');
            redirect('shop/index.php?page=cart');
        }

        // Validate stock
        $stockErrors = $this->cart->validateStock($customerId);
        if (!empty($stockErrors)) {
            foreach ($stockErrors as $err) flash('error', $err, 'error');
            redirect('shop/index.php?page=cart');
        }

        // Collect delivery info
        $delivery = [
            'street'         => sanitize(post('street')),
            'city'           => sanitize(post('city')),
            'county'         => sanitize(post('county')),
            'postal_code'    => sanitize(post('postal_code')),
            'preferred_date' => sanitize(post('preferred_date')),
        ];

        $errors = [];
        if (empty($delivery['street'])) $errors[] = 'Street address is required.';
        if (empty($delivery['city']))   $errors[] = 'City is required.';
        if (empty($delivery['county'])) $errors[] = 'County is required.';

        if (!empty($errors)) {
            foreach ($errors as $err) flash('error', $err, 'error');
            redirect('shop/index.php?page=checkout');
        }

        $total         = $this->cart->getTotal($customerId);
        $paymentMethod = sanitize(post('payment_method', 'mpesa'));

        try {
            $orderId = $this->orderModel->create(
                ['customer_id' => $customerId, 'total_amount' => $total, 'payment_method' => $paymentMethod],
                $items,
                $delivery
            );

            // Decrement stock for each item
            foreach ($items as $item) {
                $this->productModel->decrementStock($item['product_id'], $item['quantity']);
            }

            // Clear cart
            $this->cart->clear($customerId);

            // Send order confirmation email
            $fullOrder = $this->orderModel->findById($orderId);
            if ($fullOrder) {
                MailService::orderConfirmation($fullOrder);
            }

            // Store order ID in session for confirmation page
            $_SESSION['last_order_id'] = $orderId;

            redirect('shop/index.php?page=order-confirm');

        } catch (\Exception $e) {
            error_log('Checkout error: ' . $e->getMessage());
            flash('error', 'An error occurred. Please try again.', 'error');
            redirect('shop/index.php?page=checkout');
        }
    }
}
