<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Nonchalant') ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<<<<<<< Updated upstream
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
=======
>>>>>>> Stashed changes

    <link rel="stylesheet" href="<?= base_url('assets/css/layout/main.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/layout/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/layout/footer.css') ?>">
</head>
<body
    class="<?= uri_string() === '' ? 'homepage' : 'inner-page' ?>"
    data-logged-in="<?= session()->get('customer_logged_in') ? 'true' : 'false' ?>"
>
    <?= view('layout/navbar') ?>

    <main class="site-content">
        <?= $this->renderSection('content') ?>
    </main>

    <?= view('layout/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>