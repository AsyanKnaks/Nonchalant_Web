document.addEventListener('DOMContentLoaded', function () {
    const filterToggle = document.getElementById('filterToggle');
    const filterDropdown = document.getElementById('filterDropdown');
    const sortSelect = document.getElementById('sortSelect');

    if (filterToggle && filterDropdown) {
        filterToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            filterDropdown.classList.toggle('show');
        });

        document.addEventListener('click', function (e) {
            if (!filterDropdown.contains(e.target) && !filterToggle.contains(e.target)) {
                filterDropdown.classList.remove('show');
            }
        });
    }

    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            const baseUrl = this.dataset.baseUrl || '/shop';
            const q = this.dataset.currentQ || '';
            const collection = this.dataset.currentCollection || '';
            const sort = this.value || '';

            const params = new URLSearchParams();

            if (q) params.set('q', q);
            if (collection) params.set('collection', collection);
            if (sort) params.set('sort', sort);

            window.location.href = `${baseUrl}?${params.toString()}`;
        });
    }
});