<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Nonchalant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        .auth-hero { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); min-height: 100vh; }
        .auth-card { box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: none; border-radius: 20px; }
        .form-control:focus { border-color: #f5576c; box-shadow: 0 0 0 0.2rem rgba(245,87,108,0.25); }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card auth-card p-4 p-lg-5">
                    <div class="text-center mb-5">
                        <a href="<?= base_url() ?>" class="navbar-brand fw-bold fs-2 d-block mb-2">
                            <span class="text-danger">Non</span><span class="text-dark">chalant</span>
                        </a>
                        <h2 class="fw-bold">Create Account</h2>
                        <p class="text-muted">Join us today</p>
                    </div>
                    <form id="registerForm">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" class="form-control form-control-lg rounded-pill px-4" placeholder="First name" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Last Name</label>
                                <input type="text" class="form-control form-control-lg rounded-pill px-4" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control form-control-lg rounded-pill px-4" placeholder="your@email.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control form-control-lg rounded-pill px-4" placeholder="At least 8 characters" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg rounded-pill px-4" placeholder="Confirm password" required>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and 
                                    <a href="#" class="text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger w-100 fw-bold py-3 fs-6 rounded-pill shadow-lg mb-3">
                            <i class="bi bi-person-plus me-2"></i>Create Account
                        </button>
                    </form>
                    <div class="text-center mt-4">
                        <p class="mb-0">Already have an account? <a href="<?= base_url('login') ?>" class="fw-bold text-dark text-decoration-none">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Frontend register demo - account created! Redirecting to login...');
            window.location.href = '<?= base_url('login') ?>';
        });
    </script>
</body>
</html>
