<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Register') ?> | Nonchalant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        .auth-hero {
    background:
        linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)),
        url('<?= base_url('assets/images/Wallbg.jpg') ?>') no-repeat center;
    background-size: cover;
}
        .auth-card { box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: none; border-radius: 20px; }
        .form-control:focus { border-color: #1b0a0c; box-shadow: 0 0 0 0.2rem rgba(245,87,108,0.25); }
    </style>
</head>
<body class="auth-hero d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card auth-card p-4 p-lg-5">
                    <div class="text-center mb-5">
                        <a href="<?= base_url() ?>" class="navbar-brand fw-bold fs-2 d-block mb-2 text-decoration-none">
                            <span class="text-danger">Non</span><span class="text-dark">chalant</span>
                        </a>
                        <h2 class="fw-bold">Create Account</h2>
                        <p class="text-muted">Join us today</p>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= esc(session()->getFlashdata('error')) ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('register') ?>" method="post">

                        <div class="mb-4">
                            <label class="form-label fw-bold">Full Name</label>
                            <input
                                type="text"
                                name="full_name"
                                class="form-control form-control-lg rounded-pill px-4"
                                placeholder="Your full name"
                                value="<?= old('full_name') ?>"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg rounded-pill px-4"
                                placeholder="your@email.com"
                                value="<?= old('email') ?>"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Mobile</label>
                            <input
                                type="text"
                                name="mobile"
                                class="form-control form-control-lg rounded-pill px-4"
                                placeholder="09XXXXXXXXX"
                                value="<?= old('mobile') ?>"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Address</label>
                            <input
                                type="text"
                                name="address"
                                class="form-control form-control-lg rounded-pill px-4"
                                placeholder="Your address"
                                value="<?= old('address') ?>"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg rounded-pill px-4"
                                placeholder="At least 8 characters"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Confirm Password</label>
                            <input
                                type="password"
                                name="confirm_password"
                                class="form-control form-control-lg rounded-pill px-4"
                                placeholder="Confirm password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-danger w-100 fw-bold py-3 fs-6 rounded-pill shadow-lg mb-3">
                            <i class="bi bi-person-plus me-2"></i>Create Account
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">
                            Already have an account?
                            <a href="<?= base_url('login') ?>" class="fw-bold text-dark text-decoration-none">Sign in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>