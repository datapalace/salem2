<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        ])->where('id', $id)->first();
        //

        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $relatedProducts = Product::with([
    'galleries',
    'price',
    'attributes' => function ($query) {
        $query->limit(3);
    }
])->where('style_code', $product->style_code)->latest()->inRandomOrder()->skip(5)->take(10)->get();

        return view('user.customize-product', compact('product', 'shopByCatMenus', 'relatedProducts'));
    }
}
