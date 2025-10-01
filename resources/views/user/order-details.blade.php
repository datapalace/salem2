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
                            <strong>Order Date:</strong> {{ $order->created_at->format('d M Y, H:i') }}<br>
                            <strong>Payment Ref:</strong> {{ $order->ref ?? '-' }}<br>
                            <strong>Track ID:</strong> {{ $order->track_id ?? '-' }}
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
                             @php
                                    $sizes = json_decode($order->sizes, true);
                                @endphp
                            <strong>Product:</strong> {{ $order->product_title }}<br>
                            <strong>Size(s):</strong> @if(is_array($sizes))

                                            @foreach($sizes as $size => $qty)
                                            @php
                                            // Clean the key to extract size only (e.g., "L" from "sizes[L]")
                                            $cleanSize = Str::between($size, '[', ']');
                                            @endphp
                                            @if($qty > 0)
                                            {{ strtoupper($cleanSize) }}- {{ $qty }},
                                            @endif
                                            @endforeach

                                            @endif<br>

                            @if($order->custom_image)
                            <table class="table table-bordered mt-3">
                                <tr>
                                    <th>Product</th>
                                    <th>Custom Design</th>
                                </tr>
                                <tr>

                                    <td>
                                        @if($order->custom_image)
                                        <img src="{{ asset($order->custom_image) }}" alt="Custom Image" style="max-width:100px;">
                                        @else
                                        No custom image provided.
                                        @endif
                                    </td>
                                    <td style="vertical-align: top;">
                                        @php
                                            $customDesigns = $order->custom_designs;
                                            // Handle case where custom_designs might be a JSON string
                                            if (is_string($customDesigns)) {
                                                $customDesigns = json_decode($customDesigns, true) ?: [];
                                            }
                                            // Ensure it's an array
                                            $customDesigns = is_array($customDesigns) ? $customDesigns : [];
                                        @endphp

                                        @if($customDesigns && count($customDesigns) > 0)
                                            <div class="row">
                                                @foreach($customDesigns as $index => $design)
                                                    <div class="col-6 mb-2">
                                                        <div class="card card-sm">
                                                            <div class="card-body p-2">
                                                                <h6 class="card-title mb-1" style="font-size: 12px;">{{ $design['name'] ?? 'Design ' . ($index + 1) }}</h6>
                                                                @if(isset($design['image']) && $design['image'])
                                                                    <img src="{{ $design['image'] }}" alt="Custom Design" class="img-fluid rounded mb-1" style="max-width: 80px; height: auto;">
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        @else
                                            No custom designs provided.
                                        @endif
                                    </td>
                                </tr>

                            </table>

                            @endif
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span><strong>Total Quantity:</strong></span>
                                <span>{{ collect(json_decode($order['sizes'], true))->sum() }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span><strong>Unit Price:</strong></span>
                                <span>£{{ number_format($order->unit_price, 2) }}</span>
                            </div>
                            {{-- loop through custom designs to get prices based on decoration type --}}
                            @php
                                $i = 1;
                                $totalPrice = 0;
                            @endphp
                            @foreach($customDesigns as $design)
                                @if(isset($design['decoration']) && $design['decoration'] === 'print')
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                        <span><strong>{{ $design['name'] ?? 'Design' }} {{ $i }} Price:</strong></span>
                                        <span>£{{ number_format(13 * $order->unit_price, 2) }}</span>
                                    </div>
                                    @php
                                        $totalPrice += 13 * $order->unit_price;
                                        $i++;
                                    @endphp
                                @elseif(isset($design['decoration']) && $design['decoration'] === 'embroidery')
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                        <span><strong>{{ $design['name'] ?? 'Design' }} {{ $i }} Price:</strong></span>
                                        <span>£{{ number_format(15 * $order->unit_price, 2) }}</span>
                                    </div>
                                    @php
                                        $totalPrice += 15 * $order->unit_price;
                                        $i++;
                                    @endphp
                                @endif
                            @endforeach

                            @if ($order['decoration_type'] === 'embroidery')
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <span><strong>Embroidery Price:</strong></span>
                                    <span>£{{ number_format($order->embroidery_price, 2) }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <span><strong>Digitisation Price:</strong></span>
                                    <span>£{{ number_format(15, 2) }}</span>
                                </div>
                            @endif
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span><strong>Total Price:</strong></span>
                                <span class="text-success font-lg-bold">£{{ number_format($totalPrice, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
