@php use Illuminate\Support\Str; @endphp

<head>
    <title>{{ $product->title }} - Salem Apparel</title>
    <meta name="description" content="Salem Apparels - customise your products with ease.">
    <meta name="keywords" content="Salem Apparels, customise Products, Online Shopping, E-commerce">
    <meta name="author" content="Salem Apparels">
    {{-- crawl product details with image  --}}
    <meta property="og:title" content="{{ $product->title }}">
    <meta property="og:description" content="{{ $product->description }}">
    <meta property="og:image"
        content="{{ $product->galleries->first()->image_url ?? asset('userasset/imgs/template/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Salem Apparels">
    {{-- use the product image for the favicon --}}
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ $product->galleries->first()->image_url ?? asset('userasset/imgs/template/logo.png') }}">
    <!-- Add FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
@extends('layout.usermaster')
@section('usercontent')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>

    <!-- Include Fabric.js -->
    <script>
        // Function to change main image when thumbnail is clicked
        function changeMainImage(imageUrl, thumbnailElement) {
            // Update main image
            const mainImage = document.getElementById('mainProductImage');
            mainImage.src = imageUrl;

            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail-wrapper').forEach(wrapper => {
                wrapper.classList.remove('active');
            });

            // Add active class to clicked thumbnail
            thumbnailElement.classList.add('active');
        }
    </script>
    <style>
        .slider-nav-thumbnails {
            max-height: 500px;
            overflow-y: auto;
        }

        .btn.active {
            background-color: #000000;
            color: white;
            border-color: #cdab02;
        }

        /* Thumbnail Gallery Styles */
        .thumbnail-wrapper {
            cursor: pointer;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .thumbnail-wrapper:hover {
            opacity: 0.8;
        }

        .thumbnail-wrapper.active .item-thumb {
            border: 3px solid #E2B808;
            border-radius: 8px;
        }

        .thumbnail-wrapper .item-thumb {
            border: 2px solid transparent;
            border-radius: 8px;
            transition: border 0.3s ease;
            overflow: hidden;
        }

        .thumbnail-wrapper .item-thumb img {
            width: 100%;
            height: auto;
            display: block;
        }

        #mainProductImage {
            transition: opacity 0.3s ease;
        }

        /* Text Formatting Mobile Responsive Styles */
        .text-formatting-controls .btn {
            font-size: 12px;
        }

        .text-formatting-controls .form-select {
            font-size: 12px;
        }

        @media (max-width: 576px) {
            .text-formatting-controls .btn {
                padding: 0.25rem 0.5rem;
                font-size: 11px;
            }

            .text-formatting-controls .form-select {
                font-size: 11px;
                padding: 0.25rem 0.5rem;
            }

            #fontColorPreview {
                width: 10px !important;
                height: 10px !important;
            }
        }
    </style>

    <script>
        // Show color picker when button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('fontColorInputBtn');
            const colorInput = document.getElementById('fontColorInput');
            const preview = document.getElementById('fontColorPreview');

            if (btn && colorInput && preview) {
                btn.addEventListener('click', function() {
                    colorInput.click();
                });
                colorInput.addEventListener('input', function() {
                    preview.style.background = this.value;
                });
            }
        });
    </script>
    <main class="main">

        <div class="section-box">
            <div class="breadcrumbs-div">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a class="font-xs color-gray-100" href="/">Home</a></li>
                        <li><a class="font-xs color-gray-500"
                                href="/shop/category/{{ $product->type }}">{{ $product->type }}</a></li>

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
                                    <div class="product-image-slider" id="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{ $product->galleries->first()->image_url }}" alt="product image" id="mainProductImage">
                                        </figure>
                                    </div>
                                </div>
                                <div class="slider-nav-thumbnails" id="slider-nav-thumbnails">
                                    @foreach ($product->galleries as $index => $gallery)
                                        <div class="thumbnail-wrapper {{ $index === 0 ? 'active' : '' }}" onclick="changeMainImage('{{ $gallery->image_url }}', this)">
                                            <div class="item-thumb">
                                                <img src="{{ $gallery->image_url }}" alt="product image" width="500">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        {{-- show design preview here immediately after save instead of preview design modal --}}
                        <div id="designPreviewSection" class="mt-4">

                            <div id="designPreviewContainer" class="border rounded p-2 bg-white" style="width:100%;">
                                <h5 class="mt-3">Design Preview:</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <h3 class="color-brand-3 mb-25">{{ $product->title }}</h3>

                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-4 col-sm-3 mb-mobile"><span
                                    class="bytext color-gray-500 font-xs font-large">Weight: {{ $product->weight }} | Style
                                    Code: {{ $product->style_code }}</span>
                                {{-- <div class="rating mt-5"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><img src="{{ asset('userasset/imgs/template/icons/star.svg') }}"
                                    alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65 reviews)</span>
                            </div> --}}
                            </div>

                        </div>
                        <div class="border-bottom pt-10 mb-20"></div>
                        <div class="box-product-price">
                            <h3 class="color-brand-3 price-main d-inline-block mr-10">
                                £<span id="pPrice">{{ $product->price->single_list_price * 1.2 + 0.9 }}</span></h3>
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
                            <p class="font-sm color-gray-900">Color: <span class="color-brand-2 nameColor">Select your
                                    favourite color</span>
                            </p>
                            <ul class="list-colors">
                                <!-- <li class="disabled"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom" title="Pink"></li> -->
                                <!-- loop product color from the same product table -->

                                @foreach ($availableColors as $colourway => $products)
                                    @php
                                        $availableColor = $products->first();
                                    @endphp

                                    <li class="related-product-thumb" data-gallery='@json($availableColor->galleries->pluck('image_url'))'>
                                        <span class="d-inline-block rounded-circle border color-swatch"
                                            style="width:32px;height:32px;background:{{ $availableColor->rgb ?? '#eee' }};border:2px solid #ccc; cursor:pointer;"
                                            data-rgb="{{ $availableColor->rgb }}"
                                            data-color="{{ $availableColor->colourway_name }}"
                                            title="{{ $availableColor->colourway_name }}" onclick="selectColor(this)">
                                        </span>
                                    </li>
                                @endforeach

                                <!-- <li class="disabled"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom" title="Black"></li>
                                          <li class="disabled"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom" title="Red"></li> -->
                            </ul>
                        </div>
                        <div class="row mt-5">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-4">
                                <p class="font-sm color-gray-900">Quantity by Sizes:</p>
                                <div class="row justify-content-left bg-light p-3 rounded">
                                    @foreach ($sizes as $item)
                                        @php $size = $item->size; @endphp
                                        <div class="col-1 col-sm-1 col-md-1 text-center mb-2">
                                            <label class="fw-bold d-block mb-1">{{ $size }}</label>
                                            <input type="number" style="width: 50px;" name="sizes[{{ $size }}]"
                                                value="" placeholder="0" min="0"
                                                class="form-control text-center size-input">
                                        </div>
                                    @endforeach

                                </div>


                            </div>
