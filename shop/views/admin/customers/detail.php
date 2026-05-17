<?php include __DIR__ . '/../layout.php'; ?>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="card-header">Customer Profile</div>
            <div class="p-4 text-center">
                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                     style="width:80px;height:80px;background:var(--primary);color:#fff;font-size:2rem;">
                    <?= strtoupper(substr($customer['name'], 0, 1)) ?>
                </div>
                <h5><?= htmlspecialchars($customer['name']) ?></h5>
                <p class="text-muted mb-1"><?= htmlspecialchars($customer['email']) ?></p>
                <p class="text-muted mb-3"><?= htmlspecialchars($customer['phone'] ?? 'No phone') ?></p>
                <p class="text-muted small">Member since <?= date('d M Y', strtotime($customer['created_at'])) ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-header">Order History (<?= count($orders) ?>)</div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light"><tr><th>Order #</th><th>Total</th><th>Status</th><th>Payment</th><th>Date</th><th></th></tr></thead>
                    <tbody>
                        <?php foreach ($orders as $o): ?>
                            <tr>
                                <td class="fw-bold">#<?= str_pad($o['id'], 6, '0', STR_PAD_LEFT) ?></td>
                                <td>KES <?= number_format($o['total_amount'], 0) ?></td>
                                <td><span class="badge badge-status-<?= $o['status'] ?>"><?= ucfirst($o['status']) ?></span></td>
                                <td><span class="badge bg-<?= $o['payment_status'] === 'paid' ? 'success' : 'warning' ?>"><?= ucfirst($o['payment_status']) ?></span></td>
                                <td><?= date('d M Y', strtotime($o['created_at'])) ?></td>
                                <td><a href="../../shop/admin/index.php?page=order&id=<?= $o['id'] ?>" class="btn btn-sm btn-outline-primary">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($orders)): ?>
                            <tr><td colspan="6" class="text-center py-3 text-muted">No orders yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout-end.php'; ?>
