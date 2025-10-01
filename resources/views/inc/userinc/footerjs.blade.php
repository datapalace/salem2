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
    <!-- TEMPORARILY DISABLED - Testing mobile menu
    <script src="{{ asset ('userasset/js/main.js?v=3.0.0') }}"></script>
    <script src="{{ asset ('userasset/js/shop.js?v=1.2.1') }}"></script>
    -->

    <!-- Ensure Bootstrap components are properly initialized -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Debug: Check if Bootstrap is loaded
        console.log('Bootstrap loaded:', typeof bootstrap !== 'undefined');
        console.log('jQuery loaded:', typeof $ !== 'undefined');

        // Initialize Bootstrap tooltips and popovers if they exist
        if (typeof bootstrap !== 'undefined') {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Initialize popovers
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });

            // Debug: Check accordion functionality
            const accordionButtons = document.querySelectorAll('#mobileMenuAccordion .accordion-button');
            console.log('Found accordion buttons:', accordionButtons.length);

            accordionButtons.forEach(function(button, index) {
                button.addEventListener('click', function() {
                    console.log('Accordion button clicked:', index, this.textContent.trim());
                });
            });
        } else {
            console.error('Bootstrap not loaded! Mobile menu accordions will not work.');
        }
    });
    </script>

    <!-- Footer Links Orange Hover Styling -->
    <style>
    /* Footer Links Orange Hover Effect - Simple Color Change Only */
    .footer .menu-footer li a:hover {
        color: #E2B808 !important;
    }

    .footer .icon-socials:hover {
        color: #E2B808 !important;
    }

    .footer .icon-socials:hover span {
        color: #E2B808 !important;
    }
    </style>
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
        clearTimeout(debounceTimer);

        const query = this.value.trim();

        debounceTimer = setTimeout(() => {
            if (query.length < 2) {
                resultsBox.style.display = 'none';
                resultsBox.innerHTML = '';
                return;
            }

            // Show "Please wait..." while searching
            resultsBox.innerHTML = '<div class="p-2 text-muted">Please wait...</div>';
            resultsBox.style.display = 'block';

            fetch(`/search-products?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        resultsBox.innerHTML = '<div class="p-2 text-muted">No products found.</div>';
                    } else {
                        resultsBox.innerHTML = data.map(product => `
                            <a href="/product/customise/${product.slug}" class="d-flex align-items-center p-2 border-bottom text-decoration-none text-dark search-result-item" style="transition: background 0.2s;">
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
        }, 1000);
    });

    // Hide results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
            resultsBox.style.display = 'none';
        }
    });
});
</script>
<script>
// Fabric.js Canvas Scripts - Wrapped to avoid conflicts
(function() {
    // Only initialize canvas if the fabricCanvas element exists
    if (document.getElementById('fabricCanvas')) {
        const fabricCanvas = new fabric.Canvas('fabricCanvas');

        // Add some basic tools
        window.addText = function() {
            const text = new fabric.Textbox('Enter text here', {
                left: 100,
                top: 100,
                width: 200,
                fontSize: 20
            });
            fabricCanvas.add(text);
            fabricCanvas.setActiveObject(text);
        }

        window.addRectangle = function() {
            const rect = new fabric.Rect({
                left: 50,
                top: 50,
                fill: 'red',
                width: 100,
                height: 100
            });
            fabricCanvas.add(rect);
        }

        window.removeSelected = function() {
            const activeObject = fabricCanvas.getActiveObject();
            if (activeObject) {
                fabricCanvas.remove(activeObject);
            }
        }

        window.saveCanvasAsImage = function() {
            const dataURL = fabricCanvas.toDataURL({
                format: 'png'
            });

            // For testing: show result
            const img = new Image();
            img.src = dataURL;
            document.body.appendChild(img);

            // Optionally, send this image to the server with AJAX
        }

        window.setCanvasBackground = function(imageURL) {
            fabric.Image.fromURL(imageURL, function(img) {
                fabricCanvas.setBackgroundImage(img, fabricCanvas.renderAll.bind(fabricCanvas), {
                    scaleX: fabricCanvas.width / img.width,
                    scaleY: fabricCanvas.height / img.height
                });
            });
        }

        // Set initial background (first gallery image)
        const firstThumb = document.querySelector('.item-thumb img');
        if (firstThumb) {
            window.setCanvasBackground(firstThumb.dataset.url);
        }

        // Handle thumbnail clicks
        document.querySelectorAll('.item-thumb img').forEach(img => {
            img.addEventListener('click', function () {
                const imageUrl = this.dataset.url;
                window.setCanvasBackground(imageUrl);
            });
        });

        // Handle thumb clicks
        document.querySelectorAll('.thumb').forEach(img => {
            img.addEventListener('click', function () {
                window.setCanvasBackground(this.dataset.url);
            });
        });

        window.uploadLogo = function(input) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function (f) {
                fabric.Image.fromURL(f.target.result, function (img) {
                    img.scaleToWidth(100);
                    fabricCanvas.add(img);
                });
            };
            reader.readAsDataURL(file);
        }
    }
})();
</script>
<script>
    var swiper = new Swiper('.swiper-horizontal-logos', {
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 3000, // Control how fast it scrolls
        spaceBetween: 30,
        freeMode: true,
        freeModeMomentum: false,
        grabCursor: true,
        slidesPerView: 1, // Default for small screens
        breakpoints: {
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 6,
            }
        }
    });
