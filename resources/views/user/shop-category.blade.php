@extends('layout.usermaster')
@section('usercontent')
<title>Shop Category - Salem Apparel</title>
<meta name="description" content="Explore our diverse range of custom apparel, including T-shirts, jackets, and headwear. Personalize your style with unique designs at Salem Apparel.">
<meta name="keywords" content="Custom Apparel, T-shirts, Jackets, Headwear, Personalized Clothing, Salem Apparel">
<meta name="author" content="Salem Apparel">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
/* Pagination styling with site colors */
.pagination .page-item.active .page-link {
    background-color: #E2B808 !important;
    border-color: #E2B808 !important;
    color: #fff !important;
}

.pagination .page-item.active .page-link:hover {
    background-color: #d4a306 !important;
    border-color: #d4a306 !important;
    color: #fff !important;
}

.pagination .page-item:not(.active):not(.disabled) .page-link {
    background-color: #f5e6a3 !important;
    border-color: #f5e6a3 !important;
    color: #1a1a1a !important;
}

.pagination .page-item:not(.active):not(.disabled) .page-link:hover {
    background-color: #E2B808 !important;
    border-color: #E2B808 !important;
    color: #fff !important;
}

.pagination .page-item.disabled .page-link {
    background-color: #e9ecef !important;
    border-color: #dee2e6 !important;
    color: #6c757d !important;
}

