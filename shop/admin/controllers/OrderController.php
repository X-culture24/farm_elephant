<?php
require_once __DIR__ . '/../../models/Order.php';
require_once __DIR__ . '/../../models/Delivery.php';
require_once __DIR__ . '/../../services/MailService.php';
require_once __DIR__ . '/../../services/PDFService.php';
require_once __DIR__ . '/../../includes/helpers.php';

class OrderController {
    private Order $orderModel;
    private Delivery $deliveryModel;

    public function __construct() {
        $this->orderModel    = new Order();
        $this->deliveryModel = new Delivery();
    }

    public function index(): void {
        $page_title   = 'Orders';
        $current_page = 'orders';
        $status       = sanitize(get('status', ''));
        $page         = max(1, (int) get('p', 1));
        $perPage      = 20;
        $total        = $this->orderModel->countAll($status);
        $pagination   = paginate($total, $perPage, $page);
        $orders       = $this->orderModel->findAll($perPage, $pagination['offset'], $status);
        include __DIR__ . '/../../views/admin/orders/list.php';
    }

    public function detail(): void {
        $id    = (int) get('id');
        $order = $this->orderModel->findById($id);
        if (!$order) { flash('error', 'Order not found.', 'error'); redirect('shop/admin/index.php?page=orders'); }

        $page_title   = 'Order #' . str_pad($id, 6, '0', STR_PAD_LEFT);
        $current_page = 'orders';
        include __DIR__ . '/../../views/admin/orders/detail.php';
    }

    public function updateStatus(): void {
        if (!isPost()) redirect('shop/admin/index.php?page=orders');
        $id        = (int) post('order_id');
        $newStatus = sanitize(post('status'));

        try {
            $this->orderModel->updateStatus($id, $newStatus);
            $order = $this->orderModel->findById($id);
            if ($order) MailService::statusUpdate($order);
            flash('success', 'Order status updated to ' . ucfirst($newStatus) . '.', 'success');
        } catch (\InvalidArgumentException $e) {
            flash('error', $e->getMessage(), 'error');
        }
        redirect('shop/admin/index.php?page=order&id=' . $id);
    }

    public function updateDelivery(): void {
        if (!isPost()) redirect('shop/admin/index.php?page=orders');
        $orderId = (int) post('order_id');
        $status  = sanitize(post('delivery_status'));
        $notes   = sanitize(post('tracking_notes', ''));

        $this->deliveryModel->updateStatus($orderId, $status, $notes);
        flash('success', 'Delivery status updated.', 'success');
        redirect('shop/admin/index.php?page=order&id=' . $orderId);
    }

    public function downloadReceipt(): void {
        $id    = (int) get('id');
        $order = $this->orderModel->findById($id);
        if (!$order) { flash('error', 'Order not found.', 'error'); redirect('shop/admin/index.php?page=orders'); }
        PDFService::download($order);
    }
}
