<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 13px; color: #2c3e50; }
    .header { background: #2d5a27; color: #fff; padding: 25px 30px; }
    .header h1 { font-size: 22px; margin-bottom: 4px; }
    .header p { color: #d4af37; font-size: 13px; }
    .receipt-meta { padding: 20px 30px; background: #f8f9fa; border-bottom: 2px solid #d4af37; }
    .receipt-meta table { width: 100%; }
    .receipt-meta td { padding: 4px 0; }
    .receipt-meta .label { color: #6c757d; width: 40%; }
    .receipt-meta .value { font-weight: bold; }
    .section { padding: 20px 30px; }
    .section h3 { color: #2d5a27; font-size: 14px; margin-bottom: 12px; border-bottom: 1px solid #dee2e6; padding-bottom: 6px; }
    table.items { width: 100%; border-collapse: collapse; }
    table.items th { background: #2d5a27; color: #fff; padding: 8px 10px; text-align: left; font-size: 12px; }
    table.items td { padding: 8px 10px; border-bottom: 1px solid #eee; }
    table.items tr:nth-child(even) td { background: #f8f9fa; }
    .totals { padding: 15px 30px; background: #f8f9fa; }
    .totals table { width: 100%; }
    .totals td { padding: 5px 0; }
    .totals .grand-total td { font-size: 16px; font-weight: bold; color: #2d5a27; border-top: 2px solid #2d5a27; padding-top: 10px; }
    .footer { padding: 20px 30px; text-align: center; color: #6c757d; font-size: 11px; border-top: 1px solid #dee2e6; margin-top: 20px; }
    .badge { display: inline-block; background: #d4af37; color: #2c3e50; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; }
    .paid-stamp { color: #2d5a27; font-size: 28px; font-weight: bold; border: 3px solid #2d5a27; display: inline-block; padding: 5px 20px; border-radius: 6px; transform: rotate(-5deg); opacity: 0.7; }
</style>
</head>
<body>

<div class="header">
    <h1>🐘 Elephant Farm Dairy</h1>
    <p>Official Receipt</p>
</div>

<div class="receipt-meta">
    <table>
        <tr>
            <td class="label">Receipt No:</td>
            <td class="value">#<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></td>
            <td class="label">Date:</td>
            <td class="value"><?= date('d M Y H:i', strtotime($order['created_at'])) ?></td>
        </tr>
        <tr>
            <td class="label">Customer:</td>
            <td class="value"><?= htmlspecialchars($order['customer_name']) ?></td>
            <td class="label">Status:</td>
            <td class="value"><span class="badge"><?= ucfirst($order['payment']['status'] ?? 'pending') ?></span></td>
        </tr>
        <tr>
            <td class="label">Email:</td>
            <td class="value"><?= htmlspecialchars($order['customer_email']) ?></td>
            <td class="label">Phone:</td>
            <td class="value"><?= htmlspecialchars($order['customer_phone'] ?? '') ?></td>
        </tr>
    </table>
</div>

<div class="section">
    <h3>Order Items</h3>
    <table class="items">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order['items'] as $i => $item): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>KES <?= number_format($item['unit_price'], 2) ?></td>
                    <td>KES <?= number_format($item['unit_price'] * $item['quantity'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="totals">
    <table>
        <tr>
            <td style="width:70%;"></td>
            <td><strong>Subtotal:</strong></td>
            <td style="text-align:right;">KES <?= number_format($order['total_amount'], 2) ?></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Tax (0%):</strong></td>
            <td style="text-align:right;">KES 0.00</td>
        </tr>
        <tr class="grand-total">
            <td></td>
            <td>TOTAL:</td>
            <td style="text-align:right;">KES <?= number_format($order['total_amount'], 2) ?></td>
        </tr>
    </table>
</div>

<?php if (!empty($order['payment'])): ?>
<div class="section">
    <h3>Payment Information</h3>
    <table>
        <tr>
            <td style="width:40%;color:#6c757d;">Method:</td>
            <td><?= strtoupper($order['payment']['payment_method'] ?? '') ?></td>
        </tr>
        <?php if ($order['payment']['transaction_reference']): ?>
        <tr>
            <td style="color:#6c757d;">Transaction Ref:</td>
            <td><strong><?= htmlspecialchars($order['payment']['transaction_reference']) ?></strong></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td style="color:#6c757d;">Payment Status:</td>
            <td><span class="badge"><?= ucfirst($order['payment']['status'] ?? '') ?></span></td>
        </tr>
    </table>
    <?php if (($order['payment']['status'] ?? '') === 'paid'): ?>
        <div style="text-align:right;margin-top:15px;">
            <span class="paid-stamp">PAID</span>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<div class="footer">
    <p><strong>Elephant Farm Dairy</strong> | P.O. Box 1241-20100, Kaparei, Eldoret, Kenya</p>
    <p>Tel: +254 724 345 658 | Email: info@elephantfarm.co.ke</p>
    <p style="margin-top:8px;">Thank you for your business!</p>
</div>

</body>
</html>
