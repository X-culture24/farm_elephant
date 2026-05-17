<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/helpers.php';

class DashboardController {
    private PDO $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function index(): void {
        $page_title  = 'Dashboard';
        $current_page = 'dashboard';

        // Revenue stats
        $revenue = $this->db->query(
            "SELECT
                SUM(CASE WHEN DATE(o.created_at) = CURDATE() THEN o.total_amount ELSE 0 END) AS today,
                SUM(CASE WHEN o.created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) THEN o.total_amount ELSE 0 END) AS week,
                SUM(CASE WHEN o.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) THEN o.total_amount ELSE 0 END) AS month
             FROM orders o JOIN payments p ON o.id = p.order_id WHERE p.status = 'paid'"
        )->fetch();

        // Order counts by status
        $orderCounts = $this->db->query(
            "SELECT status, COUNT(*) AS cnt FROM orders GROUP BY status"
        )->fetchAll(PDO::FETCH_KEY_PAIR);

        // Top 5 products
        $topProducts = $this->db->query(
            "SELECT p.name, SUM(oi.quantity) AS total_sold, SUM(oi.quantity * oi.unit_price) AS revenue
             FROM order_items oi JOIN products p ON oi.product_id = p.id
             GROUP BY oi.product_id ORDER BY total_sold DESC LIMIT 5"
        )->fetchAll();

        // New customers last 30 days
        $newCustomers = $this->db->query(
            "SELECT COUNT(*) FROM users WHERE role = 'customer' AND created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)"
        )->fetchColumn();

        // 12-month revenue trend
        $trend = $this->db->query(
            "SELECT DATE_FORMAT(o.created_at, '%Y-%m') AS month, SUM(o.total_amount) AS revenue
             FROM orders o JOIN payments p ON o.id = p.order_id
             WHERE p.status = 'paid' AND o.created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
             GROUP BY month ORDER BY month ASC"
        )->fetchAll();

        // Recent orders
        $recentOrders = $this->db->query(
            "SELECT o.*, u.name AS customer_name FROM orders o JOIN users u ON o.customer_id = u.id
             ORDER BY o.created_at DESC LIMIT 8"
        )->fetchAll();

        include __DIR__ . '/../../views/admin/dashboard.php';
    }
}
