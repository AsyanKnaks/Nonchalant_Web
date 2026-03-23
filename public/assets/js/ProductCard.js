// ProductCard.js
class ProductModal {
    constructor() {
        this.init();
    }
    
    init() {
        document.addEventListener('DOMContentLoaded', () => {
            this.bindEvents();
        });
    }
    
    bindEvents() {
        const cards = document.querySelectorAll('.product-card');
        const modal = new bootstrap.Modal(document.getElementById('productModal'));
        
        cards.forEach(card => {
            card.addEventListener('click', (e) => {
                if (e.target.closest('button')) return;
                const product = JSON.parse(card.dataset.product);
                this.loadProduct(product);
                modal.show();
            });
        });
    }
    
    loadProduct(product) {
        // Same modal loading logic as before...
        // (Copy from previous JavaScript)
    }
}

new ProductModal();