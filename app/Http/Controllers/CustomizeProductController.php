<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomizeProductController extends Controller
{
    //customize product
    public function customize($id)
    {
        // Here you can fetch the product by ID and pass it to the view
        // For example:
        $product = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(10);
            }

        ])->findOrFail($id);

        
        // Ensure the product exists, otherwise handle the error as needed
        return view('user.customize-product', compact('product'));

       
    }
}
