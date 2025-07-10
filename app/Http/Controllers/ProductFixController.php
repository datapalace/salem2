<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;

class ProductFixController extends Controller
{
    public function fixSlugs(\Illuminate\Http\Request $request)
    {
        $products = Product::whereNull('slug')
            ->orWhere('slug', '')
<<<<<<< HEAD
=======
            ->limit(10000)
>>>>>>> 6182a30fadbdbcbdfdcf55d6bb3c389678c2d462
            ->get();

        foreach ($products as $product) {
            $baseSlug = Str::slug($product->title);
            $slug = $baseSlug;

            // Check for duplicates
            $exists = Product::where('slug', $slug)
                ->where('id', '!=', $product->id)
                ->exists();

            if ($exists) {
                $slug = $baseSlug . '-' . $product->id;
            }

            // Update slug
            $product->slug = $slug;
            $product->save();
        }

        return response()->json([
            'message' => 'Updated slugs for ' . count($products) . ' product(s).',
        ]);
    }
}
