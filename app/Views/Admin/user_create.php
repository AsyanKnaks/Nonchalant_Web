<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<h2>Create User</h2>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
<?php endif; ?>

<form method="POST" action="<?= base_url('admin/users/store') ?>">
    <?= csrf_field() ?>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control">
    </div>

    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control">
    </div>

    <div class="form-group">
        <label>Mobile</label>
        <input type="text" name="mobile" class="form-control">
    </div>

    <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="">-- Select Role --</option>
            <option value="buyer">Buyer</option>
            <option value="seller">Seller</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Create User</button>
    <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>