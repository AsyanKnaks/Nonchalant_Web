<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<<<<<<< Updated upstream
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#productModal" onclick="openCreateModal()">
        <span data-feather="plus"></span> New Product
    </button>
</div>
=======
<?php $editingId = service('request')->getGet('edit'); ?>
>>>>>>> Stashed changes

<h2>Products</h2>

<a href="<?= base_url('admin/products/create') ?>" class="btn btn-success mb-3">Add Product</a>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Collection</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($products as $p): ?>
        <?php if ($editingId == $p['id']): ?>
            <tr>
<<<<<<< Updated upstream
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products ?? [] as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= esc($product['name']) ?></td>
                <td><?= substr(esc($product['descriptions']), 0, 40) ?>...</td>
                <td>$<?= number_format($product['price'], 2) ?></td>
                <td><span class="badge <?= $product['stock'] > 0 ? 'badge-success' : 'badge-danger' ?>"><?= $product['stock'] ?></span></td>
                <td><?= date('M j', strtotime($product['created_at'])) ?></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#productModal" onclick="openEditModal(<?= $product['id'] ?>)">
                        <span data-feather="edit"></span>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" onclick="confirmDelete(<?= $product['id'] ?>)">
                        <span data-feather="trash-2"></span>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">New Product</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="productForm">
                <div class="modal-body">
                    <input type="hidden" id="productId">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="productName" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="productDesc" rows="3"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input type="number" step="0.01" class="form-control" id="productPrice">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Stock</label>
                            <input type="number" class="form-control" id="productStock">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
let currentProductId = null;

// Open Create Modal
function openCreateModal() {
    document.getElementById('modalTitle').textContent = 'New Product';
    document.getElementById('productForm').reset();
    currentProductId = null;
    $('#productModal').modal('show');
}

// Open Edit Modal
function openEditModal(id) {
    currentProductId = id;
    document.getElementById('modalTitle').textContent = `Edit Product #${id}`;
    
    // Simulate loading data
    document.getElementById('productName').value = `Product ${id}`;
    document.getElementById('productDesc').value = `Description for product ${id}`;
    document.getElementById('productPrice').value = (999 + id).toFixed(2);
    document.getElementById('productStock').value = 15 + id;
    
    $('#productModal').modal('show');
}

// Delete Confirmation
function confirmDelete(id) {
    if(confirm(`Delete Product #${id}?`)) {
        alert(`Product #${id} deleted! (Demo)`);
        location.reload(); // Simulate delete
    }
}

// Form Submit
document.getElementById('productForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = {
        id: currentProductId,
        name: document.getElementById('productName').value,
        desc: document.getElementById('productDesc').value,
        price: document.getElementById('productPrice').value,
        stock: document.getElementById('productStock').value
    };
    
    console.log('Saving:', formData); // Replace with AJAX later
    alert(currentProductId ? 'Product Updated!' : 'Product Created!');
    $('#productModal').modal('hide');
});
</script>
=======
                <td><?= esc($p['id']) ?></td>

                <td>
                    <img src="<?= base_url('assets/product/' . $p['image']) ?>" width="60">
                </td>

                <td>
                    <form method="POST" action="<?= base_url('admin/products/update/' . $p['id']) ?>" id="updateForm<?= $p['id'] ?>">
                        <?= csrf_field() ?>
                        <input type="text" name="name" value="<?= esc($p['name']) ?>" class="form-control form-control-sm">
                </td>

                <td>
                        <input type="text" name="collection" value="<?= esc($p['collection']) ?>" class="form-control form-control-sm">
                </td>

                <td>
                        <input type="text" name="description" value="<?= esc($p['description']) ?>" class="form-control form-control-sm">
                </td>

                <td>
                        <input type="number" name="price" value="<?= esc($p['price']) ?>" step="0.01" class="form-control form-control-sm">
                </td>

                <td>
                        <input type="number" name="stock" value="<?= esc($p['stock']) ?>" class="form-control form-control-sm">
                    </form>
                </td>

                <td>
                    <button type="submit" form="updateForm<?= $p['id'] ?>" class="btn btn-success btn-sm">Save</button>
                    <a href="<?= base_url('admin/products') ?>" class="btn btn-secondary btn-sm">Cancel</a>

                    <form method="POST" action="<?= base_url('admin/products/delete/' . $p['id']) ?>" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td><?= esc($p['id']) ?></td>

                <td>
                    <img src="<?= base_url('assets/product/' . $p['image']) ?>" width="60">
                </td>

                <td><?= esc($p['name']) ?></td>
                <td><?= esc($p['collection']) ?></td>
                <td><?= esc($p['description']) ?></td>
                <td>$<?= number_format($p['price'], 2) ?></td>
                <td><?= esc($p['stock']) ?></td>

                <td>
                    <a href="<?= base_url('admin/products?edit=' . $p['id']) ?>" class="btn btn-primary btn-sm">
                        Update
                    </a>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

>>>>>>> Stashed changes
<?= $this->endSection() ?>