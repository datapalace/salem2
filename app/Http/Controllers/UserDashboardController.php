<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // latest products
        $men = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('gender', 'Mens')->latest()->take(5)->get();

        $secondMen = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('gender', 'Mens')->latest()->skip(5)->take(5)->get();

        $ladies = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('gender', 'Ladies')->latest()->skip(5)->take(5)->get();
        $secondLadies = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('gender', 'Ladies')->latest()->take(5)->get();

        $kids = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('gender', 'Kids')->latest()->take(5)->get();

        // product 6
        $secondKids = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('gender', 'Kids')->latest()->inRandomOrder()->skip(5)->take(5)->get();


        $bannerProducts = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->inRandomOrder()->take(3)->get();

        $trendingProducts = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->where('type', 'Jacket')->latest()->inRandomOrder()->skip(1000)->take(8)->get();




        // headwears
        $headwears = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->where('type', 'Headwear')->latest()->inRandomOrder()->skip(300)->take(6)->get();

        $footwears = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->where('type', 'Footwear')->latest()->inRandomOrder()->skip(300)->take(6)->get();

        $topRates = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->where('gender', 'Unisex')->latest()->inRandomOrder()->skip(1000)->take(8)->get();


        $bannerSides = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(1);
            }
        ])->where('type', 'hood')->latest()->inRandomOrder()->skip(100)->take(1)->get();

        //shop by categories menu
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();

        $brands = Product::select('brand')->groupBy('brand')->get();


        // Return the view with the products
        return view('user.welcome', compact('men', 'secondMen', 'ladies', 'secondLadies', 'kids', 'secondKids', 'bannerProducts', 'trendingProducts', 'headwears', 'topRates', 'shopByCatMenus', 'brands', 'footwears', 'bannerSides'));
    }
}