<span style="color: white;" id="pTotal"></span>
                            {{-- Add this directly in your HTML after the sizes section --}}
                            <div id="customiseDivs" style="display:none;">
                                <div class="card p-3 mb-3">
                                    <h5 class="mb-2">Customise Your Product</h5>

                                    <!-- Decoration Type FIRST, no default selection -->
                                    <div class="mb-2">
                                        <h6>Step One</h6>
                                        <label class="form-label d-block mb-2">Decoration Type:</label>
                                        <div class="btn-group" role="group" aria-label="Decoration Type">
                                            <input type="radio" class="btn-check" name="decorationType"
                                                id="printOption" autocomplete="off">
                                            <label class="btn btn-outline-warning btn-sm" for="printOption">Print</label>

                                            <input type="radio" class="btn-check" name="decorationType"
                                                id="embroideryOption" autocomplete="off">
                                            <label class="btn btn-outline-warning btn-sm"
                                                for="embroideryOption">Embroidery</label>
                                        </div>
                                    </div>



                                    <!-- Mode selector: hidden until decoration type is picked -->
                                    <div class="mb-2" id="designModeGroup" style="display:none;">
                                        <br>
                                        <h6>Step Two</h6>
                                        <label class="form-label d-block mb-2">Design Content:</label>
                                        <div class="btn-group" role="group" aria-label="Design Mode">
                                            <button type="button" class="btn btn-outline-warning btn-sm mode-btn"
                                                data-mode="text" id="modeText">Add Text</button>
                                            <button type="button" class="btn btn-outline-warning btn-sm mode-btn"
                                                data-mode="upload" id="modeUpload">Upload Image</button>
                                            <button type="button" class="btn btn-outline-warning btn-sm mode-btn"
                                                data-mode="gallery" id="modeGallery">Add from Gallery</button>
                                        </div>
                                    </div>

                                    <!-- Print position (visual t-shirt selector) -->
                                    <div class="mb-2" id="positionOptions">
                                        <br>
                                        <h6>Step Three</h6>
                                        <label class="form-label d-block mb-2">Print Position:</label>
                                        <p class="small text-muted mb-3">Click on the t-shirt area where you want your design printed:</p>

                                        <!-- Hidden radio inputs -->
                                        <input type="radio" class="d-none" name="printPos" id="pos_front_left_chest" value="front_left_chest">
                                        <input type="radio" class="d-none" name="printPos" id="pos_front_right_chest" value="front_right_chest">
                                        <input type="radio" class="d-none" name="printPos" id="pos_front_centre_chest" value="front_centre_chest">
                                        <input type="radio" class="d-none" name="printPos" id="pos_left_sleeve" value="left_sleeve">
                                        <input type="radio" class="d-none" name="printPos" id="pos_right_sleeve" value="right_sleeve">
                                        <input type="radio" class="d-none" name="printPos" id="pos_back_top_back" value="back_top_back">
                                        <input type="radio" class="d-none" name="printPos" id="pos_back_centre" value="back_centre">
                                        <input type="radio" class="d-none" name="printPos" id="pos_back_bottom" value="back_bottom">

                                        <!-- Visual T-shirt Selector -->
                                        <div class="tshirt-selector-container" style="max-width: 600px; margin: 0 auto;">
                                            <div class="row g-3">
                                                <!-- Front View -->
                                                <div class="col-md-6">
                                                    <div class="tshirt-view-card p-3 border rounded">
                                                        <h6 class="text-center mb-3 fw-bold">Front View</h6>
                                                        <div class="tshirt-front position-relative d-flex justify-content-center">
                                                            <svg width="120" height="140" viewBox="0 0 120 140" class="tshirt-svg">
                                                                <!-- T-shirt outline matching reference image exactly -->
                                                                <path d="M30 25
                                                                         C30 20 32 15 35 12
                                                                         L40 10
                                                                         C42 8 45 5 48 5
                                                                         L52 5
                                                                         C52 2 55 0 60 0
                                                                         L60 0
                                                                         C60 0 60 0 60 0
                                                                         L60 0
                                                                         C65 0 68 2 68 5
                                                                         L72 5
                                                                         C75 5 78 8 80 10
                                                                         L85 12
                                                                         C88 15 90 20 90 25
                                                                         L90 35
                                                                         L105 40
                                                                         C108 41 110 43 110 46
                                                                         L110 55
                                                                         C110 58 108 60 105 59
                                                                         L90 54
                                                                         L90 125
                                                                         C90 130 88 135 85 135
                                                                         L35 135
                                                                         C32 135 30 130 30 125
                                                                         L30 54
                                                                         L15 59
                                                                         C12 60 10 58 10 55
                                                                         L10 46
                                                                         C10 43 12 41 15 40
                                                                         L30 35
                                                                         Z"
                                                                      fill="white" stroke="#333" stroke-width="2"/>

                                                                <!-- Neckline opening (curved inward) -->
                                                                <path d="M50 5 C54 12 58 15 60 15 C62 15 66 12 70 5"
                                                                      fill="white" stroke="#333" stroke-width="1.5"/>

                                                                <!-- Neckline curve detail -->
                                                                <path d="M50 5 C54 8 58 10 60 10 C62 10 66 8 70 5"
                                                                      fill="none" stroke="#333" stroke-width="1"/>

                                                                <!-- Clickable print areas -->
                                                                <!-- Front Left Chest -->
                                                                <rect x="35" y="35" width="20" height="15" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="front_left_chest"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="45" y="45" text-anchor="middle" font-size="8" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">L</text>

                                                                <!-- Front Right Chest -->
                                                                <rect x="65" y="35" width="20" height="15" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="front_right_chest"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="75" y="45" text-anchor="middle" font-size="8" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">R</text>

                                                                <!-- Front Centre Chest -->
                                                                <rect x="50" y="60" width="20" height="18" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="front_centre_chest"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="60" y="71" text-anchor="middle" font-size="8" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">C</text>

                                                                <!-- Left Sleeve -->
                                                                <rect x="92" y="45" width="12" height="8" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="left_sleeve"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="98" y="51" text-anchor="middle" font-size="6" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">LS</text>

                                                                <!-- Right Sleeve -->
                                                                <rect x="16" y="45" width="12" height="8" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="right_sleeve"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="22" y="51" text-anchor="middle" font-size="6" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">RS</text>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Back View -->
                                                <div class="col-md-6">
                                                    <div class="tshirt-view-card p-3 border rounded">
                                                        <h6 class="text-center mb-3 fw-bold">Back View</h6>
                                                        <div class="tshirt-back position-relative d-flex justify-content-center">
                                                            <svg width="120" height="140" viewBox="0 0 120 140" class="tshirt-svg">
                                                                <!-- T-shirt outline (back view - same shape) -->
                                                                <path d="M30 25
                                                                         C30 20 32 15 35 12
                                                                         L40 10
                                                                         C42 8 45 5 48 5
                                                                         L52 5
                                                                         C52 2 55 0 60 0
                                                                         L60 0
                                                                         C60 0 60 0 60 0
                                                                         L60 0
                                                                         C65 0 68 2 68 5
                                                                         L72 5
                                                                         C75 5 78 8 80 10
                                                                         L85 12
                                                                         C88 15 90 20 90 25
                                                                         L90 35
                                                                         L105 40
                                                                         C108 41 110 43 110 46
                                                                         L110 55
                                                                         C110 58 108 60 105 59
                                                                         L90 54
                                                                         L90 125
                                                                         C90 130 88 135 85 135
                                                                         L35 135
                                                                         C32 135 30 130 30 125
                                                                         L30 54
                                                                         L15 59
                                                                         C12 60 10 58 10 55
                                                                         L10 46
                                                                         C10 43 12 41 15 40
                                                                         L30 35
                                                                         Z"
                                                                      fill="white" stroke="#333" stroke-width="2"/>

                                                                <!-- Clickable print areas -->
                                                                <!-- Back Top -->
                                                                <rect x="45" y="25" width="30" height="15" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="back_top_back"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="60" y="35" text-anchor="middle" font-size="8" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">TOP</text>

                                                                <!-- Back Centre -->
                                                                <rect x="45" y="50" width="30" height="25" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="back_centre"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="60" y="65" text-anchor="middle" font-size="8" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">CENTER</text>

                                                                <!-- Back Bottom -->
                                                                <rect x="45" y="85" width="30" height="20" fill="rgba(226, 184, 8, 0.4)"
                                                                      class="position-area" data-position="back_bottom"
                                                                      style="cursor: pointer;" rx="2"/>
                                                                <text x="60" y="97" text-anchor="middle" font-size="8" fill="#333"
                                                                      class="position-label" style="pointer-events: none;">BOTTOM</text>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        <!-- Selected position display -->
                                        <div class="selected-position text-center mt-3">
                                            <span class="badge bg-secondary" id="selectedPositionDisplay">No position selected</span>
                                        </div>
                                    </div>

                                    <!-- T-shirt Position Selector Styles -->
                                    <style>
                                        .tshirt-selector-container {
                                            background: #f8f9fa;
                                            border-radius: 15px;
                                            padding: 25px;
                                            border: 1px solid #dee2e6;
                                            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
                                        }

                                        .tshirt-view-card {
                                            background: white;
                                            border-radius: 12px;
                                            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                                            transition: transform 0.2s ease;
                                        }

                                        .tshirt-view-card:hover {
                                            transform: translateY(-2px);
                                            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
                                        }

                                        .position-area {
                                            transition: all 0.3s ease;
                                            stroke: transparent;
                                            stroke-width: 2;
                                        }

                                        .position-area:hover {
                                            fill: rgba(226, 184, 8, 0.7) !important;
                                            stroke: #E2B808;
                                            stroke-width: 2;
                                            filter: drop-shadow(0 2px 4px rgba(226, 184, 8, 0.3));
                                        }

                                        .position-area.selected {
                                            fill: rgba(226, 184, 8, 0.9) !important;
                                            stroke: #E2B808;
                                            stroke-width: 3;
                                            filter: drop-shadow(0 0 8px rgba(226, 184, 8, 0.6));
                                        }

                                        .position-label {
                                            font-family: 'Arial', sans-serif;
                                            font-weight: bold;
                                            fill: #333;
                                            transition: all 0.3s ease;
                                        }

                                        .position-area:hover + .position-label,
                                        .position-area.selected + .position-label {
                                            fill: #1a1a1a;
                                            font-size: 9px;
                                        }

                                        .tshirt-svg {
                                            max-width: 100%;
                                            height: auto;
                                            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
                                        }

                                        @media (max-width: 768px) {
                                            .tshirt-selector-container {
                                                padding: 15px;
                                            }
                                            .tshirt-view-card {
                                                margin-bottom: 15px;
                                            }
                                            .tshirt-svg {
                                                width: 100px;
                                                height: 120px;
                                            }
                                        }

                                        .selected-position .badge {
                                            font-size: 0.9rem;
                                            padding: 8px 16px;
                                            border-radius: 20px;
                                        }
                                    </style>                                    <!-- T-shirt Position Selector JavaScript -->
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const positionAreas = document.querySelectorAll('.position-area');
                                            const selectedDisplay = document.getElementById('selectedPositionDisplay');

                                            const positionLabels = {
                                                'front_left_chest': 'Front Left Chest',
                                                'front_right_chest': 'Front Right Chest',
                                                'front_centre_chest': 'Front Centre Chest',
                                                'left_sleeve': 'Left Sleeve',
                                                'right_sleeve': 'Right Sleeve',
                                                'back_top_back': 'Back Top',
                                                'back_centre': 'Back Centre',
                                                'back_bottom': 'Back Bottom'
                                            };

                                            positionAreas.forEach(area => {
                                                area.addEventListener('click', function() {
                                                    // Remove selected class from all areas
                                                    positionAreas.forEach(a => a.classList.remove('selected'));

                                                    // Add selected class to clicked area
                                                    this.classList.add('selected');

                                                    // Update radio button
                                                    const position = this.getAttribute('data-position');
                                                    document.getElementById(`pos_${position}`).checked = true;

                                                    // Update display
                                                    selectedDisplay.textContent = positionLabels[position];
                                                    selectedDisplay.className = 'badge bg-warning text-dark';
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Toolbar -->
                                    <div class="row g-2">
                                        <!-- Toolbar: full width on mobile, left on desktop -->
                                        <div class="col-12 col-md-4">
                                            <div id="customCanvasToolbar" class="mb-2 d-flex flex-column"
                                                style="gap: 8px; min-width:180px;">
                                                <!-- formatting group visible only in Text mode -->
                                                <div id="textFormatting" style="display:none;">
                                                    <h6>Step Four</h6>
                                                    <label class="form-label d-block mb-2">Add Text to Design:</label>

                                                    <!-- Add Text Button -->
                                                    <div class="mb-2">
                                                        <button type="button" id="addTextBtn"
                                                            class="btn btn-outline-dark btn-sm">Add Text</button>
                                                        <span class="ms-2" style="display:inline-block; vertical-align:middle;">
                                                            <i class="fas fa-arrow-left" id="arrowAnim"
                                                                style="font-size:16px; color:#cdab02; animation: arrowBounce 1s infinite;"></i>
                                                        </span>
                                                    </div>

                                                    <!-- Text Formatting Controls - Mobile Responsive -->
                                                    <div class="text-formatting-controls">
                                                        <!-- Row 1: Text Color and Font Family -->
                                                        <div class="row g-2 mb-2">
                                                            <div class="col-12 col-sm-12">
                                                                <button type="button" id="fontColorInputBtn"
                                                                    class="btn btn-outline-dark btn-sm w-100" title="Text Color">
                                                                    <span
                                                                        style="display:inline-block;width:12px;height:12px;background:#222222;border-radius:2px;vertical-align:middle;"
                                                                        id="fontColorPreview"></span>
                                                                    <input type="color" id="fontColorInput" value="#222222"
                                                                        style="opacity:0;width:0;height:0;position:absolute;">
                                                                    <span class="ms-1 d-none d-sm-inline">Color</span>
                                                                </button>
                                                            </div>
                                                            <div class="col-12 col-sm-12">
                                                                <select id="fontFaceSelect" class="form-select form-select-sm">
                                                                    <option value="Arial">Arial</option>
                                                                    <option value="Times New Roman">Times</option>
                                                                    <option value="Courier New">Courier</option>
                                                                    <option value="Verdana">Verdana</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-12">
                                                                <select id="fontSizeSelect" class="form-select form-select-sm">
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

                                                        <!-- Row 2: Format Buttons (Bold, Italic, Underline) -->
                                                        <div class="row g-2 mb-2">
                                                            <div class="col-12">
                                                                <div class="btn-group w-100" role="group">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm flex-fill"
                                                                        id="boldTextBtn" title="Bold">
                                                                        <strong>B</strong>
                                                                        <span class="d-none d-sm-inline ms-1">Bold</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm flex-fill"
                                                                        id="italicTextBtn" title="Italic">
                                                                        <em>I</em>
                                                                        <span class="d-none d-sm-inline ms-1">Italic</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm flex-fill"
                                                                        id="underlineTextBtn" title="Underline">
                                                                        <u>U</u>
                                                                        <span class="d-none d-sm-inline ms-1">Underline</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- upload/gallery controls (visible in upload/gallery modes) -->
                                                <div id="imageControls" style="display:none;">
                                                    <h6>Step Four</h6>
                                                    <label class="form-label  mb-2" id="lc1" style="display: none">Upload image/logo to Design:</label>
                                                    <label class="form-label  mb-2" id="lc2" style="display: none">Pick from our Design Gallery:</label>
                                                    <button type="button" id="uploadImageBtn"
                                                        class="btn btn-dark btn-sm mb-1">
                                                        <i class="fas fa-upload"
                                                            style="font-size:12px; margin-right:5px;"></i>Upload Image

                                                    </button>
                                                    <input type="file" id="uploadImageInput" accept="image/*"
                                                        style="display:none;">

                                                    <button type="button" id="openServerImageModal"
                                                        class="btn btn-outline-secondary btn-sm mb-1">Add from Gallery</button>
                                                    <span class="ms-2" style="display:inline-block; vertical-align:middle;">
                                                        <i class="fas fa-arrow-left" id="arrowAnim"
                                                            style="font-size:16px; color:#cdab02; animation: arrowBounce 1s infinite;"></i>
                                                    </span>
                                                    <style>
                                                        @keyframes arrowBounce {
                                                            0% {
                                                                transform: translateX(0);
                                                            }

                                                            50% {
                                                                transform: translateX(-8px);
                                                            }

                                                            100% {
                                                                transform: translateX(0);
                                                            }
                                                        }
                                                    </style>
                                                </div>



                                                <div id="savedDesignsList" class="mt-2"></div>
                                            </div>
                                        </div>
                                        <!-- Canvas: full width on mobile, right on desktop -->
                                        <div class="col-12 col-md-8">
                                            <div id="customCanvasWrapper" class="border rounded p-2 bg-light"
                                                style="display:none;">
                                                <canvas id="customCanvas" width="350" height="350"
                                                    style="max-width:100%;height:auto;display:block;"></canvas>
                                                    <div class="mt-2">
                                                    <button type="button" id="saveDesignBtn"
                                                        class="btn btn-dark btn-sm">Save Design</button>
                                                    <small class="d-block text-muted mt-1">You can save max. of 3 designs/sides for a product.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="customCanvasWrapper" class="border rounded p-2 bg-light"
                                        style="display:none;">
                                        <canvas id="customCanvas" width="350" height="350"
                                            style="max-width:100%;height:auto;display:block;"></canvas>
                                    </div>
                                </div>
                                <div id="customiseLoaderOverlay"
                                    style="display:none;position:absolute;bottom:0;left:0;width:100%;height:100%;z-index:50;background:rgba(255,255,255,0.7);align-items:center;justify-content:center;">
                                    <div
                                        style="position:absolute;bottom:30px;left:50%;transform:translateX(-50%);text-align:center;">
                                        <div class="spinner-border text-warning" style="width:3rem;height:3rem;"
                                            role="status"></div>
                                        <div class="mt-2"><strong>Loading...</strong></div>
                                    </div>
                                </div>
                            </div>



                            <div class="buy-product mt-30">

                                <div class="box-quantity">

                                    <div class="button-buy">
                                        <button id="loadCustom" class="btn btn-cart" type="button">Add
                                            Customisation</button>
                                        @php
                                            $customDesigns = session('custom_designs', []);
                                            $hasDesigns = !empty($customDesigns);
                                        @endphp
                                        <a class="btn btn-buy {{ $hasDesigns ? '' : 'd-none' }}" id="proceedCheckoutBtn">Proceed to Check Out</a>
                                    </div>
                                    <script>
                                        // Side options
                                        const sides = [{
                                                value: 'front_top',
                                                label: 'Front Top'
                                            },
                                            {
                                                value: 'front_middle',
                                                label: 'Front Middle'
                                            },
                                            {
                                                value: 'front_bottom',
                                                label: 'Front Bottom'
                                            },
                                            {
                                                value: 'back_top',
                                                label: 'Back Top'
                                            },
                                            {
                                                value: 'back_middle',
                                                label: 'Back Middle'
                                            },
                                            {
                                                value: 'back_bottom',
                                                label: 'Back Bottom'
                                            },
                                            {
                                                value: 'left_sleeve',
                                                label: 'Left Sleeve'
                                            },
                                            {
                                                value: 'right_sleeve',
                                                label: 'Right Sleeve'
                                            }
                                        ];

                                        let customCanvas; // Declare in a higher scope so it's accessible globally

                                        $(document).ready(function() {
                                            // show customise area only after user clicks Add Customisation
                                            $('#loadCustom').on('click', function(e) {
                                                e.preventDefault();

                                                // Check if this is "Add More Customisation" button
                                                const isAddMore = $(this).text().trim() === 'Add More Customisation';

                                                $('#customiseDivs').show();
                                                $('[name="decorationType"]').closest('.mb-2').show(); // <-- Show decoration type
                                                $('#designModeGroup').hide(); // Hide mode until decoration picked
                                                $('#saveDesignBtn').hide();
                                                // Don't show checkout button here - only show when designs are saved
                                                $(this).addClass('d-none');
                                                $('#textFormatting').hide();
                                                $('#imageControls').hide();
                                                $('#customCanvasWrapper').hide();
                                                $('#positionOptions').hide();
                                            });



                                            // Fabric.js setup for custom canvas
                                            customCanvas = new fabric.Canvas('customCanvas');

                                            // ADD THIS UNDO/REDO CODE HERE (after canvas is created):

                                            // Initialize canvas history
                                            customCanvas._history = [];
                                            customCanvas._historyStep = -1;
                                            let isUndoRedo = false;

                                            function saveCanvasState() {
                                                if (isUndoRedo) return;
                                                if (customCanvas._historyStep < customCanvas._history.length - 1) {
                                                    customCanvas._history = customCanvas._history.slice(0, customCanvas._historyStep + 1);
                                                }
                                                const canvasState = JSON.stringify(customCanvas.toJSON());
                                                customCanvas._history.push(canvasState);
                                                customCanvas._historyStep++;
                                                if (customCanvas._history.length > 20) {
                                                    customCanvas._history.shift();
                                                    customCanvas._historyStep--;
                                                }
                                            }

                                            // Save initial state
                                            setTimeout(saveCanvasState, 100);

                                            // Event listeners for canvas changes
                                            customCanvas.on('object:added', function() {
                                                if (!isUndoRedo) setTimeout(saveCanvasState, 100);
                                            });
                                            customCanvas.on('object:modified', function() {
                                                if (!isUndoRedo) setTimeout(saveCanvasState, 100);
                                            });

                                            // Add Text Button
                                            document.getElementById('addTextBtn').addEventListener('click', function() {
                                                const text = new fabric.IText('Edit me', {
                                                    left: 50,
                                                    top: 50,
                                                    fill: '#222',
                                                    fontSize: 24
                                                });
                                                customCanvas.add(text).setActiveObject(text);
                                            });

                                            // Upload Image
                                            document.getElementById('uploadImageInput').addEventListener('change', function(e) {
                                                const file = e.target.files[0];
                                                if (!file) return;

                                                // Validate file type
                                                if (!file.type.startsWith('image/')) {
                                                    alert('Please select an image file.');
                                                    return;
                                                }

                                                const reader = new FileReader();
                                                reader.onload = function(f) {
                                                    fabric.Image.fromURL(f.target.result, function(img) {
                                                        // Scale image to fit canvas
                                                        const canvasWidth = customCanvas.getWidth();
                                                        const canvasHeight = customCanvas.getHeight();
                                                        const imgScale = Math.min(
                                                            (canvasWidth * 0.6) / img.width,
                                                            (canvasHeight * 0.6) / img.height
                                                        );

                                                        img.set({
                                                            left: canvasWidth / 2,
                                                            top: canvasHeight / 2,
                                                            originX: 'center',
                                                            originY: 'center',
                                                            scaleX: imgScale,
                                                            scaleY: imgScale
                                                        });
                                                        customCanvas.add(img).setActiveObject(img);
                                                        customCanvas.requestRenderAll();
                                                    });
                                                };
                                                reader.readAsDataURL(file);

                                                // Reset the file input
                                                e.target.value = '';
                                            });

                                            // Custom upload button click handler
                                            document.getElementById('uploadImageBtn').addEventListener('click', function() {
                                                console.log('Upload button clicked');
                                                document.getElementById('uploadImageInput').click();
                                            });

                                            // Font color change
                                            document.getElementById('fontColorInput').addEventListener('input', function() {
                                                const activeObject = customCanvas.getActiveObject();
                                                if (activeObject && activeObject.type === 'i-text') {
                                                    activeObject.set('fill', this.value);
                                                    customCanvas.requestRenderAll();
                                                }
                                            });

                                            // Font face change
                                            document.getElementById('fontFaceSelect').addEventListener('change', function() {
                                                const activeObject = customCanvas.getActiveObject();
                                                if (activeObject && activeObject.type === 'i-text') {
                                                    activeObject.set('fontFamily', this.value);
                                                    customCanvas.requestRenderAll();
                                                }
                                            });

                                            // Font size change
                                            document.getElementById('fontSizeSelect').addEventListener('change', function() {
                                                const activeObject = customCanvas.getActiveObject();
                                                if (activeObject && activeObject.type === 'i-text') {
                                                    activeObject.set('fontSize', parseInt(this.value));
                                                    customCanvas.requestRenderAll();
                                                }
                                            });

                                            // Bold toggle
                                            document.getElementById('boldTextBtn').addEventListener('click', function() {
                                                const activeObject = customCanvas.getActiveObject();
                                                if (activeObject && activeObject.type === 'i-text') {
                                                    const isBold = activeObject.fontWeight === 'bold';
                                                    activeObject.set('fontWeight', isBold ? 'normal' : 'bold');
                                                    customCanvas.requestRenderAll();
                                                    this.classList.toggle('active', !isBold);
                                                }
                                            });

                                            // Italic toggle
                                            document.getElementById('italicTextBtn').addEventListener('click', function() {
                                                const activeObject = customCanvas.getActiveObject();
                                                if (activeObject && activeObject.type === 'i-text') {
                                                    const isItalic = activeObject.fontStyle === 'italic';
                                                    activeObject.set('fontStyle', isItalic ? 'normal' : 'italic');
                                                    customCanvas.requestRenderAll();
                                                    this.classList.toggle('active', !isItalic);
                                                }
                                            });

                                            // Underline toggle
                                            document.getElementById('underlineTextBtn').addEventListener('click', function() {
                                                const activeObject = customCanvas.getActiveObject();
                                                if (activeObject && activeObject.type === 'i-text') {
                                                    const isUnderline = activeObject.underline;
                                                    activeObject.set('underline', !isUnderline);
                                                    customCanvas.requestRenderAll();
                                                    this.classList.toggle('active', !isUnderline);
                                                }
                                            });

                                            // Delete button
                                            document.getElementById('deleteObjectBtn').addEventListener('click', function() {
                                                const activeObject = customCanvas.getActiveObject();
                                                if (activeObject) {
                                                    customCanvas.remove(activeObject);
                                                    setTimeout(saveCanvasState, 50);
                                                }
                                            });

                                            // Undo button
                                            document.getElementById('undoBtn').addEventListener('click', function() {
                                                if (customCanvas._historyStep > 0) {
                                                    isUndoRedo = true;
                                                    customCanvas._historyStep--;
                                                    const previousState = customCanvas._history[customCanvas._historyStep];
                                                    customCanvas.loadFromJSON(previousState, function() {
                                                        customCanvas.requestRenderAll();
                                                        isUndoRedo = false;
                                                    });
                                                }
                                            });

                                            // Redo button
                                            document.getElementById('redoBtn').addEventListener('click', function() {
                                                if (customCanvas._historyStep < customCanvas._history.length - 1) {
                                                    isUndoRedo = true;
                                                    customCanvas._historyStep++;
                                                    const nextState = customCanvas._history[customCanvas._historyStep];
                                                    customCanvas.loadFromJSON(nextState, function() {
                                                        customCanvas.requestRenderAll();
                                                        isUndoRedo = false;
                                                    });
                                                }
                                            });

                                            // Keyboard delete
                                            document.addEventListener('keydown', function(e) {
                                                if ((e.key === "Delete" || e.key === "Backspace") &&
                                                    document.activeElement.tagName !== 'INPUT' &&
                                                    document.activeElement.tagName !== 'TEXTAREA' &&
                                                    document.activeElement.tagName !== 'SELECT') {
                                                    const activeObject = customCanvas.getActiveObject();
                                                    if (activeObject) {
                                                        e.preventDefault();
                                                        customCanvas.remove(activeObject);
                                                        setTimeout(saveCanvasState, 50);
                                                    }
                                                }
                                            });

                                            // Update button states when text is selected
                                            customCanvas.on('selection:created', function(e) {
                                                if (e.target && e.target.type === 'i-text') {
                                                    document.getElementById('boldTextBtn').classList.toggle('active', e.target
                                                        .fontWeight === 'bold');
                                                    document.getElementById('italicTextBtn').classList.toggle('active', e.target
                                                        .fontStyle === 'italic');
                                                    document.getElementById('underlineTextBtn').classList.toggle('active', e.target
                                                        .underline);
                                                }
                                            });

                                            customCanvas.on('selection:updated', function(e) {
                                                if (e.target && e.target.type === 'i-text') {
                                                    document.getElementById('boldTextBtn').classList.toggle('active', e.target
                                                        .fontWeight === 'bold');
                                                    document.getElementById('italicTextBtn').classList.toggle('active', e.target
                                                        .fontStyle === 'italic');
                                                    document.getElementById('underlineTextBtn').classList.toggle('active', e.target
                                                        .underline);
                                                }
                                            });

                                            customCanvas.on('selection:cleared', function() {
                                                document.getElementById('boldTextBtn').classList.remove('active');
                                                document.getElementById('italicTextBtn').classList.remove('active');
                                                document.getElementById('underlineTextBtn').classList.remove('active');
                                            });
                                        });
                                    </script>
                                    <script>
                                        document.getElementById('proceedCheckoutBtn').addEventListener('click', function() {
                                            // validate if nameColor is selected
                                            const nameColor = document.querySelector('.nameColor');
                                            if (nameColor && nameColor.textContent === 'Select your favourite color') {
                                                showAlert('Please select a color before proceeding.');
                                                return;
                                            }

                                            // validate sizes are selected
                                            const sizeInputs = document.querySelectorAll('.size-input');
                                            let sizesSelected = false;
                                            sizeInputs.forEach(input => {
                                                if (input.value && parseInt(input.value) > 0) {
                                                    sizesSelected = true;
                                                }
                                            });
                                            if (!sizesSelected) {
                                                showAlert('Please select at least one size with quantity greater than 0.');
                                                return;
                                            }

                                            // validate total is not 0 or null
                                            const total = parseFloat($('#pTotal').text());
                                            if (isNaN(total) || total <= 0) {
                                                showAlert('Please select a size and quantity before proceeding.');
                                                return;
                                            }

                                            // 1. Get selected color
                                            const colorElement = document.querySelector('.list-colors .color-swatch.selected');
                                            const color = colorElement ? colorElement.title : '';
                                            const colorRgb = colorElement ? colorElement.getAttribute('data-rgb') : '';

                                            // 2. Get decoration type
                                            const decoration = document.getElementById('embroideryOption')?.checked ? 'embroidery' : 'print';

                                            // 3. Get sizes as JSON
                                            let sizes = {};
                                            document.querySelectorAll('.size-input').forEach(input => {
                                                if (input.value && parseInt(input.value) > 0) {
                                                    sizes[input.name] = input.value;
                                                }
                                            });

                                            // 4. Get custom design as image (PNG dataURL)
                                            let customDesign = '';
                                            if (window.customCanvas) {
                                                customDesign = customCanvas.toDataURL({
                                                    format: 'png'
                                                });
                                            }

                                            // 5. Get decoration price (embroidery adds 1.5)
                                            const decorationPrice = decoration === 'embroidery' ? 1.5 : 0;

                                            // 6. Get selected side
                                            // const selectedSide = document.getElementById('customSide').value;

                                            // 7. Get selected image
                                            const selectedImage = document.querySelector('.slider-nav-thumbnails .item-thumb img')?.src || '';

                                            // 8. Fill ALL form fields
                                            document.getElementById('checkoutColor').value = color;
                                            document.getElementById('checkoutColorRgb').value = colorRgb;
                                            document.getElementById('checkoutDecoration').value = decoration;
                                            document.getElementById('checkoutSizes').value = JSON.stringify(sizes);
                                            // document.getElementById('checkoutDesign').value = customDesign;
                                            document.getElementById('checkoutTotalPrice').value = total;
                                            document.getElementById('checkoutDecorationPrice').value = decorationPrice;
                                            document.getElementById('checkoutSelectedImage').value = selectedImage;
                                            // document.getElementById('checkoutSelectedSide').value = selectedSide;

                                            console.log('Form data being submitted:', {
                                                color: color,
                                                colorRgb: colorRgb,
                                                decoration: decoration,
                                                sizes: sizes,
                                                total: total,
                                                decorationPrice: decorationPrice,
                                                // selectedSide: selectedSide,
                                                selectedImage: selectedImage,
                                                customDesign: customDesign ? 'Canvas data present' : 'No canvas data'
                                            });

                                            // 9. Submit the form
                                            document.getElementById('customCheckoutForm').submit();
                                        });
                                    </script>                                    <div>

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
                                            <a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"
                                                data-bs-placement="left"></a>
                                            <a class="btn btn-wishlist btn-tooltip mb-10" href="Salem Apparel">
                                            </a>
                                        </div>
                                        <div class="image-box">
                                            <a href="/product/customise/{{ $relatedProduct->slug }}">
                                                <img src="{{ $relatedProduct->galleries[0]->image_url ?? asset('userasset/imgs/template/no-image.png') }}"
                                                    alt="{{ $relatedProduct->title }}">
                                            </a>
                                        </div>
                                        <div class="info-right">
                                            <a class="font-xs color-gray-500"
                                                href="#">{{ $relatedProduct->type }}</a><br>
                                            <a class="color-brand-3 font-sm-bold"
                                                href="/product/customise/{{ $relatedProduct->id }}">
                                                {{ $relatedProduct->title . ' ' . $relatedProduct->style_code }}
                                            </a>
                                            <div class="price-info">
                                                <strong class="font-lg-bold color-brand-3 price-main">
                                                    £{{ $relatedProduct->price->single_list_price * 1.2 + 0.9 }}
                                                </strong>
                                            </div>
                                            <div class="mt-20 box-btn-cart">
                                                <a class="btn btn-cart"
                                                    href="/product/customise/{{ $relatedProduct->id }}">Customise Now</a>
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

        <!-- Swiper CSS and JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var swiper = new Swiper('.swiper-group-3', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 40,
                        },
                    },
                });
            });
        </script>

        <!-- Custom Swiper Navigation Styling -->
        <style>
            .swiper-group-3 .swiper-button-next,
            .swiper-group-3 .swiper-button-prev {
                color: #E2B808 !important;
                background: rgba(226, 184, 8, 0.1);
                border-radius: 50%;
                width: 44px !important;
                height: 44px !important;
                margin-top: -22px !important;
                transition: all 0.3s ease;
            }

            .swiper-group-3 .swiper-button-next:hover,
            .swiper-group-3 .swiper-button-prev:hover {
                background: rgba(226, 184, 8, 0.2);
                transform: scale(1.1);
            }

            .swiper-group-3 .swiper-button-next::after,
            .swiper-group-3 .swiper-button-prev::after {
                font-size: 18px !important;
                font-weight: bold;
            }

            .swiper-group-3 .swiper-pagination-bullet {
                background: #E2B808 !important;
                opacity: 0.5;
            }

            .swiper-group-3 .swiper-pagination-bullet-active {
                opacity: 1;
                transform: scale(1.2);
            }
        </style>
        {{-- <section class="section-box mt-90 mb-50">
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
        </section> --}}



    </main>
    <!-- Fabric.js -->
    <script>
        function selectColor(el) {
            // Remove selected class from all color swatches
            document.querySelectorAll('.color-swatch').forEach(swatch => {
                swatch.classList.remove('selected');
            });

            // Add selected class to clicked element
            el.classList.add('selected');

            const colorName = el.getAttribute('data-color');
            const rgb = el.getAttribute('data-rgb');

            // Set color name display
            document.querySelector('.nameColor').textContent = colorName;

            // Set hidden RGB input value (this line was missing)
            document.getElementById('checkoutColorRgb').value = rgb;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
    <script>
        $(document).on('click', '#openServerImageModal', function() {
            console.log('Gallery button clicked');
            $('#serverImageModal').modal('show');
            var $gallery = $('#serverImageGallery');
            var $loading = $('#galleryLoading');
            if ($gallery.children().length === 0) { // Only load if not already loaded
                $loading.show();
                $.get('{{ route('custom.gallery.images') }}', function(data) {
                    $gallery.empty();
                    if (data.images && data.images.length > 0) {
                        data.images.forEach(function(url) {
                            $gallery.append(
                                `<img src="${url}" alt="Gallery Image" class="img-thumbnail server-gallery-img" style="width:80px;height:80px;object-fit:cover;cursor:pointer;margin:5px;">`
                            );
                        });
                    } else {
                        $gallery.append('<p class="text-center">No images found in gallery.</p>');
                    }
                    $loading.hide();
                }).fail(function() {
                    $loading.hide();
                    $gallery.append('<p class="text-center text-danger">Failed to load gallery images.</p>');
                });
            }
        });

        // Handle gallery image selection and add to canvas
        $(document).on('click', '.server-gallery-img', function() {
            const imgSrc = $(this).attr('src');
            console.log('Gallery image selected:', imgSrc);
            if (window.customCanvas) {
                fabric.Image.fromURL(imgSrc, function(obj) {
                    // Scale image to fit canvas
                    const canvasWidth = customCanvas.getWidth();
                    const canvasHeight = customCanvas.getHeight();
                    const imgScale = Math.min(
                        (canvasWidth * 0.6) / obj.width,
                        (canvasHeight * 0.6) / obj.height
                    );

                    obj.set({
                        left: canvasWidth / 2,
                        top: canvasHeight / 2,
                        originX: 'center',
                        originY: 'center',
                        scaleX: imgScale,
                        scaleY: imgScale
                    });
                    customCanvas.add(obj).setActiveObject(obj);
                    customCanvas.requestRenderAll();
                });
            }
            $('#serverImageModal').modal('hide');
        });
    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.related-product-thumb').on('click', function() {
            const galleryImages = $(this).data('gallery');
            const $mainSlider = $('#product-image-slider');
            const $thumbSlider = $('#slider-nav-thumbnails');

            // Destroy if already initialized
            if ($mainSlider.hasClass('slick-initialized')) $mainSlider.slick('unslick');
            if ($thumbSlider.hasClass('slick-initialized')) $thumbSlider.slick('unslick');

            // Clear content
            $mainSlider.empty();
            $thumbSlider.empty();

            // Add new images
            galleryImages.forEach(function(url) {
                $mainSlider.append(`
                <figure class="border-radius-10">
                    <img src="${url}" alt="Product image">
                </figure>
            `);
                $thumbSlider.append(`
                <div>
                    <div class="item-thumb">
                        <img src="${url}" alt="product thumbnail">
                    </div>
                </div>
            `);
            });

            // Reinitialize with your preferred slider (e.g., Slick)
            $mainSlider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false, // disable arrows
                fade: false,
                asNavFor: '#slider-nav-thumbnails'
            });

            $thumbSlider.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '#product-image-slider',
                dots: false,
                arrows: false, // disable arrows
                centerMode: false,
                focusOnSelect: true,
                vertical: true
            });

        });
    });
