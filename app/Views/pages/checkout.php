<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Checkout Hero -->
<section class="bg-dark text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold mt-3 mb-0">Checkout</h1>
        <p class="lead opacity-75 mt-2 mb-0">Secure & Fast - 2 Minutes</p>
    </div>
</section>

<!-- Checkout Container -->
<div class="container my-5">
    <div class="row g-5">
        <!-- Left: Billing & Shipping -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-5">
                    <div class="row">
                        <!-- Billing -->
                        <div class="col-md-6 mb-4">
                            <h5 class="fw-bold mb-4 pb-2 border-bottom">🧾 Billing Details</h5>
                            <form id="billingForm">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Full Name *</label>
                                    <input type="text" class="form-control rounded-3" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Email *</label>
                                        <input type="email" class="form-control rounded-3" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Phone</label>
                                        <input type="tel" class="form-control rounded-3">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Address *</label>
                                    <textarea class="form-control rounded-3" rows="3" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">City *</label>
                                        <input type="text" class="form-control rounded-3" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-semibold">ZIP Code</label>
                                        <input type="text" class="form-control rounded-3">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label fw-semibold">Country</label>
                                        <select class="form-select rounded-3">
                                            <option>Philippines</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Shipping & Payment -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-4 pb-2 border-bottom">🚚 Shipping Method</h5>
                            <div class="shipping-option mb-4 p-3 border rounded-3 active">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fw-bold mb-1">Standard Shipping</h6>
                                        <small class="text-muted">3-5 business days</small>
                                    </div>
                                    <strong class="text-success">FREE</strong>
                                </div>
                            </div>
                            <div class="shipping-option p-3 border rounded-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fw-bold mb-1">Express (1-2 days)</h6>
                                        <small class="text-muted">Next business day</small>
                                    </div>
                                    <strong>₱150</strong>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-4 pb-2 border-bottom">💳 Payment Method</h5>
                            <div class="payment-option mb-3 p-3 border rounded-3 active">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="cod" checked>
                                    <label class="form-check-label fw-semibold" for="cod">
                                        <i class="bi bi-cash-stack text-success me-2"></i>Cash on Delivery
                                    </label>
                                </div>
                            </div>
                            <div class="payment-option p-3 border rounded-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="gcash">
                                    <label class="form-check-label fw-semibold" for="gcash">
                                        <i class="bi bi-phone text-success me-2"></i>GCash
                                    </label>
                                </div>
                            </div>
                            <div class="payment-option p-3 border rounded-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="card">
                                    <label class="form-check-label fw-semibold" for="card">
                                        <i class="bi bi-credit-card text-primary me-2"></i>Credit/Debit Card
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Order Summary -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 sticky-top" style="top: 2rem;">
                <div class="card-header bg-light border-0 py-4 px-4">
                    <h5 class="fw-bold mb-0">Order Summary</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Cart Items Preview -->
                    <div class="order-item mb-3 p-3 border rounded-3">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50/ff6b6b/fff?text=D26" 
                                 class="rounded-2 me-3" width="50" height="50">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Drop 26 Hoodie</h6>
                                <small class="text-muted">M • Black × 1</small>
                            </div>
                            <span class="fw-bold">₱2,500</span>
                        </div>
                    </div>
                    <div class="order-item mb-4 p-3 border rounded-3">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50x50/4ecdc4/fff?text=M26" 
                                 class="rounded-2 me-3" width="50" height="50">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Manga 26 Tee</h6>
                                <small class="text-muted">L • White × 1</small>
                            </div>
                            <span class="fw-bold">₱1,200</span>
                        </div>
                    </div>

                    <!-- Totals -->
                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                        <span class="fw-semibold">Subtotal</span>
                        <span class="fw-bold">₱3,700</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                        <span class="fw-semibold">Shipping</span>
                        <span class="text-success fw-bold">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <span class="h5 fw-bold mb-0">Total</span>
                        <span class="h3 fw-bold text-danger mb-0">₱3,700</span>
                    </div>

                    <!-- Place Order Button -->
                    <button id="placeOrderBtn" class="btn btn-success w-100 fw-bold py-4 fs-5 rounded-pill shadow-lg mb-3">
                        <i class="bi bi-check-circle me-2"></i>Place Order
                    </button>
                    
                    <div class="text-center">
                        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
                            <i class="bi bi-shield-check text-success fs-4"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Secure Checkout</h6>
                                <small class="text-muted">Your data is protected</small>
                            </div>
                        </div>
                        <small class="text-muted">
                            By placing your order, you agree to our 
                            <a href="<?= base_url('terms') ?>">Terms</a> and 
                            <a href="<?= base_url('privacy') ?>">Privacy Policy</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Shipping options
    document.querySelectorAll('.shipping-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.shipping-option').forEach(o => o.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Payment options
    document.querySelectorAll('.payment-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Place Order
    document.getElementById('placeOrderBtn').addEventListener('click', function() {
        // Form validation + Order processing
        if (document.getElementById('billingForm').checkValidity()) {
            // Simulate order success
            Swal.fire({
                icon: 'success',
                title: 'Order Placed!',
                text: 'Your order has been confirmed. Check your email.',
                confirmButtonText: 'Track Order'
            });
        }
    });
});
</script>