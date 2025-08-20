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
</style>
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
                                    @foreach ($product->galleries as $gallery)
                                    <figure class="border-radius-10">

                                        <img src="{{ $gallery->image_url }}" alt="product image">
                                    </figure>
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
                    <h3 class="color-brand-3 mb-25">{{ $product->title}}</h3>

                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-sm-3 mb-mobile"><span
                                class="bytext color-gray-500 font-xs font-large">Weight: {{ $product->weight }} | Style Code: {{ $product->style_code }}</span>
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

                        <li class="related-product-thumb" data-gallery='@json($availableColor->galleries->pluck(' image_url'))'>
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
                            <div class="col-2 col-sm-2 col-md-1 text-center mb-2">
                                <label class="fw-bold d-block mb-1">{{ $size }}</label>
                                <input type="text" style="width: 50px;" name="sizes[{{ $size }}]"
                                    value="" placeholder="0" min="0" class="form-control text-center size-input">
                            </div>
                            @endforeach
                            <h3>Total £<span id="pTotal"></span></h3>
                        </div>


                    </div>

                    {{-- Add this directly in your HTML after the sizes section --}}
                    <div id="customiseDivs">
                        <div class="card p-3 mb-3">
                            <h5 class="mb-2">Customise Your Product</h5>
                            <div class="mb-2">
                                <label for="customSide" class="form-label">Select Side/Area:</label>
                                <select id="customSide" class="form-select form-select-sm mb-2"
                                    style="max-width:220px;">
                                    <option value="front_top">Front Top</option>
                                    <option value="front_middle">Front Middle</option>
                                    <option value="front_bottom">Front Bottom</option>
                                    <option value="back_top">Back Top</option>
                                    <option value="back_middle">Back Middle</option>
                                    <option value="back_bottom">Back Bottom</option>
                                    <option value="left_sleeve">Left Sleeve</option>
                                    <option value="right_sleeve">Right Sleeve</option>
                                </select>
                            </div>
                            <div class="d-flex flex-row align-items-start gap-3">
                                <!-- Toolbar -->
                                <div id="customCanvasToolbar" class="mb-2 d-flex flex-column"
                                    style="gap: 8px; min-width:180px;">
                                    <button type="button" id="addTextBtn"
                                        class="btn btn-outline-secondary btn-sm mb-1">Add Text</button>
                                    <button type="button" id="uploadImageBtn"
                                        class="btn btn-outline-secondary btn-sm mb-1">
                                        <i class="fas fa-upload"
                                            style="font-size:12px; margin-right:5px;"></i>Upload Image
                                    </button>
                                    <input type="file" id="uploadImageInput" accept="image/*"
                                        style="display:none;">
                                    <button type="button" id="openServerImageModal"
                                        class="btn btn-outline-secondary btn-sm mb-1">Add from Gallery</button>
                                    <input type="color" id="fontColorInput" value="#222222" title="Text Color"
                                        class="mb-1"
                                        style="width:auto; height: 40px; border-radius:5px; padding:5px;">

                                    <select id="fontFaceSelect" class="form-select form-select-sm mb-1"
                                        style="width:auto;">
                                        <option value="Arial">Arial</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Courier New">Courier New</option>
                                        <option value="Verdana">Verdana</option>
                                        <option value="Georgia">Georgia</option>
                                    </select>
                                    <select id="fontSizeSelect" class="form-select form-select-sm mb-1"
                                        style="width:auto;">
                                        <option value="12">12</option>
                                        <option value="16">16</option>
                                        <option value="20">20</option>
                                        <option value="24" selected>24</option>
                                        <option value="32">32</option>
                                        <option value="40">40</option>
                                        <option value="48">48</option>
                                    </select>
                                    <div class="btn-group mb-1" role="group" aria-label="Text Styles"
                                        style="width:auto;">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="boldTextBtn" title="Bold"><strong>B</strong></button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="italicTextBtn" title="Italic"><em>I</em></button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="underlineTextBtn" title="Underline"><u>U</u></button>
                                    </div>
                                    <div class="btn-group mb-1" role="group" aria-label="Actions"
                                        style="width:auto;">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="undoBtn" title="Undo">
                                            <i class="fas fa-undo" style="font-size:12px;"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="redoBtn" title="Redo">
                                            <i class="fas fa-redo" style="font-size:12px;"></i>
                                        </button>
                                        <button type="button" id="deleteObjectBtn"
                                            class="btn btn-outline-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash" style="font-size:12px;"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Canvas -->
                                <div id="customCanvasWrapper" class="border rounded p-2 bg-light">
                                    <div class="mb-3">
                                        <label class="form-label d-block mb-2">Decoration Type:</label>
                                        <div class="btn-group" role="group" aria-label="Decoration Type">
                                            <input type="radio" class="btn-check" name="decorationType"
                                                id="printOption" autocomplete="off" checked>
                                            <label class="btn btn-outline-warning" for="printOption"
                                                style="min-width:120px;">Print</label>

                                            <input type="radio" class="btn-check" name="decorationType"
                                                id="embroideryOption" autocomplete="off">
                                            <label class="btn btn-outline-warning" for="embroideryOption"
                                                style="min-width:120px;">Embroidery</label>
                                        </div>
                                    </div>
                                    <canvas id="customCanvas" width="350" height="350"
                                        style="max-width:100%;height:auto;display:block;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="buy-product mt-30">

                        <div class="box-quantity">

                            <div class="button-buy">
                                <button id="loadCustom" class="btn btn-cart" type="button">Add
                                    Customisation</button>
                                <a class="btn btn-buy d-none" id="proceedCheckoutBtn">Proceed to Check Out</a>
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

                                    // display proceedCheckoutBtn
                                    $('#proceedCheckoutBtn').removeClass('d-none');
                                    // hide loadCustom
                                    $('#loadCustom').addClass('d-none');


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
                                        const reader = new FileReader();
                                        reader.onload = function(f) {
                                            fabric.Image.fromURL(f.target.result, function(img) {
                                                img.set({
                                                    left: 100,
                                                    top: 100,
                                                    scaleX: 0.5,
                                                    scaleY: 0.5
                                                });
                                                customCanvas.add(img).setActiveObject(img);
                                            });
                                        };
                                        reader.readAsDataURL(file);
                                    });

                                    // Custom upload button click handler
                                    document.getElementById('uploadImageBtn').addEventListener('click', function() {
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
                                        alert('Please select a color before proceeding.');
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
                                        alert('Please select at least one size with quantity greater than 0.');
                                        return;
                                    }

                                    // validate total is not 0 or null
                                    const total = parseFloat($('#pTotal').text());
                                    if (isNaN(total) || total <= 0) {
                                        alert('Please select a size and quantity before proceeding.');
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
                                    const selectedSide = document.getElementById('customSide').value;

                                    // 7. Get selected image
                                    const selectedImage = document.querySelector('.slider-nav-thumbnails .item-thumb img')?.src || '';

                                    // 8. Fill ALL form fields
                                    document.getElementById('checkoutColor').value = color;
                                    document.getElementById('checkoutColorRgb').value = colorRgb;
                                    document.getElementById('checkoutDecoration').value = decoration;
                                    document.getElementById('checkoutSizes').value = JSON.stringify(sizes);
                                    document.getElementById('checkoutDesign').value = customDesign;
                                    document.getElementById('checkoutTotalPrice').value = total;
                                    document.getElementById('checkoutDecorationPrice').value = decorationPrice;
                                    document.getElementById('checkoutSelectedImage').value = selectedImage;
                                    document.getElementById('checkoutSelectedSide').value = selectedSide;

                                    console.log('Form data being submitted:', {
                                        color: color,
                                        colorRgb: colorRgb,
                                        decoration: decoration,
                                        sizes: sizes,
                                        total: total,
                                        decorationPrice: decorationPrice,
                                        selectedSide: selectedSide,
                                        selectedImage: selectedImage,
                                        customDesign: customDesign ? 'Canvas data present' : 'No canvas data'
                                    });

                                    // 9. Submit the form
                                    document.getElementById('customCheckoutForm').submit();
                                });
                            </script>

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
                                            href="/product/customise/{{ $relatedProduct->slug }}">Customise Now</a>
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
        $('#serverImageModal').modal('show');
        var $gallery = $('#serverImageGallery');
        var $loading = $('#galleryLoading');
        if ($gallery.children().length === 0) { // Only load if not already loaded
            $loading.show();
            $.get('{{ route("custom.gallery.images") }}',
                function(data) {
                    $gallery.empty();
                    data.images.forEach(function(url) {
                        $gallery.append(
                            `<img src="${url}" alt="Gallery Image" class="img-thumbnail server-gallery-img" style="width:80px;height:80px;object-fit:cover;cursor:pointer;">`
                        );
                    });
                    $loading.hide();
                });
        }
    });

    // ADD THIS: Handle gallery image selection and add to canvas
    $(document).on('click', '.server-gallery-img', function() {
        const imgSrc = $(this).attr('src');
        if (window.customCanvas) {
            fabric.Image.fromURL(imgSrc, function(obj) {
                obj.set({
                    left: 80,
                    top: 80,
                    scaleX: 0.4,
                    scaleY: 0.4
                });
                customCanvas.add(obj).setActiveObject(obj);
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
                <h5 class="modal-title" id="serverImageModalLabel" style="display:none;">Pick an Image from Gallery</h5>
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

<form id="customCheckoutForm" action="{{ route('checkout.custom') }}" method="POST" enctype="multipart/form-data"
    style="display:none;">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="colors" id="checkoutColor">
    <input type="hidden" name="color" id="checkoutColorRgb">
    <input type="hidden" name="decoration_type" id="checkoutDecoration">
    <input type="hidden" name="sizes" id="checkoutSizes">
    <input type="hidden" name="custom_design" id="checkoutDesign">
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
    <input type="hidden" name="custom_side" id="checkoutSelectedSide">
    {{-- payment --}}
</form>