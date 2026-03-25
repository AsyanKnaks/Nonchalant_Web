<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/ProductCard.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/shop.css') ?>">

<section class="hero-section text-white text-center p-5 position-relative overflow-hidden"
         style="background-image: url('<?= base_url('assets/images/Local1.webp') ?>'); min-height: 60vh;">
    <div class="hero-overlay"></div>
    <div class="hero-content position-absolute top-50 start-50 translate-middle text-center z-2">
        <h1 class="display-3 fw-bold mb-3">ALL PRODUCT</h1>
    </div>
</section>

<<<<<<< Updated upstream
<!-- Products Grid -->
<section id="products" class="container my-5">
    <div class="row g-4">
        <!-- Product Card 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card h-100 position-relative overflow-hidden rounded-4 shadow-lg hover-scale" 
                 data-product='{
                    "id": 1,
                    "name": "Drop 26 Hoodie",
                    "price": 2500,
                    "oldPrice": 3200,
                    "image": "<?= base_url('assets/images/drop26-hoodie.jpg') ?>",
                    "colors": ["black", "grey", "navy"],
                    "sizes": ["XS", "S", "M", "L", "XL"],
                    "stock": 12
                 }'>
                <div class="product-image position-relative overflow-hidden rounded-top-4">
                    <img src="<?= base_url('assets/images/drop26-hoodie.jpg') ?>" 
                         class="w-100 product-img" style="height: 300px; object-fit: cover;">
                    <div class="product-badge position-absolute top-3 start-3">
                        <span class="badge bg-danger rounded-pill px-3 py-1 fw-bold">-22%</span>
                    </div>
                    <div class="product-hover position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-90 text-white">
                        <small class="d-block mb-1">12 Colors • 5 Sizes</small>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 mb-0 fw-bold">Quick View</span>
                            <i class="bi bi-arrow-right fs-5"></i>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h5 class="fw-bold mb-2">Drop 26 Hoodie</h5>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="h6 fw-bold text-danger">₱2,500</span>
                        <span class="text-muted text-decoration-line-through">₱3,200</span>
                    </div>
                    <button class="btn btn-outline-dark w-100 fw-bold rounded-pill py-2">
                        Add to Cart
                    </button>
=======
<section class="container my-4">
    <div class="shop-toolbar d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div class="filter-area position-relative">
            <button type="button" class="btn btn-outline-dark d-flex align-items-center" id="filterToggle">
                <span class="mr-2">☰</span>
                Filter
            </button>

            <div class="filter-dropdown shadow-sm border bg-white p-3 mt-2" id="filterDropdown">
                <h6 class="mb-3">Collections</h6>

                <div class="d-flex flex-column gap-2">
                    <a href="<?= site_url('shop') . '?' . http_build_query(array_filter([
                        'q' => $searchQuery ?? '',
                        'sort' => $selectedSort ?? ''
                    ])) ?>"
                       class="btn btn-sm text-left <?= empty($selectedCollection) ? 'btn-dark' : 'btn-outline-dark' ?>">
                        All
                    </a>

                    <a href="<?= site_url('shop') . '?' . http_build_query(array_filter([
                        'q' => $searchQuery ?? '',
                        'collection' => 'Drop26',
                        'sort' => $selectedSort ?? ''
                    ])) ?>"
                       class="btn btn-sm text-left <?= ($selectedCollection === 'Drop26') ? 'btn-dark' : 'btn-outline-dark' ?>">
                        Drop 26
                    </a>

                    <a href="<?= site_url('shop') . '?' . http_build_query(array_filter([
                        'q' => $searchQuery ?? '',
                        'collection' => 'Drop25',
                        'sort' => $selectedSort ?? ''
                    ])) ?>"
                       class="btn btn-sm text-left <?= ($selectedCollection === 'Drop25') ? 'btn-dark' : 'btn-outline-dark' ?>">
                        Drop 25
                    </a>

                    <a href="<?= site_url('shop') . '?' . http_build_query(array_filter([
                        'q' => $searchQuery ?? '',
                        'collection' => 'MANGA26',
                        'sort' => $selectedSort ?? ''
                    ])) ?>"
                       class="btn btn-sm text-left <?= ($selectedCollection === 'MANGA26') ? 'btn-dark' : 'btn-outline-dark' ?>">
                        Manga 26
                    </a>

                    <a href="<?= site_url('shop') . '?' . http_build_query(array_filter([
                        'q' => $searchQuery ?? '',
                        'collection' => 'COLLAB26',
                        'sort' => $selectedSort ?? ''
                    ])) ?>"
                       class="btn btn-sm text-left <?= ($selectedCollection === 'COLLAB26') ? 'btn-dark' : 'btn-outline-dark' ?>">
                        Collab 26
                    </a>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>

