@extends('layout.usermaster')
@section('usercontent')
    <main>
        <section class="section-box shop-template">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box-border">
                            <div class="box-payment"><a class="btn btn-gpay"><img src="{{ asset('userasset/imgs/page/checkout/gpay.svg') }}"
                                        alt="Ecom"></a><a class="btn btn-paypal"><img
                                        src="{{ asset('userasset/imgs/page/checkout/paypal.svg') }}" alt="Ecom"></a><a
                                    class="btn btn-amazon"><img src="{{ asset('userasset/imgs/page/checkout/amazon.svg') }}"
                                        alt="Ecom"></a></div>
                            <div class="border-bottom-4 text-center mb-20">
                                <div class="text-or font-md color-gray-500">Or</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 mb-20">
                                    <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Contact information
                                    </h5>
                                </div>
                                <div class="col-lg-6 col-sm-6 mb-20 text-sm-end text-center"><span
                                        class="font-sm color-brand-3">Already have an account?</span><a
                                        class="font-sm color-brand-1" href="page-login.html"> Login</a></div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-sm color-brand-3" for="checkboxOffers">
                                            <input class="checkboxOffer" id="checkboxOffers" type="checkbox">Keep me up to
                                            date on news and exclusive offers
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="font-md-bold color-brand-3 mt-15 mb-20">Shipping address</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="First name*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="Last name*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="Address 1*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="Address 2*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control font-sm select-style1 color-gray-700">
                                            <option value="">Select an option...</option>
                                            <option value="1">Option 1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="City*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="PostCode / ZIP*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="Company name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" placeholder="Phone*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-0">
                                        <textarea class="form-control font-sm" placeholder="Additional Information" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-6 col-5 mb-20"><a class="btn font-sm-bold color-brand-1 arrow-back-1"
                                    href="shop-cart.html">Return to Cart</a></div>
                            <div class="col-lg-6 col-7 mb-20 text-end"><a class="btn btn-buy w-auto arrow-next"
                                    href="shop-checkout.html">Place an Order</a></div>
                        </div>
                    </div>
                   @php
    $c = session('checkout_data');
@endphp

                    <div class="col-lg-6">
    <div class="box-border">
        <h5 class="font-md-bold mb-20">Your Order</h5>
        <div class="listCheckout">
            <div class="item-wishlist">
                <div class="wishlist-product">
                    <div class="product-wishlist">
                        <div class="product-image">
                            <a href="#">
                                <img
                                    src="{{ $c['custom_image'] ?? asset('userasset/imgs/page/product/img-sub.png') }}"
                                    alt="Product"
                                    class="img-fluid mb-2">
                            </a>
                            {{-- @if (!empty($c['custom_design_raw']))
                                <div class="mt-2">
                                    <strong>Custom Design:</strong><br>
                                    <img src="data:image/png;base64,{{ $c['custom_design_raw'] }}" alt="Custom Design" style="max-width: 100px; border: 1px solid #ccc; padding: 4px;">
                                </div>
                            @endif --}}
                        </div>
                        <div class="product-info">
                            <h6 class="color-brand-3">{{ $c['product_title'] ?? 'Product Title' }}</h6>
                            <p class="text-muted mb-1">Decoration: {{ ucfirst($c['decoration_type']) ?? '-' }}</p>
                            <p class="text-muted mb-1">Side: {{ ucfirst($c['custom_side']) ?? '-' }}</p>
                            <p class="text-muted mb-1">
                                Color:
                                <span class="d-inline-block align-middle" style="width: 16px; height: 16px; background-color: {{ $c['color'] ?? '#000' }}; border-radius: 4px; border: 1px solid #ccc;"></span>
                                <span class="align-middle ms-1">{{ $c['color'] ?? 'N/A' }}</span>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="wishlist-status">
                    <small class="color-gray-500">Total Qty:
                        {{ collect(json_decode($c['sizes'], true))->sum() }}
                    </small>
                </div>

            </div>
              <p> <small>Please note the the colour of the design may change based on the colour of the material but it will be confirmed before production</small></p>
        </div>

        <div class="form-group mb-0">
            <div class="row mb-10">
                <div class="col-lg-6 col-6">
                    <p>
                         @php
        $sizes = json_decode($c['sizes'], true);
    @endphp
    </p>

                    <span class="font-md-bold color-brand-3">Unit Price</span></div>
                <div class="col-lg-6 col-6 text-end"><span><small style="font-size: 10px;">{{ number_format($c['unit_price'], 2) }} x {{ collect(json_decode($c['sizes'], true))->sum() }}</small></span> <span
                        class="font-lg-bold color-brand-3">£{{ number_format($c['unit_price'], 2) * collect(json_decode($c['sizes'], true))->sum() }}</span></div>
            </div>
            @if ($c['decoration_type'] === 'embroidery')
            <div class="row mb-10">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Embroidery Price</span></div>
                <div class="col-lg-6 col-6 text-end"><span><small style="font-size: 10px;">({{ number_format($c['embroidery_price'], 2) }} x {{ collect(json_decode($c['sizes'], true))->sum() }})</small></span> <span class="font-lg-bold color-brand-3">£{{ number_format($c['embroidery_price'], 2) * collect(json_decode($c['sizes'], true))->sum() }}</span></div>

            </div>
            <div class="row mb-10">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Digitisation Setup</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">£{{ number_format(15, 2) }}</span></div>

            </div>
                @endif
             <div class="border-bottom mb-10 pb-5">
                <div class="row">
                    <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Quantity</span></div>
                    <div class="col-lg-6 col-6 text-end"><span>
                        <small style="font-size: 10px;">
                            @php
    use Illuminate\Support\Str;
    $sizes = json_decode($c['sizes'], true);
@endphp

@if(is_array($sizes))

        @foreach($sizes as $size => $qty)
            @php
                // Clean the key to extract size only (e.g., "L" from "sizes[L]")
                $cleanSize = Str::between($size, '[', ']');
            @endphp
            @if($qty > 0)
                {{ strtoupper($cleanSize) }}-{{ $qty }},
            @endif
        @endforeach

@endif

                        </small></span><span class="font-lg-bold color-brand-3">{{collect(json_decode($c['sizes'], true))->sum()}}</span></div>
                </div>
            </div>

            <div class="border-bottom mb-10 pb-5">
                <div class="row">
                    <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Shipping</span></div>
                    <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">-</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Total</span></div>
                <div class="col-lg-6 col-6 text-end"><span
                        class="font-lg-bold color-brand-3">£ @if ($c['decoration_type'] === 'embroidery')
                        {{ number_format($c['total_price'], 2) + 15 }}
                        @else
                        {{ number_format($c['total_price'], 2) }}

                        @endif</span></div>
            </div>




        </div>
    </div>
</div>



                </div>
            </div>
        </section>

    </main>
@endsection