</script>
<!-- Toolbar for customCanvas -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.size-input');
        const price = parseFloat(document.getElementById('pPrice').innerText);
        const totalSpan = document.getElementById('pTotal');

        // Helper to check if embroidery is selected
        function isEmbroiderySelected() {
            const embroideryRadio = document.getElementById('embroideryOption');
            return embroideryRadio && embroideryRadio.checked;
        }

        function calculateTotal() {
            let total = 0;
            inputs.forEach(input => {
                const qty = parseInt(input.value) || 0;
                let unitPrice = price;
                if (isEmbroiderySelected()) {
                    unitPrice += 1.5; // Add 2 if embroidery is selected
                }
                total += qty * unitPrice;
            });
            totalSpan.textContent = total.toLocaleString();
        }

        inputs.forEach(input => {
            input.addEventListener('input', calculateTotal);
        });

        // Listen for embroidery/print option change
        document.addEventListener('change', function(e) {
            if (e.target && (e.target.id === 'embroideryOption' || e.target.id === 'printOption')) {
                // Recalculate total when embroidery or print option changes
                calculateTotal();
            }
        });

        // initial call
        calculateTotal();
    });
</script>


<div class="modal fade" id="serverImageModal" tabindex="-1" aria-labelledby="serverImageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serverImageModalLabel" style="display:none;">Pick an Image from Gallery
                </h5>
                <script>
                    $('#serverImageModal').on('show.bs.modal', function() {
                        $('#serverImageModalLabel').show();
                    });
                    $('#serverImageModal').on('hide.bs.modal', function() {
                        $('#serverImageModalLabel').hide();
                    });
                </script>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="serverImageGallery" style="display:flex;gap:12px;flex-wrap:wrap;">
                    <!-- Images will be loaded here via AJAX -->
                </div>
                <div id="galleryLoading" style="display:none;text-align:center;padding:20px;">
                    <span>Loading images...</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alert Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertModalLabel">Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="alertModalBody">
                <!-- Alert message will be inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<form id="customCheckoutForm" action="{{ route('checkout.custom') }}" method="POST" enctype="multipart/form-data"
    style="display:none;">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="colors" id="checkoutColor">
    <input type="hidden" name="color" id="checkoutColorRgb">
    <input type="hidden" name="decoration_type" id="checkoutDecoration">
    <input type="hidden" name="sizes" id="checkoutSizes">
    {{-- <input type="hidden" name="custom_design" id="checkoutDesign"> --}}
    {{-- include price breakdown(product title unit price, embroidery price(if selected) and total) in the form to process --}}
    <input type="hidden" name="product_title" value="{{ $product->title }}">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="unit_price" value="{{ $product->price->single_list_price * 1.2 + 0.9 }}">
    <input type="hidden" name="embroidery_price" value="1.5"> {{-- This is a fixed value, adjust if dynamic --}}
    <input type="hidden" name="total_price" id="checkoutTotalPrice">
    <input type="hidden" name="decoration_price" id="checkoutDecorationPrice">
    {{-- checkoutSelectedImage --}}
    <input type="hidden" name="custom_image" id="checkoutSelectedImage">
    {{-- checkoutSelectedSide --}}
    {{-- <input type="hidden" name="custom_side" id="checkoutSelectedSide"> --}}
    {{-- payment --}}
