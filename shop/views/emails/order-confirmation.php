<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><style>
body{font-family:'DM Sans',Arial,sans-serif;background:#f8f9fa;margin:0;padding:0;}
.wrap{max-width:600px;margin:30px auto;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.1);}
.header{background:#2d5a27;padding:30px;text-align:center;}
.header img{height:60px;}
.header h1{color:#fff;margin:10px 0 0;font-size:1.5rem;}
.body{padding:30px;}
.order-num{background:#f8f9fa;border-left:4px solid #d4af37;padding:15px;border-radius:6px;margin-bottom:20px;}
table{width:100%;border-collapse:collapse;margin:20px 0;}
th{background:#2d5a27;color:#fff;padding:10px;text-align:left;}
td{padding:10px;border-bottom:1px solid #eee;}
.total{font-size:1.2rem;font-weight:700;color:#2d5a27;}
.footer{background:#f8f9fa;padding:20px;text-align:center;color:#6c757d;font-size:0.85rem;}
.btn{display:inline-block;background:#2d5a27;color:#fff;padding:12px 30px;border-radius:50px;text-decoration:none;font-weight:600;margin-top:15px;}
</style></head>
<body>
<div class="wrap">
    <div class="header">
        <h1>🐘 Elephant Farm Dairy</h1>
        <p style="color:#d4af37;margin:5px 0 0;">Order Confirmation</p>
    </div>
    <div class="body">
        <p>Dear <strong><?= htmlspecialchars($order['customer_name']) ?></strong>,</p>
        <p>Thank you for your order! We've received it and will process it shortly.</p>

        <div class="order-num">
            <strong>Order Number:</strong> #<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?><br>
            <strong>Date:</strong> <?= date('d M Y H:i', strtotime($order['created_at'])) ?><br>
            <strong>Status:</strong> <?= ucfirst($order['status']) ?>
        </div>

        <table>
            <thead><tr><th>Product</th><th>Qty</th><th>Price</th></tr></thead>
            <tbody>
                <?php foreach ($order['items'] as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['product_name']) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>KES <?= number_format($item['unit_price'] * $item['quantity'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr><td colspan="2"><strong>Total</strong></td><td class="total">KES <?= number_format($order['total_amount'], 2) ?></td></tr>
            </tfoot>
        </table>

        <?php if (!empty($order['delivery'])): ?>
            <p><strong>Delivery to:</strong> <?= htmlspecialchars($order['delivery']['street']) ?>, <?= htmlspecialchars($order['delivery']['city']) ?></p>
        <?php endif; ?>

        <p>Payment Method: <strong><?= strtoupper($order['payment']['payment_method'] ?? 'M-PESA') ?></strong></p>
        <a href="<?= $_ENV['APP_URL'] ?? '' ?>/shop/index.php?page=order&id=<?= $order['id'] ?>" class="btn">View Order</a>
    </div>
    <div class="footer">
        <p>Elephant Farm Dairy | Kaparei, Eldoret, Kenya | +254 724 345 658</p>
        <p>info@elephantfarm.co.ke</p>
    </div>
</div>
</body></html>
