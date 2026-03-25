document.addEventListener('DOMContentLoaded', function () {
    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
    const shippingOptions = document.querySelectorAll('.shipping-option');
    const paymentOptions = document.querySelectorAll('.payment-option');

    const cardFields = document.getElementById('cardFields');
    const cardNumber = document.getElementById('cardNumber');
    const cardTypeText = document.getElementById('cardTypeText');

    const placeOrderBtn = document.getElementById('placeOrderBtn');
    const checkoutForm = document.getElementById('checkoutForm');
    const cartPayload = document.getElementById('cartPayload');

    const checkoutItems = document.getElementById('checkoutItems');
    const checkoutSubtotal = document.getElementById('checkoutSubtotal');
    const checkoutShippingFee = document.getElementById('checkoutShippingFee');
    const checkoutGrandTotal = document.getElementById('checkoutGrandTotal');
    const checkoutEmptyState = document.getElementById('checkoutEmptyState');
    const checkoutContent = document.getElementById('checkoutContent');

    const receiptSummary = document.getElementById('receiptSummary');
    const receiptPaymentArea = document.getElementById('receiptPaymentArea');

    const captchaCode = document.getElementById('captchaCode');
    const captchaInput = document.getElementById('captchaInput');
    const captchaError = document.getElementById('captchaError');
    const confirmOrderBtn = document.getElementById('confirmOrderBtn');
    const refreshCaptchaBtn = document.getElementById('refreshCaptchaBtn');

    const receiptModalElement = document.getElementById('receiptModal');
    const receiptModal = receiptModalElement ? new bootstrap.Modal(receiptModalElement) : null;

    const CART_KEY = 'nonchalant_cart';

    function getCart() {
        try {
            return JSON.parse(localStorage.getItem(CART_KEY)) || [];
        } catch (error) {
            return [];
        }
    }

    function formatPrice(value) {
        return Number(value).toLocaleString('en-PH', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function getSelectedValue(name) {
        return document.querySelector(`input[name="${name}"]:checked`)?.value || '';
    }

    function updatePaymentFields() {
        const paymentMethod = getSelectedValue('payment_method');
        if (cardFields) {
            cardFields.classList.toggle('d-none', paymentMethod !== 'Debit/Credit');
        }
    }

    function detectCardType(value) {
        const cleaned = value.replace(/\s+/g, '');
        if (cleaned.startsWith('4')) return 'Visa detected';
        if (cleaned.startsWith('34') || cleaned.startsWith('37')) return 'American Express detected';
        return cleaned.length ? 'Other card type' : '';
    }

    function generateCaptcha() {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        let result = '';
        for (let i = 0; i < 5; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        if (captchaCode) {
            captchaCode.textContent = result;
        }
    }

    function renderCheckout() {
        const cart = getCart();

        if (!cart.length) {
            if (checkoutContent) checkoutContent.classList.add('d-none');
            if (checkoutEmptyState) checkoutEmptyState.classList.remove('d-none');
            return;
        }

        if (checkoutContent) checkoutContent.classList.remove('d-none');
        if (checkoutEmptyState) checkoutEmptyState.classList.add('d-none');

        const subtotal = cart.reduce((sum, item) => sum + (Number(item.price) * Number(item.quantity)), 0);
        const shippingMethod = getSelectedValue('shipping_method');
        const shippingFee = shippingMethod === 'Express' ? 150 : 0;
        const grandTotal = subtotal + shippingFee;

        if (checkoutItems) {
            checkoutItems.innerHTML = cart.map(item => `
                <div class="order-item mb-3 p-3 border rounded-3">
                    <div class="d-flex align-items-center">
                        <img src="${item.image}" class="rounded-2 me-3" width="50" height="50" style="object-fit: cover;">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">${item.name}</h6>
                            <small class="text-muted">Qty × ${item.quantity}</small>
                        </div>
                        <span class="fw-bold">₱${formatPrice(Number(item.price) * Number(item.quantity))}</span>
                    </div>
                </div>
            `).join('');
        }

        if (checkoutSubtotal) {
            checkoutSubtotal.textContent = `₱${formatPrice(subtotal)}`;
        }

        if (checkoutShippingFee) {
            checkoutShippingFee.textContent = shippingFee === 0 ? 'FREE' : `₱${formatPrice(shippingFee)}`;
        }

        if (checkoutGrandTotal) {
            checkoutGrandTotal.textContent = `₱${formatPrice(grandTotal)}`;
        }

        if (cartPayload) {
            cartPayload.value = JSON.stringify(cart);
        }
    }

    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            updatePaymentFields();
            renderCheckout();
        });
    });

    shippingOptions.forEach(option => {
        option.addEventListener('click', function () {
            shippingOptions.forEach(o => o.classList.remove('active'));
            this.classList.add('active');

            const radio = this.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }

            renderCheckout();
        });
    });

    paymentOptions.forEach(option => {
        option.addEventListener('click', function () {
            paymentOptions.forEach(o => o.classList.remove('active'));
            this.classList.add('active');

            const radio = this.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }

            updatePaymentFields();
        });
    });

    if (cardNumber && cardTypeText) {
        cardNumber.addEventListener('input', function () {
            cardTypeText.textContent = detectCardType(this.value);
        });
    }

    if (placeOrderBtn) {
        placeOrderBtn.addEventListener('click', function () {
            if (!checkoutForm) return;

            if (!checkoutForm.checkValidity()) {
                checkoutForm.reportValidity();
                return;
            }

            const cart = getCart();
            if (!cart.length) {
                return;
            }

            const shippingMethod = getSelectedValue('shipping_method');
            const paymentMethod = getSelectedValue('payment_method');
            const shippingFee = shippingMethod === 'Express' ? 150 : 0;
            const subtotal = cart.reduce((sum, item) => sum + (Number(item.price) * Number(item.quantity)), 0);
            const grandTotal = subtotal + shippingFee;

            if (receiptSummary) {
                receiptSummary.innerHTML = `
                    <p><strong>Name:</strong> ${checkoutForm.full_name.value}</p>
                    <p><strong>Email:</strong> ${checkoutForm.email.value}</p>
                    <p><strong>Shipping Address:</strong> ${checkoutForm.shipping_address.value}</p>
                    <p><strong>Shipping Method:</strong> ${shippingMethod}</p>
                    <p><strong>Payment Method:</strong> ${paymentMethod}</p>
                    <hr>
                    ${cart.map(item => `
                        <div class="d-flex justify-content-between mb-2">
                            <span>${item.name} × ${item.quantity}</span>
                            <span>₱${formatPrice(Number(item.price) * Number(item.quantity))}</span>
                        </div>
                    `).join('')}
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>₱${formatPrice(subtotal)}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>${shippingFee === 0 ? 'FREE' : `₱${formatPrice(shippingFee)}`}</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold fs-5 mt-2">
                        <span>Total</span>
                        <span>₱${formatPrice(grandTotal)}</span>
                    </div>
                `;
            }

            if (receiptPaymentArea) {
                if (paymentMethod === 'E-Wallet') {
                    receiptPaymentArea.innerHTML = `
                        <h6 class="fw-bold mb-3">Scan QR</h6>
                        <img src="/assets/images/QRcode.png" class="img-fluid rounded shadow-sm" alt="QR Code">
                    `;
                } else if (paymentMethod === 'Debit/Credit') {
                    const cardValue = checkoutForm.card_number ? checkoutForm.card_number.value : '';
                    receiptPaymentArea.innerHTML = `
                        <h6 class="fw-bold mb-3">Card Verification</h6>
                        <p class="mb-1"><strong>Card Type:</strong> ${cardTypeText ? (cardTypeText.textContent || 'Not detected') : 'Not detected'}</p>
                        <p class="mb-0"><strong>Card Number:</strong> **** **** **** ${cardValue.slice(-4)}</p>
                    `;
                } else {
                    receiptPaymentArea.innerHTML = `
                        <h6 class="fw-bold mb-3">Cash on Delivery</h6>
                        <p class="text-muted mb-0">You will pay upon delivery.</p>
                    `;
                }
            }

            if (captchaInput) captchaInput.value = '';
            if (captchaError) captchaError.classList.add('d-none');
            generateCaptcha();

            if (receiptModal) {
                receiptModal.show();
            }
        });
    }

    if (refreshCaptchaBtn) {
        refreshCaptchaBtn.addEventListener('click', function () {
            generateCaptcha();
        });
    }

    if (confirmOrderBtn) {
        confirmOrderBtn.addEventListener('click', function () {
            if (!captchaInput || !captchaCode || !checkoutForm) return;

            if (captchaInput.value.trim().toUpperCase() !== captchaCode.textContent.trim().toUpperCase()) {
                if (captchaError) {
                    captchaError.classList.remove('d-none');
                }
                return;
            }

            checkoutForm.submit();
        });
    }

    updatePaymentFields();
    renderCheckout();
    generateCaptcha();
});