@extends('layout.usermaster')
@section('usercontent')
<title>Home - Salem Apparels</title>
<meta name="description" content="Terms and Conditions for our website.">
<meta name="keywords" content="terms, conditions, user agreement">
<meta name="author" content="Salem Apparels">
<main class="main">
  <div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">

          <li><a class="font-xs color-gray-1000" href="/">Home</a></li>
          <li><a class="font-xs color-gray-500" href="/shop">Shop</a></li>

        </ul>
      </div>
    </div>
  </div>
  <div class="section-box shop-template mt-30">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 order-first order-lg-last">
          <div class="banner-ads-top mb-30"><a href="/shop"><img src="https://salemapparel.co.uk/userasset/imgs/page/homepage4/cloth_banner.jpg" alt="Salem Apparel"></a></div>
          <div class="box-filters mt-0 pb-5 border-bottom">
            <div class="row">
              <!-- <div class="col-xl-2 col-lg-3 mb-10 text-lg-start text-center"><a class="btn btn-filter font-sm color-brand-3 font-medium" href="#ModalFiltersForm" data-bs-toggle="modal">All Fillters</a></div> -->
              <div class="col-xl-12 col-lg-9 mb-10 text-lg-end text-center"><span class="font-sm color-gray-900 font-medium border-1-right span">Showing 1&ndash;16 of 17 results</span>
                <div class="d-inline-block"><span class="font-sm color-gray-500 font-medium">Sort by:</span>
                  <div class="dropdown dropdown-sort border-1-right">
                    <button class="btn dropdown-toggle font-sm color-gray-900 font-medium" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false">Latest products</button>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort" style="margin: 0px;">
                      <li><a class="dropdown-item active" href="#">Latest products</a></li>
                      <li><a class="dropdown-item" href="#">Oldest products</a></li>
                      <li><a class="dropdown-item" href="#">Comments products</a></li>
                    </ul>
                  </div>
                </div>
                <div class="d-inline-block"><span class="font-sm color-gray-500 font-medium">Show</span>
                  <div class="dropdown dropdown-sort border-1-right">
                    <button class="btn dropdown-toggle font-sm color-gray-900 font-medium" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>30 items</span></button>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                      <li><a class="dropdown-item active" href="/shop?page=30">30 items</a></li>
                      <li><a class="dropdown-item" href="/shop?page=50">50 items</a></li>
                      <li><a class="dropdown-item" href="/shop?page=100">100 items</a></li>
                    </ul>
                  </div>
                </div>
                <div class="d-inline-block"><a class="view-type-grid mr-5 active" href="/shop"></a><a class="view-type-list" href="/shop"></a></div>
              </div>
            </div>
          </div>
          <div class="row mt-20">
            @foreach($products as $product)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card-grid-style-3">
                <div class="card-grid-inner">
                  <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="/product/customise/{{  $product->id }}" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="/shop" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                  <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="/product/customise/{{  $product->id }}">
                      <img src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="Salem Apparel">
                    </a></div>
                  <div class="info-right"><a class="font-xs color-gray-500" href="/shop">{{ $product->brand }}</a><br><a class="color-brand-3 font-sm-bold" href="/product/customise/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>
                    <div class="rating"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}" alt="Salem Apparel"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}" alt="Salem Apparel"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}" alt="Salem Apparel"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}" alt="Salem Apparel"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}" alt="Salem Apparel"><span class="font-xs color-gray-500">(65)</span></div>
                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong></div>
                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="/product/customise/{{  $product->id }}">customise</a></div>
                    <ul class="list-features">
                      @foreach ($product->attributes as $attribute)
                      <li>{{ $attribute->attribute }}</li>

                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @php
          $currentPage = $products->currentPage();
          $lastPage = $products->lastPage();
          @endphp

          @if ($lastPage > 1)
          <nav>
            <ul class="pagination">
              {{-- Previous Page Link --}}
              <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                <a class="page-link page-prev" href="{{ $products->previousPageUrl() }}" rel="prev" aria-label="Previous"></a>
              </li>

              {{-- Show first page --}}
              <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                <a class="page-link" href="{{ $products->url(1) }}">1</a>
              </li>

              {{-- Ellipsis after first page --}}
              @if ($currentPage > 4)
              <li class="page-item disabled"><span class="page-link">...</span></li>
              @endif

              {{-- Pages around current page --}}
              @for ($i = max(2, $currentPage - 1); $i <= min($lastPage - 1, $currentPage + 1); $i++)
                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                </li>
                @endfor

                {{-- Ellipsis before last page --}}
                @if ($currentPage < $lastPage - 3)
                  <li class="page-item disabled"><span class="page-link">...</span></li>
                  @endif

                  {{-- Last page --}}
                  @if ($lastPage > 1)
                  <li class="page-item {{ $currentPage == $lastPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ $products->url($lastPage) }}">{{ $lastPage }}</a>
                  </li>
                  @endif

                  {{-- Next Page Link --}}
                  <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link page-next" href="{{ $products->nextPageUrl() }}" rel="next" aria-label="Next"></a>
                  </li>
            </ul>
          </nav>
          @endif

        </div>
        <div class="col-lg-3 order-last order-lg-first">
          <div class="sidebar-border mb-0">
            <div class="sidebar-head">
              <h6 class="color-gray-900">Product Categories</h6>
            </div>
            <div class="sidebar-content">
              <ul class="list-nav-arrow">
                @foreach($shopByCatMenus as $shopByCatMenu)
                <li><a href="/shop/category/{{$shopByCatMenu->type}}">{{$shopByCatMenu->type}}<span class="number">{{$shopByCatMenu->total}}</span></a></li>
                @endforeach

              </ul>

            </div>
          </div>
          <br>
          <div class="box-slider-item">
            <div class="head pb-15 border-brand-2">
              <h5 class="color-gray-900">Product Tags</h5>
            </div>
            <div class="content-slider mb-50"><a class="btn btn-border mr-5" href="/shop">Jacket</a><a class="btn btn-border mr-5" href="/shop">Skirt</a></div>
          </div>
          <div class="banner-right h-500 text-center mb-30"><span class="text-no font-11">No.9</span>
            <h5 class="font-23 mt-20">Fast Delivery<br class="d-none d-lg-block">is our priority</h5>
            <p class="text-desc font-16 mt-15">We deliver in no time</p><a href="/shop">Get Started</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section-box mt-90 mb-50">
    <div class="container">
      <ul class="list-col-5">
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('userasset/imgs/template/delivery.svg') }}" alt="Salem Apparel"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
              <p class="font-sm color-gray-500">From all orders over $10</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('userasset/imgs/template/support.svg') }}" alt="Salem Apparel"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
              <p class="font-sm color-gray-500">Shop with an expert</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('userasset/imgs/template/voucher.svg') }}" alt="Salem Apparel"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
              <p class="font-sm color-gray-500">Refer a friend</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('userasset/imgs/template/return.svg') }}" alt="Salem Apparel"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
              <p class="font-sm color-gray-500">Free return over $200</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('userasset/imgs/template/secure.svg') }}" alt="Salem Apparel"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Secure payment</h5>
              <p class="font-sm color-gray-500">100% Protected</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <section class="section-box box-newsletter" style="background-image: url('{{ asset('userasset/imgs/page/about/asus.svgs') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12" >
                        <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount</h3>
                        <p class="font-lg color-white">Get E-mail updates about our latest shop and <span
                                class="font-lg-bold">special offers.</span></p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="box-form-newsletter mt-15">
                            <form class="form-newsletter">
                                <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
                                <button class="btn btn-brand-2">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


</main>
@endsection