</form>

<script>
    // Function to show alert modal
    function showAlert(message, title = 'Alert') {
       // console.log('showAlert called with:', message); // Debug log
        $('#alertModalLabel').text(title);
        $('#alertModalBody').text(message);

        // Try different Bootstrap modal methods
        try {
            if (typeof bootstrap !== 'undefined') {
                // Bootstrap 5
                var modal = new bootstrap.Modal(document.getElementById('alertModal'));
                modal.show();
            } else {
                // Bootstrap 4 or jQuery
                $('#alertModal').modal('show');
            }
        } catch (e) {
           // console.error('Modal error:', e);
            // Fallback to regular alert
            alert(message);
        }
    }

    $(document).ready(function() {
        // Hide all customisation controls initially
        $('#customiseDivs').hide();
        $('#textFormatting').hide();
        $('#imageControls').hide();
        $('#positionOptions').hide();
        $('[name="decorationType"]').closest('.mb-2').hide();
        $('#saveDesignBtn').hide();
        $('#customCanvasWrapper').hide(); // Hide canvas initially

        // Show options when Add Customisation is clicked
        $('#loadCustom').on('click', function(e) {
            e.preventDefault();
            $('#customiseDivs').show();
            $('[name="decorationType"]').closest('.mb-2').show(); // <-- Show decoration type
            $('#designModeGroup').hide(); // Hide mode until decoration picked
            $('#saveDesignBtn').hide();
            // Don't show checkout button here - only when designs are saved
            $(this).addClass('d-none');
            $('#textFormatting').hide();
            $('#imageControls').hide();
            $('#customCanvasWrapper').hide();
            $('#positionOptions').hide();
        });

        // Hide mode buttons initially
        $('#designModeGroup').hide();

        // When decoration type is selected, show mode buttons
        $('[name="decorationType"]').on('change', function() {
            $('#designModeGroup').show();
            $('.mode-btn').show().removeClass('active');
            $('#textFormatting').hide();
            $('#imageControls').hide();
            $('#customCanvasWrapper').hide();
            $('#positionOptions').hide();
            $('#saveDesignBtn').hide();
        });

        // Mode selection logic
        $('.mode-btn').on('click', function() {
            console.log('Mode button clicked:', $(this).data('mode'));
            $('.mode-btn').removeClass('active');
            $(this).addClass('active');
            let mode = $(this).data('mode');
            $('#customCanvasWrapper').show(); // Show canvas
            $('#positionOptions').show();
            $('#saveDesignBtn').show();

            if (mode === 'text') {
                console.log('Text mode activated');
                $('#textFormatting').show();
                $('#imageControls').hide();
                $('#lc1').hide();
                $('#lc2').hide();
            } else if (mode === 'upload') {
                console.log('Upload mode activated');
                $('#textFormatting').hide();
                $('#imageControls').show();
                $('#uploadImageBtn').show();
                $('#openServerImageModal').hide();
                $('#lc1').show();
                $('#lc2').hide();
            } else if (mode === 'gallery') {
                console.log('Gallery mode activated');
                $('#textFormatting').hide();
                $('#imageControls').show();
                $('#uploadImageBtn').hide();
                $('#openServerImageModal').show();
                $('#lc1').hide();
                $('#lc2').show();
            }
        });

        // Allow user to add another design (show all customisation options again and hide canvas/print/decoration)
        $('#saveDesignBtn').on('click', function() {
            // Ensure a decoration type is selected before saving
            if (!$('[name="decorationType"]:checked').length) {
                showAlert('Please select a decoration type (Print or Embroidery) before saving your design.');
                return;
            }
            // Ensure a print position is selected before saving
            if (!$('input[name="printPos"]:checked').length) {
                showAlert('Please select a print position before saving your design.');
                return;
            }

            $.get('{{ url('/saved-designs-json') }}', function(resp) {
                let currentCount = resp && resp.designs ? resp.designs.length : 0;
                if (currentCount >= 3) {
                    showAlert('You have reached the maximum of 3 designs. Please remove one before adding a new design.');
                    return;
                }
                if (window.customCanvas && customCanvas.getObjects().length > 0) {
                    const designData = JSON.stringify(customCanvas.toJSON());
                    const imageData = customCanvas.toDataURL({
                        format: 'png'
                    });
                    const printPosition = $('input[name="printPos"]:checked').val();
                    const decorationType = $('[name="decorationType"]:checked').attr('id') ===
                        'embroideryOption' ? 'embroidery' : 'print';

                    $.post('{{ route('save.design') }}', {
                        _token: '{{ csrf_token() }}',
                        design: designData,
                        image: imageData,
                        side: printPosition,
                        decoration: decorationType
                    }, function(res) {
                        // Update the preview section immediately after save
                        let html = '';
                        if (res && res.designs && res.designs.length > 0) {
                            res.designs.forEach(function(design, i) {
                                html += `
                            <div class="mb-3 p-2 border rounded" id="designPreview${i}">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        ${design.image ? `<img src="${design.image}" style="width:120px;height:120px;border:1px solid #ccc;">` : '<span class="text-muted">No image</span>'}
                                    </div>
                                    <div class="col-md-8">
                                        <strong>Name:</strong> Design #${i+1}<br>
                                        <strong>Print Type:</strong> ${design.decoration}<br>
                                        <strong>Print Position:</strong> ${design.side}<br>
                                        <small class="text-muted">Saved: ${design.saved_at}</small><br>
                                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-design-btn" data-index="${i}">Remove</button>
                                    </div>
                                </div>
                            </div>
                        `;
                            });
                            // Show checkout button when designs exist
                            $('#proceedCheckoutBtn').removeClass('d-none');
                        } else {
                            html =
                                '<p class="text-center text-muted">No designs saved yet.</p>';
                            // Hide checkout button when no designs
                            $('#proceedCheckoutBtn').addClass('d-none');
                        }
                        $('#designPreviewContainer').html(html);
                    }, 'json');
                }
                if (window.customCanvas) {
                    customCanvas.clear();
                }
                $('#pos_front_top').prop('checked', false); // Uncheck after save
                $('.mode-btn').show().removeClass('active');

                // FIRST: Uncheck decoration type to prevent event handlers from firing
                $('[name="decorationType"]').prop('checked', false);

                // After saving design, change button text and show it, hide ALL customization elements
                $('#loadCustom').text('Add More Customisation').removeClass('d-none');

                // Use setTimeout to ensure hiding happens after any event handlers
                setTimeout(function() {
                    // Hide ALL customization related elements
                    $('#customiseDivs').hide();
                    $('#textFormatting').hide();
                    $('#imageControls').hide();
                    $('#positionOptions').hide();
                    $('#customCanvasWrapper').hide();
                    $('#saveDesignBtn').hide();
                    $('#designModeGroup').hide();
                    $('[name="decorationType"]').closest('.mb-2').hide();

                    // Clear any active states
                    $('.mode-btn').removeClass('active');
                }, 100);
            }, 'json');
        });
        // Remove design from session and update preview section
        $(document).on('click', '.remove-design-btn', function() {
            const index = $(this).data('index');
            $.post('{{ url('/remove-design') }}', {
                _token: '{{ csrf_token() }}',
                index: index
            }, function(res) {
                if (res.success) {
                    // Reload the preview section after removal
                    $.get('{{ url('/saved-designs-json') }}', function(resp) {
                        let html = '';
                        if (resp && resp.designs && resp.designs.length > 0) {
                            resp.designs.forEach(function(design, i) {
                                html += `
                                <div class="mb-3 p-2 border rounded" id="designPreview${i}">
                <div class="row">
                    <div class="col-md-4 text-center">
                        ${design.image ? `<img src="${design.image}" style="width:120px;height:120px;border:1px solid #ccc;">` : '<span class="text-muted">No image</span>'}
                    </div>
                    <div class="col-md-8">
                        <strong>Name:</strong> Design #${i+1}<br>
                        <strong>Print Type:</strong> ${design.decoration}<br>
                        <strong>Print Position:</strong> ${design.side}<br>
                        <small class="text-muted">Saved: ${design.saved_at}</small><br>
                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-design-btn" data-index="${i}">Remove</button>
                    </div>
                </div>
            </div>
                            `;
                            });
                            // Show checkout button when designs exist
                            $('#proceedCheckoutBtn').removeClass('d-none');
                        } else {
                            html =
                                '<p class="text-center text-muted">No designs saved yet.</p>';
                            // Hide checkout button when no designs
                            $('#proceedCheckoutBtn').addClass('d-none');
                        }
                        $('#designPreviewContainer').html(html);
                    }, 'json');
                }
            }, 'json');
        });

        // Show saved designs on page load
        $.get('{{ url('/saved-designs-json') }}', function(resp) {
            let html = '';
            // Replace Design #${i+1} with a generated name like "Design #1", "Design #2", etc.
            if (resp && resp.designs && resp.designs.length > 0) {
                resp.designs.forEach(function(design, i) {
                    html += `
            <div class="mb-3 p-2 border rounded" id="designPreview${i}">
                <div class="row">
                    <div class="col-md-4 text-center">
                        ${design.image ? `<img src="${design.image}" style="width:120px;height:120px;border:1px solid #ccc;">` : '<span class="text-muted">No image</span>'}
                    </div>
                    <div class="col-md-8">
                        <strong>Name:</strong> Design #${i + 1}<br>
                        <strong>Print Type:</strong> ${design.decoration}<br>
                        <strong>Print Position:</strong> ${design.side}<br>
                        <small class="text-muted">Saved: ${design.saved_at}</small><br>
                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-design-btn" data-index="${i}">Remove</button>
                    </div>
                </div>
            </div>
        `;
                });
                // Show checkout button when designs exist on page load
                $('#proceedCheckoutBtn').removeClass('d-none');
                // Change button text to "Add More" if designs exist
                $('#loadCustom').text('Add More Customisation');
                // Hide decoration type selection when designs exist on page load
                $('[name="decorationType"]').closest('.mb-2').hide();
            } else {
                html = '<p class="text-center text-muted">No designs saved yet.</p>';
                // Hide checkout button when no designs on page load
                $('#proceedCheckoutBtn').addClass('d-none');
                // Keep original button text if no designs
                $('#loadCustom').text('Add Customisation');
                // Keep decoration type hidden initially
                $('[name="decorationType"]').closest('.mb-2').hide();
            }
            $('#designPreviewContainer').html(html);
        }, 'json');
    });
