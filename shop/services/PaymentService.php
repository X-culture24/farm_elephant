<?php
require_once __DIR__ . '/MpesaService.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../includes/db.php';

class PaymentService {

    private MpesaService $mpesa;
    private Order $orderModel;
    private PDO $db;

    public function __construct() {
        $this->mpesa      = new MpesaService();
        $this->orderModel = new Order();
        $this->db         = DB::getInstance();
    }

    /**
     * Initiate M-Pesa STK Push for an order
     */
    public function initiateMpesa(int $orderId, string $phone, float $amount): array {
        $result = $this->mpesa->stkPush($phone, $amount, $orderId);

        if (isset($result['ResponseCode']) && $result['ResponseCode'] === '0') {
            // Store checkout request ID for callback matching
            $stmt = $this->db->prepare(
                'UPDATE payments SET transaction_reference = ? WHERE order_id = ?'
            );
            $stmt->execute([$result['CheckoutRequestID'] ?? '', $orderId]);
            return ['success' => true, 'message' => 'STK Push sent. Check your phone.', 'checkout_request_id' => $result['CheckoutRequestID'] ?? ''];
        }

        return ['success' => false, 'message' => $result['errorMessage'] ?? 'Failed to initiate payment. Please try again.'];
    }

    /**
     * Handle M-Pesa IPN callback
     */
    public function handleMpesaCallback(array $payload): bool {
        $parsed = $this->mpesa->parseCallback($payload);

        // Find payment by checkout request ID
        $stmt = $this->db->prepare(
            'SELECT order_id FROM payments WHERE transaction_reference = ? LIMIT 1'
        );
        $stmt->execute([$parsed['checkout_request_id'] ?? '']);
        $payment = $stmt->fetch();

        if (!$payment) return false;

        $orderId = $payment['order_id'];

        if ($parsed['success']) {
            $this->orderModel->updatePaymentStatus($orderId, 'paid', $parsed['transaction_ref']);
            // Trigger confirmation email (wired in Task 9)
            return true;
        } else {
            $this->orderModel->updatePaymentStatus($orderId, 'failed');
            return false;
        }
    }

    /**
     * Mark order as paid manually (cash/POS)
     */
    public function markPaid(int $orderId, string $method, string $reference = ''): bool {
        return $this->orderModel->updatePaymentStatus($orderId, 'paid', $reference);
    }
}
