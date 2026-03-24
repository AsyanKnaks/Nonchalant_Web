<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= esc($title ?? 'Admin Dashboard') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/admin.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/admin-layout.css') ?>" rel="stylesheet">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <!-- Toggle Sidebar Button -->
    <button class="btn btn-primary d-md-none position-fixed" id="sidebarToggle" style="top: 70px; left: 10px; z-index: 1001;">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 mr-0 px-3" href="<?= base_url() ?>">NonChalant</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?= site_url() ?>">Sign out</a>
            </li>
        </ul>
    </nav>

<div class="sidebar">
  <nav class="sidebar-sticky">
    <ul class="nav flex-column">
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
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('admin/reports') ?>">
        <span data-feather="bar-chart-2"></span>
        Reports
    </a>
</li>

  </nav>
</div>

<div class="container-fluid">
  <main role="main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <?= $this->renderSection('header') ?>
    </div>
    <?= $this->renderSection('content') ?>
  </main>
</div>

    <!-- Scripts Section -->
    <?= $this->renderSection('scripts') ?>
    
    <!-- Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>feather.replace()</script>
</body>
</html>