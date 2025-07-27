{{-- filepath: resources/views/user/my-orders.blade.php --}}
@extends('layout.usermaster')

@section('usercontent')
<main class="main">
  <section class="section-box shop-template mt-30">
    <div class="container box-account-template">
      <h3>
        Hello
        @php
        $user = Auth::guard('customer')->user();
        $userID = $user ? $user->id : '';
        $firstName = $user ? (explode(' ', $user->name)[0] ?? '') : '';
        $lastName = $user ? (implode(' ', array_slice(explode(' ', $user->name), 1)) ?? '') : '';
        @endphp
        {{$firstName .' ' . $lastName}},
      </h3>
      <p class="font-md color-gray-500">
        From your account dashboard, you can easily check & view your recent orders,<br class="d-none d-lg-block">
        manage your shipping and billing addresses and edit your password and account details.
      </p>
      <div class="box-tabs mb-100">
        <ul class="nav nav-tabs nav-tabs-account" role="tablist">
          <li>
            <a class="active" href="#tab-orders" data-bs-toggle="tab" role="tab" aria-controls="tab-orders" aria-selected="true">Orders</a>
          </li>
        </ul>
        <div class="border-bottom mt-20 mb-40"></div>
        <div class="tab-content mt-30">
          <div class="tab-pane active show" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders">
            {{-- Call user orders --}}
            @foreach ($orders as $order)
            <div class="box-orders mb-4">
              <div class="head-orders d-flex justify-content-between align-items-center">
                <div class="head-left">
                  <h5 class="mr-20">Order ID: #{{$order->track_id}}</h5>
                  <span class="font-md color-brand-3 mr-20">Date: {{$order->created_at}}</span>
                  <span class="label-delivery">{{ $order->status ?? 'Pending' }}</span>
                </div>
                <div class="head-right">
                  <a class="btn btn-buy font-sm-bold w-auto" href="{{ route('order.details', $order->id) }}">View Order</a>
                </div>
              </div>
              <div class="body-orders">
                <div class="list-orders">
                  <div class="item-orders d-flex align-items-center">
                    <div class="image-orders me-3">
                      <img src="{{ asset($order->custom_image) }}" alt="Custom Image" style="max-width:100px;">
                    </div>
                    <div class="info-orders me-3">
                      <h5>{{ $order->product_title }}</h5>
                      <p>
                        @php $sizes = json_decode($order->sizes, true); @endphp
                        <strong>Size(s):</strong>
                        @if(is_array($sizes))
                        @foreach($sizes as $size => $qty)
                        @php $cleanSize = \Illuminate\Support\Str::between($size, '[', ']'); @endphp
                        @if($qty > 0)
                        {{ strtoupper($cleanSize) }}-{{ $qty }},
                        @endif
                        @endforeach
                        @endif
                        <br>
                        <strong>Custom Side:</strong> {{ $order->custom_side ?? '-' }}<br>
                        <strong>Print Type:</strong> {{ $order->decoration_type }}<br>
                      </p>
                    </div>
                    <div class="price-orders">
                      <h3>£{{ number_format($order->total_price, 2) }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            {{-- Pagination here if needed --}}
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection