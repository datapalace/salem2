<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
         
       // Validate the form input
         $request->validate([
        'product_name' => 'required|string|max:255',
        'categories' => 'required|string',
        'slug' => 'nullable|string',
        'mainImage' => 'required|image|mimes:jpeg,png,jpg',
        'galleryImage.*' => 'nullable|image|mimes:jpeg,png,jpg',
        'sort_description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'ful_detail' => 'nullable|string',
        'group_tag' => 'nullable|string',
        'sizes' => 'nullable|array',
        'color1' => 'nullable|string',
        'color2' => 'nullable|string',
        'color3' => 'nullable|string',
        'color4' => 'nullable|string',
    ]);
    dd($validated);
    // Generate unique slug
    $slug = $request->slug ?: Str::slug($request->product_name);
    $originalSlug = $slug;
    $counter = 1;
    while (Product::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter++;
    }

    // Upload main image
    $mainImagePath = $request->file('mainImage')->store('products/main', 'public');

    // Create product
    $product = Product::create([
        'product_name' => $request->product_name,
        'category' => $request->categories,
        'slug' => $slug,
        'main_image' => $mainImagePath,
        'sort_description' => $request->sort_description,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'ful_detail' => $request->ful_detail,
        'group_tag' => $request->group_tag,
        'sizes' => $request->sizes ? json_encode($request->sizes) : null,
        'colors' => json_encode([
            $request->color1,
            $request->color2,
            $request->color3,
            $request->color4
        ])
    ]);

    // Save gallery images
    if ($request->hasFile('galleryImage')) {
        foreach ($request->file('galleryImage') as $image) {
            if ($image) {
                $path = $image->store('products/gallery', 'public');
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Product and gallery images saved!');
    }
}
