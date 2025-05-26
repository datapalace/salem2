<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserDashboardController;
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

