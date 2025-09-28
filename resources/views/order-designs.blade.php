@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>Order Custom Designs</h2>
            <div class="card">
                <div class="card-header">
                    <h5>Order #{{ $order->track_id }} - {{ $order->product_title }}</h5>
                    <small class="text-muted">Decoration Type: {{ ucfirst($order->decoration_type) }}</small>
                </div>
                <div class="card-body">
                    @if(count($customDesigns) > 0)
                        <div class="row">
                            @foreach($customDesigns as $index => $design)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0">{{ $design['name'] ?? 'Design ' . ($index + 1) }}</h6>
                                            <small class="text-muted">{{ $design['decoration'] ?? 'Unknown' }}</small>
                                        </div>

                                        @if(isset($design['image']) && $design['image'])
                                            <div class="card-body text-center">
                                                <img src="{{ $design['image'] }}"
                                                     alt="Design Preview"
                                                     class="img-fluid rounded"
                                                     style="max-height: 200px;">
                                            </div>
                                        @endif

                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    Side: {{ ucfirst($design['side'] ?? 'front') }}<br>
                                                    Saved: {{ $design['saved_at'] ?? 'N/A' }}
                                                </small>
                                                <div>
                                                    <button class="btn btn-sm btn-primary"
                                                            onclick="viewDesignDetails({{ $order->id }}, {{ $index }})">
                                                        View Details
                                                    </button>
                                                    @if(isset($design['data']))
                                                        <a href="{{ route('customise.show', $order->product_id) }}?load_design={{ $order->id }}&design_index={{ $index }}"
                                                           class="btn btn-sm btn-success">
                                                            Edit Design
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="text-muted">No custom designs found for this order.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('my.orders') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to My Orders
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Design Details Modal -->
<div class="modal fade" id="designDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Design Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="designDetails"></div>
            </div>
        </div>
    </div>
</div>

<script>
function viewDesignDetails(orderId, designIndex) {
    fetch(`/order/${orderId}/design/${designIndex}`)
        .then(response => response.json())
        .then(data => {
            const design = data.design;
            let detailsHtml = `
                <div class="row">
                    <div class="col-md-6">
                        <h6>Design Information</h6>
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> ${design.name || 'Unnamed Design'}</li>
                            <li><strong>decoration:</strong> ${design.decoration || 'Unknown'}</li>
                            <li><strong>Side:</strong> ${design.side || 'front'}</li>
                            <li><strong>Decoration:</strong> ${design.decoration || 'N/A'}</li>
                            <li><strong>Saved At:</strong> ${design.saved_at || 'N/A'}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        ${design.image ? `<img src="${design.image}" class="img-fluid rounded" alt="Design Preview">` : '<p class="text-muted">No preview available</p>'}
                    </div>
                </div>
            `;

            document.getElementById('designDetails').innerHTML = detailsHtml;
            const modal = new bootstrap.Modal(document.getElementById('designDetailsModal'));
            modal.show();
        })
        .catch(error => {
            console.error('Error fetching design details:', error);
            alert('Error loading design details');
        });
}
</script>
@endsection
