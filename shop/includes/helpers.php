<?php
// DNR Elephant Farm Dairy - Helper Functions

/**
 * Redirect to a URL
 */
function redirect(string $url): void {
    header("Location: $url");
    exit;
}

/**
 * Set a flash message in session
 */
function flash(string $key, string $message, string $type = 'info'): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $_SESSION['flash'][$key] = ['message' => $message, 'type' => $type];
}

/**
 * Get and clear a flash message
 */
function getFlash(string $key): ?array {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['flash'][$key])) {
        $flash = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $flash;
    }
    return null;
}

/**
 * Sanitize string input
 */
function sanitize(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Format a number as Kenyan Shillings
 */
function formatCurrency(float $amount): string {
    return 'KES ' . number_format($amount, 2);
}

/**
 * Generate a random token
 */
function generateToken(int $length = 32): string {
    return bin2hex(random_bytes($length));
}

/**
 * Get base URL of the application
 */
function baseUrl(string $path = ''): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    return $protocol . '://' . $host . '/' . ltrim($path, '/');
}

/**
 * Check if request is POST
 */
function isPost(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Get POST value safely
 */
function post(string $key, mixed $default = ''): mixed {
    return $_POST[$key] ?? $default;
}

/**
 * Get GET value safely
 */
function get(string $key, mixed $default = ''): mixed {
    return $_GET[$key] ?? $default;
}

/**
 * Render flash messages as Bootstrap alerts
 */
function renderFlash(): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!empty($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $key => $flash) {
            $type = match($flash['type']) {
                'success' => 'success',
                'error'   => 'danger',
                'warning' => 'warning',
                default   => 'info',
            };
            echo "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>";
            echo htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8');
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>";
            unset($_SESSION['flash'][$key]);
        }
    }
}

/**
 * Paginate an array of results
 */
function paginate(int $total, int $perPage, int $currentPage): array {
    $totalPages = (int) ceil($total / $perPage);
    return [
        'total'       => $total,
        'per_page'    => $perPage,
        'current'     => $currentPage,
        'total_pages' => $totalPages,
        'offset'      => ($currentPage - 1) * $perPage,
        'has_prev'    => $currentPage > 1,
        'has_next'    => $currentPage < $totalPages,
    ];
}
