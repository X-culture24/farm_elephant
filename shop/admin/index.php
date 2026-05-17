<?php
// Admin Front Controller
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../shop/includes/db.php';
require_once __DIR__ . '/../../shop/includes/helpers.php';
require_once __DIR__ . '/../../shop/includes/auth.php';

requireAdmin();

$page = get('page', 'dashboard');

$routes = [
    'dashboard'  => ['controllers/DashboardController.php', 'index'],
    'products'   => ['controllers/ProductController.php',   'index'],
    'product-create' => ['controllers/ProductController.php', 'create'],
    'product-store'  => ['controllers/ProductController.php', 'store'],
    'product-edit'   => ['controllers/ProductController.php', 'edit'],
    'product-update' => ['controllers/ProductController.php', 'update'],
    'product-delete' => ['controllers/ProductController.php', 'destroy'],
    'categories' => ['controllers/ProductController.php',   'categories'],
    'orders'     => ['controllers/OrderController.php',     'index'],
    'order'      => ['controllers/OrderController.php',     'detail'],
    'order-status' => ['controllers/OrderController.php',   'updateStatus'],
    'order-delivery' => ['controllers/OrderController.php', 'updateDelivery'],
    'order-receipt'  => ['controllers/OrderController.php', 'downloadReceipt'],
    'customers'  => ['controllers/CustomerController.php',  'index'],
    'customer'   => ['controllers/CustomerController.php',  'detail'],
    'pos'        => ['controllers/POSController.php',       'index'],
    'pos-complete' => ['controllers/POSController.php',     'completeSale'],
];

if (!isset($routes[$page])) $page = 'dashboard';

[$file, $method] = $routes[$page];
require_once __DIR__ . '/' . $file;

$className  = basename($file, '.php');
$controller = new $className();
$controller->$method();
