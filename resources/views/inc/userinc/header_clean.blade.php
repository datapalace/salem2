<!-- Query for products -->
@php
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
@endphp

<style>
/* Mobile Menu Working Styles - Clean Version */
.header {
    background: #fff;
    padding: 10px 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: relative;
    z-index: 1000;
}

.logo img {
    max-height: 50px;
}

.desktop-nav {
    gap: 30px;
}

.desktop-nav a {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    padding: 10px 15px;
    transition: color 0.3s;
}

.desktop-nav a:hover {
    color: #E2B808;
}

/* Mobile Menu Toggle */
.mobile-menu-toggle {
    display: flex;
    flex-direction: column;
    cursor: pointer;
    padding: 8px;
    background: #f8f9fa;
    border: 2px solid #E2B808;
    border-radius: 4px;
    z-index: 1001;
}

.mobile-menu-toggle span {
    width: 25px;
    height: 3px;
    background-color: #333;
    margin: 2px 0;
    transition: 0.3s;
    border-radius: 2px;
}

.mobile-menu-toggle.active span:nth-child(1) {
    transform: rotate(-45deg) translate(-5px, 6px);
}

.mobile-menu-toggle.active span:nth-child(2) {
    opacity: 0;
}

.mobile-menu-toggle.active span:nth-child(3) {
    transform: rotate(45deg) translate(-5px, -6px);
}

/* Mobile Menu Overlay */
.mobile-menu-overlay {
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

.mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* Mobile Menu Sidebar */
.mobile-menu-sidebar {
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

.mobile-menu-sidebar.active {
    left: 0;
}

.mobile-menu-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
    background: #f8f9fa;
}

.mobile-menu-close {
    cursor: pointer;
    font-size: 20px;
    color: #333;
    padding: 5px;
    background: transparent;
    border: none;
}

.mobile-menu-close:hover {
    color: #E2B808;
}

.mobile-menu-content {
    padding: 0;
}

.mobile-menu-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mobile-menu-item {
    border-bottom: 1px solid #f0f0f0;
}

.mobile-menu-link {
    display: block;
    padding: 15px 20px;
    color: #333;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
    position: relative;
}

.mobile-menu-link:hover {
    color: #E2B808;
    background: #f8f9fa;
    text-decoration: none;
}

.submenu-toggle {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    transition: transform 0.3s ease;
    font-size: 14px;
}

.has-submenu.active .submenu-toggle {
    transform: translateY(-50%) rotate(180deg);
}

.mobile-submenu {
    list-style: none;
    margin: 0;
    padding: 0;
    background: #f8f9fa;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.mobile-submenu.active {
    max-height: 500px;
}

.mobile-submenu li a {
    display: block;
    padding: 12px 20px 12px 40px;
    color: #555;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    border-bottom: 1px solid #e9ecef;
}

.mobile-submenu li:last-child a {
    border-bottom: none;
}

.mobile-submenu li a:hover {
    color: #E2B808;
    background: #fff;
    padding-left: 45px;
    text-decoration: none;
}

@media (min-width: 992px) {
    .mobile-menu-toggle {
        display: none !important;
    }
}
</style>

<!-- Working Mobile Menu Header -->
<div class="header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img width="70" alt="Salem Apparels Logo" src="{{asset('userasset/imgs/template/logo.png')}}"></a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav d-none d-lg-flex">
                <a href="/">Home</a>
                <a href="/shop">Shop</a>
                <a href="/about-us">About</a>
                <a href="/contact-us">Contact</a>
            </nav>

            <!-- Mobile Menu Toggle -->
            <div class="mobile-menu-toggle d-lg-none" id="mobileMenuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

<!-- Mobile Menu Sidebar -->
<div class="mobile-menu-sidebar" id="mobileMenuSidebar">
    <div class="mobile-menu-header">
        <div class="mobile-menu-logo">
            <strong style="color: #E2B808;">SALEM APPARELS</strong>
        </div>
        <button class="mobile-menu-close" id="mobileMenuClose">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <div class="mobile-menu-content">
        <nav class="mobile-nav">
            <ul class="mobile-menu-list">
                <li class="mobile-menu-item">
                    <a href="/" class="mobile-menu-link">
                        <i class="fa fa-home me-2"></i> Home
                    </a>
                </li>

                <li class="mobile-menu-item">
                    <a href="/shop" class="mobile-menu-link">
                        <i class="fa fa-shopping-cart me-2"></i> Shop
                    </a>
                </li>

                <li class="mobile-menu-item has-submenu">
                    <a href="#" class="mobile-menu-link">
                        <i class="fa fa-list me-2"></i> Categories
                        <i class="fa fa-chevron-down submenu-toggle"></i>
                    </a>
                    <ul class="mobile-submenu">
                        <li><a href="/shop/category/{{$shirt->type}}"><i class="fa fa-tshirt me-2"></i> T-Shirts</a></li>
                        <li><a href="/shop/category/{{$polo->type}}"><i class="fa fa-tshirt me-2"></i> Polo</a></li>
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

                <li class="mobile-menu-item has-submenu">
                    <a href="#" class="mobile-menu-link">
                        <i class="fa fa-user me-2"></i> My Account
                        <i class="fa fa-chevron-down submenu-toggle"></i>
                    </a>
                    <ul class="mobile-submenu">
                        <li><a href="/my-account"><i class="fa fa-user me-2"></i> My Profile</a></li>
                        <li><a href="/my-orders"><i class="fa fa-box me-2"></i> My Orders</a></li>
                        <li><a href="#"><i class="fa fa-cog me-2"></i> Settings</a></li>
                        <li><a href="/logout"><i class="fa fa-sign-out me-2"></i> Logout</a></li>
                    </ul>
                </li>

                <li class="mobile-menu-item">
                    <a href="/about-us" class="mobile-menu-link">
                        <i class="fa fa-info-circle me-2"></i> About Us
                    </a>
                </li>

                <li class="mobile-menu-item">
                    <a href="/contact-us" class="mobile-menu-link">
                        <i class="fa fa-envelope me-2"></i> Contact
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
// Clean Salem Mobile Menu Script
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const mobileMenuSidebar = document.getElementById('mobileMenuSidebar');
    const mobileMenuClose = document.getElementById('mobileMenuClose');

    function openMobileMenu() {
        mobileMenuToggle.classList.add('active');
        mobileMenuOverlay.classList.add('active');
        mobileMenuSidebar.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        mobileMenuToggle.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
        mobileMenuSidebar.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Event Listeners
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            openMobileMenu();
        });
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', function(e) {
            e.preventDefault();
            closeMobileMenu();
        });
    }

    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', function(e) {
            e.preventDefault();
            closeMobileMenu();
        });
    }

    // Submenu toggles
    const submenuItems = document.querySelectorAll('.has-submenu');
    submenuItems.forEach(function(item) {
        const link = item.querySelector('.mobile-menu-link');
        const submenu = item.querySelector('.mobile-submenu');

        if (link && submenu) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                item.classList.toggle('active');
                submenu.classList.toggle('active');
            });
        }
    });

    // Close menu when clicking direct links
    const directLinks = document.querySelectorAll('.mobile-menu-link[href]:not([href="#"])');
    directLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            closeMobileMenu();
        });
    });
});
</script>
