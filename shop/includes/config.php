<?php
// Site configuration - auto-detects base URL
if (!defined('SITE_ROOT')) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $script   = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');

    // Walk up from /shop/... or /shop/admin/... to find root
    $parts = explode('/', trim($script, '/'));
    $shopIdx = array_search('shop', $parts);
    $rootParts = $shopIdx !== false ? array_slice($parts, 0, $shopIdx) : [];
    $rootPath = $rootParts ? '/' . implode('/', $rootParts) : '';

    define('SITE_ROOT', $protocol . '://' . $host . $rootPath);
    define('SITE_PATH', $rootPath);
}
