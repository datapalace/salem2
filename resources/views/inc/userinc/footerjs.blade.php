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
    const canvas = new fabric.Canvas('fabricCanvas');

    // Add some basic tools
    function addText() {
        const text = new fabric.Textbox('Enter text here', {
            left: 100,
            top: 100,
            width: 200,
            fontSize: 20
        });
        canvas.add(text);
        canvas.setActiveObject(text);
    }

    function addRectangle() {
        const rect = new fabric.Rect({
            left: 50,
            top: 50,
            fill: 'red',
            width: 100,
            height: 100
        });
        canvas.add(rect);
    }

    function removeSelected() {
        const activeObject = canvas.getActiveObject();
        if (activeObject) {
            canvas.remove(activeObject);
        }
    }

    function saveCanvasAsImage() {
        const dataURL = canvas.toDataURL({
            format: 'png'
        });

        // For testing: show result
        const img = new Image();
        img.src = dataURL;
        document.body.appendChild(img);

        // Optionally, send this image to the server with AJAX
    }
</script>
<script>
    const canvas = new fabric.Canvas('fabricCanvas');

    function setCanvasBackground(imageURL) {
        fabric.Image.fromURL(imageURL, function(img) {
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
                scaleX: canvas.width / img.width,
                scaleY: canvas.height / img.height
            });
        });
    }

    // Set initial background (first gallery image)
    const firstThumb = document.querySelector('.item-thumb img');
    if (firstThumb) {
        setCanvasBackground(firstThumb.dataset.url);
    }

    // Handle thumbnail clicks
    document.querySelectorAll('.item-thumb img').forEach(img => {
        img.addEventListener('click', function () {
            alert('Image URL: ' + this.dataset.url);
            const imageUrl = this.dataset.url;
            setCanvasBackground(imageUrl);
        });
    });
</script>


<script>
    let canvas;



    function setCanvasBackground(imageURL) {
        fabric.Image.fromURL(imageURL, function(img) {
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
                scaleX: canvas.width / img.width,
                scaleY: canvas.height / img.height
            });
        });
    }

    document.querySelectorAll('.thumb').forEach(img => {
        img.addEventListener('click', function () {
            setCanvasBackground(this.dataset.url);
        });
    });

    function addText() {
        const text = new fabric.IText('Your Text', {
            left: 50,
            top: 50,
            fontSize: 20,
            fill: '#000'
        });
        canvas.add(text);
    }

    function uploadLogo(input) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function (f) {
            fabric.Image.fromURL(f.target.result, function (img) {
                img.scaleToWidth(100);
                canvas.add(img);
            });
        };
        reader.readAsDataURL(file);
    }

    function removeSelected() {
        canvas.remove(canvas.getActiveObject());
    }

    function saveCanvasAsImage() {
        const link = document.createElement('a');
        link.href = canvas.toDataURL();
        link.download = 'custom-design.png';
        link.click();
    }
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
    // click .colo-watch on page load

</script>

  </body>
</html>
