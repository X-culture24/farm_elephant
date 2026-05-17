<?php
$page_title = "Register - Elephant Farm Dairy";
$page_class = "auth-page";
$base = '../../';
include $base . 'includes/header.php';
require_once $base . 'shop/includes/helpers.php';
$old = $_SESSION['auth_old'] ?? [];
?>

<div class="auth-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh; background: var(--light-green); padding-top: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="auth-card bg-white rounded shadow p-5">
                    <div class="text-center mb-4">
                        <img src="<?= $base ?>assets/images/logo/logo.png" alt="Elephant Farm Dairy" style="height: 70px;">
                        <h2 class="mt-3" style="color: var(--primary-color); font-family: 'DM Serif Display', serif;">Create Account</h2>
                        <p class="text-muted">Join Elephant Farm Dairy</p>
                    </div>

                    <?php renderFlash(); ?>
                    <?php if (!empty($_SESSION['auth_errors'])): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($_SESSION['auth_errors'] as $e): ?>
                                <div><?= htmlspecialchars($e) ?></div>
                            <?php endforeach; unset($_SESSION['auth_errors']); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= $base ?>shop/index.php?page=register" novalidate>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <input type="text" name="name" class="form-control form-control-lg" required
                                   value="<?= htmlspecialchars($old['name'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address *</label>
                            <input type="email" name="email" class="form-control form-control-lg" required
                                   value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="+254..."
                                   value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password * <small class="text-muted">(min 8 characters)</small></label>
                            <input type="password" name="password" class="form-control form-control-lg" required minlength="8">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Confirm Password *</label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg" required>
                        </div>
                        <button type="submit" class="btn btn-lg w-100" style="background: var(--primary-color); color: #fff; font-weight: 600;">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </form>

                    <hr class="my-4">
                    <p class="text-center mb-0">Already have an account?
                        <a href="<?= $base ?>shop/index.php?page=login" style="color: var(--accent-color); font-weight: 600;">Sign in here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset($_SESSION['auth_old']); include $base . 'includes/footer.php'; ?>
