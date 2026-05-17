<?php
$page_title = "Order Confirmed - Elephant Farm Dairy";
$page_class = "shop-page";
$base = '../../';
include $base . 'includes/header.php';

if (empty($_SESSION['last_order_id'])) {
    redirect('shop/index.php?page=products');
}
$orderId = (int) $_SESSION['last_order_id'];
unset($_SESSION['last_order_id']);

require_once $base . 'shop/models/Order.php';
$orderModel = new Order();
$order = $orderModel->findById($orderId);
if (!$order) redirect('shop/index.php?page=products');
?>

<div style="padding-top: 80px;">
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Success Banner -->
                    <div class="text-center mb-5">
                        <div class="mb-3">
                            <i class="fas fa-check-circle fa-5x" style="color:var(--primary-color);"></i>
                        </div>
                        <h1 style="font-family:'DM Serif Display',serif; color:var(--primary-color);">Order Placed!</h1>
                        <p class="lead text-muted">Thank you for your order. We'll send a confirmation to your email.</p>
                        <div class="badge fs-6 px-4 py-2" style="background:var(--accent-color);color:#2c3e50;">
                            Order #<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?>
                        </div>
                    </div>

                    <!-- Order Details Card -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header" style="background:var(--primary-color);color:#fff;">
                            <h5 class="mb-0">Order Details</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless mb-0">
                                <thead class="table-light">
                                    <tr><th>Product</th><th>Qty</th><th class="text-end">Price</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order['items'] as $item): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($item['product_name']) ?></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td class="text-end"><?= formatCurrency($item['unit_price'] * $item['quantity']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="fw-bold">
                                        <td colspan="2">Total</td>
                                        <td class="text-end" style="color:var(--primary-color);font-size:1.2rem;">
                                            <?= formatCurrency((float)$order['total_amount']) ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header" style="background:var(--accent-color);color:#2c3e50;">
                            <h5 class="mb-0"><i class="fas fa-mobile-alt me-2"></i>Payment Instructions</h5>
                        </div>
                        <div class="card-body">
                            <?php if ($order['payment']['payment_method'] === 'mpesa'): ?>
                                <p class="mb-2"><strong>Pay via M-Pesa:</strong></p>
                                <ol>
                                    <li>Go to M-Pesa on your phone</li>
                                    <li>Select <strong>Lipa na M-Pesa → Paybill</strong></li>
                                    <li>Business No: <strong>247247</strong></li>
                                    <li>Account No: <strong>ORDER-<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></strong></li>
                                    <li>Amount: <strong><?= formatCurrency((float)$order['total_amount']) ?></strong></li>
                                </ol>
                            <?php else: ?>
                                <p>You will be redirected to complete card payment. Check your email for instructions.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Delivery Info -->
                    <?php if ($order['delivery']): ?>
                        <div class="card shadow-sm mb-4">
                            <div class="card-header" style="background:#f8f9fa;">
                                <h5 class="mb-0"><i class="fas fa-truck me-2"></i>Delivery Address</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-1"><?= htmlspecialchars($order['delivery']['street']) ?></p>
                                <p class="mb-1"><?= htmlspecialchars($order['delivery']['city']) ?>, <?= htmlspecialchars($order['delivery']['county']) ?></p>
                                <?php if ($order['delivery']['preferred_date']): ?>
                                    <p class="mb-0 text-muted">Preferred date: <?= date('d M Y', strtotime($order['delivery']['preferred_date'])) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex gap-3 justify-content-center">
                        <a href="shop/index.php?page=orders" class="btn btn-outline-primary">
                            <i class="fas fa-list me-1"></i>View My Orders
                        </a>
                        <a href="shop/index.php?page=products" class="btn" style="background:var(--primary-color);color:#fff;">
                            <i class="fas fa-shopping-bag me-1"></i>Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include $base . 'includes/footer.php'; ?>
