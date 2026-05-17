<?php
$page_title = "Checkout - Elephant Farm Dairy";
$page_class = "shop-page";
$base = '../../';
include $base . 'includes/header.php';
?>

<div style="padding-top: 80px;">
    <section class="page-header py-4 bg-primary text-white">
        <div class="container">
            <h1 class="display-5 mb-0"><i class="fas fa-lock me-2"></i>Checkout</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <?php renderFlash(); ?>

            <form method="POST" action="shop/index.php?page=order-confirm">
                <div class="row g-4">
                    <!-- Delivery Details -->
                    <div class="col-lg-7">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header" style="background:var(--primary-color);color:#fff;">
                                <h5 class="mb-0"><i class="fas fa-truck me-2"></i>Delivery Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Street Address *</label>
                                    <input type="text" name="street" class="form-control" required placeholder="e.g. 123 Kenyatta Avenue">
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">City *</label>
                                        <input type="text" name="city" class="form-control" required placeholder="e.g. Eldoret">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">County *</label>
                                        <input type="text" name="county" class="form-control" required placeholder="e.g. Uasin Gishu">
                                    </div>
                                </div>
                                <div class="row g-3 mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control" placeholder="e.g. 30100">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Preferred Delivery Date</label>
                                        <input type="date" name="preferred_date" class="form-control"
                                               min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="card shadow-sm">
                            <div class="card-header" style="background:var(--primary-color);color:#fff;">
                                <h5 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment Method</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-check mb-3 p-3 border rounded">
                                    <input class="form-check-input" type="radio" name="payment_method" id="mpesa" value="mpesa" checked>
                                    <label class="form-check-label fw-semibold" for="mpesa">
                                        <i class="fas fa-mobile-alt me-2" style="color:var(--primary-color);"></i>
                                        M-Pesa (STK Push)
                                        <small class="d-block text-muted">You'll receive a prompt on your phone</small>
                                    </label>
                                </div>
                                <div class="form-check p-3 border rounded">
                                    <input class="form-check-input" type="radio" name="payment_method" id="card" value="card">
                                    <label class="form-check-label fw-semibold" for="card">
                                        <i class="fas fa-credit-card me-2" style="color:var(--accent-color);"></i>
                                        Card Payment
                                        <small class="d-block text-muted">Visa, Mastercard accepted</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-lg-5">
                        <div class="card shadow-sm sticky-top" style="top:90px;">
                            <div class="card-header" style="background:var(--primary-color);color:#fff;">
                                <h5 class="mb-0">Order Summary</h5>
                            </div>
                            <div class="card-body">
                                <?php foreach ($items as $item): ?>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span><?= htmlspecialchars($item['name']) ?> × <?= $item['quantity'] ?></span>
                                        <span class="fw-semibold"><?= formatCurrency($item['price'] * $item['quantity']) ?></span>
                                    </div>
                                <?php endforeach; ?>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                                    <span>Total</span>
                                    <span style="color:var(--primary-color);"><?= formatCurrency($total) ?></span>
                                </div>
                                <button type="submit" class="btn btn-lg w-100" style="background:var(--primary-color);color:#fff;font-weight:700;">
                                    <i class="fas fa-check-circle me-2"></i>Place Order
                                </button>
                                <a href="shop/index.php?page=cart" class="btn btn-outline-secondary w-100 mt-2">
                                    <i class="fas fa-arrow-left me-1"></i>Back to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php include $base . 'includes/footer.php'; ?>
