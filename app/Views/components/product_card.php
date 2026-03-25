<?php helper('text'); ?>

<div class="col-lg-4 col-md-6 mb-4">
    <div class="product-card h-100 position-relative overflow-hidden rounded-4 shadow-lg hover-scale"
         data-product='<?= json_encode([
             "id" => $product["id"],
             "name" => $product["name"],
             "description" => $product["description"] ?? "",
             "price" => (float) ($product["price"] ?? 0),
             "image" => base_url('assets/product/' . ($product["image"] ?? 'default-product.png')),
             "stock" => (int) ($product["stock"] ?? 0),
             "collection" => $product["collection"] ?? ""
         ], JSON_HEX_APOS | JSON_HEX_QUOT) ?>'>

        <div class="product-image position-relative overflow-hidden rounded-top-4">
            <img src="<?= base_url('assets/product/' . $product['image']) ?>"
                 alt="<?= esc($product['name']) ?>"
                 class="w-100 product-img"
                 style="height: 300px; object-fit: cover;">

            <div class="product-hover position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-90 text-white">
                <small class="d-block mb-1">
                    Collection: <?= esc($product['collection'] ?? 'General') ?>
                </small>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h6 mb-0 fw-bold">Quick View</span>
                    <span>→</span>
                </div>
            </div>
        </div>

        <div class="p-4">
            <h5 class="fw-bold mb-2"><?= esc($product['name']) ?></h5>

            <p class="text-muted small mb-2">
                <?= esc(character_limiter($product['description'] ?? '', 60)) ?>
            </p>

            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="h6 fw-bold text-danger mb-0">
                    ₱<?= number_format((float) ($product['price'] ?? 0), 2) ?>
                </span>
            </div>

<div class="d-grid gap-2">
    <button type="button" class="btn btn-dark fw-bold py-3 fs-5 rounded-pill shadow-lg add-to-cart-btn">
        Add to Cart
    </button>
</div>
        </div>
    </div>
</div>