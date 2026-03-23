<?= $this->extend('Admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Customers</h1>
    <button class="btn btn-info" data-toggle="modal" data-target="#userModal" onclick="openCreateUserModal()">
        <span data-feather="plus"></span> New Customer
    </button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users ?? [] as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['mobile']) ?></td>
                <td><span class="badge badge-<?= $user['role'] == 'admin' ? 'danger' : 'primary' ?>"><?= ucfirst($user['role']) ?></span></td>
                <td><?= date('M j', strtotime($user['created_at'])) ?></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#userModal" onclick="openEditUserModal(<?= $user['id'] ?>)">
                        <span data-feather="edit"></span>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" onclick="confirmDeleteUser(<?= $user['id'] ?>)">
                        <span data-feather="trash-2"></span>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalTitle">New Customer</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="userForm">
                <div class="modal-body">
                    <input type="hidden" id="userId">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <input type="text" class="form-control" id="userFullName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" id="userEmail" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mobile</label>
                            <input type="tel" class="form-control" id="userMobile">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Role</label>
                            <select class="form-control" id="userRole">
                                <option value="customer">Customer</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="userAddress" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="userSaveBtn">Save Customer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
let currentUserId = null;

function openCreateUserModal() {
    document.getElementById('userModalTitle').textContent = 'New Customer';
    document.getElementById('userForm').reset();
    currentUserId = null;
    $('#userModal').modal('show');
}

function openEditUserModal(id) {
    currentUserId = id;
    document.getElementById('userModalTitle').textContent = `Edit Customer #${id}`;
    
    document.getElementById('userFullName').value = `Customer ${id}`;
    document.getElementById('userEmail').value = `customer${id}@example.com`;
    document.getElementById('userMobile').value = `+1-555-${id.toString().padStart(4,'0')}`;
    document.getElementById('userRole').value = id % 5 === 0 ? 'admin' : 'customer';
    document.getElementById('userAddress').value = `123 Demo Street #${id}, City`;
    
    $('#userModal').modal('show');
}

function confirmDeleteUser(id) {
    if(confirm(`Delete Customer #${id}?`)) {
        alert(`Customer #${id} deleted! (Demo)`);
        location.reload();
    }
}

document.getElementById('userForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = {
        id: currentUserId,
        full_name: document.getElementById('userFullName').value,
        email: document.getElementById('userEmail').value,
        mobile: document.getElementById('userMobile').value,
        role: document.getElementById('userRole').value,
        address: document.getElementById('userAddress').value
    };
    
    console.log('Saving User:', formData);
    alert(currentUserId ? 'Customer Updated!' : 'Customer Created!');
    $('#userModal').modal('hide');
});
</script>
<?= $this->endSection() ?>