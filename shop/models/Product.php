<?php
require_once __DIR__ . '/../includes/db.php';

class Product {
    private PDO $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function findAll(array $filters = []): array {
        $sql = 'SELECT p.*, c.name AS category_name,
                    (SELECT image_path FROM product_images WHERE product_id = p.id AND is_primary = 1 LIMIT 1) AS primary_image
                FROM products p
                JOIN categories c ON p.category_id = c.id
                WHERE p.deleted = 0 AND p.availability_status != "out_of_stock"';
        $params = [];

        if (!empty($filters['category_id'])) {
            $sql .= ' AND p.category_id = ?';
            $params[] = $filters['category_id'];
        }
        if (!empty($filters['type'])) {
            $sql .= ' AND p.product_type = ?';
            $params[] = $filters['type'];
        }
        $sql .= ' ORDER BY p.created_at DESC';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array {
        $stmt = $this->db->prepare(
            'SELECT p.*, c.name AS category_name FROM products p
             JOIN categories c ON p.category_id = c.id
             WHERE p.id = ? AND p.deleted = 0 LIMIT 1'
        );
        $stmt->execute([$id]);
        $product = $stmt->fetch();
        if (!$product) return null;

        // Load all images
        $imgStmt = $this->db->prepare('SELECT * FROM product_images WHERE product_id = ? ORDER BY is_primary DESC');
        $imgStmt->execute([$id]);
        $product['images'] = $imgStmt->fetchAll();

        // Load highest bid if auction
        if ($product['product_type'] === 'auction') {
            $bidStmt = $this->db->prepare(
                'SELECT MAX(bid_amount) AS highest_bid, COUNT(*) AS bid_count FROM auction_bids WHERE product_id = ?'
            );
            $bidStmt->execute([$id]);
            $product['auction'] = $bidStmt->fetch();
        }

        return $product;
    }

    public function findByCategory(int $categoryId): array {
        return $this->findAll(['category_id' => $categoryId]);
    }

    public function search(string $keyword): array {
        $like = '%' . $keyword . '%';
        $stmt = $this->db->prepare(
            'SELECT p.*, c.name AS category_name,
                (SELECT image_path FROM product_images WHERE product_id = p.id AND is_primary = 1 LIMIT 1) AS primary_image
             FROM products p
             JOIN categories c ON p.category_id = c.id
             WHERE p.deleted = 0 AND (p.name LIKE ? OR p.description LIKE ?)
             ORDER BY p.name ASC'
        );
        $stmt->execute([$like, $like]);
        return $stmt->fetchAll();
    }

    public function create(array $data): int {
        $stmt = $this->db->prepare(
            'INSERT INTO products (name, description, price, category_id, stock_quantity, availability_status, product_type, auction_end_date)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $data['name'],
            $data['description'] ?? '',
            $data['price'],
            $data['category_id'],
            $data['stock_quantity'] ?? 0,
            $data['availability_status'] ?? 'available',
            $data['product_type'] ?? 'sale',
            $data['auction_end_date'] ?? null,
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool {
        $fields = [];
        $params = [];
        $allowed = ['name','description','price','category_id','stock_quantity','availability_status','product_type','auction_end_date'];
        foreach ($allowed as $field) {
            if (array_key_exists($field, $data)) {
                $fields[] = "$field = ?";
                $params[] = $data[$field];
            }
        }
        if (empty($fields)) return false;
        $params[] = $id;
        $stmt = $this->db->prepare('UPDATE products SET ' . implode(', ', $fields) . ' WHERE id = ?');
        return $stmt->execute($params);
    }

    public function softDelete(int $id): bool {
        $stmt = $this->db->prepare('UPDATE products SET deleted = 1 WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function addImage(int $productId, string $path, bool $isPrimary = false): void {
        if ($isPrimary) {
            $this->db->prepare('UPDATE product_images SET is_primary = 0 WHERE product_id = ?')->execute([$productId]);
        }
        $stmt = $this->db->prepare('INSERT INTO product_images (product_id, image_path, is_primary) VALUES (?, ?, ?)');
        $stmt->execute([$productId, $path, $isPrimary ? 1 : 0]);
    }

    public function deleteImage(int $imageId): bool {
        $stmt = $this->db->prepare('DELETE FROM product_images WHERE id = ?');
        return $stmt->execute([$imageId]);
    }

    public function decrementStock(int $id, int $qty): bool {
        $stmt = $this->db->prepare(
            'UPDATE products SET stock_quantity = GREATEST(0, stock_quantity - ?),
             availability_status = IF(stock_quantity - ? <= 0, "out_of_stock", availability_status)
             WHERE id = ?'
        );
        return $stmt->execute([$qty, $qty, $id]);
    }
}
