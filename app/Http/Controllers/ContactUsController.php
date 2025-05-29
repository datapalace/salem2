<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
     public function index()
    {
        // Only fetch what you need for the About Us page
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $brands = Product::select('brand')->groupBy('brand')->get();

        return view('user.contact', compact('shopByCatMenus', 'brands'));
    }
}
