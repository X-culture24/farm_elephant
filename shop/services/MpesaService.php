<?php
/**
 * Safaricom Daraja M-Pesa API Service
 * Handles STK Push and IPN callback parsing
 */
class MpesaService {

    private string $consumerKey;
    private string $consumerSecret;
    private string $passkey;
    private string $shortcode;
    private string $callbackUrl;
    private string $env;
    private string $baseUrl;

    public function __construct() {
        $this->consumerKey    = $_ENV['MPESA_CONSUMER_KEY']    ?? '';
        $this->consumerSecret = $_ENV['MPESA_CONSUMER_SECRET'] ?? '';
        $this->passkey        = $_ENV['MPESA_PASSKEY']         ?? '';
        $this->shortcode      = $_ENV['MPESA_SHORTCODE']       ?? '';
        $this->callbackUrl    = $_ENV['MPESA_CALLBACK_URL']    ?? '';
        $this->env            = $_ENV['MPESA_ENV']             ?? 'sandbox';
        $this->baseUrl        = $this->env === 'production'
            ? 'https://api.safaricom.co.ke'
            : 'https://sandbox.safaricom.co.ke';
    }

    /**
     * Get OAuth access token from Daraja
     */
    private function getAccessToken(): string {
        $url  = $this->baseUrl . '/oauth/v1/generate?grant_type=client_credentials';
        $cred = base64_encode($this->consumerKey . ':' . $this->consumerSecret);

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => ["Authorization: Basic $cred"],
            CURLOPT_TIMEOUT        => 30,
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        return $data['access_token'] ?? '';
    }

    /**
     * Initiate STK Push to customer's phone
     */
    public function stkPush(string $phone, float $amount, int $orderId): array {
        $token     = $this->getAccessToken();
        $timestamp = date('YmdHis');
        $password  = base64_encode($this->shortcode . $this->passkey . $timestamp);

        // Normalize phone: 07xx -> 2547xx
        $phone = preg_replace('/^0/', '254', $phone);
        $phone = preg_replace('/^\+/', '', $phone);

        $payload = [
            'BusinessShortCode' => $this->shortcode,
            'Password'          => $password,
            'Timestamp'         => $timestamp,
            'TransactionType'   => 'CustomerPayBillOnline',
            'Amount'            => (int) ceil($amount),
            'PartyA'            => $phone,
            'PartyB'            => $this->shortcode,
            'PhoneNumber'       => $phone,
            'CallBackURL'       => $this->callbackUrl,
            'AccountReference'  => 'ORDER-' . str_pad($orderId, 6, '0', STR_PAD_LEFT),
            'TransactionDesc'   => 'Elephant Farm Dairy Order #' . $orderId,
        ];

        $ch = curl_init($this->baseUrl . '/mpesa/stkpush/v1/processrequest');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_HTTPHEADER     => [
                "Authorization: Bearer $token",
                'Content-Type: application/json',
            ],
            CURLOPT_TIMEOUT => 30,
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($response, true) ?? [];
        $result['http_code'] = $httpCode;
        return $result;
    }

    /**
     * Parse and validate Daraja IPN callback payload
     */
    public function parseCallback(array $payload): array {
        $body = $payload['Body']['stkCallback'] ?? null;
        if (!$body) {
            return ['success' => false, 'message' => 'Invalid callback payload'];
        }

        $resultCode = (int) ($body['ResultCode'] ?? -1);
        if ($resultCode !== 0) {
            return [
                'success' => false,
                'message' => $body['ResultDesc'] ?? 'Payment failed',
                'result_code' => $resultCode,
            ];
        }

        $items = $body['CallbackMetadata']['Item'] ?? [];
        $meta  = [];
        foreach ($items as $item) {
            $meta[$item['Name']] = $item['Value'] ?? null;
        }

        return [
            'success'           => true,
            'transaction_ref'   => $meta['MpesaReceiptNumber'] ?? '',
            'amount'            => (float) ($meta['Amount'] ?? 0),
            'phone'             => $meta['PhoneNumber'] ?? '',
            'checkout_request_id' => $body['CheckoutRequestID'] ?? '',
        ];
    }
}
