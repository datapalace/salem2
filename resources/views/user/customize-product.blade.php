@php use Illuminate\Support\Str; @endphp

@extends('layout.usermaster')
@section('usercontent')
<title>{{ $product->title }} - Salem Apparels</title>
<meta name="description" content="Salem Apparels - customise your products with ease.">
<meta name="keywords" content="Salem Apparels, customise Products, Online Shopping, E-commerce">
<meta name="author" content="Salem Apparels">
<!-- Include Fabric.js -->
<main class="main">

    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-100" href="/">Home</a></li>
                    <li><a class="font-xs color-gray-500" href="/shop/category/{{$product->type}}">{{ $product->type}}</a></li>

                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="gallery-image">
                        <div class="galleries">
                            <div class="detail-gallery">


                                <div class="product-image-slider">
                                    @foreach ($product->galleries as $gallery)
                                    <figure class="border-radius-10"><img src="{{ $gallery->image_url }}"
                                            alt="{{$product->title}}"></figure>
                                    @endforeach

                                </div>
                            </div>
                            
                            <div class="slider-nav-thumbnails" id="slider-nav-thumbnails">
                                @foreach ($product->galleries as $gallery)
                                <div>
                                    <div class="item-thumb">
                                        <img src="{{ $gallery->image_url }}" alt="product image">
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h3 class="color-brand-3 mb-25">{{ $product->title . ' ' . $product->style_code }}</h3>
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-sm-3 mb-mobile"><span
                                class="bytext color-gray-500 font-xs font-medium">by</span><a
                                class="byAUthor color-gray-900 font-xs font-medium" href="#">
                                Salem</a>
                            <div class="rating mt-5"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65 reviews)</span>
                            </div>
                        </div>

                    </div>
                    <div class="border-bottom pt-10 mb-20"></div>
                    <div class="box-product-price">
                        <h3 class="color-brand-3 price-main d-inline-block mr-10">
                            £{{ $product->price->single_list_price + 3 }}</h3>
                        <!-- <span class="color-gray-500 price-line font-xl line-througt">$3225.6</span> -->
                    </div>
                    <div class="product-description mt-20 color-gray-900">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-dot">
                                    @foreach ($product->attributes->take(3) as $attribute)
                                    <li class="font-lg color-brand-3">
                                        {{ Str::replace(':', ': ', $attribute->attribute) }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-dot">
                                    @foreach ($product->attributes->skip(3)->take(3) as $attribute)
                                    <li class="font-lg color-brand-3">
                                        {{ Str::replace(':', ': ', $attribute->attribute) }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-product-color mt-20">
                        <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink Gold</span></p>
                        <ul class="list-colors">
                            <!-- <li class="disabled"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom" title="Pink"></li> -->
                            <!-- loop product color from the same product table -->

                            @foreach ($relatedProducts as $colourway => $products)
                            @php
                            $relatedProduct = $products->first();
                            @endphp

                            <li class="related-product-thumb"
                                data-gallery='@json($relatedProduct->galleries->pluck("image_url"))'>
                                <img src="{{ $relatedProduct->galleries[0]->image_url ?? asset('userasset/imgs/page/product/img-gallery-2.jpg') }}"
                                    alt="Salem Apparel"
                                    title="{{ $relatedProduct->colourway_name }}">
                            </li>
                            @endforeach

                            <!-- <li class="disabled"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom" title="Black"></li>
                  <li class="disabled"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom" title="Red"></li> -->
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="box-product-color mt-20">
                                <select name="color" id="" class="form-select form-select-sm">
                                    <option value="">Select Your Preffered Colour</option>
                                    <option value="Red">Red</option>
                                    <option value="Blue">blue</option>
                                    <option value="White">White</option>
                                    <option value="Black">Black</option>
                                    <option value="Green">Green</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Pink">Pink</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="box-product-color mt-20">
                                <select name="size" id="" class="form-select form-select-sm">
                                    <option value="">Select Your Preffered Colour</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                    <option value="Pink">Pink</option>

                                </select>
                            </div>
                        </div>

                    </div>



                    <div class="buy-product mt-30">
                        <p class="font-sm mb-20">Quantity</p>
                        <div class="box-quantity">
                            <div class="input-quantity">
                                <input class="font-xl color-brand-3" type="text" value="1"><span
                                    class="minus-cart"></span><span class="plus-cart"></span>
                            </div>
                            <div class="button-buy"><a class="btn btn-cart" href="/customise-product/{{  $product->id }}">Customise</a><a
                                    class="btn btn-buy" href="shop-checkout.html">Proceed to Check Out</a></div>
                        </div>


                        <div>

                        </div>

                    </div>


                </div>
            </div>
            <div class="border-bottom pt-30 mb-40"></div>

        </div>
    </section>
    <section class="section-box shop-template">
        <div class="container">
            {{-- //section to customise the product --}}

            <div class="pt-30 mb-10">
                <ul class="nav nav-tabs nav-tabs-product" role="tablist">
                    <li><a class="active" href="#tab-description" data-bs-toggle="tab" role="tab"
                            aria-controls="tab-description" aria-selected="true">Description</a></li>
                    <li><a href="#tab-specification" data-bs-toggle="tab" role="tab"
                            aria-controls="tab-specification" aria-selected="true">Certifications</a></li>
                    <li><a href="#tab-additional" data-bs-toggle="tab" role="tab" aria-controls="tab-additional"
                            aria-selected="true">Additional information</a></li>
                    <!-- <li><a href="#tab-reviews" data-bs-toggle="tab" role="tab" aria-controls="tab-reviews" aria-selected="true">Reviews (2)</a></li>
                      <li><a href="#tab-vendor" data-bs-toggle="tab" role="tab" aria-controls="tab-vendor" aria-selected="true">Vendor</a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab-description" role="tabpanel"
                        aria-labelledby="tab-description">
                        <div class="display-text-short">

                            <p>{!! $product->body !!}</p>
                        </div>
                        <!-- <div class="mt-20 text-center"><a class="btn btn-border font-sm-bold pl-80 pr-80 btn-expand-more">More Details</a></div> -->
                    </div>
                    <div class="tab-pane fade" id="tab-specification" role="tabpanel"
                        aria-labelledby="tab-specification">
                        <h5 class="mb-25">Certification</h5>
                        <div class="tabsle-responsive">
                            <ul class="list-features">
                                @foreach ($product->certifications as $cert)
                                <li>{{ $cert->certification }}</li>
                                <hr>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-additional" role="tabpanel" aria-labelledby="tab-additional">
                        <h5 class="mb-25">Additional information</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Weight</td>
                                        <td>
                                            <p>0.240 kg</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dimensions</td>
                                        <td>
                                            <p>0.74 x 7.64 x 16.08 cm</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="border-bottom pt-30 mb-50"></div>
                    <h4 class="color-brand-3">Related Products</h4>
                    <div class="list-products-5 mt-20">
                        @foreach ($relatedProducts as $colourway => $products)
                        @php $relatedProduct = $products->first(); @endphp
                        <div class="card-grid-style-3">
                            <div class="card-grid-inner">
                                <div class="tools">
                                    <a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a>
                                    <a class="btn btn-wishlist btn-tooltip mb-10" href="Salem Apparel">
                                    </a>
                                </div>
                                <div class="image-box">
                                    <a href="/product/customise/{{ $relatedProduct->slug }}">
                                        <img src="{{ $relatedProduct->galleries[0]->image_url ?? asset('userasset/imgs/template/no-image.png') }}" alt="{{ $relatedProduct->title }}">
                                    </a>
                                </div>
                                <div class="info-right">
                                    <a class="font-xs color-gray-500" href="#">{{ $relatedProduct->type }}</a><br>
                                    <a class="color-brand-3 font-sm-bold" href="/product/customise/{{ $relatedProduct->id }}">
                                        {{ $relatedProduct->title . ' ' . $relatedProduct->style_code }}
                                    </a>
                                    <div class="price-info">
                                        <strong class="font-lg-bold color-brand-3 price-main">
                                            £{{ $relatedProduct->price->single_list_price + 3 }}
                                        </strong>
                                    </div>
                                    <div class="mt-20 box-btn-cart">
                                        <a class="btn btn-cart" href="/product/customise/{{ $relatedProduct->id }}">Customise Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
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
<!-- Fabric.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>

<!-- Modal Structure -->
<div class="modal fade" id="customiseModal" tabindex="-1" aria-labelledby="customiseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customiseModalLabel">customise Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="galleries text-center">
                    <canvas id="fabricCanvas" width="400" height="600" style="border:1px solid #ccc;"></canvas>

                    <div class="slider-nav-thumbnails mt-3">
                        <img src="https://www.fullcollection.com/storage/phoenix/2025/Phoenix%20All%20Images/Gildan/Model%20Images/ProductCarouselMain/GD57B%20BLK%20MODEL%203.jpg" data-url="https://www.fullcollection.com/storage/phoenix/2025/Phoenix%20All%20Images/Gildan/Model%20Images/ProductCarouselMain/GD57B%20BLK%20MODEL%203.jpg" class="img-thumbnail thumb">
                        <img src="https://www.fullcollection.com/storage/phoenix/2025/Phoenix%20All%20Images/Gildan/Model%20Images/ProductCarouselMain/GD57B%20ORA%20MODEL%203.jpg" data-url="https://www.fullcollection.com/storage/phoenix/2025/Phoenix%20All%20Images/Gildan/Model%20Images/ProductCarouselMain/GD57B%20ORA%20MODEL%203.jpg" class="img-thumbnail thumb">
                        <img src="https://www.fullcollection.com/storage/phoenix/2025/Phoenix%20All%20Images/Gildan/Model%20Images/ProductCarouselMain/GD57B%20CNB%20MODEL%203.jpg" data-url="https://www.fullcollection.com/storage/phoenix/2025/Phoenix%20All%20Images/Gildan/Model%20Images/ProductCarouselMain/GD57B%20CNB%20MODEL%203.jpg" class="img-thumbnail thumb">
                    </div>

                    <div class="mt-3">
                        <button onclick="addText()">Add Text</button>
                        <input type="file" onchange="uploadLogo(this)" />
                        <button onclick="removeSelected()">Delete Selected</button>
                        <button onclick="saveCanvasAsImage()">Save Image</button>
                        <select id="fontSizeSelect" style="width:80px;">
                            <option value="12">12px</option>
                            <option value="16">16px</option>
                            <option value="20">20px</option>
                            <option value="24" selected>24px</option>
                            <option value="32">32px</option>
                            <option value="40">40px</option>
                            <option value="48">48px</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    $('.related-product-thumb').on('click', function () {
        const galleryImages = $(this).data('gallery');
        const $slider = $('#slider-nav-thumbnails');

        // Destroy existing Slick instance
        if ($slider.hasClass('slick-initialized')) {
            $slider.slick('unslick');
        }

        // Clear and rebuild thumbnails
        $slider.empty();
        galleryImages.forEach(function (imageUrl) {
            const thumb = `
                <div>
                    <div class="item-thumb">
                        <img src="${imageUrl}" alt="product image">
                    </div>
                </div>`;
            $slider.append(thumb);
        });

        // Reinitialize the slider (ensure it matches original setup)
        $slider.slick({
            vertical: true,
            slidesToShow: 3,
            arrows: false,
            focusOnSelect: true,
            asNavFor: '.main-slider', // if you're syncing with main image
        });
    });
});
</script>
=======
<script>
    // ...existing canvas/fabric.js code...

    document.getElementById('fontSizeSelect').addEventListener('change', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fontSize', parseInt(this.value));
            canvas.requestRenderAll();
        }
    });

    // Optionally, set font size when adding new text:
    function addText() {
        const fontSize = parseInt(document.getElementById('fontSizeSelect').value) || 24;
        const text = new fabric.IText('Edit me', {
            left: 100,
            top: 100,
            fill: '#222',
            fontSize: fontSize
        });
        canvas.add(text).setActiveObject(text);
    }
</script>
@endsection
>>>>>>> 2605a50543e98629504ed801cb84f0eef2fb925e
