<?php
require_once __DIR__ . '/../includes/db.php';

class Delivery {
    private PDO $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function updateStatus(int $orderId, string $status, string $notes = ''): bool {
        $stmt = $this->db->prepare(
            'UPDATE deliveries SET delivery_status = ?, tracking_notes = ? WHERE order_id = ?'
        );
        return $stmt->execute([$status, $notes, $orderId]);
    }

    public function findByOrder(int $orderId): ?array {
        $stmt = $this->db->prepare('SELECT * FROM deliveries WHERE order_id = ? LIMIT 1');
        $stmt->execute([$orderId]);
        return $stmt->fetch() ?: null;
    }
}
