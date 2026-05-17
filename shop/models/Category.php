<?php
require_once __DIR__ . '/../includes/db.php';

class Category {
    private PDO $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function findAll(): array {
        return $this->db->query('SELECT * FROM categories ORDER BY name ASC')->fetchAll();
    }

    public function findById(int $id): ?array {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(string $name, string $description = ''): int {
        $stmt = $this->db->prepare('INSERT INTO categories (name, description) VALUES (?, ?)');
        $stmt->execute([$name, $description]);
        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, string $name, string $description = ''): bool {
        $stmt = $this->db->prepare('UPDATE categories SET name = ?, description = ? WHERE id = ?');
        return $stmt->execute([$name, $description, $id]);
    }
}
