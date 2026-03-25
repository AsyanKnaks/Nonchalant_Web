<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<section class="bg-dark text-white text-center py-5">
    <div class="container">
        <h1 class="display-5 fw-bold mt-3 mb-2">My Profile</h1>
        <p class="lead opacity-75 mb-0">Welcome back, <?= esc($customerName ?? 'Customer') ?></p>
    </div>
</section>

<div class="container my-5">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success rounded-4 shadow-sm">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger rounded-4 shadow-sm">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 text-center p-4 h-100">
                <h6 class="text-muted mb-2">Total Orders</h6>
                <h2 class="fw-bold mb-0"><?= esc($totalOrders ?? 0) ?></h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 text-center p-4 h-100">
                <h6 class="text-muted mb-2">Total Spent</h6>
                <h2 class="fw-bold mb-0">₱<?= number_format((float) ($totalSpent ?? 0), 2) ?></h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 text-center p-4 h-100">
                <h6 class="text-muted mb-2">Processing</h6>
                <h2 class="fw-bold mb-0"><?= esc($processingCount ?? 0) ?></h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 text-center p-4 h-100">
                <h6 class="text-muted mb-2">Completed</h6>
                <h2 class="fw-bold mb-0"><?= esc($completedCount ?? 0) ?></h2>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-lg rounded-4 mb-5">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-3">Account Information</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong>Name:</strong><br>
                    <span class="text-muted"><?= esc($customerName ?? '-') ?></span>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Email:</strong><br>
                    <span class="text-muted"><?= esc($customerEmail ?? '-') ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Order History</h4>

            <?php if (!empty($orders)): ?>
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th style="min-width: 280px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                    $status = $order['status'] ?? 'Processing';
                                    $badgeClass = 'secondary';

                                    if ($status === 'Processing') $badgeClass = 'warning';
                                    if ($status === 'Delivering') $badgeClass = 'primary';
                                    if ($status === 'Completed') $badgeClass = 'success';
                                    if ($status === 'Cancel Requested') $badgeClass = 'danger';

                                    $receiptData = htmlspecialchars(json_encode($order), ENT_QUOTES, 'UTF-8');
                                ?>
                                <tr>
                                    <td>
                                        <strong>#<?= esc($order['id']) ?></strong>
                                    </td>
                                    <td>
                                        <?= !empty($order['created_at']) ? date('M d, Y h:i A', strtotime($order['created_at'])) : '-' ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($order['items'])): ?>
                                            <?php foreach ($order['items'] as $index => $item): ?>
                                                <div class="small">
                                                    <?= esc($item['name'] ?? 'Unknown Product') ?> × <?= esc($item['quantity'] ?? 0) ?>
                                                </div>
                                                <?php if ($index >= 1 && count($order['items']) > 2): ?>
                                                    <div class="small text-muted">and more...</div>
                                                    <?php break; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <span class="text-muted">No items</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong>₱<?= number_format((float) ($order['total'] ?? 0), 2) ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?= $badgeClass ?>">
                                            <?= esc($status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button
                                                type="button"
                                                class="btn btn-outline-dark btn-sm view-receipt-btn"
                                                data-order='<?= $receiptData ?>'>
                                                View Receipt
                                            </button>

                                            <?php if ($status === 'Completed'): ?>
                                                <a href="<?= base_url('contact') ?>" class="btn btn-outline-primary btn-sm">
                                                    Invoice
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($status === 'Delivering'): ?>
                                                <button type="button" class="btn btn-outline-info btn-sm track-order-btn">
                                                    Track
                                                </button>
                                            <?php endif; ?>

                                            <?php if ($status === 'Processing'): ?>
                                                <form action="<?= base_url('profile/cancel-order/' . $order['id']) ?>" method="post" class="cancel-order-form d-inline">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm cancel-order-btn">
                                                        Cancel
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <h5 class="fw-bold mb-2">No orders yet</h5>
                    <p class="text-muted mb-4">Your order history will appear here once you place your first order.</p>
                    <a href="<?= base_url('shop') ?>" class="btn btn-dark rounded-pill px-4">Start Shopping</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Order Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div id="profileReceiptLeft"></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="border rounded-4 p-4 bg-light">
                            <h6 class="fw-bold mb-3">Receipt Info</h6>
                            <div id="profileReceiptRight"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-dark rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const receiptModalEl = document.getElementById('receiptModal');
    const receiptModal = new bootstrap.Modal(receiptModalEl);
    const receiptLeft = document.getElementById('profileReceiptLeft');
    const receiptRight = document.getElementById('profileReceiptRight');

    function formatPrice(value) {
        return Number(value).toLocaleString('en-PH', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    document.querySelectorAll('.view-receipt-btn').forEach(button => {
        button.addEventListener('click', function () {
            const order = JSON.parse(this.dataset.order || '{}');
            const items = order.items || [];

            receiptLeft.innerHTML = `
                <h5 class="fw-bold mb-3">Transaction Details</h5>
                <p><strong>Order ID:</strong> #${order.id ?? '-'}</p>
                <p><strong>Date:</strong> ${order.created_at ?? '-'}</p>
                <p><strong>Status:</strong> ${order.status ?? '-'}</p>
                <p><strong>Payment Method:</strong> ${order.payment_method ?? '-'}</p>
                <p><strong>Shipping Method:</strong> ${order.shipping_method ?? '-'}</p>
                <p><strong>Shipping Address:</strong> ${order.shipping_address ?? '-'}</p>
                <hr>
                ${items.map(item => `
                    <div class="d-flex justify-content-between mb-2">
                        <span>${item.name ?? 'Unknown'} × ${item.quantity ?? 0}</span>
                        <span>₱${formatPrice((item.price ?? 0) * (item.quantity ?? 0))}</span>
                    </div>
                `).join('')}
                <hr>
                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Total</span>
                    <span>₱${formatPrice(order.total ?? 0)}</span>
                </div>
            `;

            let rightContent = `
                <p><strong>Customer:</strong><br><?= esc($customerName ?? '-') ?></p>
                <p><strong>Email:</strong><br><?= esc($customerEmail ?? '-') ?></p>
            `;

            if ((order.payment_method ?? '') === 'E-Wallet') {
                rightContent += `
                    <div class="mt-3 text-center">
                        <img src="<?= base_url('assets/images/qr-placeholder.png') ?>" class="img-fluid rounded shadow-sm" alt="QR Code">
                    </div>
                `;
            } else if ((order.payment_method ?? '') === 'Debit/Credit') {
                rightContent += `
                    <p class="mt-3 text-muted">Paid via card.</p>
                `;
            } else {
                rightContent += `
                    <p class="mt-3 text-muted">Cash on Delivery selected.</p>
                `;
            }

            receiptRight.innerHTML = rightContent;
            receiptModal.show();
        });
    });

    document.querySelectorAll('.track-order-btn').forEach(button => {
        button.addEventListener('click', function () {
            alert('Tracking is for educational purpose only. No real implementation is available yet.');
        });
    });

    document.querySelectorAll('.cancel-order-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            const confirmed = confirm('Are you sure you want to request cancellation for this order? Admin will be notified.');
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
});
</script>

<?= $this->endSection() ?>