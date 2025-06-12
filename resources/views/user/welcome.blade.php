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
                                        <div class="banner-big banner-big-3 bg-22" style="background-image: url('{{ asset('userasset/imgs/slider/logo/10.png') }}')" style="background-size: cover; backgrousnd-position: center;">

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
                                                style="position: absolute; right: 0; bottom: 0; max-width: 300px; max-height: 250px;">

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
                                                <a class="btn btn-brand-2 btn-gray-1000" href="/product/customize/{{  $bp->id }}">Customise</a>

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
                        <div class="row d-none d-sm-flex">
                            <div class="col-xl-7 col-lg-9 col-md-8 col-sm-12 mb-30">
                                <img src="{{ asset('userasset/imgs/page/homepage4/embroidery.jpg') }}" style="width: 100%; height: auto;">
                                <img src="{{ asset('userasset/imgs/page/homepage4/prints.jpg') }}" style="width: 100%;">
                            </div>
                            <div class="col-xl-5 col-lg-3 col-md-4 col-sm-12">
                                <div class="box-promotions">
                                    <!-- Swiper-->
                                    <div class="swiper swiper-vertical-1">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion1.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion2.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion3.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion4.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion5.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion6.png') }}" alt="Salem Apparel"></a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion2.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion4.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion6.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion1.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion3.png') }}" alt="Salem Apparel"></a>
                                                <a href="#"><img src="{{ asset('userasset/imgs/page/homepage4/promotion5.png') }}" alt="Salem Apparel"></a>
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
                            <div class="mt-10 text-center"><a class="btn btn-gray" href="/product/customize/{{  $product->id }}">Customise</a></div>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-sm-bold" href="#">
                                <h6>{{$product->type}}</h6>
                            </a>
                            <ul class="list-links-disc">
                                @foreach ($product->attributes as $attribute)
                                <li><a class="font-sm" href="#">{{ $attribute->attribute }}</li></a>
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
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customize/{{  $product->id }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customize/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customize/{{  $product->id }}">Customise</a></div>
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
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customize/{{  $product->id }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customize/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customize/{{  $product->id }}">Customise</a></div>
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
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customize/{{  $product->id }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customize/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customize/{{  $product->id }}">Customise</a></div>
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
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customize/{{  $product->id }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customize/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customize/{{  $product->id }}">Customise</a></div>
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
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customize/{{  $product->id }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customize/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customize/{{  $product->id }}">Customise</a></div>
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
                                                        href="#"
                                                        aria-label="Add To Wishlist"></a><a
                                                        class="btn btn-compare btn-tooltip mb-10"
                                                        href="#" aria-label="Compare"></a><a
                                                        class="btn btn-quickview btn-tooltip"
                                                        aria-label="Quick view" href="#ModalQuickview"
                                                        data-bs-toggle="modal"></a></div>
                                                <div class="image-box"><a
                                                        href="/product/customize/{{  $product->id }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                            alt="Salem Apparel"></a></div>
                                                <div class="info-right"><a class="font-xs color-gray-500"
                                                        href="#">{{ $product->brand }}</a><br><a
                                                        class="color-brand-3 font-sm-bold"
                                                        href="/product/customize/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>

                                                    <div class="price-info"><strong
                                                            class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                        {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                    </div>
                                                    <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                            href="/product/customize/{{  $product->id }}">Customise</a></div>
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
                                                                href="#"
                                                                aria-label="Add To Wishlist"></a><a
                                                                class="btn btn-compare btn-tooltip mb-10"
                                                                href="#" aria-label="Compare"></a><a
                                                                class="btn btn-quickview btn-tooltip"
                                                                aria-label="Quick view" href="#ModalQuickview"
                                                                data-bs-toggle="modal"></a></div>
                                                        <div class="image-box"><span
                                                                class="label bg-brand-2"></span><a
                                                                href="/product/customize/{{  $product->id }}"><img
                                                                    src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"
                                                                    alt="Salem Apparel"></a></div>
                                                        <div class="info-right"><a class="font-xs color-gray-500"
                                                                href="#">{{ $product->brand }}</a><br><a
                                                                class="color-brand-3 font-sm-bold"
                                                                href="/product/customize/{{  $product->id }}">{{ $product->title . ' ' . $product->sku }}</a>
                                                            
                                                            <div class="price-info"><strong
                                                                    class="font-lg-bold color-brand-3 price-main">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</strong>
                                                                {{-- <span class="color-gray-500 price-line">£3225.6</span> --}}
                                                            </div>
                                                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart"
                                                                    href="/product/customize/{{  $product->id }}">Customise</a></div>
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
                        <div class="mt-20"><a href="/shop"><img
                                    src="{{ asset('userasset/imgs/page/homepage4/cloth_banner.jpg') }}"
                                    alt="Salem Apparel"></a></div>
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
                                                        href="/product/customize/{{  $product->id }}"><img
                                                            src="{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{$product->title}}"></a>
                                                </div>
                                                <div class="info-right"><a class="color-brand-3 font-xs-bold"
                                                        href="/product/customize/{{  $product->id }}">{{$product->title}} </a>
                                                   
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


    <section class="section-box mt-90 mb-50">
        <div class="container">
            <ul class="list-col-5">
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/delivery.svg') }}"
                                alt="Salem Apparel"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
                            <p class="font-sm color-gray-500">From all orders over $10</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/support.svg') }}"
                                alt="Salem Apparel"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
                            <p class="font-sm color-gray-500">Shop with an expert</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/voucher.svg') }}"
                                alt="Salem Apparel"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
                            <p class="font-sm color-gray-500">Refer a friend</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/return.svg') }}"
                                alt="Salem Apparel"></div>
                        <div class="info-right">
                            <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
                            <p class="font-sm color-gray-500">Free return over $200</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-list">
                        <div class="icon-left"><img src="{{ asset('userasset/imgs/template/secure.svg') }}"
                                alt="Salem Apparel"></div>
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
                <div class="col-lg-6 col-md-7 col-sm-12">
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
