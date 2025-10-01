{{-- Complete Header Component with Mobile Menu --}}
@php
// Product queries for categories
$shirt = DB::table('products')->where('type', 'T-shirt')->first();
$hood = DB::table('products')->where('type', 'Hood')->first();
$jacket = DB::table('products')->where('type', 'Jacket')->first();
$polo = DB::table('products')->where('type', 'Polo')->first();
$bag = DB::table('products')->where('type', 'Bag')->first();
$foot = DB::table('products')->where('type', 'Footwear')->first();
$accessory = DB::table('products')->where('type', 'Accessory')->first();
$towel = DB::table('products')->where('type', 'Towel')->first();
$trouser = DB::table('products')->where('type', 'Trousers')->first();
$apron = DB::table('products')->where('type', 'apron')->first();
$waist = DB::table('products')->where('type', 'Waistcoat')->first();

// Dynamic product collections for mega menus
$shirts = DB::table('products')->where('type', 'T-shirt')->get()->unique('brand')->unique('material')->unique('gender')->take(5);
$hoods = DB::table('products')->where('type', 'Hood')->get()->unique('brand')->unique('material')->unique('gender')->take(5);
$polos = DB::table('products')->where('type', 'Polo')->get()->unique('brand')->unique('material')->unique('gender')->take(5);
$sweats = DB::table('products')->where('type', 'Sweatshirt')->get()->unique('brand')->unique('material')->unique('gender')->take(5);
$jackets = DB::table('products')->where('type', 'Jacket')->get()->unique('brand')->unique('material')->unique('gender')->take(5);
$bags = DB::table('products')->where('type', 'Bag')->get()->unique('brand')->unique('material')->unique('gender')->take(5);
@endphp

<style>
{{-- Complete Header Styles --}}
/* === BASE HEADER STYLES === */
.salem-header {
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
    width: 100%;
}

.salem-header .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* === TOP HEADER SECTION === */
.salem-top-header {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.salem-header-main {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.salem-logo img {
    max-height: 60px;
    width: auto;
}

.salem-search-container {
    flex: 1;
    max-width: 50%;
    position: relative;
}

.salem-search-box {
    position: relative;
    width: 100%;
}

.salem-search-box input {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #E2B808;
    border-radius: 25px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
}

.salem-search-box input:focus {
    box-shadow: 0 0 0 0.2rem rgba(226, 184, 8, 0.25);
}

.salem-search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #eee;
    border-radius: 8px;
    max-height: 300px;
    overflow-y: auto;
    z-index: 1001;
    display: none;
}

/* === DESKTOP NAVIGATION === */
.salem-desktop-nav {
    display: flex;
    gap: 30px;
}

.salem-desktop-nav a {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    padding: 10px 15px;
    transition: color 0.3s;
    font-size: 16px;
}

.salem-desktop-nav a:hover {
    color: #E2B808;
    text-decoration: none;
}

/* === ACCOUNT DROPDOWN === */
.salem-account-dropdown {
    position: relative;
    display: inline-block;
}

.salem-account-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    background: #f8f9fa;
    border: 1px solid #E2B808;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
}

.salem-account-trigger:hover {
    background: #E2B808;
    color: #fff;
    text-decoration: none;
}

.salem-account-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background: #fff;
    border: 1px solid #eee;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    min-width: 200px;
    z-index: 1001;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

.salem-account-dropdown:hover .salem-account-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.salem-account-menu ul {
    list-style: none;
    margin: 0;
    padding: 10px 0;
}

.salem-account-menu li a {
    display: block;
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
    transition: all 0.3s;
}

.salem-account-menu li a:hover {
    background: #f8f9fa;
    color: #E2B808;
    text-decoration: none;
}

/* === MOBILE MENU TOGGLE === */
.salem-mobile-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
    padding: 8px;
    background: #f8f9fa;
    border: 2px solid #E2B808;
    border-radius: 4px;
    z-index: 1001;
}

.salem-mobile-toggle span {
    width: 25px;
    height: 3px;
    background-color: #333;
    margin: 2px 0;
    transition: 0.3s;
    border-radius: 2px;
}

.salem-mobile-toggle.active span:nth-child(1) {
    transform: rotate(-45deg) translate(-5px, 6px);
}

