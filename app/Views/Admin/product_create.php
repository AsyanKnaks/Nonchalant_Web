dd($id, $product, $this->db->affectedRows());
<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<h2>Create Product</h2>

<?php if(session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
<?php endif; ?>

<form method="POST" action="<?= base_url('admin/products/store') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
        <label>Collection</label>
        <select name="collection" id="collectionSelect" class="form-control" required>
            <option value="">-- Select Collection --</option>
            <option value="Drop26">Drop26</option>
            <option value="Drop25">Drop25</option>
            <option value="MANGA26">MANGA26</option>
            <option value="COLLAB26">COLLAB26</option>
        </select>
        <small id="previewID" class="text-muted">Generated ID will appear here</small>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" step="0.01" min="0.01" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Stock</label>
        <input type="number" name="stock" min="0" class="form-control" value="0">
    </div>

    <div class="form-group">
        <label>Image (Optional)</label>
        <input type="file" name="image" class="form-control">
        <small class="text-muted">If empty, default image will be used</small>
    </div>

    <button type="submit" class="btn btn-success">Create</button>
    <a href="<?= base_url('admin/products') ?>" class="btn btn-secondary">Cancel</a>
</form>

<script>
const collectionSelect = document.getElementById('collectionSelect');
const previewID = document.getElementById('previewID');

collectionSelect.addEventListener('change', function() {
    const prefixes = {
        Drop26: '2026808',
        Drop25: '2025808',
        MANGA26: '2025404',
        COLLAB26: '2025444'
    };

    if (prefixes[this.value]) {
        previewID.innerText = 'Generated ID: ' + prefixes[this.value] + 'XX';
    } else {
        previewID.innerText = 'Generated ID will appear here';
    }
});
</script>

<?= $this->endSection() ?>