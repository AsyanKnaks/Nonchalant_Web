<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Login">
    <title><?= esc($title ?? 'Admin Login') ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="text-center">
    <div class="container">
        <form class="form-signin" action="<?= site_url('admin/dashboard') ?>">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
            <p class="mb-4">Demo - Click Sign In to Access Dashboard</p>
            
            <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Email address">
            <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password">
            
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign in
            </button>
            
            <p class="mt-5 mb-3 text-muted">&copy; 2024 Company Name</p>
            <p class="mt-0 mb-3 text-muted">👉 <a href="<?= site_url('/') ?>">Back to Website</a></p>
        </form>
    </div>
</body>
</html>