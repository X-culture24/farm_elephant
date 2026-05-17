<?php
$page_title = "Shop - Elephant Farm Dairy";
$page_class = "shop-page";
$base = '../../';
include $base . 'includes/header.php';
?>

<div style="padding-top: 80px;">
    <!-- Page Header -->
    <section class="page-header py-4 bg-primary text-white">
        <div class="container">
            <h1 class="display-5 mb-1">Our Shop</h1>
            <p class="lead mb-0">Premium dairy products and cattle for sale</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <!-- Search & Filter Bar -->
            <div class="row mb-4 g-3 align-items-end">
                <div class="col-lg-5">
                    <form method="GET" action="shop/index.php">
                        <input type="hidden" name="page" value="products">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-lg"
                                   placeholder="Search products..." value="<?= htmlspecialchars($keyword) ?>">
                            <button class="btn" style="background: var(--primary-color); color:#fff;" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="shop/index.php?page=products" class="btn btn-sm <?= !$categoryId && !$type ? 'btn-primary' : 'btn-outline-secondary' ?>">All</a>
                        <a href="shop/index.php?page=products&type=sale" class="btn btn-sm <?= $type === 'sale' ? 'btn-primary' : 'btn-outline-secondary' ?>">For Sale</a>
                        <a href="shop/index.php?page=products&type=auction" class="btn btn-sm <?= $type === 'auction' ? 'btn-primary' : 'btn-outline-secondary' ?>">Auctions</a>
                        <?php foreach ($categories as $cat): ?>
                            <a href="shop/index.php?page=products&category=<?= $cat['id'] ?>"
                               class="btn btn-sm <?= $categoryId == $cat['id'] ? 'btn-primary' : 'btn-outline-secondary' ?>">
                                <?= htmlspecialchars($cat['name']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-3 text-end">
                    <?php if (isLoggedIn()): ?>
                        <a href="shop/index.php?page=cart" class="btn btn-outline-primary">
                            <i class="fas fa-shopping-cart me-1"></i> Cart
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <?php renderFlash(); ?>

            <?php if (empty($products)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-4x mb-3" style="color: var(--accent-color);"></i>
                    <h4>No products found</h4>
                    <p class="text-muted">Try a different search or category.</p>
                </div>
            <?php else: ?>
                <?php foreach ($grouped as $catName => $items): ?>
                    <h3 class="mb-3 mt-4" style="color: var(--primary-color); font-family: 'DM Serif Display', serif; border-bottom: 2px solid var(--accent-color); padding-bottom: 0.5rem;">
                        <?= htmlspecialchars($catName) ?>
                    </h3>
                    <div class="row g-4 mb-5">
                        <?php foreach ($items as $p): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product-card card h-100 shadow-sm">
                                    <div style="height: 200px; overflow: hidden;">
                                        <?php if ($p['primary_image']): ?>
                                            <img src="<?= $base . htmlspecialchars($p['primary_image']) ?>"
                                                 class="card-img-top" style="height: 200px; object-fit: cover;"
                                                 alt="<?= htmlspecialchars($p['name']) ?>">
                                        <?php else: ?>
                                            <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                                <i class="fas fa-image fa-3x text-muted"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title fw-bold"><?= htmlspecialchars($p['name']) ?></h6>
                                        <p class="card-text text-muted small flex-grow-1">
                                            <?= htmlspecialchars(substr($p['description'] ?? '', 0, 80)) ?>...
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <span class="fw-bold" style="color: var(--primary-color); font-size: 1.1rem;">
                                                <?= $p['product_type'] === 'auction' ? 'Bid from ' : '' ?>
                                                <?= formatCurrency((float)$p['price']) ?>
                                            </span>
                                            <?php if ($p['product_type'] === 'auction'): ?>
                                                <span class="badge" style="background: var(--accent-color); color: #2c3e50;">Auction</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">In Stock</span>
                                            <?php endif; ?>
                                        </div>
                                        <a href="shop/index.php?page=product&id=<?= $p['id'] ?>"
                                           class="btn btn-sm mt-3 w-100" style="background: var(--primary-color); color:#fff;">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include $base . 'includes/footer.php'; ?>
