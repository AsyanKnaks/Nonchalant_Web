<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Orders</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#orderModal" onclick="openCreateOrderModal()">
        <span data-feather="plus"></span> New Order
    </button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Total</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders ?? [] as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['user_id'] ?></td>
                <td><strong>$<?= number_format($order['total'], 2) ?></strong></td>
                <td><?= date('M j, H:i', strtotime($order['created_at'])) ?></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#orderModal" onclick="openEditOrderModal(<?= $order['id'] ?>)">
                        <span data-feather="edit"></span>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" onclick="confirmDeleteOrder(<?= $order['id'] ?>)">
                        <span data-feather="trash-2"></span>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalTitle">New Order</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="orderForm">
                <div class="modal-body">
                    <input type="hidden" id="orderId">
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="number" class="form-control" id="orderUserId" required>
                    </div>
                    <div class="form-group">
                        <label>Total Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            <input type="number" step="0.01" class="form-control" id="orderTotal" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="orderSaveBtn">Save Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
let currentOrderId = null;

function openCreateOrderModal() {
    document.getElementById('orderModalTitle').textContent = 'New Order';
    document.getElementById('orderForm').reset();
    currentOrderId = null;
    $('#orderModal').modal('show');
}

function openEditOrderModal(id) {
    currentOrderId = id;
    document.getElementById('orderModalTitle').textContent = `Edit Order #${id}`;
    
    document.getElementById('orderUserId').value = 25 + id;
    document.getElementById('orderTotal').value = (500 + id * 10).toFixed(2);
    
    $('#orderModal').modal('show');
}

function confirmDeleteOrder(id) {
    if(confirm(`Delete Order #${id}?`)) {
        alert(`Order #${id} deleted! (Demo)`);
        location.reload();
    }
}

document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = {
        id: currentOrderId,
        user_id: document.getElementById('orderUserId').value,
        total: document.getElementById('orderTotal').value
    };
    
    console.log('Saving Order:', formData);
    alert(currentOrderId ? 'Order Updated!' : 'Order Created!');
    $('#orderModal').modal('hide');
});
</script>
<?= $this->endSection() ?>