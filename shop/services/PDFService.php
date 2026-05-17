<?php
use Dompdf\Dompdf;
use Dompdf\Options;

require_once __DIR__ . '/../../vendor/autoload.php';

class PDFService {

    /**
     * Generate a PDF receipt for an order and return the binary string
     */
    public static function generateReceipt(array $order): string {
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        // Render receipt HTML template
        ob_start();
        include __DIR__ . '/../views/receipts/receipt.php';
        $html = ob_get_clean();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }

    /**
     * Save receipt PDF to disk and return the file path
     */
    public static function saveReceipt(array $order): string {
        $dir = __DIR__ . '/../../shop/uploads/receipts/';
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $filename = 'receipt-' . str_pad($order['id'], 6, '0', STR_PAD_LEFT) . '.pdf';
        $path     = $dir . $filename;

        file_put_contents($path, self::generateReceipt($order));
        return $path;
    }

    /**
     * Stream PDF to browser for download
     */
    public static function download(array $order): void {
        $pdf      = self::generateReceipt($order);
        $filename = 'receipt-' . str_pad($order['id'], 6, '0', STR_PAD_LEFT) . '.pdf';

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdf));
        echo $pdf;
        exit;
    }
}
