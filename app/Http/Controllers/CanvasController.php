<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CanvasController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Assume `images` is a JSON column or casted array in the Product model
        // Fetch images from the images table where product_id matches
        $images = \DB::table('images')->where('product_id', $product->id)->get();

        return view('inc.userinc.customise-product', [
            'product' => $product,
            'images' => $images,
        ]);
    }
}
