<?php include __DIR__ . '/../layout.php'; ?>

<div class="admin-card">
    <div class="card-header">
        <i class="fas fa-<?= $product ? 'edit' : 'plus' ?> me-2"></i>
        <?= $product ? 'Edit Product' : 'Add New Product' ?>
    </div>
    <div class="p-4">
        <form method="POST" action="../../shop/admin/index.php?page=<?= $product ? 'product-update' : 'product-store' ?>" enctype="multipart/form-data">
            <?php if ($product): ?>
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <?php endif; ?>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Product Name *</label>
                        <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($product['name'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="5"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Price (KES) *</label>
                            <input type="number" name="price" class="form-control" step="0.01" min="0" required value="<?= $product['price'] ?? '' ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Stock Quantity</label>
                            <input type="number" name="stock_quantity" class="form-control" min="0" value="<?= $product['stock_quantity'] ?? 0 ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Category *</label>
                            <select name="category_id" class="form-select" required>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>" <?= ($product['category_id'] ?? '') == $cat['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($cat['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mt-1">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Product Type</label>
                            <select name="product_type" class="form-select" id="productType">
                                <option value="sale" <?= ($product['product_type'] ?? 'sale') === 'sale' ? 'selected' : '' ?>>For Sale</option>
                                <option value="auction" <?= ($product['product_type'] ?? '') === 'auction' ? 'selected' : '' ?>>Auction</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Availability</label>
                            <select name="availability_status" class="form-select">
                                <option value="available" <?= ($product['availability_status'] ?? 'available') === 'available' ? 'selected' : '' ?>>Available</option>
                                <option value="out_of_stock" <?= ($product['availability_status'] ?? '') === 'out_of_stock' ? 'selected' : '' ?>>Out of Stock</option>
                                <option value="auction" <?= ($product['availability_status'] ?? '') === 'auction' ? 'selected' : '' ?>>Auction</option>
                            </select>
                        </div>
                        <div class="col-md-4" id="auctionEndDiv" style="display:<?= ($product['product_type'] ?? '') === 'auction' ? 'block' : 'none' ?>;">
                            <label class="form-label fw-semibold">Auction End Date</label>
                            <input type="datetime-local" name="auction_end_date" class="form-control" value="<?= $product['auction_end_date'] ?? '' ?>">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <label class="form-label fw-semibold">Product Images</label>
                    <div class="border rounded p-3 text-center" style="border-style:dashed!important;">
                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                        <p class="text-muted small mb-2">JPEG, PNG, WebP — max 5MB each</p>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/jpeg,image/png,image/webp">
                    </div>

                    <?php if (!empty($product['images'])): ?>
                        <div class="mt-3">
                            <p class="fw-semibold small">Current Images:</p>
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach ($product['images'] as $img): ?>
                                    <img src="../../../<?= htmlspecialchars($img['image_path']) ?>"
                                         style="width:70px;height:70px;object-fit:cover;border-radius:6px;border:2px solid <?= $img['is_primary'] ? 'var(--accent)' : '#dee2e6' ?>;">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-4 d-flex gap-3">
                <button type="submit" class="btn px-4" style="background:var(--primary);color:#fff;font-weight:600;">
                    <i class="fas fa-save me-2"></i><?= $product ? 'Update Product' : 'Create Product' ?>
                </button>
                <a href="../../shop/admin/index.php?page=products" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('productType').addEventListener('change', function() {
    document.getElementById('auctionEndDiv').style.display = this.value === 'auction' ? 'block' : 'none';
});
</script>

<?php include __DIR__ . '/../layout-end.php'; ?>
