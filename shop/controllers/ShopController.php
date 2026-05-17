<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../includes/helpers.php';

class ShopController {

    private Product $productModel;
    private Category $categoryModel;

    public function __construct() {
        $this->productModel  = new Product();
        $this->categoryModel = new Category();
    }

    public function listing(): void {
        $categories  = $this->categoryModel->findAll();
        $categoryId  = (int) get('category', 0);
        $keyword     = sanitize(get('q', ''));
        $type        = sanitize(get('type', ''));

        if (!empty($keyword)) {
            $products = $this->productModel->search($keyword);
        } else {
            $filters = [];
            if ($categoryId) $filters['category_id'] = $categoryId;
            if ($type)       $filters['type'] = $type;
            $products = $this->productModel->findAll($filters);
        }

        // Group by category
        $grouped = [];
        foreach ($products as $p) {
            $grouped[$p['category_name']][] = $p;
        }

        include __DIR__ . '/../views/shop/listing.php';
    }

    public function detail(): void {
        $id = (int) get('id', 0);
        if (!$id) redirect('shop/index.php?page=products');

        $product = $this->productModel->findById($id);
        if (!$product) {
            flash('error', 'Product not found.', 'error');
            redirect('shop/index.php?page=products');
        }

        include __DIR__ . '/../views/shop/detail.php';
    }
}
