<!-- Navbar & Cart Modal Only (included in main.php) -->

<!-- COMPLETE NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-2 fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3" href="<?= base_url() ?>">
            <span class="text-danger">Non</span><span class="text-dark">chalant</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
                    
                    <!-- DROPDOWN CONTAINER -->
                    <div class="collections-container" id="collectionsContainer">
                        <!-- Same collections content as before -->
                        <div class="collections-inner">
                            <div class="collections-content">
                                <!-- LEFT: 2-COLUMN Collections -->
                                <div class="collections-left">
                                   <!-- Column 1: Local Drops -->
<div class="collections-column">
    <h2 class="collections-heading">LOCAL DROPS</h2>
    <a href="<?= base_url('collections/local/drop26') ?>" class="collection-link">Drop 26</a>
    <a href="<?= base_url('collections/local/drop25') ?>" class="collection-link">Drop 25</a>
</div>

<!-- Column 2: Collabs -->
<div class="collections-column">
    <h2 class="collabs-heading">COLLABORATIONS</h2>
    <a href="<?= base_url('collections/collab/DDD') ?>" class="collection-link">DDD</a>
    <a href="<?= base_url('collections/collab/Manga26') ?>" class="collection-link">Manga 26</a>
</div>
                                
                                <!-- RIGHT: Hero Image -->
                                <div class="collections-right">
                                    <img src="<?= base_url('assets/images/Local1.webp') ?>" 
                                         alt="Drop 26 Collection" class="latest-drop-image">
                                    <div class="latest-drop-overlay">
                                        <h3 class="latest-drop-title">Drop 26</h3>
                                        <p class="latest-drop-text">Latest streetwear collection</p>
                                        <a href="<?= base_url('collections/local/drop26') ?>" 
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
        </div>

        <!-- Right Icons -->
        <div class="d-flex align-items-center gap-3">
            <!-- Sign In -->
            <a href="<?= base_url('login') ?>" class="nav-link p-3 rounded-circle hover-lift position-relative" title="Sign In">
                <i class="bi bi-person fs-5"></i>
            </a>
            
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
        </div>
    </div>
</nav>

<!-- Right Sidebar Cart -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-end modal-right-sidebar">
        <div class="modal-content rounded-start h-100 border-0 shadow-4">
            <!-- Header -->
            <div class="modal-header border-bottom p-4">
                <div>
                    <h5 class="modal-title fw-bold mb-1">Your Cart</h5>
                    <span class="badge bg-danger fs-6">2 items</span>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            
            <!-- Cart Items -->
            <div class="modal-body p-0 overflow-auto flex-grow-1">
                <div class="list-group list-group-flush">
                    <!-- Item 1 -->
                    <div class="list-group-item px-4 py-4 border-bottom">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/70x70/ff6b6b/fff?text=D26" 
                                 class="rounded-3 shadow-sm flex-shrink-0 me-3" width="70" height="70">
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">Drop 26 Hoodie</h6>
                                <small class="text-muted d-block mb-1">Size: M • Black</small>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-bold small text-dark">₱2,500</span>
                                    <span class="badge bg-light text-dark rounded-pill px-2 py-1">1</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-link p-0 ms-2 text-danger hover-lift">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Item 2 -->
                    <div class="list-group-item px-4 py-4">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/70x70/4ecdc4/fff?text=M26" 
                                 class="rounded-3 shadow-sm flex-shrink-0 me-3" width="70" height="70">
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">Manga 26 Tee</h6>
                                <small class="text-muted d-block mb-1">Size: L • White</small>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-bold small text-dark">₱1,200</span>
                                    <span class="badge bg-light text-dark rounded-pill px-2 py-1">1</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-link p-0 ms-2 text-danger hover-lift">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="modal-footer border-top p-4 bg-light">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <span class="h5 fw-bold text-dark mb-0">Subtotal</span>
                        <span class="h4 fw-bold text-danger mb-0">₱3,700</span>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="<?= base_url('checkout') ?>" class="btn btn-dark fw-bold py-3 fs-6 rounded-pill shadow-lg">
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

<!-- Bootstrap JS -->
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
<!-- End Navbar -->
