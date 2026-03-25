document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('searchToggle');
    const form = document.getElementById('searchForm');
    const input = document.getElementById('searchInput');

    if (!toggle || !form || !input) return;

    form.classList.remove('search-form-active');
    form.classList.add('search-form-hidden');

    toggle.addEventListener('click', function (e) {
        e.preventDefault();

        const isOpen = form.classList.contains('search-form-active');

        if (isOpen) {
            form.classList.remove('search-form-active');
            form.classList.add('search-form-hidden');
        } else {
            form.classList.remove('search-form-hidden');
            form.classList.add('search-form-active');
            input.focus();
        }
    });

    document.addEventListener('click', function (e) {
        if (!form.contains(e.target) && !toggle.contains(e.target)) {
            form.classList.remove('search-form-active');
            form.classList.add('search-form-hidden');
        }
    });
});