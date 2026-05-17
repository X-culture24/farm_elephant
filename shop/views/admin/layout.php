<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Admin' ?> - Elephant Farm Dairy</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --primary: #2d5a27; --accent: #d4af37; --dark: #1a3d1a; }
        body { font-family: 'DM Sans', sans-serif; background: #f4f6f9; }
        .sidebar { width: 260px; min-height: 100vh; background: var(--dark); position: fixed; top: 0; left: 0; z-index: 100; transition: all 0.3s; }
        .sidebar .brand { padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar .brand img { height: 45px; }
        .sidebar .brand span { color: var(--accent); font-weight: 700; font-size: 0.85rem; display: block; }
        .sidebar .nav-link { color: rgba(255,255,255,0.75); padding: 10px 20px; display: flex; align-items: center; gap: 10px; transition: all 0.2s; border-left: 3px solid transparent; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background: rgba(255,255,255,0.08); border-left-color: var(--accent); }
        .sidebar .nav-link i { width: 20px; text-align: center; }
        .sidebar .nav-section { color: rgba(255,255,255,0.4); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; padding: 15px 20px 5px; }
        .main-content { margin-left: 260px; min-height: 100vh; }
        .topbar { background: #fff; padding: 15px 25px; border-bottom: 1px solid #e9ecef; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 99; }
        .topbar h4 { margin: 0; color: var(--primary); font-family: 'DM Serif Display', serif; }
        .content-area { padding: 25px; }
        .stat-card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); border-left: 4px solid var(--accent); }
        .stat-card .stat-value { font-size: 2rem; font-weight: 700; color: var(--primary); }
        .stat-card .stat-label { color: #6c757d; font-size: 0.85rem; }
        .admin-card { background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); overflow: hidden; }
        .admin-card .card-header { background: var(--primary); color: #fff; padding: 15px 20px; font-weight: 600; }
        .admin-card .card-header .btn { border-color: rgba(255,255,255,0.5); color: #fff; }
        .admin-card .card-header .btn:hover { background: var(--accent); border-color: var(--accent); color: #2c3e50; }
        .badge-status-pending { background: #ffc107; color: #2c3e50; }
        .badge-status-confirmed { background: #17a2b8; color: #fff; }
        .badge-status-processing { background: #007bff; color: #fff; }
        .badge-status-shipped { background: #6c757d; color: #fff; }
        .badge-status-delivered { background: #28a745; color: #fff; }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="brand">
        <img src="../../assets/images/logo/logo-white.png" alt="Logo" onerror="this.style.display='none'">
        <span>🐘 Elephant Farm Dairy</span>
        <small style="color:rgba(255,255,255,0.5);font-size:0.75rem;">Admin Panel</small>
    </div>

    <nav class="mt-2">
        <div class="nav-section">Main</div>
        <a href="../../shop/admin/index.php?page=dashboard" class="nav-link <?= ($current_page ?? '') === 'dashboard' ? 'active' : '' ?>">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>

        <div class="nav-section">Catalogue</div>
        <a href="../../shop/admin/index.php?page=products" class="nav-link <?= ($current_page ?? '') === 'products' ? 'active' : '' ?>">
            <i class="fas fa-box"></i> Products
        </a>
        <a href="../../shop/admin/index.php?page=categories" class="nav-link <?= ($current_page ?? '') === 'categories' ? 'active' : '' ?>">
            <i class="fas fa-tags"></i> Categories
        </a>

        <div class="nav-section">Sales</div>
        <a href="../../shop/admin/index.php?page=orders" class="nav-link <?= ($current_page ?? '') === 'orders' ? 'active' : '' ?>">
            <i class="fas fa-shopping-bag"></i> Orders
        </a>
        <a href="../../shop/admin/index.php?page=pos" class="nav-link <?= ($current_page ?? '') === 'pos' ? 'active' : '' ?>">
            <i class="fas fa-cash-register"></i> Point of Sale
        </a>

        <div class="nav-section">Customers</div>
        <a href="../../shop/admin/index.php?page=customers" class="nav-link <?= ($current_page ?? '') === 'customers' ? 'active' : '' ?>">
            <i class="fas fa-users"></i> Customers
        </a>

        <div class="nav-section">Account</div>
        <a href="../../shop/index.php?page=logout" class="nav-link">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-sm btn-outline-secondary d-md-none" onclick="document.getElementById('sidebar').classList.toggle('open')">
                <i class="fas fa-bars"></i>
            </button>
            <h4><?= $page_title ?? 'Admin' ?></h4>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small"><i class="fas fa-user me-1"></i><?= htmlspecialchars(currentUserName()) ?></span>
            <a href="../../index.php" class="btn btn-sm btn-outline-secondary" target="_blank">
                <i class="fas fa-external-link-alt me-1"></i>View Site
            </a>
        </div>
    </div>

    <div class="content-area">
        <?php renderFlash(); ?>
