{{-- Professional Ludus-Style Header Component --}}
@php
// Product queries for categories with null checks
$categories = [
    'T-shirt' => DB::table('products')->where('type', 'T-shirt')->take(6)->get(),
    'Hood' => DB::table('products')->where('type', 'Hood')->take(6)->get(),
    'Jacket' => DB::table('products')->where('type', 'Jacket')->take(6)->get(),
    'Polo' => DB::table('products')->where('type', 'Polo')->take(6)->get(),
    'Sweatshirt' => DB::table('products')->where('type', 'Sweatshirt')->take(6)->get(),
    'Bag' => DB::table('products')->where('type', 'Bag')->take(6)->get(),
    'Footwear' => DB::table('products')->where('type', 'Footwear')->take(6)->get(),
    'Accessory' => DB::table('products')->where('type', 'Accessory')->take(6)->get(),
];

$allCategories = DB::table('products')->select('type')->distinct()->get();
@endphp
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
@php
          $shirts = DB::table('products')
          ->where('type', 'T-shirt')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5
@endphp
 @php
          $hoods = DB::table('products')
          ->where('type', 'Hood')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5
@endphp
    @php
            $jackets = DB::table('products')
            ->where('type', 'Jacket')
            ->get() // Get all T-shirts first
            ->unique('brand') // Filter to unique brands
            ->unique('material') // Ensure unique material
            ->unique('gender') // Ensure unique gender
            ->take(5); // Then take 5
@endphp
    @php
            $polos = DB::table('products')
            ->where('type', 'Polo')
            ->get() // Get all T-shirts first
            ->unique('brand') // Filter to unique brands
            ->unique('material') // Ensure unique material
            ->unique('gender') // Ensure unique gender
            ->take(5); // Then take 5
@endphp
    @php
            $bags = DB::table('products')
            ->where('type', 'Bag')
            ->get() // Get all T-shirts first
            ->unique('brand') // Filter to unique brands
            ->unique('material') // Ensure unique material
            ->unique('gender') // Ensure unique gender
            ->take(5); // Then take 5
@endphp

<style>
/* Professional Ludus-Style Header Styles */
:root {
  --primary-color: #1a1a1a;
  --secondary-color: #E2B808;
  --text-light: #6c757d;
  --border-light: #e9ecef;
}

/* Header Base Styles */
.ludus-header {
  background: white;
  box-shadow: 0 2px 20px rgba(0,0,0,0.08);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.ludus-main-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 0;
}

.ludus-header-left {
  display: flex;
  align-items: center;
  gap: 40px;
}

.ludus-header-right {
  display: flex;
  align-items: center;
  gap: 30px;
}

/* Logo Styles */
.ludus-logo {
  flex-shrink: 0;
}

.ludus-logo img {
  height: 50px;
  width: auto;
}

/* Navigation Styles */
.ludus-menu-item {
  position: relative;
  list-style: none;
}

.ludus-main-menu {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
  gap: 30px;
}

.ludus-nav-link {
  display: block;
  padding: 12px 0;
  color: var(--primary-color);
  text-decoration: none;
  font-weight: 500;
  font-size: 15px;
  transition: all 0.3s ease;
  position: relative;
}

.ludus-nav-link:hover {
  color: var(--secondary-color);
  text-decoration: none;
}

.ludus-nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--secondary-color);
  transition: width 0.3s ease;
}

.ludus-nav-link:hover::after {
  width: 100%;
}

/* Submenu Styles */
.ludus-submenu {
  position: absolute;
  top: 100%;
  left: 0;
  background: white;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  border-radius: 8px;
  padding: 15px 0;
  min-width: 200px;
  opacity: 0;
  visibility: hidden;
  transform: translateY(10px);
  transition: all 0.3s ease;
  list-style: none;
  margin: 0;
}

.ludus-has-children:hover .ludus-submenu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.ludus-submenu li {
  padding: 0;
}

.ludus-submenu a {
  display: block;
  padding: 10px 20px;
  color: var(--primary-color);
  text-decoration: none;
  font-size: 14px;
  transition: all 0.3s ease;
}

.ludus-submenu a:hover {
  background: var(--secondary-color);
  color: white;
  text-decoration: none;
}

