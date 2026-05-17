<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><style>
body{font-family:'DM Sans',Arial,sans-serif;background:#f8f9fa;margin:0;padding:0;}
.wrap{max-width:600px;margin:30px auto;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.1);}
.header{background:#2d5a27;padding:30px;text-align:center;}
.header h1{color:#fff;margin:0;font-size:1.5rem;}
.body{padding:30px;}
.success-box{background:#d4edda;border:1px solid #c3e6cb;border-radius:8px;padding:20px;text-align:center;margin-bottom:20px;}
.success-box h2{color:#155724;margin:0;}
.ref-box{background:#f8f9fa;border-left:4px solid #d4af37;padding:15px;border-radius:6px;margin:20px 0;}
.footer{background:#f8f9fa;padding:20px;text-align:center;color:#6c757d;font-size:0.85rem;}
.btn{display:inline-block;background:#2d5a27;color:#fff;padding:12px 30px;border-radius:50px;text-decoration:none;font-weight:600;margin-top:15px;}
</style></head>
<body>
<div class="wrap">
    <div class="header">
        <h1>🐘 Elephant Farm Dairy</h1>
        <p style="color:#d4af37;margin:5px 0 0;">Payment Confirmed</p>
    </div>
    <div class="body">
        <div class="success-box">
            <h2>✅ Payment Received!</h2>
            <p style="margin:5px 0 0;color:#155724;">KES <?= number_format($order['total_amount'], 2) ?></p>
        </div>

        <p>Dear <strong><?= htmlspecialchars($order['customer_name']) ?></strong>,</p>
        <p>We've confirmed your payment for Order <strong>#<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></strong>. Your order is now being processed.</p>

        <div class="ref-box">
            <strong>Transaction Reference:</strong> <?= htmlspecialchars($order['payment']['transaction_reference'] ?? 'N/A') ?><br>
            <strong>Amount Paid:</strong> KES <?= number_format($order['total_amount'], 2) ?><br>
            <strong>Payment Method:</strong> <?= strtoupper($order['payment']['payment_method'] ?? '') ?>
        </div>

        <p>A PDF receipt is attached to this email for your records.</p>
        <a href="<?= $_ENV['APP_URL'] ?? '' ?>/shop/index.php?page=order&id=<?= $order['id'] ?>" class="btn">Track Your Order</a>
    </div>
    <div class="footer">
        <p>Elephant Farm Dairy | Kaparei, Eldoret, Kenya | +254 724 345 658</p>
    </div>
</div>
</body></html>
