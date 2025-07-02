@php use Illuminate\Support\Str; @endphp

@extends('layout.usermaster')
@section('usercontent')
    <title>{{ $product->title }} - Salem Apparels</title>
    <meta name="description" content="Salem Apparels - customise your products with ease.">
    <meta name="keywords" content="Salem Apparels, customise Products, Online Shopping, E-commerce">
    <meta name="author" content="Salem Apparels">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>

    <!-- Include Fabric.js -->
    <style>
        .slider-nav-thumbnails {
            max-height: 500px;
            overflow-y: auto;
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
                        <h3 class="color-brand-3 mb-25">{{ $product->title . ' ' . $product->style_code }}</h3>
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-4 col-sm-3 mb-mobile"><span
                                    class="bytext color-gray-500 font-xs font-large">Weight: {{ $product->weight }}</span>
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
                                £<span id="pPrice">{{ $product->price->single_list_price * 1.2 + 0.90 }}</span></h3>
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
                            <p class="font-sm color-gray-900">Color: <span class="color-brand-2 nameColor">Select your favourite color</span>
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
                                            title="{{ $availableColor->colourway_name }}"
                                            onclick="document.querySelector('.nameColor').textContent = '{{ $availableColor->colourway_name }}';"></span>
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
                                                value="0" min="0" class="form-control text-center size-input">
                                        </div>
                                    @endforeach
                                    <h3>Total £<span id="pTotal"></span></h3>
                                </div>


                            </div>

                            <div id="customiseDiv">
                                {{-- load /customise-product/{{ $product->id }} page here on click on loadCustom button  --}}


                            </div>
                        </div>



                        <div class="buy-product mt-30">

                            <div class="box-quantity">

                                <div class="button-buy">
                                    <button id="loadCustom" class="btn btn-cart" type="button">Add
                                        Customisation</button>
                                    <a class="btn btn-buy" href="shop-checkout.html">Proceed to Check Out</a>
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

                                    $('#loadCustom').on('click', function(e) {
                                        e.preventDefault();
                                        let sideOptions = sides.map(s => `<option value="${s.value}">${s.label}</option>`).join('');
                                        $('#customiseDiv').html(`
                                            <div class="card p-3 mb-3">
                                                <h5 class="mb-2">Customise Your Product</h5>
                                                <div class="mb-2">
                                                    <label for="customSide" class="form-label">Select Side/Area:</label>
                                                    <select id="customSide" class="form-select form-select-sm mb-2" style="max-width:220px;">
                                                        ${sideOptions}
                                                    </select>
                                                </div>
                                                <div class="d-flex flex-row align-items-start gap-3">
                                                    <!-- Toolbar -->
                                                    <div id="customCanvasToolbar" class="mb-2 d-flex flex-column" style="gap: 8px; min-width:180px;">
                                                        <button type="button" id="addTextBtn" class="btn btn-outline-secondary btn-sm mb-1">Add Text</button>
                                                        <input type="file" id="uploadImageInput" accept="image/*" class="mb-1" style="width:auto;">
                                                        <label>Font Color:</label>
                                                        <input type="color" id="fontColorInput" value="#222222" title="Text Color" class="mb-1" style="width:auto; height: 40px; border-radius:5px; padding:5px;">

                                                        <select id="fontFaceSelect" class="form-select form-select-sm mb-1" style="width:auto;">
                                                            <option value="Arial">Arial</option>
                                                            <option value="Times New Roman">Times New Roman</option>
                                                            <option value="Courier New">Courier New</option>
                                                            <option value="Verdana">Verdana</option>
                                                            <option value="Georgia">Georgia</option>
                                                        </select>
                                                        <select id="fontSizeSelect" class="form-select form-select-sm mb-1" style="width:auto;">
                                                            <option value="12">12</option>
                                                            <option value="16">16</option>
                                                            <option value="20">20</option>
                                                            <option value="24" selected>24</option>
                                                            <option value="32">32</option>
                                                            <option value="40">40</option>
                                                            <option value="48">48</option>
                                                        </select>
                                                        <select id="textStyleSelect" class="form-select form-select-sm mb-1" style="width:auto;">
                                                            <option value="">Style</option>
                                                            <option value="bold">Bold</option>
                                                            <option value="italic">Italic</option>
                                                            <option value="underline">Underline</option>
                                                            <option value="red-text">Red Text</option>
                                                            <option value="large-text">Large Text</option>
                                                            <option value="medium-text">Medium Text</option>
                                                            <option value="small-text">Small Text</option>
                                                        </select>
                                                        <button type="button" id="deleteObjectBtn" class="btn btn-outline-danger btn-sm mb-1">Delete</button>

                                                    </div>
                                                    <!-- Canvas -->
                                                    <div id="customCanvasWrapper" class="border rounded p-2 bg-light">
                                                        <div class="mb-3">
                                                            <label class="form-label d-block mb-2">Decoration Type:</label>
                                                            <div class="btn-group" role="group" aria-label="Decoration Type">
                                                                <input type="radio" class="btn-check" name="decorationType" id="printOption" autocomplete="off" checked>
                                                                <label class="btn btn-outline-warning" for="printOption" style="min-width:120px;">Print</label>

                                                                <input type="radio" class="btn-check" name="decorationType" id="embroideryOption" autocomplete="off">
                                                                <label class="btn btn-outline-warning" for="embroideryOption" style="min-width:120px;">Embroidery</label>
                                                            </div>
                                                        </div>
                                                        <canvas id="customCanvas" width="350" height="350" style="max-width:100%;height:auto;display:block;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        `);

                                        // Fabric.js setup for custom canvas
                                        const customCanvas = new fabric.Canvas('customCanvas');

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

    // Upload Image Input
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

    // Add rectangle Button
    // document.getElementById('addRectangleBtn').addEventListener('click', function() {
    //     const rect = new fabric.Rect({
    //         left: 100,
    //         top: 100,
    //         fill: 'rgba(255, 0, 0, 0.5)',
    //         width: 100,
    //         height: 100
    //     });
    //     customCanvas.add(rect).setActiveObject(rect);
    // });

    // Add circle Button
    // document.getElementById('addCircleBtn').addEventListener('click', function() {
    //     const circle = new fabric.Circle({
    //         left: 150,
    //         top: 150,
    //         fill: 'rgba(0, 0, 255, 0.5)',
    //         radius: 50
    //     });
    //     customCanvas.add(circle).setActiveObject(circle);
    // });

    // Add line Button
    // document.getElementById('addLineBtn').addEventListener('click', function() {
    //     const line = new fabric.Line([50, 100, 200, 200], {
    //         stroke: 'green',
    //         strokeWidth: 5
    //     });
    //     customCanvas.add(line).setActiveObject(line);
    // });

    // Add triangle Button
    // document.getElementById('addTriangleBtn').addEventListener('click', function() {
    //     const triangle = new fabric.Triangle({
    //         left: 200,
    //         top: 200,
    //         fill: 'rgba(255, 255, 0, 0.5)',
    //         width: 100,
    //         height: 100
    //     });
    //     customCanvas.add(triangle).setActiveObject(triangle);
    // });

    // Add polygon Button
    // document.getElementById('addPolygonBtn').addEventListener('click', function() {
    //     const polygon = new fabric.Polygon([
    //         { x: 100, y: 0 },
    //         { x: 200, y: 100 },
    //         { x: 150, y: 200 },
    //         { x: 50, y: 200 },
    //         { x: 0, y: 100 }
    //     ], {
    //         left: 100,
    //         top: 100,
    //         fill: 'rgba(128, 0, 128, 0.5)'
    //     });
    //     customCanvas.add(polygon).setActiveObject(polygon);
    // });

    // Font color change for selected text
    document.getElementById('fontColorInput').addEventListener('input', function() {
        const activeObject = customCanvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fill', this.value);
            customCanvas.requestRenderAll();
        }
    });

    // Shape color change for selected shapes
    // document.getElementById('shapeColorInput').addEventListener('input', function() {
    //     const activeObject = customCanvas.getActiveObject();
    //     if (
    //         activeObject && ['rect', 'circle', 'triangle', 'polygon', 'line'].includes(activeObject.type)
    //     ) {
    //         // For lines, change stroke; for others, change fill
    //         if (activeObject.type === 'line') {
    //             activeObject.set('stroke', this.value);
    //         } else {
    //             activeObject.set('fill', this.value);
    //         }
    //         customCanvas.requestRenderAll();
    //     }
    // });

    // Font face change for selected text
    document.getElementById('fontFaceSelect').addEventListener('change', function() {
        const activeObject = customCanvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fontFamily', this.value);
            customCanvas.requestRenderAll();
        }
    });

    // Text style change for selected text
    document.getElementById('textStyleSelect').addEventListener('change', function() {
        const activeObject = customCanvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            switch (this.value) {
                case 'bold':
                    activeObject.set('fontWeight', 'bold');
                    break;
                case 'italic':
                    activeObject.set('fontStyle', 'italic');
                    break;
                case 'underline':
                    activeObject.set('underline', true);
                    break;
                case 'red-text':
                    activeObject.set('fill', '#ff0000');
                    break;
                case 'large-text':
                    activeObject.set('fontSize', 36);
                    break;
                case 'medium-text':
                    activeObject.set('fontSize', 24);
                    break;
                case 'small-text':
                    activeObject.set('fontSize', 12);
                    break;
                default:
                    activeObject.set({
                        fontWeight: 'normal',
                        fontStyle: 'normal',
                        underline: false,
                        fill: '#222',
                        fontSize: 24
                    });
            }
            customCanvas.requestRenderAll();
        }
    });

    // Delete selected object with toolbar button
    document.getElementById('deleteObjectBtn').addEventListener('click', function() {
        const activeObject = customCanvas.getActiveObject();
        if (activeObject) {
            customCanvas.remove(activeObject);
        }
    });

    // Bring Forward Button
    // document.getElementById('bringForwardBtn').addEventListener('click', function() {
    //     const activeObject = customCanvas.getActiveObject();
    //     if (activeObject) {
    //         customCanvas.bringForward(activeObject);
    //         customCanvas.requestRenderAll();
    //     }
    // });

    // Send Backward Button
    // document.getElementById('sendBackwardBtn').addEventListener('click', function() {
    //     const activeObject = customCanvas.getActiveObject();
    //     if (activeObject) {
    //         customCanvas.sendBackwards(activeObject);
    //         customCanvas.requestRenderAll();
    //     }
    // });

    // Bring to Front Button
    // document.getElementById('bringToFrontBtn').addEventListener('click', function() {
    //     const activeObject = customCanvas.getActiveObject();
    //     if (activeObject) {
    //         customCanvas.bringToFront(activeObject);
    //         customCanvas.requestRenderAll();
    //     }
    // });

    // Send to Back Button
    // document.getElementById('sendToBackBtn').addEventListener('click', function() {
    //     const activeObject = customCanvas.getActiveObject();
    //     if (activeObject) {
    //         customCanvas.sendToBack(activeObject);
    //         customCanvas.requestRenderAll();
    //     }
    // });

    // Optional: Allow delete with keyboard 'Delete' or 'Backspace'
    document.addEventListener('keydown', function(e) {
        if ((e.key === "Delete" || e.key === "Backspace") && document.activeElement.tagName !== 'INPUT' &&
            document.activeElement.tagName !== 'TEXTAREA') {
            const activeObject = customCanvas.getActiveObject();
            if (activeObject) {
                customCanvas.remove(activeObject);
            }
        }
    });

    // Change selected text color from color picker (if you want a separate picker)
    document.getElementById('customTextColor')?.addEventListener('input', function() {
        const activeObject = customCanvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fill', this.value);
            customCanvas.requestRenderAll();
        }
    });
                                        // Add text
                                        $('#addCustomText').on('click', function() {
                                            const text = new fabric.IText('Add your text here', {
                                                left: 50,
                                                top: 50,
                                                fill: '#222',
                                                fontSize: 24
                                            });
                                            customCanvas.add(text).setActiveObject(text);
                                        });

                                        // Upload image
                                        $('#uploadCustomImage').on('change', function(e) {
                                            const file = e.target.files[0];
                                            if (!file) return;
                                            const reader = new FileReader();
                                            reader.onload = function(f) {
                                                fabric.Image.fromURL(f.target.result, function(img) {
                                                    img.set({
                                                        left: 80,
                                                        top: 80,
                                                        scaleX: 0.4,
                                                        scaleY: 0.4
                                                    });
                                                    customCanvas.add(img).setActiveObject(img);
                                                });
                                            };
                                            reader.readAsDataURL(file);
                                        });

                                        // Format text (simple example: bold, color)
                                        customCanvas.on('selection:created', function(e) {
                                            const obj = e.target;
                                            if (obj.type === 'i-text') {
                                                // Example: make selected text bold and red
                                                obj.set({
                                                    fontWeight: 'bold',
                                                    fill: '#c00'
                                                });
                                                customCanvas.requestRenderAll();
                                            }
                                        });

                                        // Side selection (optional: you can use this value for backend or preview logic)
                                        $('#customSide').on('change', function() {
                                            // You can update preview or store the selected side
                                        });
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
                                                    £{{ $relatedProduct->price->single_list_price * 1.2 + 0.90 }}
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
        <section class="section-box box-newsletter"
            style="background-image: url('{{ asset('userasset/imgs/page/about/asus.svgs') }}');">
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
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.size-input');
        const price = parseFloat(document.getElementById('pPrice').innerText);
        const totalSpan = document.getElementById('pTotal');

        function calculateTotal() {
            let total = 0;
            inputs.forEach(input => {
                const qty = parseInt(input.value) || 0;
                total += qty * price;
            });
            totalSpan.textContent = total.toLocaleString();
        }

        inputs.forEach(input => {
            input.addEventListener('input', calculateTotal);
        });

        // initial call
        calculateTotal();
    });


</script>


