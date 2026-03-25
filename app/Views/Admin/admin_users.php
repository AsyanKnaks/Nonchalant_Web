<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<?php $editingId = service('request')->getGet('edit'); ?>

<h2>Users</h2>

<a href="<?= base_url('admin/users/create') ?>" class="btn btn-success mb-3">Add User</a>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Full Name</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Role</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>

    <?php foreach($users as $u): ?>
        <?php if($editingId == $u['id']): ?>
            <tr>
                <td><?= esc($u['id']) ?></td>

                <td>
                    <form method="POST" action="<?= base_url('admin/users/update/'.$u['id']) ?>" id="form<?= $u['id'] ?>">
                        <?= csrf_field() ?>
                        <input type="email" name="email" value="<?= esc($u['email']) ?>" class="form-control form-control-sm" required>
                </td>

                <td>
                        <input type="text" name="full_name" value="<?= esc($u['full_name']) ?>" class="form-control form-control-sm">
                </td>

                <td>
                        <input type="text" name="address" value="<?= esc($u['address']) ?>" class="form-control form-control-sm">
                </td>

                <td>
                        <input type="text" name="mobile" value="<?= esc($u['mobile']) ?>" class="form-control form-control-sm">
                </td>

                <td>
                        <select name="role" class="form-control form-control-sm" required>
                            <option value="buyer" <?= $u['role'] == 'buyer' ? 'selected' : '' ?>>Buyer</option>
                            <option value="seller" <?= $u['role'] == 'seller' ? 'selected' : '' ?>>Seller</option>
                        </select>
                </td>

                <td><?= esc($u['created_at']) ?></td>

                <td>
                        <input type="password" name="password" class="form-control form-control-sm mb-1" placeholder="New password (optional)">
                    </form>

                    <button type="submit" form="form<?= $u['id'] ?>" class="btn btn-success btn-sm">Save</button>
                    <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary btn-sm">Cancel</a>

                    <form method="POST" action="<?= base_url('admin/users/delete/'.$u['id']) ?>" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete user?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td><?= esc($u['id']) ?></td>
                <td><?= esc($u['email']) ?></td>
                <td><?= esc($u['full_name']) ?></td>
                <td><?= esc($u['address']) ?></td>
                <td><?= esc($u['mobile']) ?></td>
                <td>
                    <span class="badge badge-<?= $u['role'] === 'seller' ? 'dark' : 'primary' ?>">
                        <?= ucfirst(esc($u['role'])) ?>
                    </span>
                </td>
                <td><?= esc($u['created_at']) ?></td>
                <td>
                    <a href="<?= base_url('admin/users?edit='.$u['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

<?= $this->endSection() ?>