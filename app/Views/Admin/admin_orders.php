<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<?php $editingId = service('request')->getGet('edit'); ?>

<h2>Orders</h2>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Total</th>
            <th>Shipping</th>
            <th>Payment</th>
            <th>Shipping Address</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>

        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <?php if ($editingId == $order['id']): ?>
                    <tr>
                        <td><?= esc($order['id']) ?></td>
                        <td><?= esc($order['user_id']) ?></td>
                        <td><strong>₱<?= number_format((float) $order['total'], 2) ?></strong></td>

                        <td>
                            <?php if (($order['shipping_method'] ?? '') === 'Express'): ?>
                                <span class="badge badge-danger">Express</span>
                            <?php else: ?>
                                <span class="badge badge-secondary">Standard</span>
                            <?php endif; ?>
                        </td>

                        <td><?= esc($order['payment_method'] ?? '-') ?></td>
                        <td><?= esc($order['shipping_address'] ?? '-') ?></td>

                        <td>
                            <form method="post" action="<?= base_url('admin/orders/update/' . $order['id']) ?>">
                                <?= csrf_field() ?>
                                <select name="status" class="form-control form-control-sm">
                                    <option value="Processing" <?= (($order['status'] ?? '') === 'Processing') ? 'selected' : '' ?>>Processing</option>
                                    <option value="Shipped" <?= (($order['status'] ?? '') === 'Shipped') ? 'selected' : '' ?>>Shipped</option>
                                    <option value="Delivered" <?= (($order['status'] ?? '') === 'Delivered') ? 'selected' : '' ?>>Delivered</option>
                                    <option value="Cancel Requested" <?= (($order['status'] ?? '') === 'Cancel Requested') ? 'selected' : '' ?>>Cancel
                                        Requested</option>
                                </select>
                        </td>

                        <td>
                            <?= !empty($order['created_at']) ? date('M d, Y H:i', strtotime($order['created_at'])) : '-' ?>
                        </td>

                        <td>
                            <?= !empty($order['updated_at']) ? date('M d, Y H:i', strtotime($order['updated_at'])) : '-' ?>
                        </td>

                        <td>
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                <a href="<?= base_url('admin/orders') ?>" class="btn btn-secondary btn-sm">Cancel</a>
                            </form>

                            <form method="post" action="<?= base_url('admin/orders/delete/' . $order['id']) ?>" style="display:inline;">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete Order #<?= esc($order['id']) ?>?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td><?= esc($order['id']) ?></td>
                        <td><?= esc($order['user_id']) ?></td>
                        <td><strong>₱<?= number_format((float) $order['total'], 2) ?></strong></td>

                        <td>
                            <?php if (($order['shipping_method'] ?? '') === 'Express'): ?>
                                <span class="badge badge-danger">Express</span>
                            <?php else: ?>
                                <span class="badge badge-secondary">Standard</span>
                            <?php endif; ?>
                        </td>

                        <td><?= esc($order['payment_method'] ?? '-') ?></td>
                        <td><?= esc($order['shipping_address'] ?? '-') ?></td>

                        <td>
                            <?php
                                $badgeClass = 'secondary';
                                if (($order['status'] ?? '') === 'Processing')
                                    $badgeClass = 'warning';
                                if (($order['status'] ?? '') === 'Shipped')
                                    $badgeClass = 'primary';
                                if (($order['status'] ?? '') === 'Delivered')
                                    $badgeClass = 'success';
                                if (($order['status'] ?? '') === 'Cancel Requested')
                                    $badgeClass = 'danger';
                                ?>
                            <span class="badge badge-<?= $badgeClass ?>">
                                <?= esc($order['status'] ?? '-') ?>
                            </span>
                        </td>

                        <td>
                            <?= !empty($order['created_at']) ? date('M d, Y H:i', strtotime($order['created_at'])) : '-' ?>
                        </td>

                        <td>
                            <?= !empty($order['updated_at']) ? date('M d, Y H:i', strtotime($order['updated_at'])) : '-' ?>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/orders?edit=' . $order['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="10" class="text-center text-muted">No orders found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<?= $this->endSection() ?>