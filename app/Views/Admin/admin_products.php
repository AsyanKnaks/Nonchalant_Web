<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#productModal" onclick="openCreateModal()">
        <span data-feather="plus"></span> New Product
    </button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
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
<?= $this->endSection() ?>