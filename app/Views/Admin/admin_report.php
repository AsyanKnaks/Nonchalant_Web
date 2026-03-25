<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-chart-line mr-2 text-primary"></i>Reports & Analytics
    </h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Filter: <?= esc($rangeLabel ?? 'This Month') ?>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item <?= ($range ?? 'month') === 'today' ? 'active' : '' ?>" href="<?= site_url('admin/reports?range=today') ?>">Today</a>
                <a class="dropdown-item <?= ($range ?? 'month') === 'week' ? 'active' : '' ?>" href="<?= site_url('admin/reports?range=week') ?>">This Week</a>
                <a class="dropdown-item <?= ($range ?? 'month') === 'month' ? 'active' : '' ?>" href="<?= site_url('admin/reports?range=month') ?>">This Month</a>
                <a class="dropdown-item <?= ($range ?? 'month') === 'year' ? 'active' : '' ?>" href="<?= site_url('admin/reports?range=year') ?>">This Year</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            ₱<?= number_format($sales_data['total_sales'] ?? 0, 2) ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Delivered Orders</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            <?= $sales_data['order_count'] ?? 0 ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Sales by Day (<?= esc($rangeLabel ?? 'This Month') ?>)
                </h6>
            </div>
            <div class="card-body">
                <div style="position: relative; height: 460px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    Sales Report (<?= esc($rangeLabel ?? 'This Month') ?>)
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Delivered Orders</th>
                                <th>Sales Amount</th>
                                <th>Avg Order Value</th>
                                <th>Growth %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($daily_sales)): ?>
                                <?php foreach ($daily_sales as $day): ?>
                                    <tr>
                                        <td><?= esc($day['date']) ?></td>
                                        <td><?= esc($day['orders']) ?></td>
                                        <td>₱<?= number_format($day['sales'], 2) ?></td>
                                        <td>₱<?= number_format($day['avg_order'], 2) ?></td>
                                        <td>
                                            <span class="badge badge-<?= $day['growth'] >= 0 ? 'success' : 'danger' ?>">
                                                <?= number_format($day['growth'], 2) ?>%
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No sales data found for this range.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <small class="text-muted">
                    Total sales and daily sales are based on orders with status <strong>Delivered</strong> only.
                </small>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Low Inventory Alert (Stock &lt; 10)</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($low_stock_items)): ?>
                                <?php foreach ($low_stock_items as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id']) ?></td>
                                        <td><?= esc($item['name']) ?></td>
                                        <td>
                                            <span class="badge badge-warning"><?= esc($item['stock']) ?></span>
                                        </td>
                                        <td>₱<?= number_format($item['price'], 2) ?></td>
                                        <td>₱<?= number_format($item['value'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No low stock items found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const salesLabels = <?= json_encode($salesChartLabels ?? []) ?>;
const salesValues = <?= json_encode($salesChartValues ?? []) ?>;

new Chart(document.getElementById('salesChart'), {
    type: 'line',
    data: {
        labels: salesLabels,
        datasets: [{
            label: 'Sales',
            data: salesValues,
            borderWidth: 3,
            fill: false,
            tension: 0.2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<?= $this->endSection() ?>