<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            // Validate main product fields
            $request->validate([
                'product_name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'short_description' => 'nullable|string',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'product_categories' => 'required|string',
                'product_tags' => 'nullable|string',
                'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'product_galleries.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'product_colors' => 'nullable|array',
                'product_sizes' => 'nullable|array',
            ]);

            // Handle slug uniqueness
            $slug = Str::slug($request->slug);
            $originalSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            // Handle product image upload
            $imagePath = null;
            if ($request->hasFile('product_image')) {
                $imagePath = $request->file('product_image')->store('products', 'public');
            }

            // Create product
            $product = Product::create([
                'product_name' => $request->product_name,
                'slug' => $slug,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'product_categories' => $request->product_categories,
                'product_tags' => $request->product_tags,
                'product_image' => $imagePath,
            ]);

            // Save colors
            if ($request->product_colors) {
                foreach ($request->product_colors as $color) {
                    ProductColor::create([
                        'product_id' => $product->id,
                        'color' => $color,
                    ]);
                }
            }

            // Save sizes
            if ($request->product_sizes) {
                foreach ($request->product_sizes as $size) {
                    ProductSize::create([
                        'product_id' => $product->id,
                        'size' => $size,
                    ]);
                }
            }

            // Save galleries
            if ($request->hasFile('product_galleries')) {
                foreach ($request->file('product_galleries') as $galleryImage) {
                    $galleryPath = $galleryImage->store('product_galleries', 'public');
                    ProductGallery::create([
                        'product_id' => $product->id,
                        'image_path' => $galleryPath,
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Product and gallery images saved!');
        } catch (Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->back()->with('error', 'An error occurred while saving the product.');
        }
    }

    // show all products

    public function show()
    {


        $products = Product::with(['galleries', 'colors', 'sizes'])->get();
        return view('products', compact('products'));
    }

    // shop now by users
    public function shopNow()
    {
        $products = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }

        ])->where('customize', '')->latest()->inRandomOrder()->paginate(9);

        $shopByCatMenus = Product::select('type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('type')
            ->get();
        $brands = Product::select('brand')->groupBy('brand')->inRandomOrder()->limit(6)->get();


        return view('user.shop', compact('products', 'shopByCatMenus', 'brands',));
    }

    // customize shop now


    public function customiseShop()
    {
        $products = Product::with([
            'galleries',
            'price',


        ])->where('customize', 1)->latest()->inRandomOrder()->paginate(9);

        $shopByCatMenus = Product::select('type')
            ->selectRaw('COUNT(*) as total')
            ->get();
        $brands = Product::select('brand')->groupBy('brand')->inRandomOrder()->limit(6)->get();


        return view('user.customize-shop', compact('products', 'shopByCatMenus', 'brands',));
    }

    //shop by category
    public function shopByCategory($category)
    {
        $products = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->where('type', $category)->latest()->inRandomOrder()->paginate(9);

        $shopByCatMenus = Product::select('type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('type')
            ->get();
        $brands = Product::select('brand')->groupBy('brand')->inRandomOrder()->limit(6)->get();

        return view('user.shop-category', compact('products', 'shopByCatMenus', 'brands'));
    }

    // search products
    public function search(Request $request)
    {
        $query = $request->get('q');

        $products = \App\Models\Product::with('galleries')
            ->groupBy('title')
            ->where('title', 'like', "%{$query}%")
            ->inRandomOrder()
            ->take(8)
            ->get(['id', 'title', 'sku'])
            ->map(function ($product) {
                $product->image_url = optional($product->galleries[0])->image_url;
                unset($product->images); // Optional
                return $product;
            });

        return response()->json($products);
    }



    public function add_customize(Request $request)
    {
        try {
            // Validate main product fields
            $request->validate([
                'product_name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'product_categories' => 'required|string',
                'product_galleries.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'product_colors' => 'nullable',
                'product_sizes' => 'nullable|array',
            ]);

            // Handle slug uniqueness
            $slug = Str::slug($request->product_name);


            $originalSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            // Handle product image upload
            // $imagePath = null;
            // if ($request->hasFile('product_image')) {
            //     $imagePath = $request->file('product_image')->store('products', 'public');
            // }
            $sizes = is_array($request->product_sizes) ? implode(',', $request->product_sizes) : $request->product_sizes;
            // Create product
            $product = Product::create([
                'title' => $request->product_name,
                'slug' => $slug,
                'body' => $request->description,
                'single_list_price' => $request->price,
                'type' => $request->product_categories,
                'colourway_name' => $request->product_colors,
                'customize' => 1,
                'brand' => 'Salem Apparel',
                'size' => $sizes,
            ]);


            // Save Price (assuming one-to-one relationship)
            $product->price()->create([
                'single_list_price' => $request->price,

            ]);


            // Save colors
            // if ($request->product_colors) {
            //     foreach ($request->product_colors as $color) {
            //         ProductColor::create([
            //             'product_id' => $product->id,
            //             'color' => $color,
            //         ]);
            //     }
            // }



            // Save galleries
            if ($request->hasFile('product_galleries')) {
                foreach ($request->file('product_galleries') as $galleryImage) {
                    $galleryPath = $galleryImage->store('product_galleries', 'public');
                    ProductGallery::create([
                        'product_id' => $product->id,
                        'image_url' => $galleryPath,
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Product and gallery images saved!');
        } catch (Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->back()->with('error', 'An error occurred while saving the product.');
        }
    }
    public function updateSlug(Product $product)
    {
        // If slug is empty, generate from title
        if (empty($product->slug)) {
            $baseSlug = Str::slug($product->title);

            // Check if slug already exists (excluding current product)
            $slug = $baseSlug;
            $exists = Product::where('slug', $slug)
                ->where('id', '!=', $product->id)
                ->exists();

            // If exists, append ID to make it unique
            if ($exists) {
                $slug = $baseSlug . '-' . $product->id;
            }

            // Update slug
            $product->slug = $slug;
            $product->save();
        }
    }
}
