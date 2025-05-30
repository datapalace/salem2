<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsAndConditionController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', function () {
    return view('welcome');
});
Route::get('/design', function () {
    return view('products');
});

Route::get('/products', function () {
    return view('products');
});

//add product
Route::get('/add-product', function () {
    return view('add-a-product');
});
Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');

// show product
Route::get('/products', [ProductController::class, 'show'])->name('all-products');



//user Dashboard
Route::get('/', [UserDashboardController::class, 'index'])->name('product.index');

//shop now
Route::get('/shop', [ProductController::class, 'shopNow'])->name('shop-now');

// shop by category
Route::get('/shop/category/{category}', [ProductController::class, 'shopByCategory'])->name('shop-by-category');

// shop by category
Route::get('/shop/customize/{id}', [ProductController::class, 'customize'])->name('customize');


// about us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

// contact us
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

// terms and condition
Route::get('/terms-and-condition', [TermsAndConditionController::class, 'index'])->name('terms-and-condition');

// privacy policy
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');

// register user
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/search-products', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
// login user
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
