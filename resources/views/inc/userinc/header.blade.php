    <header class="header header-container sticky-bar">
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a href="/"><img width="70" alt="Salem Apparels Logo" src="{{asset('userasset/imgs/template/logo.png')}}"></a></div>
            <div class="header-search">
              <div class="box-header-search">
                <form class="form-search" method="post" action="#">
                  <div class="box-category">
                    <select class="select-active select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option>All categories</option>
                      @foreach ($shopByCatMenus as $shopByCatMenu)

                    <option value="{{ $shopByCatMenu->type }}">{{ $shopByCatMenu->type }}</option>

                @endforeach
                    </select>
                  </div>
                  <div class="box-keysearch">
                    {{-- filepath: c:\xampp\htdocs\salem2\resources\views\inc\userinc\header.blade.php --}}
<input id="live-search" class="form-control font-xs" type="text" value="" placeholder="Search for items" autocomplete="off">
<div id="search-results" class="search-results-dropdown" style="display:none; position:absolute; z-index:1000; background:#fff; width:100%; max-height:300px; overflow-y:auto; border:1px solid #eee;"></div>
                  </div>
                </form>
              </div>
            </div>
            <div class="header-nav text-start">
              <nav class="nav-main-menu d-none d-xl-block">
                <ul class="main-menu">
                  <li><a class="active" href="#">Flash Deals</a></li>
                  <li><a href="#">Special</a></li>
                  <li><a href="#">Top Sellers</a></li>
                </ul>
              </nav>
              <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-shop">
              <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span>Account</span></span>
                <div class="dropdown-account">
                  <ul>
                    <li><a href="#">My Account</a></li>

                    <li><a href="#">My Orders</a></li>

                    <li><a href="#">Setting</a></li>
                    <li><a href="/logout">Sign out</a></li>
                  </ul>
                </div>
              </div>
              <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-cart"><span>Cart</span><span class="number-item font-xs">2</span></span>
                <!-- <div class="dropdown-cart">
                  <div class="item-cart mb-20">
                    <div class="cart-image"><img src="assets/imgs/page/homepage1/imgsp5.png" alt="Salem Apparels Logo"></div>
                    <div class="cart-info"><a class="font-sm-bold color-brand-3" href="shop-single-product.html">2022 Apple iMac with Retina 5K Display 8GB RAM, 256GB SSD</a>
                      <p><span class="color-brand-2 font-sm-bold">1 x $2856.4</span></p>
                    </div>
                  </div>
                  <div class="item-cart mb-20">
                    <div class="cart-image"><img src="assets/imgs/page/homepage1/imgsp4.png" alt="Salem Apparels Logo"></div>
                    <div class="cart-info"><a class="font-sm-bold color-brand-3" href="shop-single-product-2.html">2022 Apple iMac with Retina 5K Display 8GB RAM, 256GB SSD</a>
                      <p><span class="color-brand-2 font-sm-bold">1 x $2856.4</span></p>
                    </div>
                  </div>
                  <div class="border-bottom pt-0 mb-15"></div>
                  <div class="cart-total">
                    <div class="row">
                      <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Total</span></div>
                      <div class="col-6"><span class="font-md-bold color-brand-1">$2586.3</span></div>
                    </div>
                    <div class="row mt-15">
                      <div class="col-6 text-start"><a class="btn btn-cart w-auto" href="shop-cart.html">View cart</a></div>
                      <div class="col-6"><a class="btn btn-buy w-auto" href="shop-checkout.html">Checkout</a></div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom">
        <div class="container">
          <div class="dropdown d-inline-block">
            <button class="btn dropdown-toggle btn-category" id="dropdownCategory" type="button" data-bs-toggle="dropdown" aria-expanded="true" data-bs-display="static"><span class="dropdown-right font-sm-bold color-white">Shop By Categories</span></button>
            <div class="sidebar-left dropdown-menu dropdown-menu-light" aria-labelledby="dropdownCategory" data-bs-popper="static">
              <ul class="menu-texts menu-close">

                @foreach ($shopByCatMenus as $shopByCatMenu)
                     <li><a href="/shop/category/{{$shopByCatMenu->type}}"><span class="img-link"><img src="{{ asset('userasset/imgs/template/game.svg') }}" alt="Salem Apparels Logo"></span><span class="text-link">{{ $shopByCatMenu->type }}</span></a></li>
                @endforeach

              </ul>
            </div>
          </div>
          <div class="header-nav d-inline-block">
            <nav class="nav-main-menu d-none d-xl-block">
              <ul class="main-menu">
                <li class=""><a  class="has-children active" href="/">Home</a>
                    <ul class="sub-menu two-col">
                         <li><a class="" href="/about-us">About Us</a></li>
                        <li><a class="" href="/privacy-policy">Privacy Policy</a></li>
                        <li><a class="" href="/contact-us">Contact Us</a></li>
                    </ul>
                </li>
                <li class=""><a href="/shop">Shop</a>
                <li class=""><a href="/custom-design">Custom</a>

                </li>


              </ul>
            </nav>
          </div>
          <div class="discount font-16 font-bold">SPECIAL OFFER</div>
        </div>
      </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
      <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
          <div class="mobile-logo"><a class="d-flex" href="/"><img alt="Salem Apparels Logo" src="{{ asset('userasset/imgs/template/logo.png') }}"></a></div>
          <div class="perfect-scroll">
            <div class="mobile-menu-wrap mobile-header-border">
              <nav class="mt-15">
                <ul class="mobile-menu font-heading">
                   <li><a href="/">Home</a></li>
                  <li><a href="/about-us">About Us</a></li>
                  <li><a href="/contact">Contact</a></li>

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
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Setting</a></li>
                <li><a href="/logout">Sign out</a></li>
              </ul>
            </div>

            <div class="site-copyright color-gray-400 mt-30">Copyright 2025 &copy; Salem Apparel<br>Designed by<a href="http://datapalace.ng" target="_blank">&nbsp; Datapalace</a></div>
          </div>
        </div>
      </div>
    </div>