<<<<<<< Updated upstream
        <!-- Product Card 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card h-100 position-relative overflow-hidden rounded-4 shadow-lg hover-scale" 
                 data-product='{
                    "id": 2,
                    "name": "Drop 26 Tee",
                    "price": 1200,
                    "oldPrice": 1500,
                    "image": "<?= base_url('assets/images/drop26-tee.jpg') ?>",
                    "colors": ["black", "white", "red"],
                    "sizes": ["S", "M", "L", "XL"],
                    "stock": 25
                 }'>
                <!-- Same structure as above -->
                <div class="product-image position-relative overflow-hidden rounded-top-4">
                    <img src="<?= base_url('assets/images/drop26-tee.jpg') ?>" 
                         class="w-100 product-img" style="height: 300px; object-fit: cover;">
                    <div class="product-badge position-absolute top-3 start-3">
                        <span class="badge bg-success rounded-pill px-3 py-1 fw-bold">-20%</span>
                    </div>
                    <div class="product-hover position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-90 text-white">
                        <small class="d-block mb-1">3 Colors • 4 Sizes</small>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 mb-0 fw-bold">Quick View</span>
                            <i class="bi bi-arrow-right fs-5"></i>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h5 class="fw-bold mb-2">Drop 26 Tee</h5>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="h6 fw-bold text-danger">₱1,200</span>
                        <span class="text-muted text-decoration-line-through">₱1,500</span>
                    </div>
                    <button class="btn btn-outline-dark w-100 fw-bold rounded-pill py-2">
                        Add to Cart
                    </button>
                </div>
            </div>
=======
        <div class="sort-area d-flex align-items-center">
            <label for="sortSelect" class="mb-0 mr-2 font-weight-bold">Sort by:</label>
            <select id="sortSelect"
                    class="form-control"
                    data-base-url="<?= site_url('shop') ?>"
                    data-current-q="<?= esc($searchQuery ?? '') ?>"
                    data-current-collection="<?= esc($selectedCollection ?? '') ?>">
                <option value="">Latest</option>
                <option value="name_asc" <?= ($selectedSort === 'name_asc') ? 'selected' : '' ?>>Alphabetically, A-Z</option>
                <option value="name_desc" <?= ($selectedSort === 'name_desc') ? 'selected' : '' ?>>Alphabetically, Z-A</option>
                <option value="price_asc" <?= ($selectedSort === 'price_asc') ? 'selected' : '' ?>>Price, low to high</option>
                <option value="price_desc" <?= ($selectedSort === 'price_desc') ? 'selected' : '' ?>>Price, high to low</option>
            </select>
>>>>>>> Stashed changes
        </div>

        <!-- Add more products... -->
    </div>
</section>

<section id="products" class="container my-5">
    <div class="row g-4">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <?= view('components/product_card', ['product' => $product]) ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No products available yet.
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="d-flex justify-content-center mt-4">
    <?= $pager->links() ?>
</div>

<div class="modal fade product-modal" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-4">
            <div class="modal-header border-0 p-0">
                <button type="button" class="btn-close position-absolute top-3 end-3 z-3" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0 h-100">
                    <div class="col-lg-6">
                        <div class="product-gallery h-100 bg-light d-flex align-items-center justify-content-center p-5">
                            <img id="productMainImage" src="" class="img-fluid shadow-lg rounded-4" style="max-height: 500px; object-fit: cover;">
                        </div>
                    </div>

                    <div class="col-lg-6 p-5">
                        <h2 id="productName" class="fw-bold mb-4"></h2>

                        <div class="d-flex align-items-center gap-3 mb-4">
                            <span id="productPrice" class="h4 fw-bold text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <span class="fw-bold">Collection:</span>
                            <span id="productCollection"></span>
                        </div>

                        <div class="mb-4">
                            <p id="productDescription" class="text-muted"></p>
                        </div>

                        <div class="mb-4">
                            <span id="productStock" class="text-muted small"></span>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="button" id="modalAddToCartBtn" class="btn btn-dark fw-bold py-3 fs-5 rounded-pill shadow-lg">
                                Add to Cart
                            </button>
                            <button class="btn btn-outline-dark fw-bold py-3 rounded-pill">
                                <i class="bi bi-heart me-2"></i>Add to Wishlist
                            </button>
                        </div>

                        <hr class="my-4">

                        <div>
                            <h6 class="fw-bold mb-3">Product Details</h6>
                            <ul class="small text-muted">
                                <li>Collection: <span id="productCollectionDetails"></span></li>
                                <li>Stock: <span id="productStockDetails"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/shop-filters.js') ?>"></script>
<script src="<?= base_url('assets/js/ProductCard.js') ?>"></script>

<?= $this->endSection() ?>