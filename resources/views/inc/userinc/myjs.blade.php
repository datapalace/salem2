<script>
   // Place this in your scripts section or at the bottom of your Blade file
var swiper = new Swiper('.swiper-group-4', {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        1200: { slidesPerView: 4 },
        992: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 }
    }
});
</script>