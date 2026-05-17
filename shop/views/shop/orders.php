<?php
$page_title = "My Orders - Elephant Farm Dairy";
$page_class = "shop-page";
$base = '../../';
include $base . 'includes/header.php';
?>

<div style="padding-top: 80px;">
    <section class="page-header py-4 bg-primary text-white">
        <div class="container">
            <h1 class="display-5 mb-0"><i class="fas fa-list me-2"></i>My Orders</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <?php renderFlash(); ?>

            <?php if (empty($orders)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-4x mb-3 text-muted"></i>
                    <h4>No orders yet</h4>
                    <a href="shop/index.php?page=products" class="btn mt-3" style="background:var(--primary-color);color:#fff;">Start Shopping</a>
                </div>
            <?php else: ?>
                <div class="card shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background:var(--primary-color);color:#fff;">
                                <tr>
                                    <th class="ps-3">Order #</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold">#<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></td>
                                        <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                                        <td><?= $order['item_count'] ?> item(s)</td>
                                        <td class="fw-semibold"><?= formatCurrency((float)$order['total_amount']) ?></td>
                                        <td>
                                            <?php
                                            $statusColors = ['pending'=>'warning','confirmed'=>'info','processing'=>'primary','shipped'=>'secondary','delivered'=>'success'];
                                            $color = $statusColors[$order['status']] ?? 'secondary';
                                            ?>
                                            <span class="badge bg-<?= $color ?>"><?= ucfirst($order['status']) ?></span>
                                        </td>
                                        <td>
                                            <?php $pColor = $order['payment_status'] === 'paid' ? 'success' : ($order['payment_status'] === 'failed' ? 'danger' : 'warning'); ?>
                                            <span class="badge bg-<?= $pColor ?>"><?= ucfirst($order['payment_status']) ?></span>
                                        </td>
                                        <td>
                                            <a href="shop/index.php?page=order&id=<?= $order['id'] ?>" class="btn btn-sm btn-outline-primary">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include $base . 'includes/footer.php'; ?>
