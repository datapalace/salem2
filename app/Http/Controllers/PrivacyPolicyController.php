<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    //
     public function index()
    {
        // Only fetch what you need for the About Us page
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $brands = Product::select('brand')->groupBy('brand')->get();
        // Return the view with the necessary data
        // You can also consider caching this data if it doesn't change often
        // This will help reduce database queries and improve performance
        // For example, you can use Laravel's cache system
        // Cache::remember('shopByCatMenus', 60, function () {
        //     return Product::select('type')->groupBy('type')->get();
        // });
        // Cache::remember('brands', 60, function () {
        //     return Product::select('brand')->groupBy('brand')->get();
        // });
        // Page title
        $pageTitle = 'Salem Apparel - Privacy Policy';
        // You can pass the page title to the view if needed
        // Return the view with the necessary data
        return view('user.privacypolicy', compact('shopByCatMenus', 'brands', 'pageTitle'));
    }
}