/* Filter Section Styling with Site Colors */
.filter-section {
    border-bottom: 1px solid #E2B808;
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.filter-title {
    font-size: 16px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.sidebar-head h6 {
    color: #1a1a1a !important;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Price Filter Styling */
.form-control-sm {
    padding: 8px 12px;
    font-size: 14px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.form-control-sm:focus {
    border-color: #E2B808;
    box-shadow: 0 0 0 0.2rem rgba(226, 184, 8, 0.15);
    outline: none;
}

#apply-price-filter {
    background: #E2B808;
    border-color: #E2B808;
    color: #1a1a1a;
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

#apply-price-filter:hover {
    background: #d4a306;
    border-color: #d4a306;
    color: #1a1a1a;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(226, 184, 8, 0.3);
}

/* Size Filter Styling */
.size-filters,
.color-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.size-filters .form-check {
    display: inline-block;
    margin: 0;
    padding: 10px 16px;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.size-filters .form-check:hover {
    background: #E2B808;
    border-color: #E2B808;
    color: #1a1a1a;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(226, 184, 8, 0.2);
}

.size-filters .form-check:has(input:checked) {
    background: #1a1a1a;
    border-color: #1a1a1a;
    color: #E2B808;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(26, 26, 26, 0.2);
}

.size-filters .form-check input[type="checkbox"] {
    display: none;
}

.size-filters .form-check-label {
    font-size: 14px;
    cursor: pointer;
    margin: 0;
    padding: 0;
    user-select: none;
    color: inherit;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Color Filter Styling */
.color-filters .form-check.color-option {
    display: inline-block;
    margin: 0;
    padding: 0;
    background: transparent;
    border: none;
    border-radius: 0;
    cursor: pointer;
}

.color-filters .color-swatch {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    transition: all 0.3s ease;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    text-transform: capitalize;
}

.color-filters .color-swatch:hover {
    background: #E2B808;
    border-color: #E2B808;
    color: #1a1a1a;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(226, 184, 8, 0.2);
}

.color-filters .color-circle {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 2px solid #ddd;
    flex-shrink: 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.color-filters .form-check input[type="checkbox"] {
    display: none;
}

.color-filters .form-check input[type="checkbox"]:checked + .color-swatch {
    background: #1a1a1a;
    border-color: #1a1a1a;
    color: #E2B808;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(26, 26, 26, 0.2);
}

.color-filters .form-check input[type="checkbox"]:checked + .color-swatch .color-circle {
    border-color: #E2B808;
    box-shadow: 0 0 0 2px #E2B808;
}

/* Clear Filters Button */
#clear-filters {
    background: transparent;
    border: 2px solid #1a1a1a;
    color: #1a1a1a;
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

#clear-filters:hover {
    background: #1a1a1a;
    border-color: #1a1a1a;
    color: #E2B808;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(26, 26, 26, 0.2);
}

/* Filter Actions */
.filter-actions {
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid #E2B808;
}

/* Sidebar Styling */
.sidebar-border {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.sidebar-border:hover {
    border-color: #E2B808;
    box-shadow: 0 4px 12px rgba(226, 184, 8, 0.1);
}

.sidebar-content {
    padding: 20px;
}

/* Product item animation */
.product-item {
    transition: all 0.3s ease;
}

.product-item.fade-out {
    opacity: 0;
    transform: scale(0.95);
}

.product-item.fade-in {
    opacity: 1;
    transform: scale(1);
}

/* Loading and no results styling */
#loading-indicator {
    margin: 40px 0;
    color: #E2B808;
}

#loading-indicator .spinner-border {
    color: #E2B808;
}

#no-results {
    margin: 40px 0;
}

#no-results .alert-info {
    background-color: rgba(226, 184, 8, 0.1);
    border-color: #E2B808;
    color: #1a1a1a;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .size-filters .form-check,
    .color-filters .color-swatch {
        padding: 8px 12px;
        font-size: 12px;
    }

    .filter-title {
        font-size: 14px;
    }

    #apply-price-filter,
    #clear-filters {
        padding: 8px 16px;
        font-size: 12px;
    }
}
</style>
<main class="main">
  <div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="/">Home</a></li>
          <li><a class="font-xs color-gray-500" href="/shop">Shop</a></li>
          <li><a class="font-xs color-gray-500" href="#">Category</a></li>

        </ul>
      </div>
    </div>
  </div>
  <div class="section-box shop-template mt-30">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 order-first order-lg-last">
          {{-- <div class="banner-ads-top mb-30"><a href="/shop"><img src="https://salemapparel.co.uk/userasset/imgs/page/homepage4/cloth_banner.jpg" alt="Salem"></a></div> --}}
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
          <div class="row mt-20" id="products-container">
            @foreach($products as $product)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 product-item"
                 data-price="{{ $product->price->single_list_price * 1.20 + 0.90 ?? 0 }}"
                 data-sizes="{{ $product->size ?? '' }}"
                 data-colors="{{ $product->rgb ?? '' }}">
              <div class="card-grid-style-3">
                <div class="card-grid-inner">
                  <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="#" onclick="toggleWishlist({{ $product->id }})" aria-label="Add To Wishlist" data-product-id="{{ $product->id }}"></a><a class="btn btn-compare btn-tooltip mb-10" href="/shop" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                  <div class="image-box"><a href="/product/customise/{{  $product->slug }}">
                      <img src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}">
                    </a></div>
                  <div class="info-right"><a class="font-xs color-gray-500" href="/product/customise/{{$product->slug}}">{{ $product->brand }}</a><br><a class="color-brand-3 font-sm-bold" href="/product/customise/{{  $product->slug }}">{{ $product->title }}</a>

                    <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price * 1.20 + 0.90 ?? 'N/A' }}</strong></div>
                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="/product/customise/{{  $product->slug }}">Customise</a></div>
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

          <!-- Loading indicator -->
          <div id="loading-indicator" class="text-center mt-4" style="display: none;">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Filtering products...</p>
          </div>

          <!-- No results message -->
          <div id="no-results" class="text-center mt-4" style="display: none;">
            <div class="alert alert-info">
              <h5>No products found</h5>
              <p>Try adjusting your filters to see more products.</p>
            </div>
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
          <div class="sidebar-border mb-30">
            <div class="sidebar-head">
              <h6 class="color-gray-900">Filter Products</h6>
            </div>
            <div class="sidebar-content">
              <form id="filter-form">
                <!-- Price Filter -->
                <div class="filter-section mb-4">
                  <h6 class="filter-title">Price Range</h6>
                  <div class="row">
                    <div class="col-6">
                      <input type="number" class="form-control form-control-sm" id="min_price" name="min_price" placeholder="Min £" min="0">
                    </div>
                    <div class="col-6">
                      <input type="number" class="form-control form-control-sm" id="max_price" name="max_price" placeholder="Max £" min="0">
                    </div>
                  </div>
                  <button type="button" class="btn btn-sm btn-outline-primary mt-2 w-100" id="apply-price-filter">Apply Price Filter</button>
                </div>

                <!-- Size Filter -->
                <div class="filter-section mb-4">
                  <h6 class="filter-title">Filter by Size</h6>
                  <div class="size-filters">
                    @if(isset($availableSizes) && $availableSizes->count() > 0)
                      @foreach($availableSizes as $size)
                        <div class="form-check">
                          <input class="form-check-input size-filter" type="checkbox" value="{{ $size }}" id="size-{{ Str::slug($size) }}">
                          <label class="form-check-label" for="size-{{ Str::slug($size) }}">{{ $size }}</label>
                        </div>
                      @endforeach
                    @else
                      <p class="text-muted small">No sizes available for this category</p>
                    @endif
                  </div>
                </div>

                <!-- Color Filter -->
                <div class="filter-section mb-4">
                  <h6 class="filter-title">Filter by Color</h6>
                  <div class="color-filters">
                    @if(isset($availableColors) && $availableColors->count() > 0)
                      @foreach($availableColors as $color)
                        <div class="form-check color-option">
                          <input class="form-check-input color-filter" type="checkbox" value="{{ $color['hex'] }}" id="color-{{ Str::slug($color['hex']) }}">
                          <label class="form-check-label color-swatch" for="color-{{ Str::slug($color['hex']) }}">
                            <span class="color-circle" style="background-color: {{ $color['hex'] }}"></span>
                            <span class="color-name">{{ $color['name'] }}</span>
                          </label>
                        </div>
                      @endforeach
                    @else
                      <p class="text-muted small">No colors available for this category</p>
                    @endif
                  </div>
                </div>

                <!-- Clear Filters -->
                <div class="filter-actions">
                  <button type="button" class="btn btn-sm btn-outline-secondary w-100" id="clear-filters">Clear All Filters</button>
                </div>
              </form>
            </div>
          </div>

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
            {{-- <div class="head pb-15 border-brand-2">
              <h5 class="color-gray-900">Product Tags</h5>
            </div>
            <div class="content-slider mb-50"><a class="btn btn-border mr-5" href="/shop">Headwears</a><a class="btn btn-border mr-5" href="/shop">Gloves</a></div>
          </div> --}}

        </div>
      </div>
    </div>
  </div>

  <div class="section-box">
    <div class="container">
      <br><br>
      <div class="list-brands list-none-border">
        <div class="box-swiper">
          <div class="swiper-container swiper-group-3">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/24.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/23.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/22.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/21.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/20.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/19.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/18.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/17.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/16.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('userasset/imgs/slider/logo/15.png') }}"
                  style="height: 400px; width: 100%; opacity: 0.8; object-fit: cover; border-radius: 12px; margin-right: 10px;"
                  alt="Salem Apparel">
              </div>
            </div>
            <!-- Optional navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get current category from URL
      const currentPath = window.location.pathname;
      const pathParts = currentPath.split('/');
      const category = pathParts[pathParts.length - 1];

      // Filter functionality
      function applyFilters() {
        const minPrice = document.getElementById('min_price').value;
        const maxPrice = document.getElementById('max_price').value;
        const selectedSizes = Array.from(document.querySelectorAll('.size-filter:checked')).map(cb => cb.value);
        const selectedColors = Array.from(document.querySelectorAll('.color-filter:checked')).map(cb => cb.value);

        showLoading();

        // Prepare filter data
        const filterData = {
          category: category,
          min_price: minPrice,
          max_price: maxPrice,
          sizes: selectedSizes,
          colors: selectedColors
        };

        // Send AJAX request
        fetch('{{ route("filter-products") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(filterData)
        })
        .then(response => response.json())
        .then(data => {
          hideLoading();
          updateProductsDisplay(data.products);
          updateResultsCount(data.total);
        })
        .catch(error => {
          hideLoading();
          console.error('Filter error:', error);
          showErrorMessage('Error filtering products. Please try again.');
        });
      }

      // Update products display
      function updateProductsDisplay(products) {
        const container = document.getElementById('products-container');

        if (products.length === 0) {
          container.innerHTML = '';
          showNoResults();
          return;
        }

        hideNoResults();

        let html = '';
        products.forEach(product => {
          const price = product.price ? (product.price.single_list_price * 1.20 + 0.90).toFixed(2) : 'N/A';
          const imageUrl = product.galleries && product.galleries.length > 0 ? product.galleries[0].image_url : '{{ asset("userasset/imgs/template/no-image.png") }}';

          html += `
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 product-item fade-in"
                 data-price="${price}"
                 data-sizes="${product.size || ''}">
              <div class="card-grid-style-3">
                <div class="card-grid-inner">
                  <div class="tools">
                    <a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a>
                    <a class="btn btn-wishlist btn-tooltip mb-10" href="/shop" aria-label="Add To Wishlist"></a>
                    <a class="btn btn-compare btn-tooltip mb-10" href="/shop" aria-label="Compare"></a>
                    <a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a>
                  </div>
                  <div class="image-box">
                    <a href="/product/customise/${product.slug}">
                      <img src="${imageUrl}" alt="${product.title}">
                    </a>
                  </div>
                  <div class="info-right">
                    <a class="font-xs color-gray-500" href="/product/customise/${product.slug}">${product.brand || 'Brand'}</a><br>
                    <a class="color-brand-3 font-sm-bold" href="/product/customise/${product.slug}">${product.title}</a>
                    <div class="price-info">
                      <strong class="font-lg-bold color-brand-3 price-main">£${price}</strong>
                    </div>
                    <div class="mt-20 box-btn-cart">
                      <a class="btn btn-cart" href="/product/customise/${product.slug}">Customise</a>
                    </div>
                    <ul class="list-features">
                      ${product.attributes ? product.attributes.map(attr => `<li>${attr.attribute}</li>`).join('') : ''}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          `;
        });

        container.innerHTML = html;
      }

      // Helper functions
      function showLoading() {
        document.getElementById('loading-indicator').style.display = 'block';
        document.getElementById('no-results').style.display = 'none';
      }

      function hideLoading() {
        document.getElementById('loading-indicator').style.display = 'none';
      }

      function showNoResults() {
        document.getElementById('no-results').style.display = 'block';
      }

      function hideNoResults() {
        document.getElementById('no-results').style.display = 'none';
      }

      function updateResultsCount(total) {
        const resultSpan = document.querySelector('.span');
        if (resultSpan) {
          resultSpan.textContent = `Showing 1–${total} of ${total} results`;
        }
      }

      function showErrorMessage(message) {
        const container = document.getElementById('products-container');
        container.innerHTML = `
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              ${message}
            </div>
          </div>
        `;
      }

      // Event listeners
      document.getElementById('apply-price-filter').addEventListener('click', applyFilters);

      document.querySelectorAll('.size-filter').forEach(checkbox => {
        checkbox.addEventListener('change', applyFilters);
      });

      document.querySelectorAll('.color-filter').forEach(checkbox => {
        checkbox.addEventListener('change', applyFilters);
      });

      document.getElementById('clear-filters').addEventListener('click', function() {
        // Clear all inputs
        document.getElementById('min_price').value = '';
        document.getElementById('max_price').value = '';
        document.querySelectorAll('.size-filter').forEach(cb => cb.checked = false);
        document.querySelectorAll('.color-filter').forEach(cb => cb.checked = false);

        // Reload the page to show all products
        window.location.reload();
      });
    });
  </script>

  @endsection
