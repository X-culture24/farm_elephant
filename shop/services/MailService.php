<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class MailService {

    /**
     * Send an email using a template
     *
     * @param string $template  Template name (without .php) in shop/views/emails/
     * @param string $toEmail   Recipient email
     * @param string $toName    Recipient name
     * @param string $subject   Email subject
     * @param array  $data      Data passed to the template
     */
    public static function send(string $template, string $toEmail, string $toName, string $subject, array $data = []): bool {
        $templateFile = __DIR__ . '/../views/emails/' . $template . '.php';
        if (!file_exists($templateFile)) {
            error_log("MailService: template not found: $templateFile");
            return false;
        }

        // Render template to string
        ob_start();
        extract($data);
        include $templateFile;
        $body = ob_get_clean();

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = $_ENV['MAIL_HOST']     ?? 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'] ?? '';
            $mail->Password   = $_ENV['MAIL_PASSWORD'] ?? '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = (int) ($_ENV['MAIL_PORT'] ?? 587);

            $mail->setFrom(
                $_ENV['MAIL_FROM']      ?? 'noreply@elephantfarm.co.ke',
                $_ENV['MAIL_FROM_NAME'] ?? 'Elephant Farm Dairy'
            );
            $mail->addAddress($toEmail, $toName);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);

            // Attach PDF receipt if provided
            if (!empty($data['pdf_path']) && file_exists($data['pdf_path'])) {
                $mail->addAttachment($data['pdf_path'], 'receipt.pdf');
            }

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log('MailService error: ' . $mail->ErrorInfo);
            return false;
        }
    }

    /**
     * Send order confirmation email
     */
    public static function orderConfirmation(array $order): bool {
        return self::send(
            'order-confirmation',
            $order['customer_email'],
            $order['customer_name'],
            'Order Confirmed - #' . str_pad($order['id'], 6, '0', STR_PAD_LEFT),
            ['order' => $order]
        );
    }

    /**
     * Send payment confirmed email
     */
    public static function paymentConfirmed(array $order): bool {
        return self::send(
            'payment-confirmed',
            $order['customer_email'],
            $order['customer_name'],
            'Payment Received - Order #' . str_pad($order['id'], 6, '0', STR_PAD_LEFT),
            ['order' => $order]
        );
    }

    /**
     * Send order status update email
     */
    public static function statusUpdate(array $order): bool {
        return self::send(
            'status-update',
            $order['customer_email'],
            $order['customer_name'],
            'Order Update: ' . ucfirst($order['status']) . ' - #' . str_pad($order['id'], 6, '0', STR_PAD_LEFT),
            ['order' => $order]
        );
    }
}
