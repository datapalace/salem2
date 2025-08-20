@extends('layout.app')
@section('title', 'Add a new product')
@section('content')
@php
use Illuminate\Support\Str;
@endphp


<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
            <h1>Order Detail</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Orders
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ec-odr-dtl card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2 class="ec-odr">Order Detail<br>
                            <span class="small">Order ID: #{{$order->ref}}</span>
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-title"><strong>Customer:</strong></div><br>
                                    <div class="info-content">
                                        {{$order->user->name}}<br>
                                        {{$order->user->email}}<br>
                                        <abbr title="Phone">P:</abbr> {{$order->user->phone ?? 'N/A'}}

                                    </div>
                                </address>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-title"><strong>Shipped To:</strong></div><br>
                                    <div class="info-content">

                                        {{$order->shipping->address}}<br>
                                        {{$order->shipping->city}}, {{$order->shipping->state}} {{$order->shipping->zip}}<br>
                                        <abbr title="Phone">P:</abbr> {{ $order->shipping->phone}}
                                    </div>
                                </address>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-title"><strong>Product Image:</strong></div><br>
                                    <div class="info-content">
                                        <img src="{{ $order->custom_image ?? 'No Image' }}" style="max-width:100%;">

                                    </div>
                                </address>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-title"><strong>Custom Design</strong></div><br>
                                    <div class="info-content">
                                        <img src="data:image/png;base64,{{ $order->custom_design }}" alt="Custom Image" style="max-width:100%;">
                                    </div>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="tbl-title">ORDERED DETAILS</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped o-tbl">
                                        <thead>
                                            <tr class="line">
                                                <td><strong>#</strong></td>
                                                <td class="text-center"><strong>IMAGE</strong></td>
                                                <td class="text-center"><strong>PRODUCT</strong></td>
                                                <td class="text-center"><strong>PRICE/UNIT</strong></td>
                                                <td class="text-right"><strong>QUANTITY</strong></td>
                                                <td class="text-right"><strong>SUBTOTAL</strong></td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="line">
                                                <td><strong>1</strong></td>
                                                <td class="text-center"><strong><img class="product-img tbl-img" src="{{ $order->custom_image ?? 'No Image' }}"></strong></td>
                                                <td class="text-center"><strong>{{ $order->product->title }}</strong></td>
                                                <td class="text-center"><strong>{{ $order->unit_price }}</strong></td>
                                                @php

                                                $sizes = json_decode($order['sizes'], true);
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
                                                <td class="text-right">{{ collect(json_decode($order['sizes'], true))->sum() }}</td>
                                                <td class="text-right"><strong>{{ $order->total_price }}</strong></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tracking Detail -->
                <div class="card mt-4 trk-order">
                    <div class="p-4 text-center text-white text-lg bg-dark rounded-top">
                        <span class="text-uppercase">Tracking Order No - </span>
                        <span class="text-medium">{{$order->track_id}}</span>
                    </div>
                    <div class="p-4 text-center text-white text-lg bg-dark rounded-top" style="float: inline-end;">
                        <div class="btn-group mb-1">
                            <button type="button"
                                class="btn btn-outline-success">Info</button>
                            <button type="button"
                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" data-display="static">
                                <span class="sr-only">Info</span>
                            </button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/admin/order/{{ $order->id }}">View Order Detail</a>
                                <form method="POST" action="{{ route('order.updateStatus') }}" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <input type="hidden" name="status" value="Completed">
                                    <button type="submit" class="dropdown-item" style="border:none;background:none;padding:0;">Completed</button>
                                </form>
                                <form method="POST" action="{{ route('order.updateStatus') }}" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <input type="hidden" name="status" value="Pending">
                                    <button type="submit" class="dropdown-item" style="border:none;background:none;padding:0;">Pending</button>
                                </form>
                                <form method="POST" action="{{ route('order.updateStatus') }}" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <input type="hidden" name="status" value="Cancelled">
                                    <button type="submit" class="dropdown-item" style="border:none;background:none;padding:0;">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped
                                Via:</span> UPS Ground</div>
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span>
                            Checking Quality</div>
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected
                                Date:</span> DEC 09, 2021</div>
                    </div>
                    <div class="card-body">
                        <div
                            class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                            <div class="step completed">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="mdi mdi-cart"></i></div>
                                </div>
                                <h4 class="step-title">Confirmed Order</h4>
                            </div>
                            <div class="step completed">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="mdi mdi-tumblr-reblog"></i></div>
                                </div>
                                <h4 class="step-title">Processing Order</h4>
                            </div>
                            <div class="step  {{ $order->status === 'Completed' ? 'completed' : '' }}">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="mdi mdi-gift"></i></div>
                                </div>
                                <h4 class="step-title">Product Delivered</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->


@endsection

<script>
    document.querySelectorAll('.change-status').forEach(function(el) {

        el.addEventListener('click', function(e) {
            e.preventDefault();
            var orderId = this.getAttribute('data-id');
            var status = this.getAttribute('data-status');
            fetch("{{ route('order.updateStatus') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id: orderId,
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the badge text
                        const badge = this.closest('tr').querySelector('.badge');
                        badge.textContent = data.status;

                        // Remove old badge classes
                        badge.classList.remove('badge-success', 'badge-warning', 'badge-danger', 'badge-secondary');

                        // Add new badge class based on status
                        if (data.status === 'Completed') {
                            badge.classList.add('badge-success');
                        } else if (data.status === 'Pending') {
                            badge.classList.add('badge-warning');
                        } else if (data.status === 'Cancelled' || data.status === 'Cancel') {
                            badge.classList.add('badge-danger');
                        } else {
                            badge.classList.add('badge-secondary');
                        }
                        setTimeout(function() {
                            location.reload();
                        }, 500); // short delay for user feedback

                    }
                });
        });
    });
</script>