<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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