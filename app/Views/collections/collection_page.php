<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/ProductCard.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/shop.css') ?>">

<section class="hero-section text-white text-center p-5 position-relative overflow-hidden"
         style="background-image: url('<?= base_url($collectionData['heroImage']) ?>'); min-height: 60vh;">
    <div class="hero-overlay"></div>
    <div class="hero-content position-absolute top-50 start-50 translate-middle text-center z-2">
        <h1 class="display-3 fw-bold mb-3"><?= esc($collectionData['heroTitle']) ?></h1>
        <p class="lead"><?= esc($collectionData['heroText']) ?></p>
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
                    No products available in this collection yet.
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

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

                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-flex align-items-center gap-2">
                                <label class="mb-0 fw-bold">Quantity:</label>
                                <input type="number" id="productQuantity" class="form-control w-75" min="1" value="1" style="max-width: 80px;">
                            </div>
                            <span id="productStock" class="text-muted small"></span>
                        </div>

                        <div class="d-grid gap-2">
                            <button id="addToCartBtn" class="btn btn-dark fw-bold py-3 fs-5 rounded-pill shadow-lg">
                                Add to Cart - ₱<span id="cartTotal"></span>
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

<script src="<?= base_url('assets/js/ProductCard.js') ?>"></script>

<?= $this->endSection() ?>