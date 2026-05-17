<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/helpers.php';

class AuthController {

    private PDO $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    /**
     * Handle customer registration
     */
    public function register(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isPost()) {
            include __DIR__ . '/../views/auth/register.php';
            return;
        }

        $name  = sanitize(post('name'));
        $email = sanitize(post('email'));
        $phone = sanitize(post('phone'));
        $pass  = post('password');
        $confirm = post('confirm_password');

        // Validation
        $errors = [];
        if (empty($name))  $errors[] = 'Name is required.';
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
        if (strlen($pass) < 8) $errors[] = 'Password must be at least 8 characters.';
        if ($pass !== $confirm) $errors[] = 'Passwords do not match.';

        if (!empty($errors)) {
            $_SESSION['auth_errors'] = $errors;
            $_SESSION['auth_old'] = compact('name', 'email', 'phone');
            redirect('shop/index.php?page=register');
        }

        // Check duplicate email
        $stmt = $this->db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $_SESSION['auth_errors'] = ['An account with this email already exists.'];
            $_SESSION['auth_old'] = compact('name', 'email', 'phone');
            redirect('shop/index.php?page=register');
        }

        // Create account
        $hash = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]);
        $stmt = $this->db->prepare(
            'INSERT INTO users (name, email, password_hash, phone, role) VALUES (?, ?, ?, ?, ?)'
        );
        $stmt->execute([$name, $email, $hash, $phone, 'customer']);

        flash('success', 'Account created! Please log in.', 'success');
        redirect('shop/index.php?page=login');
    }

    /**
     * Handle login
     */
    public function login(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isPost()) {
            include __DIR__ . '/../views/auth/login.php';
            return;
        }

        $email = sanitize(post('email'));
        $pass  = post('password');

        $stmt = $this->db->prepare('SELECT id, name, email, password_hash, role FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Generic error — never reveal which field is wrong
        if (!$user || !password_verify($pass, $user['password_hash'])) {
            $_SESSION['auth_errors'] = ['Invalid email or password.'];
            redirect('shop/index.php?page=login');
        }

        // Regenerate session ID to prevent fixation
        session_regenerate_id(true);
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        if ($user['role'] === 'admin') {
            redirect('shop/admin/index.php');
        } else {
            redirect('shop/index.php?page=products');
        }
    }

    /**
     * Handle logout
     */
    public function logout(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $_SESSION = [];
        session_destroy();
        redirect('shop/index.php?page=login');
    }

    /**
     * Request password reset — sends email with token
     */
    public function requestReset(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isPost()) {
            include __DIR__ . '/../views/auth/reset-password.php';
            return;
        }

        $email = sanitize(post('email'));
        $stmt  = $this->db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Always show success to prevent email enumeration
        flash('success', 'If that email exists, a reset link has been sent.', 'info');

        if ($user) {
            $token   = generateToken();
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $stmt = $this->db->prepare(
                'UPDATE users SET reset_token = ?, reset_expires = ? WHERE id = ?'
            );
            $stmt->execute([$token, $expires, $user['id']]);

            // Mail would be sent here via MailService (wired in Task 9)
            // MailService::send('reset-password', $email, ['token' => $token]);
        }

        redirect('shop/index.php?page=login');
    }

    /**
     * Process password reset with token
     */
    public function resetPassword(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $token = sanitize(get('token'));

        if (!isPost()) {
            $_SESSION['reset_token'] = $token;
            include __DIR__ . '/../views/auth/reset-password.php';
            return;
        }

        $token   = sanitize(post('token'));
        $pass    = post('password');
        $confirm = post('confirm_password');

        if ($pass !== $confirm || strlen($pass) < 8) {
            flash('error', 'Passwords do not match or are too short.', 'error');
            redirect('shop/index.php?page=reset&token=' . urlencode($token));
        }

        $stmt = $this->db->prepare(
            'SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW() LIMIT 1'
        );
        $stmt->execute([$token]);
        $user = $stmt->fetch();

        if (!$user) {
            flash('error', 'Invalid or expired reset link.', 'error');
            redirect('shop/index.php?page=login');
        }

        $hash = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]);
        $stmt = $this->db->prepare(
            'UPDATE users SET password_hash = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?'
        );
        $stmt->execute([$hash, $user['id']]);

        flash('success', 'Password updated. Please log in.', 'success');
        redirect('shop/index.php?page=login');
    }
}