</script>
<script>
    $(document).ready(function() {
        function showCustomiseLoader(callback) {
            $('#customiseLoaderOverlay').fadeIn(200);
            setTimeout(function() {
                $('#customiseLoaderOverlay').fadeOut(200);
                if (typeof callback === 'function') callback();
            }, 3000); // 3 seconds
        }

        // Add Customisation
        $('#loadCustom').off('click').on('click', function(e) {
            e.preventDefault();
            showCustomiseLoader(() => {
                $('#customiseDivs').show();
                $('[name="decorationType"]').closest('.mb-2').show();
                $('#designModeGroup').hide();
                $('#saveDesignBtn').hide();
                //$('#proceedCheckoutBtn').removeClass('d-none');
                $(this).addClass('d-none');
                $('#textFormatting').hide();
                $('#imageControls').hide();
                $('#customCanvasWrapper').hide();
                $('#positionOptions').hide();
            });
        });

        // Print option (decoration type)
        $('[name="decorationType"]').off('change').on('change', function() {
            showCustomiseLoader(() => {
                $('#designModeGroup').show();
                $('.mode-btn').show().removeClass('active');
                $('#textFormatting').hide();
                $('#imageControls').hide();
                $('#customCanvasWrapper').hide();
                $('#positionOptions').hide();
                $('#saveDesignBtn').hide();
            });
        });

        // Design mode
        $('.mode-btn').off('click').on('click', function() {
            const $btn = $(this);
            showCustomiseLoader(function() {
                $('.mode-btn').not($btn).hide();
                $btn.addClass('active');
                let mode = $btn.data('mode');
                $('#customCanvasWrapper').show();
                $('#positionOptions').show();
                $('#saveDesignBtn').show();
                if (mode === 'text') {
                    $('#textFormatting').show();
                    $('#imageControls').hide();
                } else if (mode === 'upload') {
                    $('#textFormatting').hide();
                    $('#imageControls').show();
                    $('#uploadImageBtn').show();
                    $('#openServerImageModal').hide();
                     // change label content of id lc
                        $('#lc1').show();
                        $('#lc2').hide();
                } else if (mode === 'gallery') {
                    $('#textFormatting').hide();
                    $('#imageControls').show();
                    $('#uploadImageBtn').hide();
                    $('#openServerImageModal').show();
                     // change label content of id lc
                    $('#lc2').show();
                    $('#lc1').hide();
                }
            });
        });

        // Save design
        $('#saveDesignBtn').off('click').on('click', function(e) {
            e.preventDefault();
            showCustomiseLoader(() => {
                // Your save logic here...
                // (keep your existing save logic inside this callback)
                // Ensure a decoration type is selected before saving
                if (!$('[name="decorationType"]:checked').length) {
                    showAlert(
                        'Please select a decoration type (Print or Embroidery) before saving your design.'
                        );
                    return;
                }
                // Ensure a print position is selected before saving
                if (!$('input[name="printPos"]:checked').length) {
                    showAlert('Please select a print position before saving your design.');
                    return;
                }

                $.get('{{ url('/saved-designs-json') }}', function(resp) {
                    let currentCount = resp && resp.designs ? resp.designs.length : 0;
                    if (currentCount >= 3) {
                        showAlert(
                            'You have reached the maximum of 3 designs. Please remove one before adding a new design.'
                            );
                        return;
                    }
                    if (window.customCanvas && customCanvas.getObjects().length > 0) {
                        const designData = JSON.stringify(customCanvas.toJSON());
                        const imageData = customCanvas.toDataURL({
                            format: 'png'
                        });
                        const printPosition = $('input[name="printPos"]:checked').val();
                        const decorationType = $('[name="decorationType"]:checked')
                            .attr('id') === 'embroideryOption' ? 'embroidery' : 'print';

                        $.post('{{ route('save.design') }}', {
                            _token: '{{ csrf_token() }}',
                            design: designData,
                            image: imageData,
                            side: printPosition,
                            decoration: decorationType
                        }, function(res) {
                            // Update the preview section immediately after save
                            let html = '';
                            if (res && res.designs && res.designs.length > 0) {
                                res.designs.forEach(function(design, i) {
                                    html += `
                                    <div class="mb-3 p-2 border rounded" id="designPreview${i}">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                ${design.image ? `<img src="${design.image}" style="width:120px;height:120px;border:1px solid #ccc;">` : '<span class="text-muted">No image</span>'}
                                            </div>
                                            <div class="col-md-8">
                                                <strong>Name:</strong> Design #${i+1}<br>
                                                <strong>Print Type:</strong> ${design.decoration}<br>
                                                <strong>Print Position:</strong> ${design.side}<br>
                                                <small class="text-muted">Saved: ${design.saved_at}</small><br>
                                                <button type="button" class="btn btn-danger btn-sm mt-2 remove-design-btn" data-index="${i}">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                });
                                // Show checkout button when designs exist
                                $('#proceedCheckoutBtn').removeClass('d-none');
                            } else {
                                html =
                                    '<p class="text-center text-muted">No designs saved yet.</p>';
                                // Hide checkout button when no designs
                                $('#proceedCheckoutBtn').addClass('d-none');
                                // Reset button text when no designs remain
                                $('#loadCustom').text('Add Customisation');
                            }
                            $('#designPreviewContainer').html(html);

                            // Hide the save design button after successful save
                            $('#saveDesignBtn').hide();

                        }, 'json');
                    }
                    if (window.customCanvas) {
                        customCanvas.clear();
                    }
                    $('#pos_front_top').prop('checked', false); // Uncheck after save
                    $('#designModeGroup').show();
                    $('.mode-btn').show().removeClass('active');
                    $('#textFormatting').hide();
                    $('#imageControls').hide();
                    $('#customCanvasWrapper').hide();
                    $('#positionOptions').hide();
                    $('#designModeGroup').hide();
                    $('[name="decorationType"]').prop('checked', false);
                }, 'json');
            });
        });
    });
</script>
