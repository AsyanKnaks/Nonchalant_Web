<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-chart-line mr-2 text-primary"></i>Reports & Analytics
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Filter: This Month
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item active" href="#">Today</a>
                <a class="dropdown-item" href="#">This Week</a>
                <a class="dropdown-item" href="#">This Month</a>
                <a class="dropdown-item" href="#">This Year</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Sales Overview Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">₱<?= number_format($sales_data['total_sales'] ?? 0, 2) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Orders Processed</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $sales_data['order_count'] ?? 0 ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Low Stock Items</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $inventory_data['low_stock'] ?? 0 ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Inventory Value</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">₱<?= number_format($inventory_data['total_value'] ?? 0, 2) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row">
    <!-- Sales Chart -->
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sales by Day (Last 30 Days)</h6>
            </div>
            <div class="card-body">
                <canvas id="salesChart" width="100%" height="40"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Inventory Chart -->
    <div class="col-xl-4 col-lg-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Inventory Stock Levels</h6>
            </div>
            <div class="card-body">
                <canvas id="inventoryChart" width="100%" height="40"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Sales Table -->
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daily Sales Report (This Month)</h6>
                <a href="#" class="btn btn-sm btn-primary">Export CSV</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Orders</th>
                                <th>Sales Amount</th>
                                <th>Avg Order Value</th>
                                <th>Growth %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($daily_sales ?? [] as $day): ?>
                            <tr>
                                <td><?= $day['date'] ?></td>
                                <td><?= $day['orders'] ?></td>
                                <td>₱<?= number_format($day['sales'], 2) ?></td>
                                <td>₱<?= number_format($day['avg_order'], 2) ?></td>
                                <td>
                                    <span class="badge badge-<?= $day['growth'] > 0 ? 'success' : 'danger' ?>">
                                        <?= $day['growth'] ?>%
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Low Stock Table -->
<div class="row mt-4">
    <div class="col-xl-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Low Inventory Alert (Stock < 10)</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Stock</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($low_stock_items ?? [] as $item): ?>
                            <tr class="table-warning">
                                <td><?= esc($item['name']) ?></td>
                                <td><strong class="text-danger"><?= $item['stock'] ?></strong></td>
                                <td>₱<?= number_format($item['value'], 2) ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Restock</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan 1', 'Jan 8', 'Jan 15', 'Jan 22', 'Jan 29'],
            datasets: [{
                label: 'Sales',
                data: [12000, 19000, 15000, 28000, 22000],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                tension: 0.4
            }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });

    // Inventory Pie Chart
    const inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
    new Chart(inventoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['High Stock', 'Medium', 'Low Stock'],
            datasets: [{
                data: [65, 25, 10],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545']
            }]
        },
        options: { responsive: true }
    });
});
</script>
<?= $this->endSection() ?>
