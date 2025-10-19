@extends('layout.usermaster')
@section('usercontent')
<title>Salem Apparel - My Wishlist</title>
<meta name="description" content="View and manage your wishlist items at Salem Apparel. Save your favorite products for later.">
<meta name="keywords" content="wishlist, favorites, saved items, apparel, salem apparel">
<meta name="author" content="Salem Apparel">

<style>
/* Wishlist specific styles */
.wishlist-card {
    border: 1px solid #e9ecef;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.wishlist-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border-color: #E2B808;
}

.wishlist-image {
    height: 250px;
    background-size: cover;
    background-position: center;
    position: relative;
}

.wishlist-content {
    padding: 20px;
}

.wishlist-brand {
    font-size: 0.9rem;
    color: #6c757d;
    margin-bottom: 5px;
}

.wishlist-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
    line-height: 1.3;
}

.wishlist-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #E2B808;
    margin-bottom: 15px;
}

.wishlist-actions {
    display: flex;
    gap: 10px;
}

.btn-customize {
    flex: 1;
    padding: 12px;
    background: #1a1a1a;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
}

.btn-customize:hover {
    background: #E2B808;
    color: #1a1a1a;
    text-decoration: none;
}

.btn-remove {
    width: 45px;
    height: 45px;
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-remove:hover {
    background: #c82333;
    transform: scale(1.05);
}

.empty-wishlist {
    text-align: center;
    padding: 80px 20px;
    color: #6c757d;
}

.empty-wishlist i {
    font-size: 4rem;
    color: #E2B808;
    margin-bottom: 20px;
}

.empty-wishlist h3 {
    color: #2c3e50;
    margin-bottom: 15px;
}

.empty-wishlist p {
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.btn-shop {
    background: #E2B808;
    color: #1a1a1a;
    padding: 15px 30px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-shop:hover {
    background: #1a1a1a;
    color: #E2B808;
    text-decoration: none;
}

.wishlist-header {
    background: linear-gradient(135deg, #1a1a1a 0%, #2c3e50 100%);
    color: white;
    padding: 60px 0;
    margin-bottom: 50px;
}

.wishlist-count {
    background: #E2B808;
    color: #1a1a1a;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
}

/* Pagination styles */
.pagination .page-item.active .page-link {
    background-color: #E2B808 !important;
    border-color: #E2B808 !important;
    color: #fff !important;
}

.pagination .page-item.active .page-link:hover {
    background-color: #d4a306 !important;
    border-color: #d4a306 !important;
    color: #fff !important;
}

.pagination .page-item:not(.active):not(.disabled) .page-link {
    background-color: #f5e6a3 !important;
    border-color: #f5e6a3 !important;
    color: #1a1a1a !important;
}

.pagination .page-item:not(.active):not(.disabled) .page-link:hover {
    background-color: #E2B808 !important;
    border-color: #E2B808 !important;
    color: #1a1a1a !important;
}

/* Remove animation */
@keyframes fadeOut {
    0% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(0.95); }
    100% { opacity: 0; transform: scale(0.8); }
}

.removing {
    animation: fadeOut 0.3s ease-out forwards;
}

/* Responsive design */
@media (max-width: 768px) {
    .wishlist-header {
        padding: 40px 0;
    }

    .wishlist-image {
        height: 200px;
    }

    .wishlist-content {
        padding: 15px;
    }

    .wishlist-actions {
        flex-direction: column;
    }

    .btn-remove {
        width: 100%;
        height: 45px;
    }
}
</style>

<main class="main">
    <!-- Breadcrumbs -->
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="/">Home</a></li>
                    <li><a class="font-xs color-gray-500" href="/wishlist">My Wishlist</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Wishlist Header -->
    <section class="wishlist-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-3">My Wishlist</h1>
                    <p class="mb-0">Save your favorite products and never lose track of items you love</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="wishlist-count">{{ $wishlistItems->total() }} {{ Str::plural('item', $wishlistItems->total()) }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Wishlist Content -->
    <section class="section-box shop-template mt-60">
        <div class="container">
            @if($wishlistItems->count() > 0)
                <div class="row">
                    @foreach($wishlistItems as $wishlistItem)
                        @php
                            $product = $wishlistItem->product;
                            $imageUrl = optional($product->galleries->first())->image_url ?? asset('userasset/imgs/template/no-image.png');
                            $price = optional($product->price)->single_list_price * 1.2 + 0.90 ?? 0;
                        @endphp
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-product-id="{{ $product->id }}">
                            <div class="wishlist-card">
                                <div class="wishlist-image" style="background-image: url('{{ $imageUrl }}')"></div>
                                <div class="wishlist-content">
                                    <div class="wishlist-brand">{{ $product->brand ?? 'Salem Apparel' }}</div>
                                    <div class="wishlist-title">{{ $product->title }}</div>
                                    <div class="wishlist-price">£{{ number_format($price, 2) }}</div>
                                    <div class="wishlist-actions">
                                        <a href="/product/customise/{{ $product->slug }}" class="btn-customize">
                                            Customize Now
                                        </a>
                                        <button type="button" class="btn-remove" onclick="removeFromWishlist({{ $product->id }})" title="Remove from wishlist">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($wishlistItems->hasPages())
                    <div class="pagination-area mt-60">
                        <nav>
                            {{ $wishlistItems->links() }}
                        </nav>
                    </div>
                @endif
            @else
                <!-- Empty Wishlist -->
                <div class="empty-wishlist">
                    <i class="fas fa-heart"></i>
                    <h3>Your wishlist is empty</h3>
                    <p>Start adding products to your wishlist to save them for later</p>
                    <a href="/shop" class="btn-shop">Start Shopping</a>
                </div>
            @endif
        </div>
    </section>

    <!-- Recommended Products (if wishlist is not empty) -->
    @if($wishlistItems->count() > 0)
        <section class="section-box mt-70 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="color-brand-3 mb-20">You Might Also Like</h2>
                        <p class="font-lg color-gray-500 mb-40">Discover more products that match your style</p>
                    </div>
                </div>
                <div class="row">
                    @php
                        // Get some recommended products
                        $recommendedProducts = App\Models\Product::with(['galleries', 'price'])
                            ->whereNotIn('id', $wishlistItems->pluck('product_id')->toArray())
                            ->inRandomOrder()
                            ->take(4)
                            ->get();
                    @endphp
                    @foreach($recommendedProducts as $product)
                        @php
                            $imageUrl = optional($product->galleries->first())->image_url ?? asset('userasset/imgs/template/no-image.png');
                            $price = optional($product->price)->single_list_price * 1.2 + 0.90 ?? 0;
                        @endphp
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="card-grid-style-3">
                                <div class="card-grid-inner">
                                    <div class="tools">
                                        <a class="btn btn-wishlist btn-tooltip mb-10"
                                           href="#"
                                           onclick="addToWishlist({{ $product->id }})"
                                           aria-label="Add To Wishlist">
                                        </a>
                                    </div>
                                    <div class="image-box">
                                        <a href="/product/customise/{{ $product->slug }}">
                                            <img src="{{ $imageUrl }}" alt="{{ $product->title }}">
                                        </a>
                                    </div>
                                    <div class="info-right">
                                        <a class="font-xs color-gray-500" href="/product/customise/{{ $product->slug }}">{{ $product->brand ?? 'Salem Apparel' }}</a><br>
                                        <a class="color-brand-3 font-xs-bold" href="/product/customise/{{ $product->slug }}">{{ $product->title }}</a>
                                        <div class="rating">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 color-gray-500">(25)</span>
                                        </div>
                                        <div class="price-info">
                                            <strong class="font-lg-bold color-brand-3 price-main">£{{ number_format($price, 2) }}</strong>
                                        </div>
                                        <div class="mt-20 box-btn-cart">
                                            <a class="btn btn-cart" href="/product/customise/{{ $product->slug }}">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>

<!-- Success/Error Messages -->
<div id="wishlist-toast" class="toast-notification" style="display: none;">
    <div class="toast-content">
        <span id="toast-message"></span>
    </div>
</div>

<script>
// Remove from wishlist function
function removeFromWishlist(productId) {
    if (!confirm('Are you sure you want to remove this item from your wishlist?')) {
        return;
    }

    const productCard = document.querySelector(`[data-product-id="${productId}"]`);

    // Add removing animation
    productCard.classList.add('removing');

    fetch('/wishlist/remove', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the product card after animation
            setTimeout(() => {
                productCard.remove();

                // Update wishlist count
                updateWishlistDisplay();

                showToast(data.message, 'success');

                // Reload page if no items left
                const remainingItems = document.querySelectorAll('[data-product-id]').length;
                if (remainingItems === 0) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            }, 300);
        } else {
            productCard.classList.remove('removing');
            showToast(data.message || 'Error removing item from wishlist', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        productCard.classList.remove('removing');
        showToast('Error removing item from wishlist', 'error');
    });
}

// Add to wishlist function (for recommended products)
function addToWishlist(productId) {
    fetch('/wishlist/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            updateWishlistCount();
        } else {
            if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                showToast(data.message || 'Error adding item to wishlist', 'error');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error adding item to wishlist', 'error');
    });
}

// Update wishlist display
function updateWishlistDisplay() {
    const wishlistCount = document.querySelector('.wishlist-count');
    const currentCount = parseInt(document.querySelectorAll('[data-product-id]').length);

    if (wishlistCount) {
        const itemText = currentCount === 1 ? 'item' : 'items';
        wishlistCount.textContent = `${currentCount} ${itemText}`;
    }
}

// Update wishlist count in header
function updateWishlistCount() {
    fetch('/wishlist/count')
        .then(response => response.json())
        .then(data => {
            const wishlistCountElements = document.querySelectorAll('.wishlist-count-header');
            wishlistCountElements.forEach(element => {
                element.textContent = data.count;
            });
        })
        .catch(error => {
            console.error('Error updating wishlist count:', error);
        });
}

// Show toast notification
function showToast(message, type = 'info') {
    const toast = document.getElementById('wishlist-toast');
    const toastMessage = document.getElementById('toast-message');

    toastMessage.textContent = message;
    toast.className = `toast-notification show ${type}`;
    toast.style.display = 'block';

    setTimeout(() => {
        toast.style.display = 'none';
        toast.className = 'toast-notification';
    }, 3000);
}
</script>

<style>
/* Toast notification styles */
.toast-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    z-index: 1000;
    transform: translateX(400px);
    transition: transform 0.3s ease;
    padding: 15px 20px;
    border-left: 4px solid #E2B808;
}

.toast-notification.show {
    transform: translateX(0);
}

.toast-notification.success {
    border-left-color: #28a745;
}

.toast-notification.error {
    border-left-color: #dc3545;
}

.toast-content {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #2c3e50;
}
</style>

@endsection
