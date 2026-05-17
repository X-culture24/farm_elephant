<?php
// DNR Elephant Farm Dairy - Shop Front Controller
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/auth.php';

$page = get('page', 'products');

// Route map: page => [controller file, method, requires_login, requires_admin]
$routes = [
    'login'    => ['controllers/AuthController.php', 'login',        false, false],
    'register' => ['controllers/AuthController.php', 'register',     false, false],
    'logout'   => ['controllers/AuthController.php', 'logout',       false, false],
    'forgot'   => ['controllers/AuthController.php', 'requestReset', false, false],
    'reset'    => ['controllers/AuthController.php', 'resetPassword',false, false],

    'products' => ['controllers/ShopController.php', 'listing',      false, false],
    'product'  => ['controllers/ShopController.php', 'detail',       false, false],

    'cart'     => ['controllers/CartController.php', 'index',        true,  false],
    'cart-add' => ['controllers/CartController.php', 'add',          true,  false],
    'cart-update' => ['controllers/CartController.php', 'update',    true,  false],
    'cart-remove' => ['controllers/CartController.php', 'remove',    true,  false],

    'checkout' => ['controllers/CheckoutController.php', 'index',    true,  false],
    'order-confirm' => ['controllers/CheckoutController.php', 'confirm', true, false],

    'orders'   => ['controllers/OrderController.php', 'index',       true,  false],
    'order'    => ['controllers/OrderController.php', 'detail',      true,  false],

    'account'  => ['controllers/AccountController.php', 'index',     true,  false],
];

if (!isset($routes[$page])) {
    $page = 'products';
}

[$file, $method, $needsLogin, $needsAdmin] = $routes[$page];

if ($needsAdmin)  requireAdmin();
if ($needsLogin)  requireLogin();

require_once __DIR__ . '/' . $file;

// Instantiate controller by filename
$className = basename($file, '.php');
$controller = new $className();
$controller->$method();
