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
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;


// admin routes
Route::middleware('auth:admin')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']); // logout

    Route::get('/products', function () {
        return view('products');
    });

    //add product
    Route::get('/add-product', function () {
        return view('add-a-product');
    });
    Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');

    Route::post('/add-customize-product', [ProductController::class, 'add_customize'])->name('customize.store');

    // show product
    Route::get('/products', [ProductController::class, 'show'])->name('all-products');




    Route::get('/admin/dashboard', function () {
        return view('welcome');
    })->name('welcome'); // admin dashboard


});





/// user routes

Route::middleware('auth:customer')->group(function () {
    //user Dashboard
    Route::get('/logout', [AuthController::class, 'logout']); // logout



});


Route::get('/', [UserDashboardController::class, 'index'])->name('product.index');

//shop now
Route::get('/shop', [ProductController::class, 'customiseShop'])->name('customize-now');


//shop now
Route::get('/custom-design', [ProductController::class, 'shopNow'])->name('shop-now');

// shop by category
Route::get('/shop/category/{category}', [ProductController::class, 'shopByCategory'])->name('shop-by-category');

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
