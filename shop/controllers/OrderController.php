<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/auth.php';

class OrderController {

    private Order $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    public function index(): void {
        $orders = $this->orderModel->findByCustomer(currentUserId());
        include __DIR__ . '/../views/shop/orders.php';
    }

    public function detail(): void {
        $id    = (int) get('id', 0);
        $order = $this->orderModel->findById($id);

        if (!$order || $order['customer_id'] !== currentUserId()) {
            flash('error', 'Order not found.', 'error');
            redirect('shop/index.php?page=orders');
        }

        include __DIR__ . '/../views/shop/order-detail.php';
    }
}
