<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
<div class="profile-page">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h2 class="fw-bold mb-0">
                    <i class="bi bi-person-lines-fill me-3 text-primary"></i>
                    Transaction History
                </h2>
                <a href="<?= base_url('shop') ?>" class="btn btn-outline-primary rounded-pill px-4">
                    <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                </a>
            </div>
            
            <!-- Stats Cards -->
            <div class="row mb-5 g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center p-4 bg-primary bg-opacity-10">
                        <i class="bi bi-cart-check display-4 text-primary mb-3"></i>
                        <h4 class="fw-bold">5</h4>
                        <p class="mb-0 text-muted">Total Orders</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center p-4 bg-success bg-opacity-10">
                        <i class="bi bi-credit-card display-4 text-success mb-3"></i>
                        <h4 class="fw-bold">₱12,450</h4>
                        <p class="mb-0 text-muted">Total Spent</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center p-4 bg-warning bg-opacity-10">
                        <i class="bi bi-clock-history display-4 text-warning mb-3"></i>
                        <h4 class="fw-bold">3</h4>
                        <p class="mb-0 text-muted">Pending</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center p-4 bg-info bg-opacity-10">
                        <i class="bi bi-check-circle display-4 text-info mb-3"></i>
                        <h4 class="fw-bold">2</h4>
                        <p class="mb-0 text-muted">Completed</p>
                    </div>
                </div>
            </div>

            <!-- Transactions Table -->
            <div class="card shadow-lg border-0">
                <div class="card-header bg-white border-bottom py-4">
                    <h5 class="mb-0 fw-bold">Order History</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light sticky-top">
                                <tr>
                                    <th class="border-0 fw-bold py-4">Order ID</th>
                                    <th class="border-0 fw-bold py-4">Date</th>
                                    <th class="border-0 fw-bold py-4">Items</th>
                                    <th class="border-0 fw-bold py-4">Total</th>
                                    <th class="border-0 fw-bold py-4">Status</th>
                                    <th class="border-0 fw-bold py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">#1001</td>
                                    <td>2024-01-15</td>
                                    <td>Drop 26 Hoodie (1), Tee (2)</td>
                                    <td class="fw-bold text-success">₱4,900</td>
                                    <td><span class="badge bg-success px-3 py-2">Delivered</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#1002</td>
                                    <td>2024-01-20</td>
                                    <td>Manga Tee (1)</td>
                                    <td class="fw-bold text-success">₱1,200</td>
                                    <td><span class="badge bg-info px-3 py-2">Processing</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Track</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#1003</td>
                                    <td>2024-02-01</td>
                                    <td>Drop 25 Hoodie (1)</td>
                                    <td class="fw-bold text-danger">₱3,200</td>
                                    <td><span class="badge bg-warning px-3 py-2">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary">Cancel</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#1004</td>
                                    <td>2024-02-10</td>
                                    <td>DDD Collab Tee (1)</td>
                                    <td class="fw-bold text-success">₱2,800</td>
                                    <td><span class="badge bg-success px-3 py-2">Delivered</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary">Invoice</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
