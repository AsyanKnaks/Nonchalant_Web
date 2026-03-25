<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login') ?> | Nonchalant</title>
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

        .auth-card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
            border: none;
            border-radius: 20px;
            transform: none !important;
        }

        .auth-card:hover {
            transform: none !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>
</head>

<body class="auth-hero d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card auth-card p-4 p-lg-5">
                    <div class="text-center mb-5">
                        <a href="<?= base_url() ?>" class="d-block mb-3">
                            <img src="<?= base_url('assets/images/Logo.png') ?>" alt="Nonchalant Logo"
                                style="height: 70px;">
                        </a>
                        <h2 class="fw-bold text-dark">Welcome Back</h2>
                        <p class="text-muted">Sign in to your account</p>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= esc(session()->getFlashdata('error')) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= esc(session()->getFlashdata('success')) ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login') ?>" method="post">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg rounded-pill px-4"
                                placeholder="Enter your email" value="<?= old('email') ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Password</label>
                            <input type="password" name="password"
                                class="form-control form-control-lg rounded-pill px-4" placeholder="Enter your password"
                                required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 fw-bold py-3 fs-6 rounded-pill mb-3 shadow-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-3 text-dark">
                            Don't have an account?
                            <a href="<?= base_url('register') ?>" class="fw-bold text-dark text-decoration-none">Sign
                                up</a>
                        </p>

                        <a href="<?= base_url() ?>" class="btn btn-outline-dark rounded-pill px-4">
                            <i class="bi bi-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>