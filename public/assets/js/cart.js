document.addEventListener('DOMContentLoaded', function () {
    const CART_KEY = 'nonchalant_cart';

    function getCart() {
        try {
            return JSON.parse(localStorage.getItem(CART_KEY)) || [];
        } catch (error) {
            return [];
        }
    }

    function saveCart(cart) {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
    }

    function formatPrice(value) {
        return Number(value).toLocaleString('en-PH', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function getTotalItems(cart) {
        return cart.reduce((total, item) => total + item.quantity, 0);
    }

    function getSubtotal(cart) {
        return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    function addToCart(product) {
        const cart = getCart();
        const existing = cart.find(item => Number(item.id) === Number(product.id));

        if (existing) {
            if (existing.quantity < existing.stock) {
                existing.quantity += 1;
            }
        } else {
            cart.push({
                id: product.id,
                name: product.name,
                price: Number(product.price),
                image: product.image,
                stock: Number(product.stock),
                collection: product.collection || '',
                quantity: product.stock > 0 ? 1 : 0
            });
        }

        saveCart(cart);
        renderCart();
    }

function updateQuantity(productId, newQuantity) {
    let cart = getCart();

    const qty = Number(newQuantity);

    cart = cart.flatMap(item => {
        if (Number(item.id) !== Number(productId)) {
            return [item];
        }

        if (qty <= 0) {
            return [];
        }

        return [{
            ...item,
            quantity: Math.min(qty, Number(item.stock))
        }];
    });

    saveCart(cart);
    renderCart();
}

    function removeFromCart(productId) {
        const cart = getCart().filter(item => Number(item.id) !== Number(productId));
        saveCart(cart);
        renderCart();
    }

    function renderCart() {
    const cart = getCart();

    const cartBadge = document.getElementById('cartBadge');
    const cartItemCount = document.getElementById('cartItemCount');
    const cartSubtotal = document.getElementById('cartSubtotal');
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const emptyCartMessage = document.getElementById('emptyCartMessage');
    const checkoutBtn = document.getElementById('checkoutBtn');

    if (!cartBadge || !cartItemCount || !cartSubtotal || !cartItemsContainer || !emptyCartMessage) {
        return;
    }

    const totalItems = getTotalItems(cart);
    const subtotal = getSubtotal(cart);

    cartBadge.textContent = totalItems;
    cartItemCount.textContent = `${totalItems} item${totalItems !== 1 ? 's' : ''}`;
    cartSubtotal.textContent = `₱${formatPrice(subtotal)}`;

    if (checkoutBtn) {
        if (cart.length === 0) {
            checkoutBtn.classList.add('disabled');
            checkoutBtn.setAttribute('aria-disabled', 'true');
        } else {
            checkoutBtn.classList.remove('disabled');
            checkoutBtn.setAttribute('aria-disabled', 'false');
        }
    }

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '';
        emptyCartMessage.style.display = 'block';
        return;
    }

    emptyCartMessage.style.display = 'none';

    cartItemsContainer.innerHTML = cart.map(item => `
        <div class="list-group-item px-4 py-4 border-bottom">
            <div class="d-flex align-items-start">
                <img src="${item.image}"
                     class="rounded-3 shadow-sm flex-shrink-0 me-3"
                     width="70"
                     height="70"
                     style="object-fit: cover;">

                <div class="flex-grow-1">
                    <h6 class="fw-bold mb-1">${item.name}</h6>
                    <small class="text-muted d-block mb-2">Collection: ${item.collection || 'General'}</small>
                    <div class="fw-bold small text-dark mb-2">₱${formatPrice(item.price)}</div>

                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm btn-outline-dark cart-decrease-btn" data-id="${item.id}">-</button>
                        <input type="number"
                               class="form-control form-control-sm text-center cart-qty-input"
                               data-id="${item.id}"
                               min="0"
                               max="${item.stock}"
                               value="${item.quantity}"
                               style="width: 70px;">
                        <button class="btn btn-sm btn-outline-dark cart-increase-btn" data-id="${item.id}">+</button>
                    </div>

                    <small class="text-muted d-block mt-2">Stock: ${item.stock}</small>
                </div>
            </div>
        </div>
    `).join('');
}

    document.addEventListener('click', function (event) {
        const addButton = event.target.closest('.add-to-cart-btn');
        if (addButton) {
            const card = addButton.closest('.product-card');
            if (!card) return;

            const product = JSON.parse(card.dataset.product || '{}');

            if (!product.stock || Number(product.stock) <= 0) {
                alert('This product is out of stock.');
                return;
            }

            addToCart(product);
            return;
        }

const decreaseButton = event.target.closest('.cart-decrease-btn');
if (decreaseButton) {
    const cart = getCart();
    const item = cart.find(i => Number(i.id) === Number(decreaseButton.dataset.id));
    if (!item) return;

    updateQuantity(item.id, item.quantity - 1);
    return;
}

        const increaseButton = event.target.closest('.cart-increase-btn');
        if (increaseButton) {
            const cart = getCart();
            const item = cart.find(i => Number(i.id) === Number(increaseButton.dataset.id));
            if (!item) return;

            if (item.quantity < item.stock) {
                updateQuantity(item.id, item.quantity + 1);
            }
        }
    });

    document.addEventListener('change', function (event) {
        if (event.target.classList.contains('cart-qty-input')) {
            updateQuantity(event.target.dataset.id, event.target.value);
        }
    });
document.addEventListener('cart:add', function (event) {
    const product = event.detail;

    if (!product || !product.stock || Number(product.stock) <= 0) {
        alert('This product is out of stock.');
        return;
    }

    document.addEventListener('click', function (event) {
    const checkoutBtn = event.target.closest('#checkoutBtn');

    if (checkoutBtn) {
        if (checkoutBtn.classList.contains('disabled')) {
            event.preventDefault();
            return;
        }

        const isLoggedIn = document.body.dataset.loggedIn === 'true';

        if (!isLoggedIn) {
            event.preventDefault();
            window.location.href = '/login';
        }
    }
});

    addToCart(product);
});
    renderCart();
});