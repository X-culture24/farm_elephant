<?php
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../includes/helpers.php';

class ProductController {
    private Product $productModel;
    private Category $categoryModel;

    public function __construct() {
        $this->productModel  = new Product();
        $this->categoryModel = new Category();
    }

    public function index(): void {
        $page_title   = 'Products';
        $current_page = 'products';
        $db = DB::getInstance();
        $products = $db->query(
            'SELECT p.*, c.name AS category_name,
             (SELECT image_path FROM product_images WHERE product_id = p.id AND is_primary = 1 LIMIT 1) AS primary_image
             FROM products p JOIN categories c ON p.category_id = c.id
             WHERE p.deleted = 0 ORDER BY p.created_at DESC'
        )->fetchAll();
        include __DIR__ . '/../../views/admin/products/list.php';
    }

    public function create(): void {
        $page_title   = 'Add Product';
        $current_page = 'products';
        $categories   = $this->categoryModel->findAll();
        $product      = null;
        include __DIR__ . '/../../views/admin/products/form.php';
    }

    public function store(): void {
        if (!isPost()) redirect('shop/admin/index.php?page=product-create');

        $data = [
            'name'                => sanitize(post('name')),
            'description'         => sanitize(post('description')),
            'price'               => (float) post('price'),
            'category_id'         => (int) post('category_id'),
            'stock_quantity'      => (int) post('stock_quantity'),
            'availability_status' => sanitize(post('availability_status', 'available')),
            'product_type'        => sanitize(post('product_type', 'sale')),
            'auction_end_date'    => post('auction_end_date') ?: null,
        ];

        if (empty($data['name']) || $data['price'] < 0) {
            flash('error', 'Name and valid price are required.', 'error');
            redirect('shop/admin/index.php?page=product-create');
        }

        $productId = $this->productModel->create($data);

        // Handle image uploads
        $this->handleImageUploads($productId);

        flash('success', 'Product created successfully.', 'success');
        redirect('shop/admin/index.php?page=products');
    }

    public function edit(): void {
        $id      = (int) get('id');
        $product = $this->productModel->findById($id);
        if (!$product) { flash('error', 'Product not found.', 'error'); redirect('shop/admin/index.php?page=products'); }

        $page_title   = 'Edit Product';
        $current_page = 'products';
        $categories   = $this->categoryModel->findAll();
        include __DIR__ . '/../../views/admin/products/form.php';
    }

    public function update(): void {
        if (!isPost()) redirect('shop/admin/index.php?page=products');
        $id = (int) post('id');

        $data = [
            'name'                => sanitize(post('name')),
            'description'         => sanitize(post('description')),
            'price'               => (float) post('price'),
            'category_id'         => (int) post('category_id'),
            'stock_quantity'      => (int) post('stock_quantity'),
            'availability_status' => sanitize(post('availability_status')),
            'product_type'        => sanitize(post('product_type')),
            'auction_end_date'    => post('auction_end_date') ?: null,
        ];

        $this->productModel->update($id, $data);
        $this->handleImageUploads($id);

        flash('success', 'Product updated.', 'success');
        redirect('shop/admin/index.php?page=products');
    }

    public function destroy(): void {
        $id = (int) get('id');
        $this->productModel->softDelete($id);
        flash('success', 'Product deleted.', 'success');
        redirect('shop/admin/index.php?page=products');
    }

    public function categories(): void {
        $page_title   = 'Categories';
        $current_page = 'categories';
        $categories   = $this->categoryModel->findAll();

        if (isPost()) {
            $name = sanitize(post('name'));
            $desc = sanitize(post('description'));
            if ($name) {
                $this->categoryModel->create($name, $desc);
                flash('success', 'Category added.', 'success');
            }
            redirect('shop/admin/index.php?page=categories');
        }

        include __DIR__ . '/../../views/admin/products/categories.php';
    }

    private function handleImageUploads(int $productId): void {
        if (empty($_FILES['images']['name'][0])) return;

        $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];
        $maxSize      = 5 * 1024 * 1024; // 5MB
        $uploadDir    = __DIR__ . '/../../../shop/uploads/products/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $isPrimary = true;
        foreach ($_FILES['images']['tmp_name'] as $i => $tmpName) {
            if ($_FILES['images']['error'][$i] !== UPLOAD_ERR_OK) continue;
            if ($_FILES['images']['size'][$i] > $maxSize) { flash('warning', 'One image exceeded 5MB and was skipped.', 'warning'); continue; }

            $mime = mime_content_type($tmpName);
            if (!in_array($mime, $allowedMimes)) { flash('warning', 'Invalid image type skipped.', 'warning'); continue; }

            $ext      = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
            $filename = 'product-' . $productId . '-' . uniqid() . '.' . $ext;
            $dest     = $uploadDir . $filename;

            if (move_uploaded_file($tmpName, $dest)) {
                $this->productModel->addImage($productId, 'shop/uploads/products/' . $filename, $isPrimary);
                $isPrimary = false;
            }
        }
    }
}
