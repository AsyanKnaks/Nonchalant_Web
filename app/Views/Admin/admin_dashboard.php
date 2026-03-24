<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Admin Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['orders_count'] ?? 0 ?></div>
                    </div>
                    <div class="col-auto"><span data-feather="file-text" class="feather-lg text-primary"></span></div>
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
                    <div class="col-auto"><span data-feather="shopping-cart" class="feather-lg text-success"></span></div>
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
                    <div class="col-auto"><span data-feather="users" class="feather-lg text-info"></span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders (5) -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Recent Orders (5)</h6>
                <a href="<?= site_url('admin/orders') ?>" class="btn btn-sm btn-outline-primary ml-2">View All Orders</a>
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
                            <?php foreach($recent_orders ?? [] as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['user_id'] ?></td>
                                <td>$<?= number_format($order['total'], 2) ?></td>
                                <td><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Products (5) -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-success">Recent Products (5)</h6>
                <a href="<?= site_url('admin/products') ?>" class="btn btn-sm btn-outline-success ml-2">View All Products</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>                               
                                <th>Collection</th>                            
                            </tr>                       
                         </thead>
                        <tbody>
                            <?php foreach($recent_products ?? [] as $product): ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= esc($product['name']) ?></td>
                                <td>$<?= number_format($product['price'], 2) ?></td>
                                <td><?= $product['stock'] ?></td>
                                <td><?= date('M d, Y', strtotime($product['collection'])) ?></td>
                                </tr>                            
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Customers (5) -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-info">Recent Customers (5)</h6>
                <a href="<?= site_url('admin/users') ?>" class="btn btn-sm btn-outline-info ml-2">View All Customers</a>
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
                            <?php foreach($recent_users ?? [] as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= esc($user['full_name']) ?></td>
                                <td><?= esc($user['email']) ?></td>
                                <td><?= esc($user['mobile']) ?></td>
                                <td><span class="badge badge-<?= $user['role'] == 'admin' ? 'danger' : 'primary' ?>"><?= ucfirst($user['role']) ?></span></td>
                                <td><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
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