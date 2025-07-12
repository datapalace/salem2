{{-- filepath: resources/views/user/order-details.blade.php --}}
@extends('layout.usermaster')

@section('usercontent')
<main class="main">
    <section class="section-box pt-60 pb-60 bg-gray-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card p-4 shadow-sm mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="mb-0">Order Details</h3>
                            <button class="btn btn-outline-secondary btn-sm" onclick="window.print()">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <strong>Order ID:</strong> #{{ $order->id }}<br>
                            <strong>Order Date:</strong> {{ $order->created_at->format('d M Y, H:i') }}
                        </div>
                        <div class="mb-3">
                            <strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}<br>
                            <strong>Email:</strong> {{ $order->user->email ?? '-' }}
                        </div>
                        <div class="mb-3">
                            <strong>Shipping Address:</strong><br>
                            {{ $order->shipping->address ?? '-' }}<br>
                            {{ $order->shipping->city ?? '' }}, {{ $order->shipping->country ?? '' }}<br>
                            {{ $order->shipping->zip_code ?? '' }}<br>
                            <strong>Phone:</strong> {{ $order->shipping->phone ?? '' }}
                        </div>
                        <hr>
                        <div class="mb-3">
                            <strong>Product:</strong> {{ $order->product_title }}<br>
                            <strong>Size(s):</strong> {{ $order->sizes }}<br>
                            <strong>Custom Design:</strong> {{ $order->custom_design ?? '-' }}<br>
                            <strong>Custom Side:</strong> {{ $order->custom_side ?? '-' }}<br>
                            @if($order->custom_image)
                            <strong>Custom Image:</strong><br>
                            <img src="{{ asset('storage/' . $order->custom_image) }}" alt="Custom Image" style="max-width:150px;">
                            @endif
                        </div>
                        <hr>
                        <div class="mb-3">
                            <strong>Unit Price:</strong> £{{ number_format($order->unit_price, 2) }}<br>
                            <strong>Embroidery Price:</strong> £{{ number_format($order->embroidery_price, 2) }}<br>
                            <strong>Decoration Price:</strong> £{{ number_format($order->decoration_price, 2) }}<br>
                            <strong>Total Price:</strong> <span class="text-success font-lg-bold">£{{ number_format($order->total_price, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection