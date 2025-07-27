@extends('layout.usermaster')
@section('usercontent')
<title>Home - Salem Apparel</title>
<meta name="description" content="Terms and Conditions for our website.">
<meta name="keywords" content="terms, conditions, user agreement">
<meta name="author" content="Salem Apparels">
<main class="main">

    <section class="section-box p-0 m-0" style="width:100vw; height:100vh; overflow:hidden;">
        <div class="banner-hero banner-1 p-0 m-0" style="width:100vw; height:100vh;">
            <div class="container-fluid p-0 m-0" style="width:100vw; height:100vh;">
                <div class="row align-items-stretch p-0 m-0" style="width:100vw; height:100vh;">
                    <div class="col-12 p-0 m-0" style="width:100vw; height:100vh;">
                        <div class="box-swiper h-100" style="width:100vw; height:100vh;">
                            <div class="swiper-container swiper-group-1 h-100" style="width:100vw; height:100vh;">
                                <div class="swiper-wrapper h-100" style="width:100vw; height:100vh;">
                                    <!-- Static Slide -->
                                    <div class="swiper-slide h-100" style="width:100vw; height:100vh;">
                                        <img src="{{ asset('userasset/imgs/slider/swiper/1.png') }}" width="100%" alt="">
                                    </div>
                                    <div class="swiper-slide h-100" style="width:100vw; height:100vh;">
                                        <img src="{{ asset('userasset/imgs/slider/swiper/12.png') }}" width="100%" alt="">
                                    </div>

                                </div>
                                <div class="swiper-pagination swiper-pagination-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br>
    <!-- Brands Section -->
    <div class="section-box">
        <div class="container">
            <div class="list-brands list-none-border">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-10">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/awdis.png') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Salem Apparel"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/adc.avif') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Salem Apparel"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/anthem.jpg') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Salem Apparel"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/bagbase.png') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Salem Apparel"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/brook.png') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Salem Apparel"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/baby.jpg') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Salem Apparel"></a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brands Section -->


    <!-- Popular Categories Section -->
    <div class="section-box py-5 bg-gray-50">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <h4 class="mb-0">Popular Categories</h4>
                </div>
            </div>
            <div class="row justify-content-center g-4">
                @foreach($popularCategories as $index => $category)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 d-flex">
                    <div class="card border-0 shadow-sm h-100 w-100 text-center category-card transition-3d-hover bg-white">
                        <a href="/shop/category/{{ $category->type }}" class="d-block p-3">
                            <div class="category-icon mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center">
                                <img src="{{ $category->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}"
                                    alt="{{ $category->title }}"
                                    class="img-fluid object-fit-cover w-100 h-100" style="max-width:70px; max-height:70px;">
                            </div>
                            <div class="fw-bold text-uppercase small color-brand-3">
                                {{ $category->type }}
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .category-card {
            border-radius: 18px;
            transition: box-shadow 0.2s, transform 0.2s;
            background: #fff;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .category-card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
            transform: translateY(-6px) scale(1.04);
            border-color: #c8e6f9;
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #e3f2fd 0%, #fff 100%);
            border: 2px solid #c8e6f9;
            box-shadow: 0 2px 8px rgba(200, 230, 249, 0.15);
            overflow: hidden;
        }

        @media (max-width: 991.98px) {
            .col-xl-2 {
                flex: 0 0 auto;
                width: 33.333333%;
            }
        }

        @media (max-width: 767.98px) {

            .col-xl-2,
            .col-lg-3,
            .col-md-4,
            .col-sm-6,
            .col-6 {
                flex: 0 0 auto;
                width: 50%;
            }

            .category-icon {
                width: 60px;
                height: 60px;
            }
        }
    </style>
    <!-- End Popular Categories Section -->

    <section class="section-box mt-30">
        <div class="container">
            <div class="head-main bd-gray-200">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <ul class="nav nav-tabs text-start" role="tablist">
                            <li class="pl-0"><a class="active pl-0" href="#tab-1-featured" data-bs-toggle="tab"
                                    role="tab" aria-controls="tab-1-featured" aria-selected="true"
                                    data-index="1">
                                    <h4>Men</h4>
                                </a></li>
                            <li><a href="#tab-1-bestseller" data-bs-toggle="tab" role="tab"
                                    aria-controls="tab-1-bestseller" aria-selected="false" data-index="2">
                                    <h4>Ladies</h4>
                                </a></li>
                            <li><a href="#tab-1-mostviewed" data-bs-toggle="tab" role="tab"
                                    aria-controls="tab-1-mostviewed" aria-selected="false" data-index="3">
                                    <h4>Kids</h4>
                                </a></li>
                        </ul>
                        <!-- Button slider-->
                        <div class="box-button-slider">
                            <div class="button-slider-nav" id="tab-1-featured-nav">
                                <div class="swiper-button-next swiper-button-next-tab-1"></div>
                                <div class="swiper-button-prev swiper-button-prev-tab-1"></div>
                            </div>
                            <div class="button-slider-nav" id="tab-1-bestseller-nav" style="display: none;">
                                <div class="swiper-button-next swiper-button-next-tab-2"></div>
                                <div class="swiper-button-prev swiper-button-prev-tab-2"></div>
                            </div>
                            <div class="button-slider-nav" id="tab-1-mostviewed-nav" style="display: none;">
                                <div class="swiper-button-next swiper-button-next-tab-3"></div>
                                <div class="swiper-button-prev swiper-button-prev-tab-3"></div>
                            </div>
                        </div>
                        <!-- End Button slider-->
                    </div>
                </div>
            </div>
            <div class="tab-content tab-content-slider">
                <div class="tab-pane fade active show" id="tab-1-featured" role="tabpanel"
                    aria-labelledby="tab-1-featured">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-tab-1">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <div class="list-products-5">
                                        @foreach ($men as $product)
                                        <div class="card-grid-style-3">
                                            <div class="card-grid-inner">
                                                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                        href="#" aria-label="Trend"
                                                        data-bs-placement="left"></a><a
                                                        class="btn btn-wishlist btn-tooltip mb-10"
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customise/{{  $product->slug }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customise/{{  $product->slug }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customise/{{  $product->slug }}">Customise</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="list-products-5">

                                        @foreach ($secondMen as $product)
                                        <div class="card-grid-style-3">
                                            <div class="card-grid-inner">
                                                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                        href="#" aria-label="Trend"
                                                        data-bs-placement="left"></a><a
                                                        class="btn btn-wishlist btn-tooltip mb-10"
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customise/{{  $product->slug }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customise/{{  $product->slug }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customise/{{  $product->slug }}">Customise</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-1-bestseller" role="tabpanel" aria-labelledby="tab-1-bestseller">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-tab-2">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <div class="list-products-5">
                                        @foreach ($ladies as $product)
                                        <div class="card-grid-style-3">
                                            <div class="card-grid-inner">
                                                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                        href="#" aria-label="Trend"
                                                        data-bs-placement="left"></a><a
                                                        class="btn btn-wishlist btn-tooltip mb-10"
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customise/{{  $product->slug }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customise/{{  $product->slug }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customise/{{  $product->slug }}">Customise</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="list-products-5">

                                        @foreach ($secondLadies as $product)
                                        <div class="card-grid-style-3">
                                            <div class="card-grid-inner">
                                                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                        href="#" aria-label="Trend"
                                                        data-bs-placement="left"></a><a
                                                        class="btn btn-wishlist btn-tooltip mb-10"
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customise/{{  $product->slug }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customise/{{  $product->slug }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customise/{{  $product->slug }}">Customise</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-1-mostviewed" role="tabpanel" aria-labelledby="tab-1-mostviewed">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-tab-3">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <div class="list-products-5">
                                        @foreach ($kids as $product)
                                        <div class="card-grid-style-3">
                                            <div class="card-grid-inner">
                                                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                        href="#" aria-label="Trend"
                                                        data-bs-placement="left"></a><a
                                                        class="btn btn-wishlist btn-tooltip mb-10"
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customise/{{  $product->slug }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customise/{{  $product->slug }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customise/{{  $product->slug }}">Customise</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="list-products-5">

                                        @foreach ($secondKids as $product)
                                        <div class="card-grid-style-3">
                                            <div class="card-grid-inner">
                                                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                        href="#" aria-label="Trend"
                                                        data-bs-placement="left"></a><a
                                                        class="btn btn-wishlist btn-tooltip mb-10"
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customise/{{  $product->slug }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customise/{{  $product->slug }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customise/{{  $product->slug }}">Customise</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-box pt-60 pb-60 bg-gray-50 mt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="box-content">
                        <div class="head-main bd-gray-200">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6">
                                    <h4 class="mb-5">Trending Products</h4>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <!-- Button slider-->
                                    <div class="box-button-slider-normal">
                                        <div class="button-slider-nav" id="tab-1-all-nav">
                                            <div class="swiper-button-prev swiper-button-prev-tab-4"></div>
                                            <div class="swiper-button-next swiper-button-next-tab-4"></div>
                                        </div>
                                    </div>
                                    <!-- End Button slider-->
                                </div>
                            </div>
                        </div>
                        <div class="box-swiper">
                            <div class="swiper-container swiper-tab-4">
                                <div class="swiper-wrapper pt-5">
                                    <div class="swiper-slide">
                                        <div class="row">
                                            @foreach ($trendingProducts as $product)
                                            <div class="col-xl-3 col-lg-6 col-md-6">
                                                <div class="card-grid-style-3">
                                                    <div class="card-grid-inner">
                                                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                                href="#" aria-label="Trend"
                                                                data-bs-placement="left"></a><a
                                                                class="btn btn-wishlist btn-tooltip mb-10"
                                                                href="#"
                                                                aria-label="Add To Wishlist"></a><a
                                                                class="btn btn-compare btn-tooltip mb-10"
                                                                href="#" aria-label="Compare"></a><a
                                                                class="btn btn-quickview btn-tooltip"
                                                                aria-label="Quick view" href="#ModalQuickview"
                                                                data-bs-toggle="modal"></a></div>
                                                        <div class="image-box"></span><a
                                                                href="/product/customise/{{  $product->slug }}"><img
                                                                    src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                                    alt="Salem Apparel"></a></div>
                                                        <div class="info-right"><a class="font-xs color-gray-500"
                                                                href="#">{{ $product->brand }}</a><br><a
                                                                class="color-brand-3 font-sm-bold"
                                                                href="/product/customise/{{  $product->slug }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                            <div class="price-info"><strong
                                                                    class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                                {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                            </div>
                                                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                                    href="/product/customise/{{  $product->slug }}">Customise</a></div>
                                                            <ul class="list-features">
                                                                @foreach ($product->attributes as $attribute)
                                                                <li>{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-4">

                    <div class="box-slider-item box-sidebar">
                        <div class="head">
                            <h4 class="d-inline-block">New Products</h4>
                            <div class="box-button-control">
                                <div
                                    class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-featured">
                                </div>
                                <div
                                    class="swiper-button-next swiper-button-next-style-2 swiper-button-next-featured">
                                </div>
                            </div>
                        </div>
                        <div class="content-slider pl-10 pr-10">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-featured">
                                    <div class="swiper-wrapper pt-5">
                                        <div class="swiper-slide">
                                            @foreach ($footwears as $product)
                                            <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                                                <div class="image-box"><span class="label bg-brand-2"></span><a
                                                        href="/product/customise/{{  $product->slug }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"></a>
                                                </div>
                                                <div class="info-right"><a class="color-brand-3 font-xs-bold"
                                                        href="/product/customise/{{  $product->slug }}">{{$product->title}} </a>

                                                    <div class="price-info"><strong
                                                            class="font-md-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 }}</strong>

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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




    @endsection