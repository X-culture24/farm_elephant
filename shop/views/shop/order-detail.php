<?php
$page_title = "Order #" . str_pad($order['id'], 6, '0', STR_PAD_LEFT) . " - Elephant Farm Dairy";
$page_class = "shop-page";
$base = '../../';
include $base . 'includes/header.php';

$deliveryStages = ['pending','dispatched','in_transit','out_for_delivery','delivered'];
$currentDeliveryIdx = array_search($order['delivery']['delivery_status'] ?? 'pending', $deliveryStages);
?>

<div style="padding-top: 80px;">
    <section class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="shop/index.php?page=orders" style="color:var(--accent-color);">My Orders</a></li>
                    <li class="breadcrumb-item active">Order #<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></li>
                </ol>
            </nav>

            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Order Items -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header" style="background:var(--primary-color);color:#fff;">
                            <h5 class="mb-0">Order Items</h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr><th class="ps-3">Product</th><th>Qty</th><th>Unit Price</th><th class="text-end pe-3">Total</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order['items'] as $item): ?>
                                        <tr>
                                            <td class="ps-3"><?= htmlspecialchars($item['product_name']) ?></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td><?= formatCurrency((float)$item['unit_price']) ?></td>
                                            <td class="text-end pe-3 fw-semibold"><?= formatCurrency($item['unit_price'] * $item['quantity']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="fw-bold">
                                        <td colspan="3" class="ps-3">Total</td>
                                        <td class="text-end pe-3" style="color:var(--primary-color);font-size:1.1rem;">
                                            <?= formatCurrency((float)$order['total_amount']) ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Delivery Timeline -->
                    <?php if ($order['delivery']): ?>
                        <div class="card shadow-sm">
                            <div class="card-header" style="background:var(--primary-color);color:#fff;">
                                <h5 class="mb-0"><i class="fas fa-truck me-2"></i>Delivery Tracking</h5>
                            </div>
                            <div class="card-body">
                                <div class="delivery-timeline">
                                    <?php foreach ($deliveryStages as $idx => $stage): ?>
                                        <?php $done = $idx <= $currentDeliveryIdx; ?>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="me-3">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                     style="width:40px;height:40px;background:<?= $done ? 'var(--primary-color)' : '#dee2e6' ?>;color:<?= $done ? '#fff' : '#6c757d' ?>;">
                                                    <i class="fas fa-<?= $done ? 'check' : 'circle' ?>"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <strong style="color:<?= $done ? 'var(--primary-color)' : '#6c757d' ?>;">
                                                    <?= ucwords(str_replace('_', ' ', $stage)) ?>
                                                </strong>
                                                <?php if ($stage === $order['delivery']['delivery_status'] && $order['delivery']['tracking_notes']): ?>
                                                    <p class="mb-0 text-muted small"><?= htmlspecialchars($order['delivery']['tracking_notes']) ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="mt-3 p-3 bg-light rounded">
                                    <strong>Delivery Address:</strong><br>
                                    <?= htmlspecialchars($order['delivery']['street']) ?>,
                                    <?= htmlspecialchars($order['delivery']['city']) ?>,
                                    <?= htmlspecialchars($order['delivery']['county']) ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header" style="background:#f8f9fa;">
                            <h6 class="mb-0">Order Status</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $statusColors = ['pending'=>'warning','confirmed'=>'info','processing'=>'primary','shipped'=>'secondary','delivered'=>'success'];
                            $color = $statusColors[$order['status']] ?? 'secondary';
                            ?>
                            <span class="badge bg-<?= $color ?> fs-6 mb-2"><?= ucfirst($order['status']) ?></span>
                            <p class="text-muted small mb-0">Placed on <?= date('d M Y H:i', strtotime($order['created_at'])) ?></p>
                        </div>
                    </div>

                    <?php if ($order['payment']): ?>
                        <div class="card shadow-sm">
                            <div class="card-header" style="background:#f8f9fa;">
                                <h6 class="mb-0">Payment</h6>
                            </div>
                            <div class="card-body">
                                <?php $pColor = $order['payment']['status'] === 'paid' ? 'success' : ($order['payment']['status'] === 'failed' ? 'danger' : 'warning'); ?>
                                <span class="badge bg-<?= $pColor ?> mb-2"><?= ucfirst($order['payment']['status']) ?></span>
                                <p class="mb-1 small"><strong>Method:</strong> <?= strtoupper($order['payment']['payment_method']) ?></p>
                                <?php if ($order['payment']['transaction_reference']): ?>
                                    <p class="mb-0 small"><strong>Ref:</strong> <?= htmlspecialchars($order['payment']['transaction_reference']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include $base . 'includes/footer.php'; ?>
