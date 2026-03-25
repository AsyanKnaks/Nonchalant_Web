<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<section class="bg-dark text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold mt-3 mb-0">Checkout</h1>
        <p class="lead opacity-75 mt-2 mb-0">Secure & Fast</p>
    </div>
</section>

<div class="container my-5">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger rounded-4 shadow-sm">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success rounded-4 shadow-sm">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <div id="checkoutEmptyState" class="d-none">
        <div class="card border-0 shadow-lg rounded-4 text-center p-5">
            <h3 class="fw-bold mb-3">Your cart is empty</h3>
            <p class="text-muted mb-4">Add some products before proceeding to checkout.</p>
            <a href="<?= base_url('shop') ?>" class="btn btn-dark rounded-pill px-4">Back to Shop</a>
        </div>
    </div>

    <div id="checkoutContent" class="row g-5">
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-5">
                    <form id="checkoutForm" method="post" action="<?= base_url('checkout/place-order') ?>">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5 class="fw-bold mb-4 pb-2 border-bottom">Billing Details</h5>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Full Name *</label>
                                    <input type="text" name="full_name" class="form-control rounded-3"
                                           value="<?= esc($customerName ?? '') ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Email *</label>
                                        <input type="email" name="email" class="form-control rounded-3"
                                               value="<?= esc($customerEmail ?? '') ?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Phone</label>
                                        <input type="text" name="mobile" class="form-control rounded-3"
                                               value="<?= esc($customerMobile ?? '') ?>">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Shipping Address *</label>
                                    <textarea name="shipping_address" class="form-control rounded-3" rows="4" required><?= esc($customerAddress ?? '') ?></textarea>
                                </div>

                                <div id="cardFields" class="d-none mt-4">
                                    <h5 class="fw-bold mb-3">Card Details</h5>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Card Number</label>
                                        <input type="text" name="card_number" id="cardNumber" class="form-control rounded-3" placeholder="1234 5678 9012 3456">
                                        <small id="cardTypeText" class="text-muted"></small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Expiry Date</label>
                                            <input type="text" name="card_expiry" class="form-control rounded-3" placeholder="MM/YY">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">CVV</label>
                                            <input type="text" name="card_cvv" class="form-control rounded-3" placeholder="123">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="fw-bold mb-4 pb-2 border-bottom">Shipping Method</h5>

                                <label class="shipping-option mb-3 p-3 border rounded-3 active d-block" data-shipping="Standard">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="radio" name="shipping_method" value="Standard" checked>
                                        <span class="form-check-label fw-semibold">Standard Shipping</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">3-5 business days</small>
                                        <strong class="text-success">FREE</strong>
                                    </div>
                                </label>

                                <label class="shipping-option p-3 border rounded-3 d-block" data-shipping="Express">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="radio" name="shipping_method" value="Express">
                                        <span class="form-check-label fw-semibold">Express Shipping</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">1-2 business days</small>
                                        <strong>₱150.00</strong>
                                    </div>
                                </label>

                                <hr class="my-4">

                                <h5 class="fw-bold mb-4 pb-2 border-bottom">Payment Method</h5>

                                <label class="payment-option mb-3 p-3 border rounded-3 active d-block">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="radio" name="payment_method" value="Cash on Delivery" checked>
                                        <span class="form-check-label fw-semibold">Cash on Delivery</span>
                                    </div>
                                </label>

                                <label class="payment-option mb-3 p-3 border rounded-3 d-block">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="radio" name="payment_method" value="E-Wallet">
                                        <span class="form-check-label fw-semibold">E-Wallet (DragonPay / GCash)</span>
                                    </div>
                                </label>

                                <label class="payment-option p-3 border rounded-3 d-block">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="radio" name="payment_method" value="Debit/Credit">
                                        <span class="form-check-label fw-semibold">Debit / Credit Card</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="cart_payload" id="cartPayload">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 sticky-top" style="top: 2rem;">
                <div class="card-header bg-light border-0 py-4 px-4">
                    <h5 class="fw-bold mb-0">Order Summary</h5>
                </div>

                <div class="card-body p-4">
                    <div id="checkoutItems"></div>

                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                        <span class="fw-semibold">Subtotal</span>
                        <span id="checkoutSubtotal" class="fw-bold">₱0.00</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                        <span class="fw-semibold">Shipping</span>
                        <span id="checkoutShippingFee" class="fw-bold text-success">FREE</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <span class="h5 fw-bold mb-0">Total</span>
                        <span id="checkoutGrandTotal" class="h3 fw-bold text-danger mb-0">₱0.00</span>
                    </div>

                    <button id="placeOrderBtn" type="button" class="btn btn-success w-100 fw-bold py-4 fs-5 rounded-pill shadow-lg mb-3">
                        <i class="bi bi-check-circle me-2"></i>Place Order
                    </button>

                    <div class="text-center">
                        <small class="text-muted">
                            By placing your order, you agree to our terms and policies.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Confirm Your Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <h6 class="fw-bold mb-3">Transaction Details</h6>
                        <div id="receiptSummary"></div>
                    </div>

                    <div class="col-lg-5">
                        <div id="receiptPaymentArea"></div>

                        <div class="mt-4">
                            <label class="form-label fw-bold">Captcha</label>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span id="captchaCode" class="badge bg-dark fs-6 px-3 py-2"></span>
                                <button type="button" id="refreshCaptchaBtn" class="btn btn-outline-secondary btn-sm">Refresh</button>
                            </div>
                            <input type="text" id="captchaInput" class="form-control" placeholder="Enter captcha">
                            <small id="captchaError" class="text-danger d-none">Captcha does not match.</small>
                        </div>

                        <button type="button" id="confirmOrderBtn" class="btn btn-success w-100 mt-4 rounded-pill fw-bold">
                            Confirm Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/checkout.js') ?>"></script>

<?= $this->endSection() ?>