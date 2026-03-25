<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nonchalant Navbar</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Your CSS File -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<!-- COMPLETE NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-2 fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/images/Logo.png') ?>" alt="Nonchalant Logo">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-semibold fs-6" href="<?= base_url('shop') ?>">Shop</a>
                </li>

                <!-- COLLECTIONS DROPDOWN -->
                <li class="nav-item position-relative">
                    <a class="nav-link fw-semibold fs-6 collections-toggle" href="#" id="collectionsToggle">
                        Collections
                    </a>

                    <div class="collections-container" id="collectionsContainer">
                        <div class="collections-inner">
                            <div class="collections-content">
                                <!-- LEFT: 2-COLUMN Collections -->
                                <div class="collections-left">
                                    <!-- Column 1: Local Drops -->
                                    <div class="collections-column">
                                        <h2 class="collections-heading">LOCAL DROPS</h2>
                                        <a href="<?= base_url('collections/drop26') ?>" class="collection-link">Drop
                                            26</a>
                                        <a href="<?= base_url('collections/drop25') ?>" class="collection-link">Drop
                                            25</a>
                                    </div>

                                    <!-- Column 2: Collabs -->
                                    <div class="collections-column">
                                        <h2 class="collabs-heading">COLLABORATIONS</h2>
                                        <a href="<?= base_url('collections/collab26') ?>" class="collection-link">Collab
                                            26</a>
                                        <a href="<?= base_url('collections/manga26') ?>" class="collection-link">Manga
                                            26</a>
                                    </div>
                                </div>

                                <!-- RIGHT: Hero Image -->
                                <div class="collections-right">
                                    <img src="<?= base_url('assets/images/Local1.webp') ?>" alt="Drop 26 Collection"
                                        class="latest-drop-image">

                                    <div class="latest-drop-overlay">
                                        <h3 class="latest-drop-title">Drop 26</h3>
                                        <p class="latest-drop-text">Latest streetwear collection</p>
                                        <a href="<?= base_url('collections/drop26') ?>"
                                            class="btn btn-light fw-bold px-5 py-2 rounded-pill shadow-lg">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- BOTTOM LINKS -->
                            <div class="bottom-links">
                                <a href="<?= base_url('faq') ?>" class="bottom-link">FAQ</a>
                                <a href="<?= base_url('shipping') ?>" class="bottom-link">Shipping</a>
                                <a href="<?= base_url('returns') ?>" class="bottom-link">Returns</a>
                                <a href="<?= base_url('contact') ?>" class="bottom-link">Contact</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold fs-6" href="<?= base_url('news') ?>">News</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold fs-6" href="<?= base_url('about') ?>">About</a>
                </li>
            </ul>

<<<<<<< Updated upstream
        <!-- Right Icons -->
        <div class="d-flex align-items-center gap-3">
            <!-- Search -->
            <a href="<?= base_url('search') ?>" class="nav-link p-3 rounded-circle hover-lift" title="Search">
                <i class="bi bi-search fs-5"></i>
            </a>
            
            <!-- Cart -->
            <a href="#" class="nav-link p-3 position-relative rounded-circle hover-lift" 
               data-bs-toggle="modal" data-bs-target="#cartModal" title="Cart (2)"
               style="width: 52px; height: 52px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-bag fs-5"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge">
                    2
                </span>
            </a>
=======
            <!-- Right Icons -->
            <div class="d-flex align-items-center ms-auto">
                <!-- Search -->
                <div id="searchWrapper" class="position-relative d-flex align-items-center">
                    <a href="#" id="searchToggle" class="nav-link p-3 rounded-circle hover-lift" title="Search">
                        <i class="bi bi-search fs-5"></i>
                    </a>

                    <form id="searchForm" action="<?= base_url('shop') ?>" method="get"
                        class="search-form-hidden d-flex align-items-center position-absolute end-0">
                        <input type="text" name="q" id="searchInput" class="form-control form-control-sm me-2"
                            placeholder="Search products...">
                        <button type="submit" class="btn btn-dark btn-sm rounded-pill px-3">
                            Go
                        </button>
                    </form>
                </div>

                <!-- Cart -->
                <a href="#" class="nav-link p-3 position-relative rounded-circle hover-lift ms-2" data-bs-toggle="modal"
                    data-bs-target="#cartModal" title="Cart"
                    style="width: 52px; height: 52px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-bag fs-5"></i>
                    <span id="cartBadge"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge">
                        0
                    </span>
                </a>

                <!-- Auth -->
                <?php if (!session()->get('customer_logged_in')): ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-dark ms-2 px-3 py-2 rounded-pill fw-bold">
                        Login
                    </a>
                <?php else: ?>
                    <div class="dropdown ms-2">
                        <button class="btn btn-dark dropdown-toggle rounded-pill px-3 py-2 fw-bold" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?= esc(session()->get('customer_name')) ?>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
>>>>>>> Stashed changes
        </div>
    </div>
</nav>

<!-- CART MODAL -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-end modal-right-sidebar">
        <div class="modal-content rounded-start h-100 border-0 shadow-4">
            <div class="modal-header border-bottom p-4">
                <div>
                    <h5 class="modal-title fw-bold mb-1">Your Cart</h5>
                    <span id="cartItemCount" class="badge bg-danger fs-6">0 items</span>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body p-0 overflow-auto flex-grow-1">
                <div id="cartItemsContainer" class="list-group list-group-flush"></div>

                <div id="emptyCartMessage" class="p-4 text-center text-muted">
                    Your cart is empty.
                </div>
            </div>

            <div class="modal-footer border-top p-4 bg-light">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <span class="h5 fw-bold text-dark mb-0">Subtotal</span>
                        <span id="cartSubtotal" class="h4 fw-bold text-danger mb-0">₱0.00</span>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="<?= base_url('checkout') ?>" id="checkoutBtn"
                            class="btn btn-dark fw-bold py-3 fs-6 rounded-pill shadow-lg disabled" aria-disabled="true">
                            <i class="bi bi-credit-card me-2"></i>Proceed to Checkout
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <small class="text-muted">Free shipping on orders over ₱3,000</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<<<<<<< Updated upstream
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Collections Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('collectionsToggle');
    const container = document.getElementById('collectionsContainer');
    
    // Toggle on click
    toggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const isVisible = container.classList.contains('show');
        
        if (isVisible) {
            container.classList.remove('show');
            toggle.classList.remove('active');
        } else {
            container.classList.add('show');
            toggle.classList.add('active');
        }
    });
    
    // Close when clicking outside
    document.addEventListener('click', function(e) {
        if (!toggle.contains(e.target) && !container.contains(e.target)) {
            container.classList.remove('show');
            toggle.classList.remove('active');
        }
    });
});
</script>

</body>
</html>
=======
<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('collectionsToggle');
        const container = document.getElementById('collectionsContainer');

        if (toggle && container) {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const isVisible = container.classList.contains('show');

                if (isVisible) {
                    container.classList.remove('show');
                    toggle.classList.remove('active');
                } else {
                    container.classList.add('show');
                    toggle.classList.add('active');
                }
            });

            document.addEventListener('click', function (e) {
                if (!toggle.contains(e.target) && !container.contains(e.target)) {
                    container.classList.remove('show');
                    toggle.classList.remove('active');
                }
            });
        }
    });
</script>

<script src="<?= base_url('assets/js/cart.js') ?>"></script>
<script src="<?= base_url('assets/js/searchbar.js') ?>"></script>
>>>>>>> Stashed changes
