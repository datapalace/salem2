{{-- filepath: c:\xampp\htdocs\salem2\resources\views\inc\header.blade.php --}}

{{-- Desktop Header --}}
<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="/">
                        <img alt="Salem Apparels" src="{{ asset('userasset/imgs/template/logo.png') }}">
                    </a>
                </div>
                <div class="header-search">
                    <div class="box-header-search">
                        <form class="form-search" method="post" action="#">
                            <div class="box-category">
                                <select class="select-active">
                                    <option>All categories</option>
                                    <option value="Shirts">Shirts</option>
                                    <option value="Polos">Polo Shirts</option>
                                    <option value="Hoodies">Hoodies</option>
                                    <option value="Jackets">Jackets</option>
                                </select>
                            </div>
                            <div class="box-keysearch">
                                <input class="form-control font-xs" type="text" value="" placeholder="Search for products...">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li><a href="/">Home</a></li>
                            <li class="has-children">
                                <a href="/products">Products</a>
                                <ul class="sub-menu">
                                    <li><a href="/products/shirts">Shirts</a></li>
                                    <li><a href="/products/polos">Polo Shirts</a></li>
                                    <li><a href="/products/hoodies">Hoodies</a></li>
                                    <li><a href="/products/jackets">Jackets</a></li>
                                    <li><a href="/products">View All Products</a></li>
                                </ul>
                            </li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-shop">
                    <div class="d-inline-block box-dropdown-cart">
                        <span class="font-lg icon-list icon-account"><span>Account</span></span>
                        <div class="dropdown-account">
                            <ul>
                                <li><a href="/profile">My Account</a></li>
                                <li><a href="/orders">My Orders</a></li>
                                <li><a href="/wishlist">My Wishlist</a></li>
                                <li><a href="/settings">Settings</a></li>
                                <li><a href="/logout">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                    <a class="font-lg icon-list icon-wishlist" href="/wishlist">
                        <span>Wishlist</span>
                        <span class="number-item font-xs">3</span>
                    </a>
                    <div class="d-inline-block box-dropdown-cart">
                        <span class="font-lg icon-list icon-cart">
                            <span>Cart</span>
                            <span class="number-item font-xs">2</span>
                        </span>
                        <div class="dropdown-cart">
                            <div class="item-cart mb-20">
                                <div class="cart-image"><img src="{{ asset('userasset/imgs/products/product1.jpg') }}" alt="Product"></div>
                                <div class="cart-info">
                                    <a class="font-sm-bold color-brand-3" href="#">Custom T-Shirt Design</a>
                                    <p><span class="color-brand-2 font-sm-bold">1 x £25.99</span></p>
                                </div>
                            </div>
                            <div class="border-bottom pt-0 mb-15"></div>
                            <div class="cart-total">
                                <div class="row">
                                    <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Total</span></div>
                                    <div class="col-6"><span class="font-md-bold color-brand-1">£25.99</span></div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-6 text-start"><a class="btn btn-cart w-auto" href="/cart">View cart</a></div>
                                    <div class="col-6"><a class="btn btn-buy w-auto" href="/checkout">Checkout</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="font-lg icon-list icon-compare" href="/compare">
                        <span>Compare</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- Separate Mobile Header (this is the key!) --}}
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="mobile-logo">
                <a class="d-flex" href="/">
                    <img alt="Salem Apparels" src="{{ asset('userasset/imgs/template/logo.png') }}">
                </a>
            </div>
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav class="mt-15">
                        <ul class="mobile-menu font-heading">
                            <li><a href="/">Home</a></li>
                            <li><a href="/products">All Products</a></li>
                            <li><a href="/products/shirts">Shirts</a></li>
                            <li><a href="/products/polos">Polo Shirts</a></li>
                            <li><a href="/products/hoodies">Hoodies</a></li>
                            <li><a href="/products/jackets">Jackets</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <div class="mobile-header-top">
                        <div class="user-account">
                            <a href="/profile">
                                <img src="{{ asset('userasset/imgs/user/avatar.png') }}" alt="User">
                            </a>
                            <div class="content">
                                <h6 class="user-name">Hello<span class="text-brand"> User!</span></h6>
                                <p class="font-xs text-muted">Welcome to Salem Apparels</p>
                            </div>
                        </div>
                    </div>
                    <ul class="mobile-menu">
                        <li><a href="/profile">My Account</a></li>
                        <li><a href="/orders">Order Tracking</a></li>
                        <li><a href="/orders">My Orders</a></li>
                        <li><a href="/wishlist">My Wishlist</a></li>
                        <li><a href="/settings">Settings</a></li>
                        <li><a href="/logout">Sign out</a></li>
                    </ul>
                </div>
                <div class="mobile-banner">
                    <div class="bg-5 block-iphone">
                        <span class="color-brand-3 font-sm-lh32">Starting from £19.99</span>
                        <h3 class="font-xl mb-10">Custom Apparel</h3>
                        <p class="font-base color-brand-3 mb-10">Special Designs</p>
                        <a class="btn btn-arrow" href="/products">Shop Now</a>
                    </div>
                </div>
                <div class="site-copyright color-gray-400 mt-30">
                    Copyright 2024 &copy; Salem Apparels.<br>
                    Designed with <span style="color: red;">♥</span> for custom apparel
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Hide desktop header on mobile */
@media (max-width: 1199.98px) {
    .header .main-header .header-nav .nav-main-menu {
        display: none !important;
    }

    .burger-icon {
        display: block !important;
    }
}

/* Show desktop menu only on larger screens */
@media (min-width: 1200px) {
    .burger-icon {
        display: none !important;
    }

    .mobile-header-active {
        display: none !important;
    }
}

/* Mobile header initially hidden */
.mobile-header-active {
    position: fixed;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100vh;
    background: #fff;
    z-index: 9999;
    transition: all 0.3s ease;
}

/* Mobile header active state */
.mobile-header-active.sidebar-visible {
    left: 0;
}
</style>

<script>
$(document).ready(function() {
    // Mobile menu toggle
    $('.burger-icon').on('click', function() {
        $('.mobile-header-active').toggleClass('sidebar-visible');
        $('body').toggleClass('mobile-menu-open');
    });

    // Close mobile menu when clicking overlay
    $('.mobile-header-active').on('click', function(e) {
        if (e.target === this) {
            $('.mobile-header-active').removeClass('sidebar-visible');
            $('body').removeClass('mobile-menu-open');
        }
    });
});
</script>
