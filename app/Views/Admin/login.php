<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Login">
    <title><?= esc($title ?? 'Admin Login') ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="container">
        <form class="form-signin" action="<?= site_url('admin/login') ?>" method="post">
            <?= csrf_field() ?>

            <img class="mb-4" src="<?= base_url('assets/images/Logo.png') ?>" alt="Logo" width="100" height="100">
            <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
            <p class="mb-4">Sign in to access dashboard</p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <input type="email" name="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" required autofocus>
            <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign in
            </button>

            <p class="mt-5 mb-3 text-muted">&copy; 2024 Company Name</p>
            <p class="mt-0 mb-3 text-muted">
                <a href="<?= site_url('/') ?>">Back to Website</a>
            </p>
        </form>
    </div>
</body>
</html>