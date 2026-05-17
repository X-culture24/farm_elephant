<?php
// DNR Elephant Farm Dairy - Auth Session Helpers

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn(): bool {
    return !empty($_SESSION['user_id']);
}

function isAdmin(): bool {
    return isLoggedIn() && ($_SESSION['user_role'] ?? '') === 'admin';
}

function currentUserId(): ?int {
    return $_SESSION['user_id'] ?? null;
}

function currentUserName(): string {
    return $_SESSION['user_name'] ?? 'Guest';
}

function requireLogin(): void {
    if (!isLoggedIn()) {
        flash('error', 'Please log in to continue.', 'warning');
        redirect('shop/index.php?page=login');
    }
}

function requireAdmin(): void {
    if (!isAdmin()) {
        flash('error', 'Access denied.', 'error');
        redirect('shop/index.php?page=login');
    }
}
