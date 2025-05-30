 <script src="{{ asset ('userasset/js/vendors/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/waypoints.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/wow.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/magnific-popup.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/isotope.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/scrollup.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/noUISlider.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/slider.js') }}"></script>
    <!-- Count down-->
    <script src="{{ asset ('userasset/js/vendors/counterup.js') }}"></script>
    <script src="{{ asset ('userasset/js/vendors/jquery.countdown.min.js') }}"></script>
    <!-- Count down--><script src="{{ asset ('userasset/js/vendors/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset ('userasset/js/vendors/slick.js') }}"></script>
    <script src="{{ asset ('userasset/js/main.js?v=3.0.0') }}"></script>
    <script src="{{ asset ('userasset/js/shop.js?v=1.2.1') }}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.swiper-testimonial', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },
        });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('live-search');
    const resultsBox = document.getElementById('search-results');
    let debounceTimer;

    searchInput.addEventListener('input', function () {
        clearTimeout(debounceTimer); // clear the last timer

        const query = this.value.trim();

        debounceTimer = setTimeout(() => {
            if (query.length < 2) {
                resultsBox.style.display = 'none';
                resultsBox.innerHTML = '';
                return;
            }

            fetch(`/search-products?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        resultsBox.innerHTML = '<div class="p-2 text-muted">No products found.</div>';
                    } else {
                        resultsBox.innerHTML = data.map(product => `
                            <a href="/product/${product.id}" class="d-flex align-items-center p-2 border-bottom text-decoration-none text-dark search-result-item" style="transition: background 0.2s;">
                                <img src="${product.image_url ? product.image_url : '/userasset/imgs/template/logo.png'}" alt="${product.title}" style="width:48px;height:48px;object-fit:cover;border-radius:6px;box-shadow:0 2px 8px rgba(0,0,0,0.07);margin-right:14px;">
                                <div class="flex-grow-1">
                                    <div style="font-weight:600;font-size:15px;">${product.title}</div>
                                    <div style="font-size:13px;color:#888;">SKU: ${product.sku}</div>
                                </div>
                            </a>
                        `).join('');
                    }
                    resultsBox.style.display = 'block';
                });
        }, 3000); // Wait 3 seconds after typing stops
    });

    // Hide results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
            resultsBox.style.display = 'none';
        }
    });
});
</script>

  </body>
</html>
