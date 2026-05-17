<?php include __DIR__ . '/../layout.php'; ?>

<div class="row g-4">
    <div class="col-lg-8">
        <!-- Order Items -->
        <div class="admin-card mb-4">
            <div class="card-header">Order Items</div>
            <table class="table mb-0">
                <thead class="table-light"><tr><th class="ps-3">Product</th><th>Qty</th><th>Unit Price</th><th class="text-end pe-3">Total</th></tr></thead>
                <tbody>
                    <?php foreach ($order['items'] as $item): ?>
                        <tr>
                            <td class="ps-3"><?= htmlspecialchars($item['product_name']) ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>KES <?= number_format($item['unit_price'], 2) ?></td>
                            <td class="text-end pe-3 fw-semibold">KES <?= number_format($item['unit_price'] * $item['quantity'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="fw-bold"><td colspan="3" class="ps-3">Total</td><td class="text-end pe-3" style="color:var(--primary);font-size:1.1rem;">KES <?= number_format($order['total_amount'], 2) ?></td></tr>
                </tfoot>
            </table>
        </div>

        <!-- Update Order Status -->
        <?php
        $seq = ['pending','confirmed','processing','shipped','delivered'];
        $currentIdx = array_search($order['status'], $seq);
        $nextStatus = $seq[$currentIdx + 1] ?? null;
        ?>
        <?php if ($nextStatus): ?>
            <div class="admin-card mb-4">
                <div class="card-header">Update Order Status</div>
                <div class="p-4">
                    <form method="POST" action="../../shop/admin/index.php?page=order-status">
                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                        <input type="hidden" name="status" value="<?= $nextStatus ?>">
                        <p>Move order to: <strong class="badge badge-status-<?= $nextStatus ?>"><?= ucfirst($nextStatus) ?></strong></p>
                        <button type="submit" class="btn" style="background:var(--primary);color:#fff;">
                            <i class="fas fa-arrow-right me-2"></i>Mark as <?= ucfirst($nextStatus) ?>
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <!-- Update Delivery -->
        <?php if ($order['delivery']): ?>
            <div class="admin-card">
                <div class="card-header">Delivery Management</div>
                <div class="p-4">
                    <form method="POST" action="../../shop/admin/index.php?page=order-delivery">
                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Delivery Status</label>
                                <select name="delivery_status" class="form-select">
                                    <?php foreach (['pending','dispatched','in_transit','out_for_delivery','delivered'] as $ds): ?>
                                        <option value="<?= $ds ?>" <?= $order['delivery']['delivery_status'] === $ds ? 'selected' : '' ?>>
                                            <?= ucwords(str_replace('_',' ',$ds)) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tracking Notes</label>
                                <input type="text" name="tracking_notes" class="form-control" value="<?= htmlspecialchars($order['delivery']['tracking_notes'] ?? '') ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn mt-3" style="background:var(--primary);color:#fff;">
                            <i class="fas fa-truck me-2"></i>Update Delivery
                        </button>
                    </form>
                    <div class="mt-3 p-3 bg-light rounded">
                        <strong>Address:</strong> <?= htmlspecialchars($order['delivery']['street']) ?>,
                        <?= htmlspecialchars($order['delivery']['city']) ?>,
                        <?= htmlspecialchars($order['delivery']['county']) ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-lg-4">
        <div class="admin-card mb-3">
            <div class="card-header">Order Info</div>
            <div class="p-3">
                <p class="mb-1"><strong>Order #:</strong> <?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></p>
                <p class="mb-1"><strong>Date:</strong> <?= date('d M Y H:i', strtotime($order['created_at'])) ?></p>
                <p class="mb-1"><strong>Status:</strong> <span class="badge badge-status-<?= $order['status'] ?>"><?= ucfirst($order['status']) ?></span></p>
                <p class="mb-0"><strong>Payment:</strong> <span class="badge bg-<?= $order['payment_status'] === 'paid' ? 'success' : 'warning' ?>"><?= ucfirst($order['payment_status']) ?></span></p>
            </div>
        </div>
        <div class="admin-card mb-3">
            <div class="card-header">Customer</div>
            <div class="p-3">
                <p class="mb-1"><strong><?= htmlspecialchars($order['customer_name']) ?></strong></p>
                <p class="mb-1 text-muted small"><?= htmlspecialchars($order['customer_email']) ?></p>
                <p class="mb-0 text-muted small"><?= htmlspecialchars($order['customer_phone'] ?? '') ?></p>
            </div>
        </div>
        <div class="d-grid gap-2">
            <a href="../../shop/admin/index.php?page=order-receipt&id=<?= $order['id'] ?>" class="btn" style="background:var(--accent);color:#2c3e50;font-weight:600;">
                <i class="fas fa-file-pdf me-2"></i>Download Receipt
            </a>
            <a href="../../shop/admin/index.php?page=orders" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back to Orders
            </a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout-end.php'; ?>
