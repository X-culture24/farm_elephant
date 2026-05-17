<?php include __DIR__ . '/../layout.php'; ?>

<div class="row g-4">
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="card-header">Add Category</div>
            <div class="p-4">
                <form method="POST" action="../../shop/admin/index.php?page=categories">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn" style="background:var(--primary);color:#fff;font-weight:600;">
                        <i class="fas fa-plus me-2"></i>Add Category
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="card-header">All Categories (<?= count($categories) ?>)</div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light"><tr><th>#</th><th>Name</th><th>Description</th></tr></thead>
                    <tbody>
                        <?php foreach ($categories as $cat): ?>
                            <tr>
                                <td><?= $cat['id'] ?></td>
                                <td class="fw-semibold"><?= htmlspecialchars($cat['name']) ?></td>
                                <td class="text-muted small"><?= htmlspecialchars($cat['description'] ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout-end.php'; ?>
