<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><style>
body{font-family:'DM Sans',Arial,sans-serif;background:#f8f9fa;margin:0;padding:0;}
.wrap{max-width:600px;margin:30px auto;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.1);}
.header{background:#2d5a27;padding:30px;text-align:center;}
.header h1{color:#fff;margin:0;font-size:1.5rem;}
.body{padding:30px;}
.status-badge{display:inline-block;background:#d4af37;color:#2c3e50;padding:8px 20px;border-radius:50px;font-weight:700;font-size:1.1rem;margin:10px 0;}
.timeline{margin:20px 0;}
.step{display:flex;align-items:center;margin-bottom:12px;}
.dot{width:20px;height:20px;border-radius:50%;margin-right:12px;flex-shrink:0;}
.dot.done{background:#2d5a27;}
.dot.pending{background:#dee2e6;}
.footer{background:#f8f9fa;padding:20px;text-align:center;color:#6c757d;font-size:0.85rem;}
.btn{display:inline-block;background:#2d5a27;color:#fff;padding:12px 30px;border-radius:50px;text-decoration:none;font-weight:600;margin-top:15px;}
</style></head>
<body>
<div class="wrap">
    <div class="header">
        <h1>🐘 Elephant Farm Dairy</h1>
        <p style="color:#d4af37;margin:5px 0 0;">Order Status Update</p>
    </div>
    <div class="body">
        <p>Dear <strong><?= htmlspecialchars($order['customer_name']) ?></strong>,</p>
        <p>Your order <strong>#<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></strong> has been updated:</p>

        <div class="status-badge"><?= ucfirst($order['status']) ?></div>

        <?php
        $messages = [
            'confirmed'  => 'Great news! Your order has been confirmed and is being prepared.',
            'processing' => 'Your order is currently being processed and packed.',
            'shipped'    => 'Your order is on its way! ' . ($order['delivery']['tracking_notes'] ?? ''),
            'delivered'  => 'Your order has been delivered. We hope you enjoy your purchase!',
        ];
        ?>
        <p><?= $messages[$order['status']] ?? 'Your order status has been updated.' ?></p>

        <?php
        $stages = ['pending','confirmed','processing','shipped','delivered'];
        $currentIdx = array_search($order['status'], $stages);
        ?>
        <div class="timeline">
            <?php foreach ($stages as $idx => $stage): ?>
                <div class="step">
                    <div class="dot <?= $idx <= $currentIdx ? 'done' : 'pending' ?>"></div>
                    <span style="color:<?= $idx <= $currentIdx ? '#2d5a27' : '#6c757d' ?>;font-weight:<?= $idx === $currentIdx ? '700' : '400' ?>;">
                        <?= ucfirst($stage) ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="<?= $_ENV['APP_URL'] ?? '' ?>/shop/index.php?page=order&id=<?= $order['id'] ?>" class="btn">View Order Details</a>
    </div>
    <div class="footer">
        <p>Elephant Farm Dairy | Kaparei, Eldoret, Kenya | +254 724 345 658</p>
    </div>
</div>
</body></html>
