<?php include __DIR__ . '/../layout.php'; ?>

<div class="admin-card">
    <div class="card-header"><i class="fas fa-users me-2"></i>Customers (<?= count($customers) ?>)</div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Name</th><th>Email</th><th>Phone</th><th>Orders</th><th>Total Spent</th><th>Joined</th><th></th></tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $c): ?>
                    <tr>
                        <td class="fw-semibold"><?= htmlspecialchars($c['name']) ?></td>
                        <td><?= htmlspecialchars($c['email']) ?></td>
                        <td><?= htmlspecialchars($c['phone'] ?? '-') ?></td>
                        <td><span class="badge bg-primary"><?= $c['total_orders'] ?></span></td>
                        <td>KES <?= number_format($c['total_spent'], 0) ?></td>
                        <td><?= date('d M Y', strtotime($c['created_at'])) ?></td>
                        <td><a href="../../shop/admin/index.php?page=customer&id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-primary">View</a></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($customers)): ?>
                    <tr><td colspan="7" class="text-center py-4 text-muted">No customers yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout-end.php'; ?>
