@extends('layout.usermaster')
@section('usercontent')
<title>Home - Salem Apparels</title>
<meta name="description" content="Terms and Conditions for our website.">
<meta name="keywords" content="terms, conditions, user agreement">
<meta name="author" content="Salem Apparels">
<main class="main">

    <section class="section-box">
        <div class="banner-hero banner-1 pt-12">
            <div class="container"> <!-- Now aligned with menu -->
                <div class="row align-items-stretch">

                    <!-- Left: Banner (larger section) -->
                    <div class="col-lg-8 col-md-12 mb-30">
                        <div class="box-swiper h-100">
                            <div class="swiper-container swiper-group-1 h-100">
                                <div class="swiper-wrapper h-100">
                                    <!-- Static Slide -->
                                    <div class="swiper-slide h-100">
                                        <div class="banner-big banner-big-3 bg-22" style="background-image: url('{{ asset('userasset/imgs/slider/logo/10.png') }}'); background-size: cover; background-position: center; height: 350px;">
                                            <!-- Optional content -->
                                        </div>
                                    </div>

                                    <!-- Dynamic Slides -->
                                    @foreach ($bannerProducts as $bp)
                                    <div class="swiper-slide h-100 d-none d-sm-flex">
                                        <div class="banner-big banner-big-3 bg-22"
                                            style="background: radial-gradient(circle at top left, #c8e6f9 0%, #ffffff 60%); position: relative; height: 100%;">
                                            <img src="{{ $bp->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}"
                                                alt="{{ $bp->title }}"
                                                style="position: absolute; right: 0; bottom: 0; max-width: 200px; max-height: 250px;">

                                            @php
                                            $words = explode(' ', $bp->title);
                                            @endphp
                                            <h2 class="text-uppercase">
                                                @php
                                                $title = $bp->title;
                                                if (strlen($title) > 25) {
                                                $mainWords = Str::limit($title, 25, '');
                                                $rest = trim(Str::replaceFirst($mainWords, '', $title));
                                                } else {
                                                $mainWords = $title;
                                                $rest = '';
                                                }
                                                @endphp
                                                {{ $mainWords }}
                                                @if($rest)
                                                <br>
                                                {{ $rest }}
                                                @endif

                                            </h2>

                                            <ul class="list-disc">
                                                @foreach ($bp->attributes as $attribute)
                                                <li class="font-lg color-brand-3">{{ Str::replace(':', ': ', $attribute->attribute) }}</li>
                                                @endforeach
                                            </ul>

                                            <div class="mt-30">
                                                <a class="btn btn-brand-2 btn-gray-1000" href="/product/customise/{{  $bp->slug }}">Customise</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination swiper-pagination-1"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Small Image Column -->
                    <div class="col-lg-4 col-md-12 mb-30 d-none d-sm-flex">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <img src="{{ asset('userasset/imgs/slider/logo/15.png') }}" style="width: 100%; max-width: 180px; height: auto; margin-bottom: 10px; object-fit: contain; display: block; margin-left: auto; margin-right: auto;">
                            <img src="{{ asset('userasset/imgs/slider/logo/14.png') }}" style="width: 100%; max-width: 180px; height: auto; object-fit: contain; display: block; margin-left: auto; margin-right: auto;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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


    <!-- Headwear Section -->
    <div class="section-box d-none d-sm-flex">
        <div class="container">
            <div class="row mt-60">
                @php
                $headwearz = $headwears->take(4);
                @endphp

                @foreach($headwearz as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-style-2 card-grid-style-2-small">
                        <div class="image-box"><a href="#"><img
                                    src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$bp->title}}"></a>
                            <div class="mt-10 text-center"><a class="btn btn-gray" href="/product/customise/{{  $product->slug }}">Customise</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold" href="#">
                                <h6>{{$product->type}}</h6>
                            </a>
                            <ul class="list-links-disc">
                                @foreach ($product->attributes as $attribute)
                                <li><a class="font-sm color-brand-3" href="#">{{ Str::replace(':', ': ', $attribute->attribute) }}</li></a>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Headwear Section -->

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