@extends('layout.usermaster')
@section('usercontent')
<title>Home - Salem Apparels</title>
<meta name="description" content="Terms and Conditions for our website.">
<meta name="keywords" content="terms, conditions, user agreement">
<meta name="author" content="Salem Apparels">
<main class="main">
    <section class="section-box">
        <div class="banner-hero banner-1 pt-10">
            <div class="container">
                <div class="row">

                    <div class="col-xl-7 col-lg-12 col-md-12 mb-30">
                        <div class="box-swiper">
                            <div class="swiper-container swiper-group-1">

                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="banner-big banner-big-3 bg-22" style="background-image: url('{{ asset('userasset/imgs/page/homepage4/banner_first.jpg') }}')" style="background-size: cover; background-position: center;">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @foreach ($bannerProducts as $bp)
                                    <div class="swiper-slide">
                                        <div class="banner-big sbanner-big-3 bg-22"
     style="background: radial-gradient(circle at top left, #c8e6f9 0%, #ffffff 60%);">
    <img src="{{ $bp->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}"
         alt="{{ $bp->title}}"
         style="position: absolute; right: 0; bottom: 0; max-width: 300px; max-height: 300px;">

    @php
    $words = explode(' ', $bp->title);
    @endphp

    <h2 class="color-gray-100 text-uppercase text-shadow">
        {{ $words[0] ?? '' }} {{ $words[1] ?? '' }}<br>
        {{ implode(' ', array_slice($words, 2)) }}
    </h2>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <ul class="list-disc">
                @foreach ($bp->attributes as $attribute)
                <li class="font-lg color-brand-3">
                    {{ $attribute->attribute }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="mt-30">
        <a class="btn btn-brand-2 btn-gray-1000" href="shop-list-2.html">Customize</a>
        <a class="btn btn-link text-underline" href="shop-list-2.html">Learn more</a>
    </div>
</div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="swiper-pagination swiper-pagination-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12 col-md-12">
                <div class="row">
                  <div class="col-xl-7 col-lg-9 col-md-8 col-sm-12 mb-30">
                    <div class="bg-metaverse bg-22 pt-25 mb-20 pl-20 h-175">
                      <h3 class="mb-10 font-32">Metaverse</h3>
                      <p class="font-16">The Future of Creativity</p>
                      <div class="mt-10"><a class="btn btn-link-brand-2 btn-arrow-brand-2" href="shop-list-2.html">learn more</a></div>
                    </div>
                    <div class="bg-4 box-bdrd-4 bg-headphone pt-20 mh-307"><span class="font-md color-brand-3">Headphone</span>
                      <h4 class="font-32 color-gray-1000 mb-10 mt-5">Rockez 547</h4>
                      <p class="color-brand-1 font-sm">MUSIC EVERYWHERE<br class="d-none d-lg-block">ANYTIME</p>
                      <div class="mt-35"><a class="btn btn-brand-2 btn-arrow-right" href="shop-list-2.html">Shop Now</a></div>
                    </div>
                  </div>
                  <div class="col-xl-5 col-lg-3 col-md-4 col-sm-12">
                    <div class="box-promotions">
                      <!-- Swiper-->
                      <div class="swiper swiper-vertical-1">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide"><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion1.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion2.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion3.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion4.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion5.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion6.png') }}" alt="Ecom"></a></div>
                          <div class="swiper-slide"><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion2.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion4.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion6.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion1.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion3.png') }}" alt="Ecom"></a><a href="shop-list-2.html"><img src="{{ asset('userasset/imgs/page/homepage4/promotion5.png') }}" alt="Ecom"></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="section-box">
            <div class="container">
                <div class="list-brands list-none-border">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-10">
                            <div class="swiper-wrapper">
                              @foreach ($brands as $brand)
    <div class="swiper-slide" style="font-family: 'Orbitron', sans-serif; font-sizse: 16px; color: #bcc3ce; font-weight: 600; text-transform: uppercase; margin: 0 10px;">
        <h5 style="margin: 0;">{{ $brand->brand }}</h5>
    </div>
@endforeach





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <div class="section-box">
        <div class="container">
            <div class="list-brands list-none-border">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-10">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/awdis.png') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Ecom"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/adc.avif') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Ecom"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/anthem.jpg') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Ecom"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/bagbase.png') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Ecom"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/brook.png') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Ecom"></a></div>
                            <div class="swiper-slide"><a href="#"><img src="{{ asset('userasset/imgs/slider/logo/baby.jpg') }}" style="max-height: 50px; width: auto; opacity: 0.8; object-fit: contain;" alt="Ecom"></a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-box">
        <div class="container">
            <div class="row mt-60">
                @php
                $headwearz = $headwears->take(4);
                @endphp

                @foreach($headwearz as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a href="shop-fullwidth.html"><img
                                    src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$bp->title}}"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray" href="shop-fullwidth.html">customize</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold" href="shop-fullwidth.html">
                                <h6>{{$product->type}}</h6>
                            </a>
                            <ul class="list-links-disc">
                                @foreach ($product->attributes as $attribute)
                                <li><a class="font-sm" href="shop-fullwidth.html">{{ $attribute->attribute }}</li></a>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
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
                                                        href="shop-wishlist.html"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="shop-compare.html" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><span
                                                        class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Ecom"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span
                                                            class="font-xs color-gray-500">(65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="shop-cart.html">Customize</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ $attribute->attribute }}</li>
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
                                                        href="shop-wishlist.html"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="shop-compare.html" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><span
                                                        class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Ecom"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span
                                                            class="font-xs color-gray-500">(65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="shop-cart.html">Customize</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ $attribute->attribute }}</li>
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
                                                        href="shop-wishlist.html"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="shop-compare.html" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><span
                                                        class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Ecom"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span
                                                            class="font-xs color-gray-500">(65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="shop-cart.html">Customize</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ $attribute->attribute }}</li>
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
                                                        href="shop-wishlist.html"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="shop-compare.html" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><span
                                                        class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Ecom"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span
                                                            class="font-xs color-gray-500">(65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="shop-cart.html">Customize</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ $attribute->attribute }}</li>
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
                                                        href="shop-wishlist.html"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="shop-compare.html" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><span
                                                        class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Ecom"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span
                                                            class="font-xs color-gray-500">(65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="shop-cart.html">Customize</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ $attribute->attribute }}</li>
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
                                                        href="shop-wishlist.html"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="shop-compare.html" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><span
                                                        class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Ecom"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span
                                                            class="font-xs color-gray-500">(65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="shop-cart.html">Customize</a></div>
                                                    <ul class="list-features">
                                                        @foreach ($product->attributes as $attribute)
                                                        <li>{{ $attribute->attribute }}</li>
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
                                                                href="shop-wishlist.html"
                                                                aria-label="Add To Wishlist"></a><a
                                                                class="btn btn-compare btn-tooltip mb-10"
                                                                href="shop-compare.html" aria-label="Compare"></a><a
                                                                class="btn btn-quickview btn-tooltip"
                                                                aria-label="Quick view" href="#ModalQuickview"
                                                                data-bs-toggle="modal"></a></div>
                                                        <div class="image-box"><span
                                                                class="label bg-brand-2">-17%</span><a
                                                                href="shop-single-product.html"><img
                                                                    src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                                    alt="Ecom"></a></div>
                                                        <div class="info-right"><a class="font-xs color-gray-500"
                                                                href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                                class="color-brand-3 font-sm-bold"
                                                                href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                            <div class="rating"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><span
                                                                    class="font-xs color-gray-500">(65)</span></div>
                                                            <div class="price-info"><strong
                                                                    class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                                {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                            </div>
                                                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                                    href="shop-cart.html">Customize</a></div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-20"><a href="shop-single-product.html"><img
                                    src="{{ asset('userasset/imgs/page/homepage4/cloth_banner.jpg') }}"
                                    alt="Ecom"></a></div>
                    </div>
                    <div class="box-content mt-45">
                        <div class="head-main bd-gray-200">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6">
                                    <h4 class="mb-5">Top Rate Products</h4>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <!-- Button slider-->
                                    <div class="box-button-slider-normal">
                                        <div class="button-slider-nav" id="tab-2-all-nav">
                                            <div class="swiper-button-prev swiper-button-prev-tab-5"></div>
                                            <div class="swiper-button-next swiper-button-next-tab-5"></div>
                                        </div>
                                    </div>
                                    <!-- End Button slider-->
                                </div>
                            </div>
                        </div>
                        <div class="box-swiper">
                            <div class="swiper-container swiper-tab-5">
                                <div class="swiper-wrapper pt-5">
                                    <div class="swiper-slide">
                                        <div class="row">
                                            @foreach ($topRates as $product)
                                            <div class="col-xl-3 col-lg-6 col-md-6">
                                                <div class="card-grid-style-3">
                                                    <div class="card-grid-inner">
                                                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10"
                                                                href="#" aria-label="Trend"
                                                                data-bs-placement="left"></a><a
                                                                class="btn btn-wishlist btn-tooltip mb-10"
                                                                href="shop-wishlist.html"
                                                                aria-label="Add To Wishlist"></a><a
                                                                class="btn btn-compare btn-tooltip mb-10"
                                                                href="shop-compare.html" aria-label="Compare"></a><a
                                                                class="btn btn-quickview btn-tooltip"
                                                                aria-label="Quick view" href="#ModalQuickview"
                                                                data-bs-toggle="modal"></a></div>
                                                        <div class="image-box"><span
                                                                class="label bg-brand-2">-17%</span><a
                                                                href="shop-single-product.html"><img
                                                                    src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                                    alt="Ecom"></a></div>
                                                        <div class="info-right"><a class="font-xs color-gray-500"
                                                                href="shop-vendor-single.html">{{ $product->brand }}</a><br><a
                                                                class="color-brand-3 font-sm-bold"
                                                                href="shop-single-product.html">{{ $product->title . ' ' . $product->sku }}</a>
                                                            <div class="rating"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><img
                                                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                                    alt="Ecom"><span
                                                                    class="font-xs color-gray-500">(65)</span></div>
                                                            <div class="price-info"><strong
                                                                    class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                                {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                            </div>
                                                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                                    href="shop-cart.html">Customize</a></div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="box-slider-item box-sidebar">
                        <div class="head">
                            <h4 class="d-inline-block">Best seller</h4>
                            <div class="box-button-control">
                                <div
                                    class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-bestseller">
                                </div>
                                <div
                                    class="swiper-button-next swiper-button-next-style-2 swiper-button-next-bestseller">
                                </div>
                            </div>
                        </div>
                        <div class="content-slider pl-10 pr-10">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-best-seller">
                                    <div class="swiper-wrapper pt-5">
                                        <div class="swiper-slide">
                                            @foreach ($headwears as $product)
                                            <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                                                <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"></a>
                                                </div>
                                                <div class="info-right"><a class="color-brand-3 font-xs-bold"
                                                        href="shop-single-product.html">{{$product->title}} </a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span class="font-xs color-gray-500">
                                                            (65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-md-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3}}</strong>
                                                        {{-- <span class="color-gray-500 font-sm price-line">$3225.6</span> --}}
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
                    @foreach ($bannerSides as $bannerSide)
                    <div style="
        height: 500px;
        padding: 40px 20px;
        background: linear-gradient(to bottom, #c8e6f9 0%,rgb(255, 255, 255) 100%);
        position: relative;
        text-align: center;
        overflow: hidden;
    ">
                        <span style="font-size: 11px; color: #007BFF; background: #E6F4FF; padding: 2px 8px; border-radius: 10px; display: inline-block;">No.9</span>

                        <h5 style="font-size: 23px; margin-top: 20px; color: #2c3e50;">
                            {{ $bannerSide->title }}
                        </h5>

                        @foreach ($bannerSide->attributes as $attribute)
                        <p style="font-size: 16px; margin-top: 15px; color: #34495e;">
                            {{ $attribute->attribute }}
                        </p>
                        @endforeach

                        {{-- Arm image --}}
                        <img src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}" alt="{{ $bannerSide->title }}"
                            style="position: absolute; bottom: 0; left: 0; height: 150px; object-fit: cover; z-index: 0;">
                    </div>
                    @endforeach

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
                                                <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                                        href="shop-single-product.html"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"></a>
                                                </div>
                                                <div class="info-right"><a class="color-brand-3 font-xs-bold"
                                                        href="shop-single-product.html">{{$product->title}} </a>
                                                    <div class="rating"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><img
                                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                                            alt="Ecom"><span class="font-xs color-gray-500">
                                                            (65)</span></div>
                                                    <div class="price-info"><strong
                                                            class="font-md-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 }}</strong>
                                                        {{-- <span class="color-gray-500 font-sm price-line">$3225.6</span> --}}
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
    <section class="section-box pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 mb-30">
                    <div class="bg-5 block-iphone"><span class="color-brand-3 font-sm-lh32">Starting from
                            $899</span>
                        <h3 class="font-xl mb-10">iPhone 12 Pro 128Gb</h3>
                        <p class="font-base color-brand-3 mb-10">Special Sale</p><a class="btn btn-arrow"
                            href="shop-grid.html">learn more</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-7 col-md-7 col-sm-12 mb-30">
                    <div class="bg-4 block-samsung"><span class="color-brand-3 font-sm-lh32">New Arrivals</span>
                        <h3 class="font-xl mb-10">Samsung 2022 Led TV</h3>
                        <p class="font-base color-brand-3 mb-20">Special Sale</p><a
                            class="btn btn-brand-2 btn-arrow-right" href="shop-grid.html">learn more</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                    <div class="bg-6 block-drone">
                        <h3 class="font-33 mb-20">Drone Quadcopter UAV - DJI Air 2S</h3>
                        <div class="mb-30"><strong class="font-18">Gimbal Camera, 5.4K Video</strong></div><a
                            class="btn btn-brand-2 btn-arrow-right" href="shop-grid.html">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="head-main">
                        <h3 class="mb-5">Top Selling Products</h3>
                        <p class="font-base color-gray-500">Special products in this month.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($topSellings as $product)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card-grid-style-2">
                        <div class="image-box"><a href="#"><img
                                    src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"></a></div>
                        <div class="info-right"><span class="font-xs color-gray-500">{{ $product->type }}</span><br><a
                                class="color-brand-3 font-sm-bold" href="#">{{ $product->title. ' ' .$product->sku }}</a>
                            <div class="rating"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img
                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img
                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img
                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img
                                    src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3}}</strong></div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>
    <section class="section-box pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-7 col-md-7 col-sm-12 mb-30">
                    <div class="bg-4 block-charge"><span class="color-brand-3 font-sm-lh32">Power Bank</span>
                        <h3 class="font-xl mb-10">Quick Charge</h3>
                        <p class="font-base color-brand-3 mb-20">Lightweight and Portable<br
                                class="d-none d-lg-block"> Dual port fast charge</p><a
                            class="btn btn-brand-2 btn-arrow-right" href="shop-fullwidth.html">Customize</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="bg-6 block-player">
                        <h3 class="font-33 mb-20">Xbox Series XS Game Controller</h3>
                        <div class="mb-30"><strong class="font-16">Replacement Kit D-pad ABXY Keys</strong></div><a
                            class="btn btn-brand-3 btn-arrow-right" href="shop-fullwidth.html">learn more</a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 mb-30">
                    <div class="bg-5 block-iphone"><span class="color-brand-3 font-sm-lh32">Starting from
                            $899</span>
                        <h3 class="font-xl mb-10">iPhone 12 Pro 128Gb</h3>
                        <p class="font-base color-brand-3 mb-10">Special Sale</p><a class="btn btn-arrow"
                            href="shop-fullwidth.html">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="head-main">
                <h3 class="mb-5">Latest News &amp; Events</h3>
                <p class="font-base color-gray-500">From our blog, forum</p>
                <div class="box-button-slider">
                    <div class="swiper-button-next swiper-button-next-group-4"></div>
                    <div class="swiper-button-prev swiper-button-prev-group-4"></div>
                </div>
            </div>
        </div>
        <div class="container mt-10">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-4">
                    <div class="swiper-wrapper pt-5">
                        <div class="swiper-slide">
                            <div class="card-grid-style-1">
                                <div class="image-box"><a href="blog-single-2.html"></a><img
                                        src="{{ asset('userasset/imgs/page/blog/blog-1.jpg') }}" alt="Ecom">
                                </div><a class="tag-dot font-xs" href="blog-list.html">Technology</a><a
                                    class="color-gray-1100" href="blog-single-2.html">
                                    <h4>The latest technologies to be used for VR in 2022</h4>
                                </a>
                                <div class="mt-20"><span class="color-gray-500 font-xs mr-30">September 02,
                                        2022</span><span class="color-gray-500 font-xs">4<span> Mins
                                            read</span></span></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-grid-style-1">
                                <div class="image-box"><a href="blog-single.html"></a><img
                                        src="{{ asset('userasset/imgs/page/blog/blog-2.jpg') }}" alt="Ecom">
                                </div><a class="tag-dot font-xs" href="blog-list.html">Technology</a><a
                                    class="color-gray-1100" href="blog-single.html">
                                    <h4>How can Web 3.0 Bring Changes to the Gaming?</h4>
                                </a>
                                <div class="mt-20"><span class="color-gray-500 font-xs mr-30">August 30,
                                        2022</span><span class="color-gray-500 font-xs">5<span> Mins
                                            read</span></span></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-grid-style-1">
                                <div class="image-box"><a href="blog-single-3.html"></a><img
                                        src="{{ asset('userasset/imgs/page/blog/blog-3.jpg') }}" alt="Ecom">
                                </div><a class="tag-dot font-xs" href="blog-list.html">Gaming</a><a
                                    class="color-gray-1100" href="blog-single-3.html">
                                    <h4>NFT Blockchain Games That Might Take Off</h4>
                                </a>
                                <div class="mt-20"><span class="color-gray-500 font-xs mr-30">August 25,
                                        2022</span><span class="color-gray-500 font-xs">3<span> Mins
                                            read</span></span></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-grid-style-1">
                                <div class="image-box"><a href="blog-single-2.html"></a><img
                                        src="{{ asset('userasset/imgs/page/blog/blog-4.jpg') }}" alt="Ecom">
                                </div><a class="tag-dot font-xs" href="blog-list.html">Blockchain</a><a
                                    class="color-gray-1100" href="blog-single-2.html">
                                    <h4>Blockchain Gaming And Its Three Challenges</h4>
                                </a>
                                <div class="mt-20"><span class="color-gray-500 font-xs mr-30">August 15,
                                        2022</span><span class="color-gray-500 font-xs">7<span> Mins
                                            read</span></span></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-grid-style-1">
                                <div class="image-box"><a href="blog-single-2.html"></a><img
                                        src="{{ asset('userasset/imgs/page/blog/blog-5.jpg') }}" alt="Ecom">
                                </div><a class="tag-dot font-xs" href="blog-list.html">Development</a><a
                                    class="color-gray-1100" href="blog-single-2.html">
                                    <h4>HTML5 – The Future of Mobile App Development</h4>
                                </a>
                                <div class="mt-20"><span class="color-gray-500 font-xs mr-30">August 12,
                                        2022</span><span class="color-gray-500 font-xs">9<span> Mins
                                            read</span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-90 mb-50">
        <div class="container">
            <ul class="list-col-5">
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/delivery.svg') }}"
                                alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
                            <p class="font-sm color-gray-500">From all orders over $10</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/support.svg') }}"
                                alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
                            <p class="font-sm color-gray-500">Shop with an expert</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/voucher.svg') }}"
                                alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
                            <p class="font-sm color-gray-500">Refer a friend</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/return.svg') }}"
                                alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
                            <p class="font-sm color-gray-500">Free return over $200</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/secure.svg') }}"
                                alt="Ecom"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Secure payment</h5>
                            <p class="font-sm color-gray-500">100% Protected</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="section-box box-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-12">
                    <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount
                    </h3>
                    <p class="font-lg color-white">Get E-mail updates about our latest shop and <span
                            class="font-lg-bold">special offers.</span></p>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <div class="box-form-newsletter mt-15">
                        <form class="form-newsletter">
                            <input class="input-newsletter font-xs" value=""
                                placeholder="Your email Address">
                            <button class="btn btn-brand-2">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="ModalQuickview" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content apply-job-form">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-30">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="gallery-image">
                                <div class="galleries-2">
                                    <div class="detail-gallery">
                                        <div class="product-image-slider-2">
                                            <figure class="border-radius-10"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-1.jpg') }}"
                                                    alt="product image"></figure>
                                            <figure class="border-radius-10"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-2.jpg') }}"
                                                    alt="product image"></figure>
                                            <figure class="border-radius-10"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-3.jpg') }}"
                                                    alt="product image"></figure>
                                            <figure class="border-radius-10"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-4.jpg') }}"
                                                    alt="product image"></figure>
                                            <figure class="border-radius-10"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-5.jpg') }}"
                                                    alt="product image"></figure>
                                            <figure class="border-radius-10"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-6.jpg') }}"
                                                    alt="product image"></figure>
                                            <figure class="border-radius-10"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-7.jpg') }}"
                                                    alt="product image"></figure>
                                        </div>
                                    </div>
                                    <div class="slider-nav-thumbnails-2">
                                        <div>
                                            <div class="item-thumb"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-1.jpg') }}"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-2.jpg') }}"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-3.jpg') }}"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-4.jpg') }}"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-5.jpg') }}"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-6.jpg') }}"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img
                                                    src="{{ asset('userasset/imgs/page/product/img-gallery-7.jpg') }}"
                                                    alt="product image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tags">
                                <div class="d-inline-block mr-25"><span
                                        class="font-sm font-medium color-gray-900">Category:</span><a class="link"
                                        href="#">Smartphones</a></div>
                                <div class="d-inline-block"><span
                                        class="font-sm font-medium color-gray-900">Tags:</span><a class="link"
                                        href="#">Blue</a>,<a class="link" href="#">Smartphone</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-info">
                                <h5 class="mb-15">SAMSUNG Galaxy S22 Ultra, 8K Camera & Video, Brightest Display
                                    Screen, S Pen Pro</h5>
                                <div class="info-by"><span
                                        class="bytext color-gray-500 font-xs font-medium">by</span><a
                                        class="byAUthor color-gray-900 font-xs font-medium"
                                        href="shop-vendor-list.html"> Ecom Tech</a>
                                    <div class="rating d-inline-block"><img
                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                            alt="Ecom"><img
                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                            alt="Ecom"><img
                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                            alt="Ecom"><img
                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                            alt="Ecom"><img
                                            src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                            alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65
                                            reviews)</span></div>
                                </div>
                                <div class="border-bottom pt-10 mb-20"></div>
                                <div class="box-product-price">
                                    <h3 class="color-brand-3 price-main d-inline-block mr-10">$2856.3</h3><span
                                        class="color-gray-500 price-line font-xl line-througt">$3225.6</span>
                                </div>
                                <div class="product-description mt-10 color-gray-900">
                                    <ul class="list-dot">
                                        <li>8k super steady video</li>
                                        <li>Nightography plus portait mode</li>
                                        <li>50mp photo resolution plus bright display</li>
                                        <li>Adaptive color contrast</li>
                                        <li>premium design & craftmanship</li>
                                        <li>Long lasting battery plus fast charging</li>
                                    </ul>
                                </div>
                                <div class="box-product-color mt-10">
                                    <p class="font-sm color-gray-900">Color:<span
                                            class="color-brand-2 nameColor">Pink Gold</span></p>
                                    <ul class="list-colors">
                                        <li class="disabled"><img
                                                src="{{ asset('userasset/imgs/page/product/img-gallery-1.jpg') }}"
                                                alt="Ecom" title="Pink"></li>
                                        <li><img src="{{ asset('userasset/imgs/page/product/img-gallery-2.jpg') }}"
                                                alt="Ecom" title="Gold"></li>
                                        <li><img src="{{ asset('userasset/imgs/page/product/img-gallery-3.jpg') }}"
                                                alt="Ecom" title="Pink Gold"></li>
                                        <li><img src="{{ asset('userasset/imgs/page/product/img-gallery-4.jpg') }}"
                                                alt="Ecom" title="Silver"></li>
                                        <li class="active"><img
                                                src="{{ asset('userasset/imgs/page/product/img-gallery-5.jpg') }}"
                                                alt="Ecom" title="Pink Gold"></li>
                                        <li class="disabled"><img
                                                src="{{ asset('userasset/imgs/page/product/img-gallery-6.jpg') }}"
                                                alt="Ecom" title="Black"></li>
                                        <li class="disabled"><img
                                                src="{{ asset('userasset/imgs/page/product/img-gallery-7.jpg') }}"
                                                alt="Ecom" title="Red"></li>
                                    </ul>
                                </div>
                                <div class="box-product-style-size mt-10">
                                    <div class="row">
                                        <div class="col-lg-12 mb-10">
                                            <p class="font-sm color-gray-900">Style:<span
                                                    class="color-brand-2 nameStyle">S22</span></p>
                                            <ul class="list-styles">
                                                <li class="disabled" title="S22 Ultra">S22 Ultra</li>
                                                <li class="active" title="S22">S22</li>
                                                <li title="S22 + Standing Cover">S22 + Standing Cover</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 mb-10">
                                            <p class="font-sm color-gray-900">Size:<span
                                                    class="color-brand-2 nameSize">512GB</span></p>
                                            <ul class="list-sizes">
                                                <li class="disabled" title="1GB">1GB</li>
                                                <li class="active" title="512 GB">512 GB</li>
                                                <li title="256 GB">256 GB</li>
                                                <li title="128 GB">128 GB</li>
                                                <li class="disabled" title="64GB">64GB</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="buy-product mt-5">
                                    <p class="font-sm mb-10">Quantity</p>
                                    <div class="box-quantity">
                                        <div class="input-quantity">
                                            <input class="font-xl color-brand-3" type="text"
                                                value="1"><span class="minus-cart"></span><span
                                                class="plus-cart"></span>
                                        </div>
                                        <div class="button-buy"><a class="btn btn-cart" href="shop-cart.html">Add
                                                to cart</a><a class="btn btn-buy" href="shop-checkout.html">Buy
                                                now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
