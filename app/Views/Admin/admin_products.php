<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products <small class="text-muted">(<?= count($products ?? []) ?> items)</small></h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#productModal" onclick="openCreateModal()">
        <i data-feather="plus"></i> Add Product
    </button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Preview</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Collection</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
            <tr>
                <td><strong>#<?= $product['id'] ?></strong></td>
                <td>
                    <?php if($product['image']): ?>
                        <img src="<?= base_url('assets/product/' . $product['image']) ?>" 
                             alt="<?= esc($product['name']) ?>" 
                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 2px solid #e9ecef;">
                    <?php else: ?>
                        <div style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #6c757d; font-size: 12px;">
                            No Image
                        </div>
                    <?php endif; ?>
                </td>
                <td>
                    <strong><?= esc($product['name']) ?></strong><br>
                    <small class="text-muted"><?= substr(esc($product['description'] ?? ''), 0, 50) ?>...</small>
                </td>
                <td><strong class="text-success">$<?= number_format($product['price'], 2) ?></strong></td>
                <td>
                    <span class="badge <?= ($product['stock'] > 5) ? 'badge-success' : 
                                           (($product['stock'] > 0) ? 'badge-warning' : 'badge-danger') ?>">
                        <?= $product['stock'] ?> in stock
                    </span>
                </td>
                <td>
                    <span class="badge badge-<?= match($product['collection']) {
                        'Drop26' => 'primary',
                        'Drop25' => 'info', 
                        'MANGA26' => 'warning',
                        'COLLAB26' => 'dark',
                        default => 'secondary'
                    } ?>">
                        <?= esc($product['collection']) ?>
                    </span>
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary" onclick="openEditModal(<?= $product['id'] ?>)" title="Edit">
                            <i data-feather="edit-3"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="confirmDelete(<?= $product['id'] ?>)" title="Delete">
                            <i data-feather="trash-2"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            
            <?php if(empty($products)): ?>
            <tr>
                <td colspan="7" class="text-center py-5">
                    <i data-feather="package" class="feather-lg text-muted mb-3"></i>
                    <h5 class="text-muted">No products yet</h5>
                    <p class="text-muted">Start by adding your first product!</p>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitle">
                    <i data-feather="package"></i> New Product
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form id="productForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="productId">
                    
                    <div class="form-group">
                        <label>Product Image <small class="text-muted">(JPG, PNG, WebP)</small></label>
                        <input type="file" class="form-control-file" id="productImage" accept="image/*">
                        <div id="imagePreview" class="mt-3 p-3 border rounded bg-light" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                            <div id="previewContent">
                                <i data-feather="image" class="feather-lg text-muted mb-2"></i>
                                <small class="text-muted">Image preview will appear here</small>
                            </div>
                            <img id="previewImg" class="img-fluid rounded shadow-sm" style="max-height: 250px; display: none;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="productName" required maxlength="100">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Collection <span class="text-danger">*</span></label>
                                <select class="form-control" id="productCollection" required>
                                    <option value="">Choose Collection</option>
                                    <option value="Drop26">Drop26</option>
                                    <option value="Drop25">Drop25</option>
                                    <option value="MANGA26">MANGA26</option>
                                    <option value="COLLAB26">COLLAB26</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price ($) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" step="0.01" min="0.01" class="form-control" id="productPrice" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stock Quantity</label>
                                <input type="number" min="0" class="form-control" id="productStock" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="productDesc" rows="3" maxlength="500"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">
                        <span class="spinner-border spinner-border-sm d-none mr-2" id="saveSpinner" role="status"></span>
                        <span id="saveText">Save Product</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
const baseUrl = '<?= base_url() ?>';
const products = <?= json_encode($products ?? []) ?>;
let currentProductId = null;

// Image Preview
document.getElementById('productImage').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewImg = document.getElementById('previewImg');
    const previewContent = document.getElementById('previewContent');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
            previewContent.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }
});

// Create Modal
function openCreateModal() {
    document.getElementById('modalTitle').innerHTML = '<i data-feather="plus-circle"></i> New Product';
    document.getElementById('productForm').reset();
    document.getElementById('productId').value = '';
    document.getElementById('previewImg').style.display = 'none';
    document.getElementById('previewContent').style.display = 'flex';
    currentProductId = null;
    $('#productModal').modal('show');
}

// Edit Modal
function openEditModal(id) {
    const product = products.find(p => p.id == id);
    if (!product) return alert('Product not found!');
    
    currentProductId = id;
    document.getElementById('modalTitle').innerHTML = `<i data-feather="edit-3"></i> Edit Product #${id}`;
    
    document.getElementById('productName').value = product.name;
    document.getElementById('productDesc').value = product.description || '';
    document.getElementById('productPrice').value = product.price;
    document.getElementById('productStock').value = product.stock || 0;
    document.getElementById('productCollection').value = product.collection;
    
    // Show current image
    if (product.image) {
        document.getElementById('previewImg').src = baseUrl + 'assets/product/' + product.image;
        document.getElementById('previewImg').style.display = 'block';
        document.getElementById('previewContent').style.display = 'none';
    }
    
    $('#productModal').modal('show');
}

// Delete
function confirmDelete(id) {
    if (confirm('Delete this product? Image will also be removed.')) {
        fetch(baseUrl + 'admin/deleteProduct/' + id, { method: 'POST' })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('✅ ' + data.message);
                    location.reload();
                } else {
                    alert('❌ ' + data.message);
                }
            })
            .catch(() => alert('Delete failed!'));
    }
}

// Save Form
document.getElementById('productForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const btn = document.getElementById('saveBtn');
    const spinner = document.getElementById('saveSpinner');
    const text = document.getElementById('saveText');
    const formData = new FormData(this);
    
    btn.disabled = true;
    spinner.classList.remove('d-none');
    text.textContent = 'Saving...';
    
    const url = currentProductId 
        ? baseUrl + 'admin/updateProduct/' + currentProductId
        : baseUrl + 'admin/createProduct';
    
    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('✅ ' + data.message);
            $('#productModal').modal('hide');
            setTimeout(() => location.reload(), 500);
        } else {
            alert('❌ ' + data.message);
        }
    })
    .catch(err => {
        console.error(err);
        alert('❌ Save failed!');
    })
    .finally(() => {
        btn.disabled = false;
        spinner.classList.add('d-none');
        text.textContent = 'Save Product';
    });
});
</script>
<?= $this->endSection() ?>