/* Mega Menu Styles */
.ludus-mega-menu {
  position: absolute;
  top: 100%;
  left: 0;
  background: white;
  box-shadow: 0 15px 50px rgba(0,0,0,0.1);
  border-radius: 12px;
  width: 800px;
  opacity: 0;
  visibility: hidden;
  transform: translateY(10px);
  transition: all 0.4s ease;
  z-index: 1000;
}

.ludus-mega-dropdown:hover .ludus-mega-menu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

/* Ensure mega menu parent has relative positioning */
.ludus-mega-dropdown {
  position: relative;
}.ludus-mega-container {
  padding: 40px;
}

.ludus-mega-content {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 40px;
}

/* Categories Grid */
.ludus-categories-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

.ludus-category-column h3.ludus-category-title {
  font-size: 16px;
  font-weight: 600;
  color: var(--primary-color);
  margin-bottom: 15px;
  padding-bottom: 8px;
  border-bottom: 2px solid var(--secondary-color);
}

.ludus-category-links {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.ludus-category-link {
  color: var(--text-light);
  text-decoration: none;
  font-size: 14px;
  padding: 6px 0;
  transition: all 0.3s ease;
}

.ludus-category-link:hover {
  color: var(--secondary-color);
  padding-left: 8px;
  text-decoration: none;
}

/* Featured Products */
.ludus-featured-section {
  border-left: 1px solid var(--border-light);
  padding-left: 30px;
}

.ludus-featured-title {
  font-size: 16px;
  font-weight: 600;
  color: var(--primary-color);
  margin-bottom: 20px;
}

.ludus-featured-products {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.ludus-product-card {
  display: flex;
  gap: 12px;
  padding: 10px;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.ludus-product-card:hover {
  background: #f8f9fa;
}

.ludus-product-image {
  width: 60px;
  height: 60px;
  border-radius: 8px;
  background-size: cover;
  background-position: center;
  flex-shrink: 0;
}

.ludus-product-info {
  flex: 1;
}

.ludus-product-name {
  font-size: 13px;
  font-weight: 600;
  color: var(--primary-color);
  margin: 0 0 4px 0;
  line-height: 1.3;
}

.ludus-product-brand {
  font-size: 11px;
  color: var(--text-light);
  margin: 0 0 6px 0;
}

.ludus-product-price {
  font-size: 13px;
  font-weight: 600;
  color: var(--secondary-color);
}

/* Search Styles */
.ludus-search {
  position: relative;
}

.ludus-search-input {
  width: 300px;
  padding: 12px 50px 12px 20px;
  border: 2px solid var(--border-light);
  border-radius: 25px;
  font-size: 14px;
  transition: all 0.3s ease;
}

.ludus-search-input:focus {
  outline: none;
  border-color: var(--secondary-color);
  box-shadow: 0 0 0 3px rgba(226, 184, 8, 0.1);
}

.ludus-search-btn {
  position: absolute;
  right: 8px;
  top: 50%;
  transform: translateY(-50%);
  background: var(--secondary-color);
  border: none;
  width: 35px;
  height: 35px;
  border-radius: 50%;
  color: white;
  cursor: pointer;
  transition: all 0.3s ease;
}

.ludus-search-btn:hover {
  background: var(--primary-color);
}

/* Account Dropdown */
.ludus-account-dropdown {
  position: relative;
}

.ludus-account-trigger {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 12px 16px;
  background: #f8f9fa;
  border-radius: 25px;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 14px;
  font-weight: 500;
  color: var(--primary-color);
  text-decoration: none;
}

.ludus-account-trigger:hover {
  background: var(--secondary-color);
  color: white;
  text-decoration: none;
}

.ludus-account-menu {
  position: absolute;
  top: 100%;
  right: 0;
  background: white;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  border-radius: 8px;
  padding: 10px 0;
  min-width: 180px;
  opacity: 0;
  visibility: hidden;
  transform: translateY(10px);
  transition: all 0.3s ease;
  margin-top: 10px;
}

.ludus-account-dropdown:hover .ludus-account-menu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.ludus-account-menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.ludus-account-menu a {
  display: block;
  padding: 10px 20px;
  color: var(--primary-color);
  text-decoration: none;
  font-size: 14px;
  transition: all 0.3s ease;
}

.ludus-account-menu a:hover {
  background: var(--secondary-color);
  color: white;
  text-decoration: none;
}

/* Mobile Menu Styles */
.ludus-mobile-toggle {
  display: none;
  flex-direction: column;
  cursor: pointer;
  padding: 8px;
  background: #f8f9fa;
  border: 2px solid var(--secondary-color);
  border-radius: 4px;
}

.ludus-mobile-toggle span {
  width: 25px;
  height: 3px;
  background-color: #333;
  margin: 2px 0;
  transition: 0.3s;
  border-radius: 2px;
}

.ludus-mobile-overlay {
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

.ludus-mobile-overlay.active {
  opacity: 1;
  visibility: visible;
}

.ludus-mobile-sidebar {
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

.ludus-mobile-sidebar.active {
  left: 0;
}

.ludus-mobile-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid #eee;
  background: #f8f9fa;
}

.ludus-mobile-close {
  cursor: pointer;
  font-size: 20px;
  color: #333;
  padding: 5px;
  background: transparent;
  border: none;
}

.ludus-mobile-menu {
  list-style: none;
  margin: 0;
  padding: 0;
}

.ludus-mobile-item {
  border-bottom: 1px solid #f0f0f0;
}

.ludus-mobile-link {
  display: block;
  padding: 15px 20px;
  color: #333;
  text-decoration: none;
  font-weight: 500;
  font-size: 16px;
  transition: all 0.3s ease;
}

.ludus-mobile-link:hover {
  color: var(--secondary-color);
  background: #f8f9fa;
  text-decoration: none;
}

/* Mobile Submenu Styles */
.ludus-mobile-submenu {
  list-style: none;
  margin: 0;
  padding: 0;
  background: #f8f9fa;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease;
}

.ludus-mobile-item.active .ludus-mobile-submenu {
  max-height: 500px;
}

.ludus-mobile-submenu li a {
  display: block;
  padding: 12px 20px 12px 40px;
  color: #555;
  text-decoration: none;
  font-size: 14px;
  transition: all 0.3s ease;
  border-bottom: 1px solid #e9ecef;
}

.ludus-mobile-submenu li:last-child a {
  border-bottom: none;
}

.ludus-mobile-submenu li a:hover {
  color: var(--secondary-color);
  background: #fff;
  padding-left: 45px;
  text-decoration: none;
}

/* Mobile Responsive */
@media (max-width: 1199px) {
  .ludus-header-nav {
    display: none !important;
  }

  .ludus-search-input {
    width: 250px;
  }
}

@media (max-width: 768px) {
  .ludus-main-header {
    padding: 10px 0;
  }

  .ludus-header-left {
    gap: 20px;
  }

  .ludus-header-right {
    gap: 15px;
  }

  .ludus-search-input {
    width: 200px;
    padding: 10px 40px 10px 15px;
  }

  .ludus-mobile-toggle {
    display: flex;
  }

  .ludus-account-dropdown {
    display: none;
  }

  .ludus-wishlist {
    display: none;
  }
}

/* Wishlist Styles */
.ludus-wishlist {
  position: relative;
  margin-right: 20px;
}

.ludus-wishlist-link {
  display: flex;
  align-items: center;
  color: var(--text-dark);
  text-decoration: none;
  padding: 8px 12px;
  border-radius: 8px;
  transition: all 0.3s ease;
  position: relative;
}

.ludus-wishlist-link:hover {
  color: var(--secondary-color);
  background: #f8f9fa;
  text-decoration: none;
}

.ludus-wishlist-link i {
  font-size: 1.2rem;
  margin-right: 8px;
}

.ludus-wishlist-count {
  position: absolute;
  top: -8px;
  right: -8px;
  background: var(--secondary-color);
  color: var(--primary-dark);
  font-size: 0.75rem;
  font-weight: 600;
  padding: 2px 6px;
  border-radius: 10px;
  min-width: 18px;
  height: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
}

.ludus-wishlist-count:empty {
  display: none;
}

.ludus-mobile-wishlist-count {
  background: var(--secondary-color);
  color: var(--primary-dark);
  font-size: 0.75rem;
  font-weight: 600;
  padding: 2px 8px;
  border-radius: 12px;
  margin-left: 10px;
}

.ludus-mobile-wishlist-count:empty {
  display: none;
}

/* Global Toast Notifications */
.toast-notification-global {
  position: fixed;
  top: 20px;
  right: 20px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.15);
  z-index: 10000;
  transform: translateX(400px);
  transition: transform 0.3s ease;
  padding: 15px 20px;
  border-left: 4px solid var(--secondary-color);
  max-width: 350px;
}

.toast-notification-global.show {
  transform: translateX(0);
}

.toast-notification-global.success {
  border-left-color: #28a745;
}

.toast-notification-global.error {
  border-left-color: #dc3545;
}

.toast-content-global {
  display: flex;
  align-items: center;
  font-weight: 600;
  color: var(--text-dark);
}

/* Wishlist Button Active State */
.btn-wishlist.active {
  background-color: var(--secondary-color) !important;
  color: var(--primary-dark) !important;
}

.btn-wishlist.active:hover {
  background-color: #d4a306 !important;
}
</style>

<header class="ludus-header">
  <div class="container">
    <div class="ludus-main-header">
      <div class="ludus-header-left">
        <div class="ludus-logo">
          <a href="/"><img alt="Salem Apparels Logo" src="{{asset('userasset/imgs/template/logo.png')}}"></a>
        </div>

        <div class="ludus-header-nav d-none d-xl-block">
          <nav class="ludus-nav-main-menu">
            <ul class="ludus-main-menu">
            <li class="ludus-menu-item">
                <a href="/" class="ludus-nav-link">Home</a>
              </li>
            <li class="ludus-has-children ludus-menu-item">
                <a href="/about-us" class="ludus-nav-link">Info</a>
                <ul class="ludus-submenu">
                 <li><a href="/about-us">About Us</a></li>
                  <li><a href="/privacy-policy">Privacy Policy</a></li>
                  <li><a href="/contact-us">Contact Us</a></li>
                  <li><a href="/terms-conditions">Terms &amp; Conditions</a></li>
                  <li><a href="/return-refund">Return &amp; Refund</a></li>
                  <li><a href="/pricing-process">Pricing and Process</a></li>
                  <li><a href="/faqs">FAQs</a></li>
                </ul>
              </li>
            <li class="ludus-mega-dropdown ludus-menu-item">
                <a href="/shop" class="ludus-nav-link">Shop All</a>
                <div class="ludus-mega-menu">
                  <div class="ludus-mega-container">
                    <div class="ludus-mega-content">
                      <!-- Categories Grid -->
                      <div class="ludus-categories-grid">
                        <div class="ludus-category-column">
                          <h3 class="ludus-category-title">Clothing</h3>
                          <div class="ludus-category-links">
                            <a href="/shop/category/T-shirt" class="ludus-category-link">T-Shirts</a>
                            <a href="/shop/category/Polo" class="ludus-category-link">Polo Shirts</a>
                            <a href="/shop/category/Hood" class="ludus-category-link">Hoodies</a>
                            <a href="/shop/category/Sweatshirt" class="ludus-category-link">Sweatshirts</a>
                            <a href="/shop/category/Jacket" class="ludus-category-link">Jackets</a>
                          </div>
                        </div>

                        <div class="ludus-category-column">
                          <h3 class="ludus-category-title">Accessories</h3>
                          <div class="ludus-category-links">
                            <a href="/shop/category/Bag" class="ludus-category-link">Bags</a>
                            <a href="/shop/category/Accessory" class="ludus-category-link">Accessories</a>
                            <a href="/shop/category/Footwear" class="ludus-category-link">Footwear</a>
                            <a href="/shop/category/Towel" class="ludus-category-link">Towels</a>
                          </div>
                        </div>

                        <div class="ludus-category-column">
                          <h3 class="ludus-category-title">By Gender</h3>
                          <div class="ludus-category-links">
                            <a href="/shop/gender/men" class="ludus-category-link">Men's Collection</a>
                            <a href="/shop/gender/women" class="ludus-category-link">Women's Collection</a>
                            <a href="/shop/gender/kids" class="ludus-category-link">Kids Collection</a>
                            <a href="/shop/gender/unisex" class="ludus-category-link">Unisex</a>
                          </div>
                        </div>
                      </div>

                      <!-- Featured Products -->
                      <div class="ludus-featured-section">
                        <h3 class="ludus-featured-title">Featured Products</h3>
                        <div class="ludus-featured-products">
                          @php
                            $featuredProducts = \App\Models\Product::with(['galleries', 'price'])
                              ->where('type', 'T-shirt')
                              ->take(3)
                              ->get();
                          @endphp
                          @if($featuredProducts->count() > 0)
                            @foreach($featuredProducts as $product)
                            <div class="ludus-product-card">
                              <div class="ludus-product-image" style="background-image: url('{{ optional($product->galleries->first())->image_url ?? asset('userasset/imgs/template/no-image.png') }}')"></div>
                              <div class="ludus-product-info">
                                <h4 class="ludus-product-name">{{ $product->title ?? 'Product' }}</h4>
                                <p class="ludus-product-brand">{{ $product->brand ?? 'Brand' }}</p>
                                <span class="ludus-product-price">£{{ optional($product->price)->single_list_price + 3 ?? 'N/A' }}</span>
                              </div>
                            </div>
                            @endforeach
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

            </ul>
          </nav>
        </div>
      </div>

      <div class="ludus-header-right">
        <!-- Search -->
        <div class="ludus-search">
          <div class="ludus-search-box">
            <form class="form-search" method="post" action="#">
              <div class="ludus-search-container">
                <input id="live-search" class="ludus-search-input" type="text" placeholder="Search products..." autocomplete="off">
                <button type="submit" class="ludus-search-btn">
                  <i class="fas fa-search"></i>
                </button>
                <div id="search-results" class="ludus-search-results" style="display:none;"></div>
              </div>
            </form>
          </div>
        </div>

        <!-- Account -->
        <div class="ludus-account-dropdown d-none d-md-block">
          <div class="ludus-account-trigger">
            <i class="fas fa-user"></i>
            <span>Account</span>
          </div>
          <div class="ludus-account-menu">
            <ul>
              @auth('customer')
                <li><a href="/my-account">My Account</a></li>
                <li><a href="/my-orders">My Orders</a></li>
                <li><a href="/wishlist">My Wishlist</a></li>
                <li><a href="/settings">Settings</a></li>
                <li><a href="/logout">Sign Out</a></li>
              @else
                @auth('web')
                  <li><a href="/my-account">My Account</a></li>
                  <li><a href="/my-orders">My Orders</a></li>
                  <li><a href="/wishlist">My Wishlist</a></li>
                  <li><a href="/settings">Settings</a></li>
                  <li><a href="/logout">Sign Out</a></li>
                @else
                  <li><a href="/login">Login</a></li>
                  <li><a href="/register">Register</a></li>
                @endauth
              @endauth
            </ul>
          </div>
        </div>

        <!-- Wishlist -->
        <div class="ludus-wishlist d-none d-md-block">
          <a href="/wishlist" class="ludus-wishlist-link">
            <i class="fas fa-heart"></i>
            <span class="ludus-wishlist-count wishlist-count-header">0</span>
          </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="ludus-mobile-toggle d-xl-none" id="ludus-mobile-toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="ludus-mobile-overlay" id="ludus-mobile-overlay"></div>

<!-- Mobile Menu Sidebar -->
<div class="ludus-mobile-sidebar" id="ludus-mobile-sidebar">
  <div class="ludus-mobile-header">
    <div class="ludus-mobile-logo">
      <strong style="color: #E2B808;">SALEM APPARELS</strong>
    </div>
    <button class="ludus-mobile-close" id="ludus-mobile-close">
      <i class="fa fa-times"></i>
    </button>
  </div>

  <div class="ludus-mobile-content">
    <nav class="ludus-mobile-nav">
      <ul class="ludus-mobile-menu">
        <li class="ludus-mobile-item">
          <a href="/" class="ludus-mobile-link">
            <i class="fa fa-home me-2"></i> Home
          </a>
        </li>

        <li class="ludus-mobile-item">
          <a href="#" class="ludus-mobile-link">
            <i class="fa fa-shopping-cart me-2"></i> Shop
          </a>
          <ul class="ludus-mobile-submenu">
            <li><a href="/shop">All Products</a></li>
            <li><a href="/shop/category/T-shirt">T-Shirts</a></li>
            <li><a href="/shop/category/Polo">Polo Shirts</a></li>
            <li><a href="/shop/category/Hood">Hoodies</a></li>
            <li><a href="/shop/category/Sweatshirt">Sweatshirts</a></li>
            <li><a href="/shop/category/Jacket">Jackets</a></li>
            <li><a href="/shop/category/Bag">Bags</a></li>
            <li><a href="/shop/category/Accessory">Accessories</a></li>
            <li><a href="/shop/category/Footwear">Footwear</a></li>
            <li><a href="/shop/category/Towel">Towels</a></li>
          </ul>
        </li>

        <li class="ludus-mobile-item">
          <a href="#" class="ludus-mobile-link">
            <i class="fa fa-info-circle me-2"></i> Info
          </a>
          <ul class="ludus-mobile-submenu">
            <li><a href="/about-us">About Us</a></li>
            <li><a href="/privacy-policy">Privacy Policy</a></li>
            <li><a href="/contact-us">Contact Us</a></li>
            <li><a href="/terms-conditions">Terms &amp; Conditions</a></li>
            <li><a href="/return-refund">Return &amp; Refund</a></li>
            <li><a href="/pricing-process">Pricing and Process</a></li>
            <li><a href="/faqs">FAQs</a></li>
          </ul>
        </li>

        @auth('customer')
          <li class="ludus-mobile-item">
            <a href="/my-account" class="ludus-mobile-link">
              <i class="fa fa-user me-2"></i> My Account
            </a>
          </li>
          <li class="ludus-mobile-item">
            <a href="/my-orders" class="ludus-mobile-link">
              <i class="fa fa-box me-2"></i> My Orders
            </a>
          </li>
          <li class="ludus-mobile-item">
            <a href="/wishlist" class="ludus-mobile-link">
              <i class="fa fa-heart me-2"></i> My Wishlist <span class="ludus-mobile-wishlist-count wishlist-count-header">0</span>
            </a>
          </li>
          <li class="ludus-mobile-item">
            <a href="/logout" class="ludus-mobile-link">
              <i class="fa fa-sign-out me-2"></i> Logout
            </a>
          </li>
        @else
          @auth('web')
            <li class="ludus-mobile-item">
              <a href="/my-account" class="ludus-mobile-link">
                <i class="fa fa-user me-2"></i> My Account
              </a>
            </li>
            <li class="ludus-mobile-item">
              <a href="/logout" class="ludus-mobile-link">
                <i class="fa fa-sign-out me-2"></i> Logout
              </a>
            </li>
          @else
            <li class="ludus-mobile-item">
              <a href="/login" class="ludus-mobile-link">
                <i class="fa fa-sign-in me-2"></i> Login
              </a>
            </li>
            <li class="ludus-mobile-item">
              <a href="/register" class="ludus-mobile-link">
                <i class="fa fa-user-plus me-2"></i> Register
              </a>
            </li>
          @endauth
        @endauth
      </ul>
    </nav>
  </div>
</div>

<script>
// Professional Ludus Header Script
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.getElementById('ludus-mobile-toggle');
    const mobileOverlay = document.getElementById('ludus-mobile-overlay');
    const mobileSidebar = document.getElementById('ludus-mobile-sidebar');
    const mobileClose = document.getElementById('ludus-mobile-close');

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

    // Event Listeners
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

    // Close menu when clicking direct links
    const directLinks = document.querySelectorAll('.ludus-mobile-link[href]:not([href="#"])');
    directLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            closeMobileMenu();
        });
    });

    // Handle mobile submenu toggles
    const mobileSubmenuTriggers = document.querySelectorAll('.ludus-mobile-link[href="#"]');
    mobileSubmenuTriggers.forEach(function(trigger) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const parentItem = this.closest('.ludus-mobile-item');
            const submenu = parentItem.querySelector('.ludus-mobile-submenu');

            if (submenu) {
                parentItem.classList.toggle('active');
            }
        });
    });
});
</script>
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

.salem-search-results,
.ludus-search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #eee;
    border-radius: 8px;
    max-height: 300px;
    overflow-y: auto;
    z-index: 9999;
    display: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
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
