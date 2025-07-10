<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomizeProductController extends Controller
{
    //customize product
    public function customize($id)
    {

        $product = Product::with([
            'galleries',
            'price',
            'certifications' => function ($query) {
                $query->limit(10);
            },
            'attributes' => function ($query) {
                $query->limit(10);
            }
        ])->where('slug', $id)->first();

        // query product colour
        $colors = Product::select('colourway_name')->where('style_code', $product->style_code)->groupBy('colourway_name')->get();

        // query product sizes
        $sizes = Product::select('size')->where('title', $product->title)->groupBy('size')->get();

        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $availableColors = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])
            ->where('style_code', $product->style_code)
            ->whereNotNull('colourway_name') // filter out nulls in the query
            ->get()
            ->groupBy('colourway_name');
        $availableSizes = Product::with([])
            ->where('title', $product->title)
            ->whereNotNull('size') // filter out nulls in the query
            ->get()
            ->groupBy('size');

        $relatedProducts = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])
            ->where('style_code', $product->style_code)
            ->whereNotNull('colourway_name') // filter out nulls in the query
            ->latest()
            ->inRandomOrder()
            ->skip(5)
            ->take(10)
            ->get()
            ->groupBy('colourway_name');
        // Fetch all images from the 'custom_gallery' folder in public storage
    $images = [];
    $directory = public_path('assets/img/brand');
    if (is_dir($directory)) {
        $files = scandir($directory);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && is_file($directory . DIRECTORY_SEPARATOR . $file)) {
                $images[] = 'assets/img/brand/' . $file;
            }
        }
    }

    // Map the images to their URLs (remove 'storage/' prefix)
    $imageUrls = array_map(function ($image) {
        return asset($image);
    }, $images);



        return view('user.customize-product', compact('product', 'shopByCatMenus', 'relatedProducts', 'colors', 'availableColors', 'sizes', 'imageUrls'));
    }
}
