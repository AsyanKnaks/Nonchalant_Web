class ProductModal {
    constructor() {
        document.addEventListener('DOMContentLoaded', () => {
            this.modalElement = document.getElementById('productModal');
            if (!this.modalElement) return;

            this.modal = new bootstrap.Modal(this.modalElement);
            this.bindEvents();
        });
    }

    bindEvents() {
        const cards = document.querySelectorAll('.product-card');

        cards.forEach(card => {
            card.addEventListener('click', (e) => {
                if (e.target.closest('button')) return;

                const product = JSON.parse(card.dataset.product);
                this.loadProduct(product);
                this.modal.show();
            });
        });

        const modalAddToCartBtn = document.getElementById('modalAddToCartBtn');
        if (modalAddToCartBtn) {
            modalAddToCartBtn.addEventListener('click', () => {
                if (!this.currentProduct) return;

                const event = new CustomEvent('cart:add', {
                    detail: this.currentProduct
                });

                document.dispatchEvent(event);
                this.modal.hide();
            });
        }
    }

    loadProduct(product) {
        this.currentProduct = product;

        document.getElementById('productMainImage').src = product.image || '';
        document.getElementById('productMainImage').alt = product.name || '';
        document.getElementById('productName').textContent = product.name || '';
        document.getElementById('productPrice').textContent = `₱${parseFloat(product.price || 0).toFixed(2)}`;

        const descriptionEl = document.getElementById('productDescription');
        if (descriptionEl) {
            descriptionEl.textContent = product.description || 'No description available.';
        }

        const collectionEl = document.getElementById('productCollection');
        if (collectionEl) {
            collectionEl.textContent = product.collection || 'General';
        }

        const collectionDetailsEl = document.getElementById('productCollectionDetails');
        if (collectionDetailsEl) {
            collectionDetailsEl.textContent = product.collection || 'General';
        }

        const stockEl = document.getElementById('productStock');
        if (stockEl) {
            stockEl.textContent = `${product.stock || 0} items available`;
        }

        const stockDetailsEl = document.getElementById('productStockDetails');
        if (stockDetailsEl) {
            stockDetailsEl.textContent = product.stock || 0;
        }
    }
}

new ProductModal();