</script>
<script>
// Stripe integration - only run if card element exists
document.addEventListener('DOMContentLoaded', async function () {
    const cardElement = document.getElementById('card-element');
    if (!cardElement) return; // Exit if not on checkout page

    try {
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        // Fetch client secret from backend
        let clientSecret = '';
        await fetch('{{ route('checkout.stripe.intent') }}', {method: 'POST', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}})
            .then(res => res.json())
            .then(data => { clientSecret = data.clientSecret; })
            .catch(err => console.log('Stripe intent error:', err));

        // Handle form submission
        const form = document.getElementById('stripePaymentForm');
        const checkoutform = document.getElementById('checkOutForm');

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                // Validate checkout form before payment
                if (checkoutform && !checkoutform.checkValidity()) {
                    checkoutform.reportValidity();
                    return;
                }

                const payBtn = document.getElementById('payBtn');
                if (payBtn) payBtn.disabled = true;

                const {paymentIntent, error} = await stripe.confirmCardPayment(clientSecret, {
                    payment_method: { card: card }
                });

                if (error) {
                    const errorElement = document.getElementById('card-errors');
                    if (errorElement) errorElement.textContent = error.message;
                    if (payBtn) payBtn.disabled = false;
                } else if (paymentIntent && paymentIntent.status === 'succeeded') {
                    // Submit the form to finalize order
                    const paymentRef = document.getElementById('stripePaymentRef');
                    if (paymentRef) paymentRef.value = paymentIntent.id;
                    if (checkoutform) checkoutform.submit();
                }
            });
        }
    } catch (error) {
        console.log('Stripe initialization error:', error);
    }
});
</script>

<!-- DISABLED jQuery Modal Script - Was causing mobile menu issues
<script>
$(document).ready(function() {
    // 1. Add the modal HTML to your page (once, outside any loop)
    $('body').append(`

    `);

    // 2. Add a button to open the modal in your customizer toolbar (add this to your toolbar HTML)
    $('#customCanvasToolbar').append(`
      <button type="button" id="openServerImageModals" class="btn btn-outline-secondary btn-sm mb-1">Add from Gallery</button>
    `);

    // 3. Show the modal when the button is clicked
    $(document).on('click', '#openServerImageModal', function() {
        $('#serverImageModal').modal('show');
    });
});
</script>
-->
  </body>
</html>
