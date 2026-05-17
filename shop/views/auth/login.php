<?php
$page_title = "Login - Elephant Farm Dairy";
$page_class = "auth-page";
$base = '../../';
include $base . 'includes/header.php';
require_once $base . 'shop/includes/helpers.php';
?>

<div class="auth-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh; background: var(--light-green); padding-top: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="auth-card bg-white rounded shadow p-5">
                    <div class="text-center mb-4">
                        <img src="<?= $base ?>assets/images/logo/logo.png" alt="Elephant Farm Dairy" style="height: 70px;">
                        <h2 class="mt-3" style="color: var(--primary-color); font-family: 'DM Serif Display', serif;">Welcome Back</h2>
                        <p class="text-muted">Sign in to your account</p>
                    </div>

                    <?php renderFlash(); ?>
                    <?php if (!empty($_SESSION['auth_errors'])): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($_SESSION['auth_errors'] as $e): ?>
                                <div><?= htmlspecialchars($e) ?></div>
                            <?php endforeach; unset($_SESSION['auth_errors']); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= $base ?>shop/index.php?page=login" novalidate>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg" required
                                   value="<?= htmlspecialchars($_SESSION['auth_old']['email'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="<?= $base ?>shop/index.php?page=forgot" style="color: var(--accent-color);">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn btn-lg w-100" style="background: var(--primary-color); color: #fff; font-weight: 600;">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>
                    </form>

                    <hr class="my-4">
                    <p class="text-center mb-0">Don't have an account?
                        <a href="<?= $base ?>shop/index.php?page=register" style="color: var(--accent-color); font-weight: 600;">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset($_SESSION['auth_old']); include $base . 'includes/footer.php'; ?>
