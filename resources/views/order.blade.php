@extends('layout.app')
@section('title', 'Add a new product')
@section('content')


<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
            <h1>New Orders</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Orders
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsive-data-table" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item</th>
                                        <th>Name</th>
                                        <th>Customer</th>
                                        <th>Items</th>
                                        <th>Price</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->ref ?? 'N/A'}}</td>
                                        <!-- <td><img class="product-img tbl-img" src="data:image/png;base64,{{ $order->custom_design ?? 'No Image' }}" alt="Salem Apparel"></td> -->
                                        <td> <img class="product-img tbl-img" src="{{ $order->custom_image ?? 'No Image' }}"></td>
                                        <td>{{$order->product->title}}</td>
                                        <td><strong>{{$order->user->name}}</strong><br>
                                            {{$order->user->email}}
                                        </td>

                                        <!--clean the sizes and quantity-->


                                        <td>
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
                                            Total:
                                            {{ collect(json_decode($order['sizes'], true))->sum() }}
                                        </td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>PAID</td>
                                        <td>
                                            @php
                                            $badgeClass = 'badge-secondary';
                                            if ($order->status === 'Completed') {
                                            $badgeClass = 'badge-success';
                                            } elseif ($order->status === 'Pending') {
                                            $badgeClass = 'badge-warning';
                                            } elseif ($order->status === 'Cancelled') {
                                            $badgeClass = 'badge-danger';
                                            }
                                            @endphp
                                            <span class="mb-2 mr-2 badge {{ $badgeClass }} badge">{{ $order->status ?? 'Pending' }}</span>
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <div class="btn-group mb-1">
                                                <a href="/admin/order/{{ $order->id }}" type="button"
                                                    class="btn btn-outline-success">Info</a>
                                                <button type="button"
                                                    class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" data-display="static">
                                                    <span class="sr-only">Info</span>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/admin/order/{{ $order->id }}">View Order Detail</a>
                                                    <a class="dropdown-item change-status" href="#" data-id="{{ $order->id }}" data-status="Completed">Completed</a>
                                                    <a class="dropdown-item change-status" href="#" data-id="{{ $order->id }}" data-status="Pending">Pending</a>
                                                    <a class="dropdown-item change-status" href="#" data-id="{{ $order->id }}" data-status="Cancelled">Cancel</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->



<script>
    document.querySelectorAll('.change-status').forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();

            var orderId = this.getAttribute('data-id');
            var status = this.getAttribute('data-status');
            const badge = this.closest('tr').querySelector('.badge');

            // Show loading spinner in badge
            badge.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

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
                    }
                });
        });
    });
</script>


@endsection