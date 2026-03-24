<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Nonchalant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        .auth-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .auth-card { box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: none; border-radius: 20px; }
        .form-control:focus { border-color: #667eea; box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25); }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card auth-card p-4 p-lg-5">
                    <div class="text-center mb-5">
                        <a href="<?= base_url() ?>" class="navbar-brand fw-bold fs-2 d-block mb-2">
                            <span class="text-danger">Non</span><span class="text-dark">chalant</span>
                        </a>
                        <h2 class="fw-bold">Welcome Back</h2>
                        <p class="text-muted">Sign in to your account</p>
                    </div>
                    <form id="loginForm">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control form-control-lg rounded-pill px-4" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control form-control-lg rounded-pill px-4" placeholder="Enter your password" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label small" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="small text-decoration-none">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 fw-bold py-3 fs-6 rounded-pill mb-3 shadow-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p class="mb-0">Don't have an account? <a href="<?= base_url('register') ?>" class="fw-bold text-dark text-decoration-none">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Frontend login demo - logged in! Redirecting to profile...');
            window.location.href = '<?= base_url('customerprofile') ?>';
        });
    </script>
</body>
</html>
