<?php
/**
 * Safaricom Daraja M-Pesa IPN Callback Endpoint
 * POST https://yourdomain.co.ke/api/mpesa-callback.php
 */
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../shop/includes/db.php';
require_once __DIR__ . '/../shop/services/PaymentService.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

// Read raw JSON body
$raw     = file_get_contents('php://input');
$payload = json_decode($raw, true);

if (!$payload) {
    http_response_code(400);
    echo json_encode(['ResultCode' => 1, 'ResultDesc' => 'Invalid payload']);
    exit;
}

// Log callback for debugging
error_log('M-Pesa Callback: ' . $raw);

try {
    $paymentService = new PaymentService();
    $success = $paymentService->handleMpesaCallback($payload);

    // Daraja expects this exact response
    header('Content-Type: application/json');
    echo json_encode(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
} catch (\Exception $e) {
    error_log('M-Pesa callback error: ' . $e->getMessage());
    echo json_encode(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
}
