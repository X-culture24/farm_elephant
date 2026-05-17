<?php
$page_title = "Reset Password - Elephant Farm Dairy";
$page_class = "auth-page";
$base = '../../';
include $base . 'includes/header.php';
require_once $base . 'shop/includes/helpers.php';
$token = $_SESSION['reset_token'] ?? get('token', '');
$isReset = !empty($token);
?>

<div class="auth-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh; background: var(--light-green); padding-top: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="auth-card bg-white rounded shadow p-5">
                    <div class="text-center mb-4">
                        <img src="<?= $base ?>assets/images/logo/logo.png" alt="Elephant Farm Dairy" style="height: 70px;">
                        <h2 class="mt-3" style="color: var(--primary-color); font-family: 'DM Serif Display', serif;">
                            <?= $isReset ? 'Set New Password' : 'Forgot Password' ?>
                        </h2>
                        <p class="text-muted">
                            <?= $isReset ? 'Enter your new password below.' : 'Enter your email to receive a reset link.' ?>
                        </p>
                    </div>

                    <?php renderFlash(); ?>

                    <?php if ($isReset): ?>
                        <form method="POST" action="<?= $base ?>shop/index.php?page=reset">
                            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">New Password *</label>
                                <input type="password" name="password" class="form-control form-control-lg" required minlength="8">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Confirm New Password *</label>
                                <input type="password" name="confirm_password" class="form-control form-control-lg" required>
                            </div>
                            <button type="submit" class="btn btn-lg w-100" style="background: var(--primary-color); color: #fff; font-weight: 600;">
                                <i class="fas fa-lock me-2"></i>Update Password
                            </button>
                        </form>
                    <?php else: ?>
                        <form method="POST" action="<?= $base ?>shop/index.php?page=forgot">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Email Address *</label>
                                <input type="email" name="email" class="form-control form-control-lg" required>
                            </div>
                            <button type="submit" class="btn btn-lg w-100" style="background: var(--primary-color); color: #fff; font-weight: 600;">
                                <i class="fas fa-paper-plane me-2"></i>Send Reset Link
                            </button>
                        </form>
                    <?php endif; ?>

                    <hr class="my-4">
                    <p class="text-center mb-0">
                        <a href="<?= $base ?>shop/index.php?page=login" style="color: var(--accent-color); font-weight: 600;">
                            <i class="fas fa-arrow-left me-1"></i>Back to Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $base . 'includes/footer.php'; ?>
