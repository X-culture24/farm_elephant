<?php include __DIR__ . '/../layout.php'; ?>

<div class="admin-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-box me-2"></i>Products (<?= count($products) ?>)</span>
        <a href="../../shop/admin/index.php?page=product-create" class="btn btn-sm btn-outline-light">
            <i class="fas fa-plus me-1"></i>Add Product
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Status</th><th>Type</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                    <tr>
                        <td>
                            <?php if ($p['primary_image']): ?>
                                <img src="../../../<?= htmlspecialchars($p['primary_image']) ?>" style="width:50px;height:50px;object-fit:cover;border-radius:6px;">
                            <?php else: ?>
                                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="width:50px;height:50px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-semibold"><?= htmlspecialchars($p['name']) ?></td>
                        <td><?= htmlspecialchars($p['category_name']) ?></td>
                        <td>KES <?= number_format($p['price'], 2) ?></td>
                        <td><?= $p['stock_quantity'] ?></td>
                        <td>
                            <?php $sc = $p['availability_status'] === 'available' ? 'success' : ($p['availability_status'] === 'out_of_stock' ? 'danger' : 'warning'); ?>
                            <span class="badge bg-<?= $sc ?>"><?= ucwords(str_replace('_',' ',$p['availability_status'])) ?></span>
                        </td>
                        <td><span class="badge bg-secondary"><?= ucfirst($p['product_type']) ?></span></td>
                        <td>
                            <a href="../../shop/admin/index.php?page=product-edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../../shop/admin/index.php?page=product-delete&id=<?= $p['id'] ?>"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Delete this product?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($products)): ?>
                    <tr><td colspan="8" class="text-center py-4 text-muted">No products yet. <a href="../../shop/admin/index.php?page=product-create">Add one</a></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout-end.php'; ?>
