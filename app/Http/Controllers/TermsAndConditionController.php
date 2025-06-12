<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    //
     public function index()
    {
        // Only fetch what you need for the About Us page
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $brands = Product::select('brand')->groupBy('brand')->get();
         $pageTitle = 'Salem Apparel - Terms and Conditions';
        return view('user.terms', compact('shopByCatMenus', 'brands', 'pageTitle'));
    }
}
