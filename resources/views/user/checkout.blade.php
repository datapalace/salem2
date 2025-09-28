{{-- Debug --}}
@extends('layout.usermaster')

<title>{{ $product->title?? 'Checkout' }}</title>
@section('usercontent')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<main>
    @php
    $c = session('checkout_data');
    @endphp

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
                        <!-- <div class="border-bottom-4 text-center mb-20">
                            <div class="text-or font-md color-gray-500">Or</div>
                        </div> -->
                        <br><br>
                        <div class="row">

                            <!-- login and register -->
                            <!-- The tab-->

                            <h5 class="font-md-bold color-brand-3 text-sm-start text-center">{{ Auth::guard('customer')->user() ? 'Hi ' .$user->name : 'You are not logged in' }}</h5>
                            <div class="border-bottom-4 text-center mb-20">
                                <div class="text-or font-md color-gray-500">Checkout</div>
                            </div>
                            <!-- check if the user is logged in -->
                            @if (!Auth::guard('customer')->check())
                            <div class="col-lg-6 col-sm-6 mb-20">
                                <h5 class="font-md-bold color-brand-3 text-sm-start text-center">
                                </h5>
                            </div>
                              <script>
        window.onload = function() {


            const password = document.getElementById('password');
            const repassword = document.getElementById('repassword');
            const checkagree = document.getElementById('checkagree');
            const signupBtn = document.getElementById('signupBtn');
            const passwordHelp = document.getElementById('passwordHelp');
            const agreementHelp = document.getElementById('agreementHelp');

            function validateForm() {
                const passMatch = password.value && repassword.value && password.value === repassword.value;
                passwordHelp.style.display = passMatch || (!password.value && !repassword.value) ? 'none' : 'block';

                if (!checkagree.checked) {
                    agreementHelp.style.display = 'block';
                } else {
                    agreementHelp.style.display = 'none';
                }

                signupBtn.disabled = !(passMatch && checkagree.checked);
            }

            password.addEventListener('input', validateForm);
            repassword.addEventListener('input', validateForm);
            checkagree.addEventListener('change', validateForm);
        };
    </script>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active text-dark" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login</button>
                                    <button class="nav-link text-warning" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register</button>

                                </div>
                            </nav>

                            <!-- End The tab-->
                            <!-- Start login and register Content -->
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form action="{{ route('process.login') }}" method="post">
                                        @csrf
                                        <div class="form-register mt-30 mb-30">
                                            {{--  --}}
                                            <p>Login to Continue</p>
                                            <div class="form-group">

                                                <input class="form-control font-sm" type="text" name="username" placeholder="Email">
                                            </div>
                                            <div class="form-group">

                                                <input class="form-control font-sm" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="color-gray-500 font-xs">
                                                            <input class="checkagree" type="checkbox">Remember me
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-end">
                                                    <div class="form-group"><a class="font-xs color-gray-500" href="#">Forgot your password?</a></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="font-md-bold btn btn-buy" type="submit" value="Login">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="form-register mt-30 mb-30">
                                            <div class="form-group">

                                                <input class="form-control font-sm" type="text" name="name" placeholder="Full name" required>
                                            </div>
                                            <div class="form-group">

                                                <input class="form-control font-sm" type="text" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">

                                                <input class="form-control font-sm" name="username" type="text" placeholder="username" required>
                                            </div>
                                            <div class="form-group">

                                                <input class="form-control font-sm" id="password" type="password" name="password" required placeholder="Password">
                                            </div>
                                            <div class="form-group">

                                                <input class="form-control font-sm" required id="repassword" type="password" placeholder="Comfirm Password">
                                                <small id="passwordHelp" class="text-danger" style="display:none;">Passwords do not match.</small>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input class="checkagree" id="checkagree" type="checkbox">By clicking Register button, you agree our terms and policy,
                                                </label>
                                                <br>
                                                <small id="agreementHelp" class="text-danger" style="display:none;">You must agree to the terms and policy.</small>
                                            </div>
                                            <div class="form-group">
                                                <button class="font-md-bold btn btn-buy" id="signupBtn" type="submit">Sign Up</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- End login and register Content -->
                            <!-- End login and register -->
                            @endif

                            <div class="col-lg-12">
                                <h5 class="font-md-bold color-brand-3 mt-15 mb-20">Shipping address</h5>
                            </div>
                        </div>
                        <form id="checkOutForm" method="POST" action="{{ route('checkout.stripe.pay') }}">
                            @csrf
                            <div class="row">

                                @php
                                $user = Auth::guard('customer')->user();
                                $userID = $user ? $user->id : '';
                                $firstName = $user ? (explode(' ', $user->name)[0] ?? '') : '';
                                $lastName = $user ? (implode(' ', array_slice(explode(' ', $user->name), 1)) ?? '') : '';
                                @endphp

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" value="{{ $firstName }}" placeholder="First name*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" required type="text" value="{{ $lastName }}" placeholder="Last name*">
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" readonly type="text" placeholder="Email*" value="{{ $user ? $user->email : '' }}" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" required type="text" placeholder="Address 1*" name="address">
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" name="address2" type="text" placeholder="Address 2">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select name="country" class="form-control font-sm select-style1  color-gray-700">
                                            <option value="">Select a country...</option>
                                            <option selected value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="France">France</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="India">India</option>
                                            <option value="Japan">Japan</option>
                                            <option value="China">China</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Russia">Russia</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Finland">Finland</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Austria">Austria</option>
                                            <option value="New Zealand">New Zealand</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" name="city" type="text" placeholder="City*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" name="zip_code" type="text" placeholder="PostCode / ZIP*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control font-sm" required name="phone" type="tel" placeholder="Phone *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control font-sm" type="text" name="company_name" placeholder="Company name">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-0">
                                        {{-- submit payment ref from stripe --}}
                                        <input type="hidden" name="stripe_payment_ref" id="stripePaymentRef" value="">
                                        {{-- additional information --}}
                                        <textarea class="form-control font-sm" name="additional_information" placeholder="Additional Information" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                    </div>


                    </form>

                    <form id="stripePaymentForm" method="POST" action="{{ route('checkout.stripe.pay') }}">
                        @csrf
                        <hr>
                        <h5 class="font-md-bold mb-20">Provide Card Details</h5>
                        {{-- style the striple input element --}}
                        <style>
                            #card-element {
                                background: #fff;
                                padding: 14px 12px;
                                border: 1px solid #ced4da;
                                border-radius: 6px;
                                font-size: 1rem;
                                color: #495057;
                                box-shadow: none;
                                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                min-height: 44px;
                            }

                            #card-element.StripeElement--focus {
                                border-color: #80bdff;
                                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
                            }

                            #card-element.StripeElement--invalid {
                                border-color: #dc3545;
                            }

                            #card-element.StripeElement--complete {
                                border-color: #28a745;
                            }
                        </style>
                        <div id="card-element"></div>
                        <div id="card-errors" class="text-danger mt-2"></div>
                        <div class="row mt-20">
                            <div class="col-lg-6 col-5 mb-20"><a class="btn font-sm-bold color-brand-1 arrow-back-1"
                                    href="{{ url()->previous() }}">Return to Design</a></div>
                            <div class="col-lg-6 col-7 mb-20 text-end float-right"><button id="payBtn" class="btn btn-buy w-auto arrow-next" {{ !Auth::guard('customer')->user() ? 'disabled' : '' }}>Pay Now</button>

                            </div>
                    </form>
                </div>

            </div>

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
                        <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Cost Breakdown</span></div>
                        {{-- show printing options in the saved design in session --}}

                                                @if(isset($c['custom_designs']) && count($c['custom_designs']))
                            <div class="box-border mt-4">

                                @php
                                    $totalDesignCost = 0;
                                @endphp
                                @foreach($c['custom_designs'] as $i => $design)
                                    @php
                                        // Calculate cost based on decoration type
                                        if (isset($design['decoration']) && strtolower($design['decoration']) === 'print') {
                                            $totalDesignCost += 13 * collect(json_decode($c['sizes'], true))->sum();
                                        } elseif (isset($design['decoration']) && strtolower($design['decoration']) === 'embroidery') {
                                            $totalDesignCost += 15 * collect(json_decode($c['sizes'], true))->sum();
                                        }
                                    @endphp
                                    <div class="mb-3 p-2 border rounded">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                @if(!empty($design['image']))
                                                    <img src="{{ $design['image'] }}" alt="Design Image" style="width:120px;height:120px;border:1px solid #ccc;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <strong>Name:</strong> Design #{{ $i + 1 }}<br>
                                                <strong>Print Type:</strong> {{ ucfirst($design['decoration'] ?? '') }}<br>
                                                <strong>Print Position:</strong> {{ ucfirst($design['side'] ?? '') }}<br>

                                                <strong>Cost:</strong>
                                                @if(isset($design['decoration']) && strtolower($design['decoration']) === 'print')
                                                    £13 <span class="text-muted"> x {{ collect(json_decode($c['sizes'], true))->sum() }} ({{13 * collect(json_decode($c['sizes'], true))->sum() }})</span>
                                                @elseif(isset($design['decoration']) && strtolower($design['decoration']) === 'embroidery')
                                                    £15 <span class="text-muted"> x {{ collect(json_decode($c['sizes'], true))->sum() }} ({{15 * collect(json_decode($c['sizes'], true))->sum() }})</span>
                                                @else
                                                    -
                                                @endif
                                                <br>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                                <small>Total Design Cost: £{{ number_format($totalDesignCost, 2) + number_format($c['unit_price'], 2) * collect(json_decode($c['sizes'], true))->sum() }}</small>
                            </div>
                        @endif

                    </div>

                    @if ($c['decoration_type'] === 'embroidery')
                    <div class="row mb-10">
                        <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Embroidery Price</span></div>
                        <div class="col-lg-6 col-6 text-end"><span> <span class="font-lg-bold color-brand-3">£{{ number_format($c['embroidery_price'], 2) * collect(json_decode($c['sizes'], true))->sum() }}</span><br>
                                <small style="font-size: 10px;">({{ number_format($c['embroidery_price'], 2) }} x {{ collect(json_decode($c['sizes'], true))->sum() }})</small></span></div>

                    </div>
                    <div class="row mb-10">
                        <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Digitisation Setup</span></div>
                        <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">£{{ number_format(15, 2) }}</span></div>

                    </div>
                    @endif
                    <div class="border-bottom mb-10 pb-5">
                        <div class="row">
                            <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Quantity</span></div>
                            <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">{{collect(json_decode($c['sizes'], true))->sum()}}</span><br>
                                <span>
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

                                    </small></span>
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom mb-10 pb-5">
                        <div class="row">
                            <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Shipping</span></div>
                            <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">-</span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Product Cost</span></div>
                        <div class="col-lg-6 col-6 text-end"><span
                                class="font-lg-bold color-brand-3">£
                                {{ number_format($c['total_price'], 2) }}

                            </span></div>
                            <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Design Cost</span></div>
                        <div class="col-lg-6 col-6 text-end"><span
                                class="font-lg-bold color-brand-3">£
                                {{ number_format($totalDesignCost, 2) }}

                            </span></div>
                            <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Total Cost</span></div>
                        <div class="col-lg-6 col-6 text-end"><span
                                class="font-lg-bold color-brand-3">£
                                {{ number_format($totalDesignCost, 2) + number_format($c['unit_price'], 2) * collect(json_decode($c['sizes'], true))->sum() }}

                            </span></div>
                    </div>




                </div>
            </div>
        </div>



        </div>
        </div>
    </section>

    @endsection



