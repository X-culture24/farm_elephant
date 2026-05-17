<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/helpers.php';
require_once __DIR__ . '/../../models/Order.php';

class CustomerController {
    private PDO $db;
    private Order $orderModel;

    public function __construct() {
        $this->db         = DB::getInstance();
        $this->orderModel = new Order();
    }

    public function index(): void {
        $page_title   = 'Customers';
        $current_page = 'customers';
        $customers    = $this->db->query(
            "SELECT u.*, COUNT(o.id) AS total_orders, COALESCE(SUM(o.total_amount),0) AS total_spent
             FROM users u LEFT JOIN orders o ON u.id = o.customer_id
             WHERE u.role = 'customer' GROUP BY u.id ORDER BY u.created_at DESC"
        )->fetchAll();
        include __DIR__ . '/../../views/admin/customers/list.php';
    }

    public function detail(): void {
        $id = (int) get('id');
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ? AND role = "customer" LIMIT 1');
        $stmt->execute([$id]);
        $customer = $stmt->fetch();
        if (!$customer) { flash('error', 'Customer not found.', 'error'); redirect('shop/admin/index.php?page=customers'); }

        $orders       = $this->orderModel->findByCustomer($id);
        $page_title   = 'Customer: ' . htmlspecialchars($customer['name']);
        $current_page = 'customers';
        include __DIR__ . '/../../views/admin/customers/detail.php';
    }
}
