<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsAndConditionController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CustomizeProductController;
use App\Http\Controllers\CanvasController;
use App\Http\Controllers\ProductFixController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;

// admin routes
Route::middleware('auth:admin')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']); // logout

    Route::get('/admin/products', function () {
        return view('products');
    });

    //add product
    Route::get('/admin/add-product', function () {
        return view('add-a-product');
    });
    Route::post('/admin/add-product', [ProductController::class, 'store'])->name('product.store');

    Route::post('/admin/add-customize-product', [ProductController::class, 'add_customize'])->name('customize.store');

    // show product
    Route::get('/admin/products', [ProductController::class, 'show'])->name('all-products');

    // orders
    Route::get('/admin/orders', [OrderController::class, 'show'])->name('order.list'); // order list

    Route::get('/admin/order/{id}', [OrderController::class, 'orderDetails'])->name('order.details'); // show order details

    Route::post('/admin/order/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus'); // update order status



    Route::get('/admin/dashboard', function () {
        return view('welcome');
    })->name('welcome'); // admin dashboard


});





/// user routes

Route::middleware('auth:customer')->group(function () {
    //user Dashboard
    Route::get('/logout', [AuthController::class, 'logout']); // logout


    //my account
    Route::get('/my-account', [UserDashboardController::class, 'myAccount'])->name('my-account'); // my account
    Route::get('/my-account/orders', [UserDashboardController::class, 'orders'])->name('my-account.orders'); // my orders


});


Route::get('/', [UserDashboardController::class, 'index'])->name('product.index');

//shop now
Route::get('/shop', [ProductController::class, 'shopNow'])->name('shop-now');


//shop now
Route::get('/custom-design', [ProductController::class, 'shopNow'])->name('shop-now');

// shop by category
Route::get('/shop/category/{type}/{column?}/{value?}', [ProductController::class, 'shopByCategory'])->name('shop-by-category');

// view a product

Route::get('/product/customise/{id}', [CustomizeProductController::class, 'customize'])->name('customize');

Route::get('/fix-product-slugs', [ProductFixController::class, 'fixSlugs'])->name('fix-product-slugs');

// about us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

// contact us
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

// terms and condition
Route::get('/terms-and-condition', [TermsAndConditionController::class, 'index'])->name('terms-and-condition');

// privacy policy
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');


Route::get('/search-products', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');

// register user
Route::get('/register', function () {
    return view('auth.register');
})->name('register'); // register page

Route::post('/process-register', [AuthController::class, 'register'])->name('register'); // process register user

//route customise-product
Route::get('/customise-product/{id}', [App\Http\Controllers\CanvasController::class, 'show'])->name('customise.show');


Route::get('/search-products', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
// login user
Route::get('/login', function () {
    $shopByCatMenus = Product::select('type')->groupBy('type')->get();
    return view('user.login', compact('shopByCatMenus'));
})->name('login'); // login page

Route::post('/process-login', [AuthController::class, 'login'])->name('process.login'); // login user

Route::get('/register', function () {
    $shopByCatMenus = Product::select('type')->groupBy('type')->get();
    return view('user.register', compact('shopByCatMenus'));
}); // register page

Route::post('/checkout/custom', [CheckoutController::class, 'custom'])->name('checkout.custom');
Route::get('/design/checkout', [CheckoutController::class, 'checkout'])->name('checkout.payment');


Route::middleware('auth:customer')->group(function () {
    Route::get('/order-details/{id}', [CheckoutController::class, 'orderDetails'])->name('order.details');

    Route::post('/checkout/make-order', [CheckoutController::class, 'makeOrder'])->name('checkout.place-order');
});



Route::get('/custom-gallery-images', [CustomizeProductController::class, 'customGalleryImages'])->name('custom.gallery.images');

Route::post('/checkout/stripe-intent', [CheckoutController::class, 'createStripeIntent'])->name('checkout.stripe.intent');
Route::post('/checkout/stripe-pay', [CheckoutController::class, 'stripePay'])->name('checkout.stripe.pay');

//my orders- show all orders made by a user
Route::middleware('auth:customer')->group(function () {
    Route::get('/my-orders', [CheckoutController::class, 'myOrders'])->name('my.orders');
});

// Route to handle 404 errors
Route::fallback(function () {
    $shopByCatMenus = Product::select('type')->groupBy('type')->get();
    return response()->view('errors.404', ['shopByCatMenus' => $shopByCatMenus], 404);
});

Route::post('/save-design', function(Request $request){
    $designs = session('custom_designs', []);
    $imageData = null;
    // If you send the PNG dataURL from JS, use that. Otherwise, decode from JSON.
    if ($request->has('image')) {
        $imageData = $request->input('image');
    }
    $designs[] = [
        'name' => $request->input('name'),
        'data' => $request->input('data'),
        'image' => $imageData, // add this line
        'decoration' => $request->input('decoration'),
        'side' => $request->input('side'),
        'mode' => $request->input('mode'),
        'saved_at' => now()->toDateTimeString()
    ];
    session(['custom_designs' => $designs]);
    return response()->json(['success' => true, 'designs' => $designs]);
})->name('save.design');

Route::get('/saved-designs-json', function(){
    return response()->json(['designs' => session('custom_designs', [])]);
});

// Update your route in web.php to handle 'all' index
Route::post('/remove-design', function(\Illuminate\Http\Request $request) {
    $designs = session('custom_designs', []);
    $index = $request->input('index');
    if ($index === 'all') {
        session(['custom_designs' => []]);
        return response()->json(['success' => true]);
    }
    $index = intval($index);
    if (isset($designs[$index])) {
        array_splice($designs, $index, 1);
        session(['custom_designs' => $designs]);
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
});
