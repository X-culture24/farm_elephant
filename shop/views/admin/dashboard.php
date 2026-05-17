<?php include __DIR__ . '/layout.php'; ?>

<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="stat-value">KES <?= number_format($revenue['today'] ?? 0, 0) ?></div>
            <div class="stat-label"><i class="fas fa-sun me-1"></i>Today's Revenue</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card" style="border-left-color:#2d5a27;">
            <div class="stat-value">KES <?= number_format($revenue['week'] ?? 0, 0) ?></div>
            <div class="stat-label"><i class="fas fa-calendar-week me-1"></i>This Week</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card" style="border-left-color:#17a2b8;">
            <div class="stat-value">KES <?= number_format($revenue['month'] ?? 0, 0) ?></div>
            <div class="stat-label"><i class="fas fa-calendar me-1"></i>This Month</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card" style="border-left-color:#28a745;">
            <div class="stat-value"><?= $newCustomers ?></div>
            <div class="stat-label"><i class="fas fa-user-plus me-1"></i>New Customers (30d)</div>
        </div>
    </div>
</div>

<!-- Order Status Breakdown -->
<div class="row g-4 mb-4">
    <?php
    $statuses = ['pending'=>'warning','confirmed'=>'info','processing'=>'primary','shipped'=>'secondary','delivered'=>'success'];
    foreach ($statuses as $s => $color): ?>
        <div class="col">
            <div class="text-center p-3 bg-white rounded shadow-sm">
                <div class="fw-bold fs-4"><?= $orderCounts[$s] ?? 0 ?></div>
                <span class="badge bg-<?= $color ?>"><?= ucfirst($s) ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="row g-4">
    <!-- Revenue Chart -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-header">Revenue Trend (12 months)</div>
            <div class="p-3">
                <canvas id="revenueChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <!-- Top Products -->
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="card-header">Top 5 Products</div>
            <div class="p-0">
                <table class="table table-sm mb-0">
                    <thead class="table-light"><tr><th>Product</th><th>Sold</th></tr></thead>
                    <tbody>
                        <?php foreach ($topProducts as $p): ?>
                            <tr>
                                <td><?= htmlspecialchars($p['name']) ?></td>
                                <td><span class="badge" style="background:var(--accent);color:#2c3e50;"><?= $p['total_sold'] ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($topProducts)): ?>
                            <tr><td colspan="2" class="text-muted text-center py-3">No sales yet</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="admin-card mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Recent Orders</span>
        <a href="../../shop/admin/index.php?page=orders" class="btn btn-sm btn-outline-light">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Order #</th><th>Customer</th><th>Total</th><th>Status</th><th>Payment</th><th>Date</th><th></th></tr></thead>
            <tbody>
                <?php foreach ($recentOrders as $o): ?>
                    <tr>
                        <td class="fw-bold">#<?= str_pad($o['id'], 6, '0', STR_PAD_LEFT) ?></td>
                        <td><?= htmlspecialchars($o['customer_name']) ?></td>
                        <td>KES <?= number_format($o['total_amount'], 0) ?></td>
                        <td><span class="badge badge-status-<?= $o['status'] ?>"><?= ucfirst($o['status']) ?></span></td>
                        <td><span class="badge bg-<?= $o['payment_status'] === 'paid' ? 'success' : 'warning' ?>"><?= ucfirst($o['payment_status']) ?></span></td>
                        <td><?= date('d M', strtotime($o['created_at'])) ?></td>
                        <td><a href="../../shop/admin/index.php?page=order&id=<?= $o['id'] ?>" class="btn btn-sm btn-outline-primary">View</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
const ctx = document.getElementById('revenueChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode(array_column($trend, 'month')) ?>,
        datasets: [{
            label: 'Revenue (KES)',
            data: <?= json_encode(array_column($trend, 'revenue')) ?>,
            borderColor: '#2d5a27',
            backgroundColor: 'rgba(45,90,39,0.1)',
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#d4af37',
        }]
    },
    options: { responsive: true, plugins: { legend: { display: false } } }
});
</script>

<?php include __DIR__ . '/layout-end.php'; ?>
