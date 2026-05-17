<?php include __DIR__ . '/../layout.php'; ?>

<div class="admin-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-shopping-bag me-2"></i>Orders</span>
        <div class="d-flex gap-2">
            <?php foreach (['','pending','confirmed','processing','shipped','delivered'] as $s): ?>
                <a href="../../shop/admin/index.php?page=orders<?= $s ? '&status='.$s : '' ?>"
                   class="btn btn-sm <?= $status === $s ? 'btn-light' : 'btn-outline-light' ?>">
                    <?= $s ? ucfirst($s) : 'All' ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Order #</th><th>Customer</th><th>Total</th><th>Status</th><th>Payment</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $o): ?>
                    <tr>
                        <td class="fw-bold">#<?= str_pad($o['id'], 6, '0', STR_PAD_LEFT) ?></td>
                        <td><?= htmlspecialchars($o['customer_name']) ?></td>
                        <td>KES <?= number_format($o['total_amount'], 0) ?></td>
                        <td><span class="badge badge-status-<?= $o['status'] ?>"><?= ucfirst($o['status']) ?></span></td>
                        <td><span class="badge bg-<?= $o['payment_status'] === 'paid' ? 'success' : ($o['payment_status'] === 'failed' ? 'danger' : 'warning') ?>"><?= ucfirst($o['payment_status']) ?></span></td>
                        <td><?= date('d M Y', strtotime($o['created_at'])) ?></td>
                        <td>
                            <a href="../../shop/admin/index.php?page=order&id=<?= $o['id'] ?>" class="btn btn-sm btn-outline-primary me-1">View</a>
                            <a href="../../shop/admin/index.php?page=order-receipt&id=<?= $o['id'] ?>" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($orders)): ?>
                    <tr><td colspan="7" class="text-center py-4 text-muted">No orders found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if ($pagination['total_pages'] > 1): ?>
        <div class="p-3 d-flex justify-content-center gap-2">
            <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                <a href="?page=orders&p=<?= $i ?><?= $status ? '&status='.$status : '' ?>"
                   class="btn btn-sm <?= $i === $pagination['current'] ? 'btn-primary' : 'btn-outline-secondary' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../layout-end.php'; ?>
