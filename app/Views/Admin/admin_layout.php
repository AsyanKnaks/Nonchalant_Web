<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= esc($title ?? 'Admin Dashboard') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/admin.css') ?>" rel="stylesheet">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 mr-0 px-3" href="<?= base_url() ?>">NonChalant</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?= site_url('admin/logout') ?>">Sign out</a>
            </li>
        </ul>
    </nav>

<!-- In admin_layout.php sidebar -->
<li class="nav-item">
    <a class="nav-link active" href="<?= site_url('admin/dashboard') ?>">
        <span data-feather="home"></span>
        Dashboard
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('admin/orders') ?>">
        <span data-feather="file-text"></span>
        Orders
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('admin/products') ?>">
        <span data-feather="shopping-cart"></span>
        Products
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('admin/users') ?>">
        <span data-feather="users"></span>
        Customers
    </a>
</li>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <!-- Scripts Section -->
    <?= $this->renderSection('scripts') ?>
    
    <!-- Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>feather.replace()</script>
</body>
</html>