.salem-mobile-toggle.active span:nth-child(2) {
    opacity: 0;
}

.salem-mobile-toggle.active span:nth-child(3) {
    transform: rotate(45deg) translate(-5px, -6px);
}

/* === BOTTOM HEADER (MEGA MENU) === */
.salem-bottom-header {
    background: #E2B808;
    padding: 0;
}

.salem-mega-nav {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.salem-mega-nav > li {
    position: static;
}

.salem-mega-nav > li > a {
    display: block;
    padding: 15px 20px;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
}

.salem-mega-nav > li > a:hover {
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}

/* === MEGA DROPDOWN STYLES === */
.salem-mega-dropdown {
    position: fixed;
    top: 100px; /* Adjust based on your header height */
    left: 50%;
    transform: translateX(-50%);
    width: 90vw;
    max-width: 1200px;
    background: #fff;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    z-index: 1000;
    padding: 30px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    border-radius: 8px;
}

.salem-mega-nav > li:hover .salem-mega-dropdown {
    opacity: 1;
    visibility: visible;
}

.salem-mega-row {
    display: grid;
    grid-template-columns: 200px 1fr 1fr 1fr;
    gap: 30px;
    align-items: start;
}

.salem-mega-column h3 {
    margin-bottom: 15px;
    font-size: 18px;
    color: #333;
    padding-bottom: 8px;
    border-bottom: 2px solid #E2B808;
    display: flex;
    align-items: center;
    gap: 8px;
}

.salem-mega-column h3 i {
    color: #E2B808;
}

.salem-mega-links a {
    display: block;
    padding: 8px 0;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}

.salem-mega-links a:hover {
    color: #E2B808;
    padding-left: 10px;
    text-decoration: none;
}

.salem-mega-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

/* === MOBILE MENU STYLES === */
.salem-mobile-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.salem-mobile-overlay.active {
    opacity: 1;
    visibility: visible;
}

.salem-mobile-sidebar {
    position: fixed;
    top: 0;
    left: -320px;
    width: 320px;
    height: 100vh;
    background: #fff;
    z-index: 9999;
    transition: left 0.3s ease;
    overflow-y: auto;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

.salem-mobile-sidebar.active {
    left: 0;
}

.salem-mobile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
    background: #f8f9fa;
}

.salem-mobile-close {
    cursor: pointer;
    font-size: 20px;
    color: #333;
    padding: 5px;
    background: transparent;
    border: none;
}

.salem-mobile-close:hover {
    color: #E2B808;
}

.salem-mobile-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.salem-mobile-item {
    border-bottom: 1px solid #f0f0f0;
}

.salem-mobile-link {
    display: block;
    padding: 15px 20px;
    color: #333;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
    position: relative;
}

.salem-mobile-link:hover {
    color: #E2B808;
    background: #f8f9fa;
    text-decoration: none;
}

.salem-submenu-toggle {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    transition: transform 0.3s ease;
    font-size: 14px;
}

.salem-mobile-item.active .salem-submenu-toggle {
    transform: translateY(-50%) rotate(180deg);
}

.salem-mobile-submenu {
    list-style: none;
    margin: 0;
    padding: 0;
    background: #f8f9fa;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.salem-mobile-submenu.active {
    max-height: 500px;
}

.salem-mobile-submenu li a {
    display: block;
    padding: 12px 20px 12px 40px;
    color: #555;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    border-bottom: 1px solid #e9ecef;
}

.salem-mobile-submenu li:last-child a {
    border-bottom: none;
}

.salem-mobile-submenu li a:hover {
    color: #E2B808;
    background: #fff;
    padding-left: 45px;
    text-decoration: none;
}

/* === RESPONSIVE STYLES === */
@media (max-width: 1199.98px) {
    .salem-bottom-header {
        display: none;
    }
}

@media (max-width: 991.98px) {
    .salem-mobile-toggle {
        display: flex;
    }

    .salem-desktop-nav {
        display: none;
    }

    .salem-account-dropdown {
        display: none;
    }

    .salem-search-container {
        max-width: 60%;
    }
}

@media (max-width: 767.98px) {
    .salem-logo img {
        max-height: 45px;
    }

    .salem-search-container {
        max-width: 50%;
    }

    .salem-search-box input {
        padding: 10px 15px;
        font-size: 14px;
    }
}

@media (max-width: 575.98px) {
    .salem-search-container {
        display: none;
    }

    .salem-header-main {
        justify-content: space-between;
    }
}
</style>

{{-- Main Header Structure --}}
<header class="salem-header">
    {{-- Top Header Section --}}
    <div class="salem-top-header">
        <div class="container">
            <div class="salem-header-main">
                {{-- Logo --}}
                <div class="salem-logo">
                    <a href="/">
                        <img src="{{asset('userasset/imgs/template/logo.png')}}" alt="Salem Apparel Logo">
                    </a>
                </div>

                {{-- Search Bar --}}
                <div class="salem-search-container">
                    <div class="salem-search-box">
                        <input type="text" id="salemLiveSearch" placeholder="Search for items..." autocomplete="off">
                        <div id="salemSearchResults" class="salem-search-results"></div>
                    </div>
                </div>

                {{-- Desktop Navigation --}}
                <nav class="salem-desktop-nav d-none d-lg-flex">
                    <a href="/">Home</a>
                    <a href="/shop">Shop</a>
                    <a href="/about-us">About</a>
                    <a href="/contact-us">Contact</a>
                </nav>

                {{-- Account Dropdown (Desktop) --}}
                <div class="salem-account-dropdown d-none d-lg-block">
                    <a href="#" class="salem-account-trigger">
                        <i class="fa fa-user"></i>
                        <span>Account</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <div class="salem-account-menu">
                        <ul>
                            @auth
                                <li><a href="/my-account"><i class="fa fa-user me-2"></i> My Profile</a></li>
                                <li><a href="/my-orders"><i class="fa fa-box me-2"></i> My Orders</a></li>
                                <li><a href="#"><i class="fa fa-cog me-2"></i> Settings</a></li>
                                <li><a href="/logout"><i class="fa fa-sign-out me-2"></i> Logout</a></li>
                            @else
                                <li><a href="/login"><i class="fa fa-sign-in me-2"></i> Login</a></li>
                                <li><a href="/register"><i class="fa fa-user-plus me-2"></i> Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>

                {{-- Mobile Menu Toggle --}}
                <div class="salem-mobile-toggle d-lg-none" id="salemMobileToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Header (Mega Menu) - Desktop Only --}}
    <div class="salem-bottom-header d-none d-xl-block">
        <div class="container">
            <nav>
                <ul class="salem-mega-nav">
                    {{-- Shop By Categories --}}
                    <li>
                        <a href="#">Shop By Categories</a>
                        <div class="salem-mega-dropdown">
                            <div class="salem-mega-row">
                                <div class="salem-mega-image">
                                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}" alt="Salem Apparel">
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-tshirt"></i> Clothing</h3>
                                    <div class="salem-mega-links">
                                        <a href="/shop/category/{{$shirt->type}}">T-Shirts</a>
                                        <a href="/shop/category/{{$polo->type}}">Polo Shirts</a>
                                        <a href="/shop/category/{{$hood->type}}">Hoodies</a>
                                        <a href="/shop/category/{{$jacket->type}}">Jackets</a>
                                    </div>
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-gem"></i> Accessories</h3>
                                    <div class="salem-mega-links">
                                        <a href="/shop/category/{{$accessory->type}}">Accessories</a>
                                        <a href="/shop/category/{{$foot->type}}">Footwears</a>
                                        <a href="/shop/category/{{$towel->type}}">Towels</a>
                                        <a href="/shop/category/{{$bag->type}}">Bags</a>
                                    </div>
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-vest"></i> Wears</h3>
                                    <div class="salem-mega-links">
                                        <a href="/shop/category/{{$trouser->type}}">Trousers</a>
                                        <a href="/shop/category/{{$apron->type}}">Aprons</a>
                                        <a href="/shop/category/{{$waist->type}}">Waistwears</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- T-Shirts --}}
                    <li>
                        <a href="/shop/category/{{$shirt->type}}">T-Shirts</a>
                        <div class="salem-mega-dropdown">
                            <div class="salem-mega-row">
                                <div class="salem-mega-image">
                                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}" alt="T-Shirts">
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-tag"></i> Brands</h3>
                                    <div class="salem-mega-links">
                                        @foreach($shirts->take(4) as $item)
                                            <a href="/shop/category/shirt/brand/{{$item->brand}}">{{$item->brand}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-user"></i> Gender</h3>
                                    <div class="salem-mega-links">
                                        @foreach($shirts->unique('gender')->take(3) as $item)
                                            <a href="/shop/category/shirt/gender/{{$item->gender}}">{{$item->gender}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-fabric"></i> Materials</h3>
                                    <div class="salem-mega-links">
                                        @foreach($shirts->unique('material')->take(4) as $item)
                                            <a href="/shop/category/shirt/material/{{$item->material}}">{{$item->material}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Hoodies --}}
                    <li>
                        <a href="/shop/category/{{$hood->type}}">Hoodies</a>
                        <div class="salem-mega-dropdown">
                            <div class="salem-mega-row">
                                <div class="salem-mega-image">
                                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}" alt="Hoodies">
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-tag"></i> Brands</h3>
                                    <div class="salem-mega-links">
                                        @foreach($hoods->take(4) as $item)
                                            <a href="/shop/category/hood/brand/{{$item->brand}}">{{$item->brand}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-user"></i> Gender</h3>
                                    <div class="salem-mega-links">
                                        @foreach($hoods->unique('gender')->take(3) as $item)
                                            <a href="/shop/category/hood/gender/{{$item->gender}}">{{$item->gender}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="salem-mega-column">
                                    <h3><i class="fa fa-fabric"></i> Materials</h3>
                                    <div class="salem-mega-links">
                                        @foreach($hoods->unique('material')->take(4) as $item)
                                            <a href="/shop/category/hood/material/{{$item->material}}">{{$item->material}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Polo Shirts --}}
                    <li>
                        <a href="/shop/category/{{$polo->type}}">Polo Shirts</a>
                    </li>

                    {{-- Jackets --}}
                    <li>
                        <a href="/shop/category/{{$jacket->type}}">Jackets</a>
                    </li>

                    {{-- Bags --}}
                    <li>
                        <a href="/shop/category/{{$bag->type}}">Bags</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

{{-- Mobile Menu Components --}}
<div class="salem-mobile-overlay" id="salemMobileOverlay"></div>

<div class="salem-mobile-sidebar" id="salemMobileSidebar">
    <div class="salem-mobile-header">
        <div class="salem-mobile-logo">
            <strong style="color: #E2B808;">Salem Apparel</strong>
        </div>
        <button class="salem-mobile-close" id="salemMobileClose">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <div class="salem-mobile-content">
        <nav>
            <ul class="salem-mobile-menu">
                <li class="salem-mobile-item">
                    <a href="/" class="salem-mobile-link">
                        <i class="fa fa-home me-2"></i> Home
                    </a>
                </li>

                <li class="salem-mobile-item">
                    <a href="/shop" class="salem-mobile-link">
                        <i class="fa fa-shopping-cart me-2"></i> Shop
                    </a>
                </li>

                <li class="salem-mobile-item salem-has-submenu">
                    <a href="#" class="salem-mobile-link">
                        <i class="fa fa-list me-2"></i> Categories
                        <i class="fa fa-chevron-down salem-submenu-toggle"></i>
                    </a>
                    <ul class="salem-mobile-submenu">
                        <li><a href="/shop/category/{{$shirt->type}}"><i class="fa fa-tshirt me-2"></i> T-Shirts</a></li>
                        <li><a href="/shop/category/{{$polo->type}}"><i class="fa fa-tshirt me-2"></i> Polo Shirts</a></li>
                        <li><a href="/shop/category/{{$hood->type}}"><i class="fa fa-hoodie me-2"></i> Hoodies</a></li>
                        <li><a href="/shop/category/{{$jacket->type}}"><i class="fa fa-jacket me-2"></i> Jackets</a></li>
                        <li><a href="/shop/category/{{$accessory->type}}"><i class="fa fa-gem me-2"></i> Accessories</a></li>
                        <li><a href="/shop/category/{{$foot->type}}"><i class="fa fa-shoe-prints me-2"></i> Footwears</a></li>
                        <li><a href="/shop/category/{{$towel->type}}"><i class="fa fa-bath me-2"></i> Towels</a></li>
                        <li><a href="/shop/category/{{$bag->type}}"><i class="fa fa-bag-shopping me-2"></i> Bags</a></li>
                        <li><a href="/shop/category/{{$trouser->type}}"><i class="fa fa-pants me-2"></i> Trousers</a></li>
                        <li><a href="/shop/category/{{$apron->type}}"><i class="fa fa-apron me-2"></i> Aprons</a></li>
                        <li><a href="/shop/category/{{$waist->type}}"><i class="fa fa-vest me-2"></i> Waistwears</a></li>
                    </ul>
                </li>

                <li class="salem-mobile-item salem-has-submenu">
                    <a href="#" class="salem-mobile-link">
                        <i class="fa fa-user me-2"></i> My Account
                        <i class="fa fa-chevron-down salem-submenu-toggle"></i>
                    </a>
                    <ul class="salem-mobile-submenu">
                        @auth
                            <li><a href="/my-account"><i class="fa fa-user me-2"></i> My Profile</a></li>
                            <li><a href="/my-orders"><i class="fa fa-box me-2"></i> My Orders</a></li>
                            <li><a href="#"><i class="fa fa-cog me-2"></i> Settings</a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out me-2"></i> Logout</a></li>
                        @else
                            <li><a href="/login"><i class="fa fa-sign-in me-2"></i> Login</a></li>
                            <li><a href="/register"><i class="fa fa-user-plus me-2"></i> Register</a></li>
                        @endauth
                    </ul>
                </li>

                <li class="salem-mobile-item">
                    <a href="/about-us" class="salem-mobile-link">
                        <i class="fa fa-info-circle me-2"></i> About Us
                    </a>
                </li>

                <li class="salem-mobile-item">
                    <a href="/contact-us" class="salem-mobile-link">
                        <i class="fa fa-envelope me-2"></i> Contact
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
{{-- Salem Complete Header JavaScript --}}
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Elements
    const mobileToggle = document.getElementById('salemMobileToggle');
    const mobileOverlay = document.getElementById('salemMobileOverlay');
    const mobileSidebar = document.getElementById('salemMobileSidebar');
    const mobileClose = document.getElementById('salemMobileClose');

    // Mobile Menu Functions
    function openMobileMenu() {
        mobileToggle.classList.add('active');
        mobileOverlay.classList.add('active');
        mobileSidebar.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        mobileToggle.classList.remove('active');
        mobileOverlay.classList.remove('active');
        mobileSidebar.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Mobile Menu Event Listeners
    if (mobileToggle) {
        mobileToggle.addEventListener('click', function(e) {
            e.preventDefault();
            openMobileMenu();
        });
    }

    if (mobileClose) {
        mobileClose.addEventListener('click', function(e) {
            e.preventDefault();
            closeMobileMenu();
        });
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', function(e) {
            e.preventDefault();
            closeMobileMenu();
        });
    }

    // Mobile Submenu Toggles
    const submenuItems = document.querySelectorAll('.salem-has-submenu');
    submenuItems.forEach(function(item) {
        const link = item.querySelector('.salem-mobile-link');
        const submenu = item.querySelector('.salem-mobile-submenu');

        if (link && submenu) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                item.classList.toggle('active');
                submenu.classList.toggle('active');
            });
        }
    });

    // Close mobile menu when clicking direct links
    const directLinks = document.querySelectorAll('.salem-mobile-link[href]:not([href="#"])');
    directLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            closeMobileMenu();
        });
    });

    // Search functionality (basic implementation)
    const searchInput = document.getElementById('salemLiveSearch');
    const searchResults = document.getElementById('salemSearchResults');

    if (searchInput && searchResults) {
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();

            if (query.length > 2) {
                // Show search results container
                searchResults.style.display = 'block';
                searchResults.innerHTML = '<div style="padding: 15px; color: #666;">Searching...</div>';

                // You can implement actual search functionality here
                // For now, this is just a placeholder
                setTimeout(() => {
                    searchResults.innerHTML = '<div style="padding: 15px; color: #666;">No results found for "' + query + '"</div>';
                }, 500);
            } else {
                searchResults.style.display = 'none';
            }
        });

        // Hide search results when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });
    }

    console.log('Salem Complete Header initialized successfully');
});
</script>
