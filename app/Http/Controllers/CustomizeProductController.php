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
    'attributes' => function ($query) {
        $query->limit(10);
    }
])->where('id',$id)->first();

        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        // E
        return view('user.customize-product', compact('product', 'shopByCatMenus'));

       
    }
}
