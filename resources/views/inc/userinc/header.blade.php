<!-- Query for  shirts -->
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
<!-- Query for  shirts -->
<header class="header header-container sticky-bar">
  <div class="container">
    <div class="main-header">
      <div class="header-left">
        <div class="header-logo"><a href="/"><img width="70" alt="Salem Apparels Logo" src="{{asset('userasset/imgs/template/logo.png')}}"></a></div>
        <div class="headser-top d-flex align-items-center justify-content-between" style="width: 100%;">
          <!-- Search -->
          <div class="header-search flex-grow-1" style="max-width: 70%;">
            <div class="box-header-search">
              <form class="form-search" method="post" action="#">
                <div class="box-keysearch" style="position: relative;">
                  <input id="live-search" class="form-control font-xs" type="text" placeholder="Search for items" autocomplete="off">
                  <div id="search-results" class="search-results-dropdown" style="display:none; position:absolute; z-index:1000; background:#fff; width:100%; max-height:300px; overflow-y:auto; border:1px solid #eee;"></div>
                </div>
              </form>
            </div>
          </div>
          <div class="header-nav d-inline-block" stdyle=" float: right;">
            <nav class="nav-main-menu d-none d-xl-block">
              <ul class="main-menu">
                <li class="has-children"><a class="active" href="#">Home</a>
                  <ul class="sub-menu two-col">
                    <li><a class="" href="/">Home</a></li>
                    <li><a class="" href="/about-us">About Us</a></li>
                    <li><a class="" href="/privacy-policy">Privacy Policy</a></li>
                    <li><a class="" href="/contact-us">Contact Us</a></li>
                  </ul>
                </li>
                <li class=""><a href="/shop">Shop</a></li>
              </ul>
            </nav>
          </div>
          <!-- Account -->
          <div class="header-shop" style="margin-left: auto;">
            <div class="d-inline-block box-dropdown-cart">
              <span class="font-lg icon-list icon-account"><span>Account</span></span>
              <div class="dropdown-account">
                <ul>
                  <li><a href="/my-account">My Account</a></li>
                  <li><a href="/my-orders">My Orders</a></li>
                  <li><a href="#">Setting</a></li>
                  <li><a href="/logout">Sign out</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <style>
    .custom-style {
      font-size: 20px !important;
      font-weight: bolder !important;
      color: #ffffff !important;
    }
  </style>
  <div class="header-bottom" style="background-color: #E2B808;">
    <div class="container">
      <nav class="nav-main-menu">
        <ul class="main-menu">
          <!-- All product categories -->
          <li class="mega-dropdown">
            <a href="#" class="text-light custom-style">Shop By Categories</a>
            <div class="mega-dropdown-menu">
              <div class="mega-container">
                <div class="mega-row">
                  <div class="mega-column">

                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}">
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-child"></i> Clothing</h3>
                    <div class="link-row">
                      <a href="/shop/category/{{$shirt->type}}">T-Shirts</a>
                      <a href="/shop/category/{{$polo->type}}">Polo</a>
                      <a href="/shop/category/{{$polo->type}}">Hoodies</a>
                      <a href="/shop/category/{{$jacket->type}}">Jackets</a>
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i> Accessories</h3>
                    <div class="link-row">
                      <a href="/shop/category/{{$accessory->type}}">Accessories</a>
                      <a href="/shop/category/{{ $foot->type }}">Footwears</a>
                      <a href="/shop/category/{{$towel->type}}">Towels</a>
                      <a href="/shop/category/{{$bag->type}}">Bags</a>
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i>Wears</h3>
                    <div class="link-row">
                      <a href="/shop/category/{{$trouser->type}}">Trousers</a>
                      <a href="/shop/category/{{$apron->type}}">Aprons</a>
                      <a href="/shop/category/{{$foot->type}}">Footwears</a>
                      <a href="/shop/category/{{$waist->type}}">Waistwears</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </li>


          <!-- Shirt Category -->
          @php
          $shirts = DB::table('products')
          ->where('type', 'T-shirt')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5


          @endphp
          <li class="mega-dropdown">
            <a href="#" class="text-light custom-style">Shirts</a>
            <div class="mega-dropdown-menu">
              <div class="mega-container">
                <div class="mega-row row">
                  <div class="mega-column">

                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}">
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-child"></i> Brand</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/shirt/brand/{{$shirt->brand}}">{{$shirt->brand}}</a>
                      @endforeach


                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i> Gender</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/shirt/gender/{{$shirt->gender}}">{{$shirt->gender}}</a>
                      @endforeach
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i>Materials</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/shirt/material/{{$shirt->gender}}">{{$shirt->material}}</a>
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </li>


          <!-- Hoodies Categories -->

          @php
          $hoods = DB::table('products')
          ->where('type', 'Hood')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5


          @endphp
          <li class="mega-dropdown">
            <a href="#" class="text-light custom-style">Hood</a>
            <div class="mega-dropdown-menu">
              <div class="mega-container">
                <div class="mega-row row">
                  <div class="mega-column">

                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}">
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-child"></i> Brand</h3>
                    <div class="link-row">
                      @foreach ( $hoods as $shirt )
                      <a href="/shop/category/hood/brand/{{$shirt->brand}}">{{$shirt->brand}}</a>
                      @endforeach


                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i> Gender</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/hood/gender/{{$shirt->gender}}">{{$shirt->gender}}</a>
                      @endforeach
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i>Materials</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/hood/material/{{$shirt->material}}">{{$shirt->material}}</a>
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </li>


          <!-- POlo Categories -->
          @php
          $polos = DB::table('products')
          ->where('type', 'Polo')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5


          @endphp
          <li class="mega-dropdown">
            <a href="#" class="text-light custom-style">Polo</a>
            <div class="mega-dropdown-menu">
              <div class="mega-container">
                <div class="mega-row row">
                  <div class="mega-column">

                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}">
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-child"></i> Brand</h3>
                    <div class="link-row">
                      @foreach ( $polos as $shirt )
                      <a href="/shop/category/polo/brand/{{$shirt->brand}}">{{$shirt->brand}}</a>
                      @endforeach


                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i> Gender</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/polo/gender/{{$shirt->gender}}">{{$shirt->gender}}</a>
                      @endforeach
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i>Materials</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/polo/material/{{$shirt->material}}">{{$shirt->material}}</a>
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </li>



          <!-- SweatShirts Categories -->
          @php
          $sweats = DB::table('products')
          ->where('type', 'Sweatshirt')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5


          @endphp
          <li class="mega-dropdown">
            <a href="#" class="text-light custom-style">Sweatshirt</a>
            <div class="mega-dropdown-menu">
              <div class="mega-container">
                <div class="mega-row row">
                  <div class="mega-column">

                    <img src="{{ asset('userasset/imgs/slider/logo/20.png') }}" alt="Salem Apparel">
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-child"></i> Brand</h3>
                    <div class="link-row">
                      @foreach ( $sweats as $shirt )
                      <a href="/shop/category/sweatshirt/brand/{{$shirt->brand}}">{{$shirt->brand}}</a>
                      @endforeach


                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i> Gender</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/sweatshirt/gender/{{$shirt->gender}}">{{$shirt->gender}}</a>
                      @endforeach
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i>Materials</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/sweatshirt/material/{{$shirt->material}}">{{$shirt->material}}</a>
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </li>


          <!-- Jackets Categories -->
          @php
          $sweats = DB::table('products')
          ->where('type', 'Jacket')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5


          @endphp
          <li class="mega-dropdown">
            <a href="#" class="text-light custom-style">Jacket</a>
            <div class="mega-dropdown-menu">
              <div class="mega-container">
                <div class="mega-row row">
                  <div class="mega-column">

                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}">
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-child"></i> Brand</h3>
                    <div class="link-row">
                      @foreach ( $sweats as $shirt )
                      <a href="/shop/category/jacket/brand/{{$shirt->brand}}">{{$shirt->brand}}</a>
                      @endforeach


                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i> Gender</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/jacket/gender/{{$shirt->gender}}">{{$shirt->gender}}</a>
                      @endforeach
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i>Materials</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/jacket/material/{{$shirt->material}}">{{$shirt->material}}</a>
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </li>


          <!-- Jackets Categories -->
          @php
          $bags = DB::table('products')
          ->where('type', 'Bag')
          ->get() // Get all T-shirts first
          ->unique('brand') // Filter to unique brands
          ->unique('material') // Ensure unique material
          ->unique('gender') // Ensure unique gender
          ->take(5); // Then take 5


          @endphp
          <li class="mega-dropdown">
            <a href="#" class="text-light custom-style">Bag</a>
            <div class="mega-dropdown-menu">
              <div class="mega-container">
                <div class="mega-row row">
                  <div class="mega-column">

                    <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}">
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-child"></i> Brand</h3>
                    <div class="link-row">
                      @foreach ( $bags as $shirt )
                      <a href="/shop/category/bag/brand/{{$shirt->brand}}">{{$shirt->brand}}</a>
                      @endforeach


                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i> Gender</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/bag/gender/{{$shirt->gender}}">{{$shirt->gender}}</a>
                      @endforeach
                    </div>
                  </div>
                  <div class="mega-column">
                    <h3><i class="fa fa-gift"></i>Materials</h3>
                    <div class="link-row">
                      @foreach ( $shirts as $shirt )
                      <a href="/shop/category/bag/material/{{$shirt->material}}">{{$shirt->material}}</a>
                      @endforeach
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
  <style>
    /* Reset and base styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    /* Container for proper alignment */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
      position: relative;
    }

    /* Main menu styles */
    .nav-main-menu {
      display: block;
    }

    .main-menu {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .main-menu>li {
      position: relative;
    }

    .main-menu>li>a {
      display: block;
      padding: 15px 20px;
      color: #333;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .main-menu>li>a:hover {
      color: #fff;
      backgrosund-color: #000;
    }

    /* Mega dropdown styles */
    .mega-dropdown-menu {
      display: none;
      position: absolute;
      left: 0;
      top: 100%;
      width: 100vw;
      background: #fff;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      padding: 20px 0;
      /* Remove margin-sleft and use transform instead */
      transform: translateX(calc(-50% + 50vw));
      /* Ensure it starts from left edge */
      margin-left: 0;
      /* Prevent horizontal scroll */
      max-width: 100vw;
      overflow-x: hidden;
    }

    /* Add this to ensure proper full-width behavior */
    .mega-dropdown {
      position: static !important;
      /* Crucial for full-width dropdown */
    }

    /* Container for content (to center content while background spans full width) */
    .mega-content-container {
      max-width: 1200px;
      /* Match your site's container width */
      margin: 0 auto;
      padding: 0 15px;
    }

    .mega-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
    }

    .mega-row {
      display: flex;
      gap: 30px;
    }

    .mega-column {
      flex: 1;
      min-width: 200px;
      padding: 15px;
      background: #f9f9f9;
      border-radius: 4px;
    }

    .mega-column h3 {
      margin-bottom: 15px;
      font-size: 16px;
      color: #333;
      padding-bottom: 8px;
      border-bottom: 1px solid #ddd;
    }

    .mega-column h3 i {
      margin-right: 8px;
      color: #666;
    }

    .link-row a {
      display: block;
      padding: 12px 0; /* Increased from 8px to 12px */
      color: #666;
      text-decoration: none;
      transition: all 0.2s ease;
      font-size: 16px; /* Added larger font size */
      font-weight: 600; /* Added bold font weight */
    }

    .link-row a:hover {
      color: #000;
      padding-left: 5px;
      font-weight: 700; /* Even bolder on hover */
    }

    /* Show dropdown on hover */
    .mega-dropdown:hover .mega-dropdown-menu {
      display: block;
    }
  </style>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
  <div class="mobile-header-wrapper-inner">
    <div class="mobile-header-content-area">
      <div class="mobile-logo"><a class="d-flex" href="/"><img alt="Salem Apparels Logo" src="{{ asset('userasset/imgs/template/logo.png') }}"></a></div>
      <div class="perfect-scroll">
        <div class="mobile-menu-wrap mobile-header-border">
          <nav class="mt-15">
            <ul class="mobile-menu font-heading">
              <li class="has-children"><a class=" active" href="#">Home</a>
                <ul class="sub-menu two-col">
                  <li><a class="" href="/">Home</a></li>
                  <li><a class="" href="/about-us">About Us</a></li>
                  <li><a class="" href="/privacy-policy">Privacy Policy</a></li>
                  <li><a class="" href="/contact-us">Contact Us</a></li>
                </ul>
              </li>
              <li class=""><a href="/shop">Shop</a></li>

            </ul>
          </nav>
        </div>
        <div class="mobile-account">
          <div class="mobile-header-top">
            <div class="user-account"><a href="#"><img alt="Salem Apparels Logo" src="{{ asset('userasset/imgs/template/logo.png') }}"></a>
              <div class="content">
                <h6 class="user-name">Hello<span class="text-brand"> Steven !</span></h6>
                <p class="font-xs text-muted">You have 3 new messages</p>
              </div>
            </div>
          </div>
          <ul class="mobile-menu">
            <li><a href="#">My Account</a></li>
            <li><a href="/my-orders">My Orders</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="/logout">Sign out</a></li>
          </ul>
        </div>

        <div class="site-copyright color-gray-400 mt-30">Copyright 2025 &copy; Salem Apparel<br>Designed by<a href="http://datapalace.ng" target="_blank">&nbsp; Datapalace</a></div>
      </div>
    </div>
  </div>
</div>
