<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<<<<<<< Updated upstream
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="<?= site_url('admin/orders') ?>" class="btn btn-sm btn-outline-primary">View All Orders</a>
            <a href="<?= site_url('admin/products') ?>" class="btn btn-sm btn-outline-success">View All Products</a>
        </div>
    </div>
=======
    <h1 class="h2">Admin Dashboard</h1>
>>>>>>> Stashed changes
</div>

<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['orders_count'] ?? 0 ?></div>
                    </div>
                    <div class="col-auto">
                        <span data-feather="file-text" class="feather-lg text-primary"></span>
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
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Products</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['products_count'] ?? 0 ?></div>
                    </div>
                    <div class="col-auto">
                        <span data-feather="shopping-bag" class="feather-lg text-success"></span>
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
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Customers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['users_count'] ?? 0 ?></div>
                    </div>
                    <div class="col-auto">
                        <span data-feather="users" class="feather-lg text-info"></span>
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
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            $<?= number_format($stats['sales_total'] ?? 0, 2) ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <span data-feather="dollar-sign" class="feather-lg text-warning"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Orders (5)</h6>
<<<<<<< Updated upstream
=======
                <a href="<?= site_url('admin/orders') ?>" class="btn btn-sm btn-outline-primary">View All Orders</a>
>>>>>>> Stashed changes
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recent_orders)): ?>
                                <?php foreach ($recent_orders as $order): ?>
                                    <tr>
                                        <td><?= esc($order['id']) ?></td>
                                        <td><?= esc($order['user_id']) ?></td>
                                        <td>$<?= number_format((float)$order['total'], 2) ?></td>
                                        <td><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No recent orders found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Sales -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
<<<<<<< Updated upstream
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Recent Products (5)</h6>
=======
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-success">Recent Sales (5)</h6>
                <a href="<?= site_url('admin/orders') ?>" class="btn btn-sm btn-outline-success">View All Sales</a>
>>>>>>> Stashed changes
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
<<<<<<< Updated upstream
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
=======
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Total</th>
>>>>>>> Stashed changes
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
<<<<<<< Updated upstream
                            <?php foreach($recent_products ?? [] as $product): ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= esc($product['name']) ?></td>
                                <td>$<?= number_format($product['price'], 2) ?></td>
                                <td><?= $product['stock'] ?></td>
                                <td><?= date('M d, Y', strtotime($product['created_at'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
=======
                            <?php if (!empty($recent_sales)): ?>
                                <?php foreach ($recent_sales as $sale): ?>
                                    <tr>
                                        <td><?= esc($sale['id']) ?></td>
                                        <td><?= esc($sale['user_id']) ?></td>
                                        <td>$<?= number_format((float)$sale['total'], 2) ?></td>
                                        <td><?= date('M d, Y', strtotime($sale['created_at'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No recent sales found.</td>
                                </tr>
                            <?php endif; ?>
>>>>>>> Stashed changes
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Customers -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Recent Customers (5)</h6>
<<<<<<< Updated upstream
=======
                <a href="<?= site_url('admin/users') ?>" class="btn btn-sm btn-outline-info">View All Customers</a>
>>>>>>> Stashed changes
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recent_users)): ?>
                                <?php foreach ($recent_users as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['full_name']) ?></td>
                                        <td><?= esc($user['email']) ?></td>
                                        <td><?= esc($user['mobile']) ?></td>
                                        <td>
                                            <span class="badge badge-<?= $user['role'] === 'seller' ? 'dark' : 'primary' ?>">
                                                <?= ucfirst(esc($user['role'])) ?>
                                            </span>
                                        </td>
                                        <td><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No recent customers found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>