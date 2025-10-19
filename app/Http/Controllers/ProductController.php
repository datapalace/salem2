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
        ])
        ->select('products.*')
        ->latest()->paginate(15);

        // order by type alphabetical order

        $shopByCatMenus = Product::select('type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('type')->orderBy('type')->get();

        $brands = Product::select('brand')->groupBy('brand')->inRandomOrder()->limit(6)->get();

        // by price low to high
       // $productsByPrice = Product::with('galleries')->orderBy('price', 'asc')->paginate(9);

        return view('user.shop', compact('products', 'shopByCatMenus', 'brands'));
    }

    //shop by category
    public function shopByCategory($type, $column = null, $value = null)
    {
        $query = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->where('type', $type); // type is always required

        if ($column && $value) {
            $query->where($column, $value); // additional filter
        }

        $products = $query->latest()->paginate(15);

        $shopByCatMenus = Product::select('type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('type')
            ->get();

        $brands = Product::select('brand')->groupBy('brand')->inRandomOrder()->limit(6)->get();

        // Get all unique sizes from the products table for this category
        $availableSizes = Product::where('type', $type)
            ->whereNotNull('size')
            ->where('size', '!=', '')
            ->pluck('size')
            ->flatMap(function ($sizes) {
                // Split comma-separated sizes and clean them
                return collect(explode(',', $sizes))
                    ->map(function ($size) {
                        return trim($size);
                    })
                    ->filter(function ($size) {
                        return !empty($size);
                    });
            })
            ->unique()
            ->sort()
            ->values();

        // Get all unique colors from the products table for this category
        $availableColors = Product::where('type', $type)
            ->whereNotNull('rgb')
            ->where('rgb', '!=', '')
            ->pluck('rgb')
            ->unique()
            ->sort()
            ->values()
            ->map(function ($color) {
                // Convert hex to color name for display
                return [
                    'hex' => $color,
                    'name' => $this->getColorName($color)
                ];
            });

        return view('user.shop-category', compact('products', 'shopByCatMenus', 'brands', 'availableSizes', 'availableColors'));
    }

    // Filter products by size and price
    public function filterProducts(Request $request)
    {
        $category = $request->input('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sizes = $request->input('sizes', []);
        $colors = $request->input('colors', []);

        $query = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('type', $category);

        // Apply price filter
        if ($minPrice || $maxPrice) {
            $query->whereHas('price', function ($q) use ($minPrice, $maxPrice) {
                if ($minPrice) {
                    $q->where('single_list_price', '>=', $minPrice);
                }
                if ($maxPrice) {
                    $q->where('single_list_price', '<=', $maxPrice);
                }
            });
        }

        // Apply size filter - using size column from products table
        if (!empty($sizes)) {
            $query->where(function ($q) use ($sizes) {
                foreach ($sizes as $size) {
                    $q->orWhere('size', 'LIKE', '%' . $size . '%');
                }
            });
        }

        // Apply color filter - using rgb column from products table
        if (!empty($colors)) {
            $query->whereIn('rgb', $colors);
        }

        $products = $query->latest()->get();

        return response()->json([
            'products' => $products,
            'total' => $products->count()
        ]);
    }

    // Helper method to convert hex color to readable name
    private function getColorName($hex)
    {
        $colorMap = [
            '#000000' => 'Black',
            '#FFFFFF' => 'White',
            '#FF0000' => 'Red',
            '#00FF00' => 'Green',
            '#0000FF' => 'Blue',
            '#FFFF00' => 'Yellow',
            '#FF00FF' => 'Magenta',
            '#00FFFF' => 'Cyan',
            '#808080' => 'Gray',
            '#800000' => 'Maroon',
            '#008000' => 'Dark Green',
            '#000080' => 'Navy',
            '#800080' => 'Purple',
            '#008080' => 'Teal',
            '#C0C0C0' => 'Silver',
            '#FFA500' => 'Orange',
            '#A52A2A' => 'Brown',
            '#FFC0CB' => 'Pink',
            '#FFD700' => 'Gold',
            '#4B0082' => 'Indigo',
            '#EE82EE' => 'Violet',
            '#90EE90' => 'Light Green',
            '#F0E68C' => 'Khaki',
            '#DDA0DD' => 'Plum',
            '#98FB98' => 'Pale Green',
            '#F5DEB3' => 'Wheat',
            '#D2691E' => 'Chocolate',
            '#FF6347' => 'Tomato',
            '#40E0D0' => 'Turquoise',
            '#DA70D6' => 'Orchid',
        ];

        $hex = strtoupper($hex);

        if (isset($colorMap[$hex])) {
            return $colorMap[$hex];
        }

        // If exact match not found, return the hex code
        return $hex;
    }

    // Get available sizes for a category
    public function getCategorySizes($category)
    {
        $availableSizes = Product::where('type', $category)
            ->whereNotNull('size')
            ->where('size', '!=', '')
            ->pluck('size')
            ->flatMap(function ($sizes) {
                // Split comma-separated sizes and clean them
                return collect(explode(',', $sizes))
                    ->map(function ($size) {
                        return trim($size);
                    })
                    ->filter(function ($size) {
                        return !empty($size);
                    });
            })
            ->unique()
            ->sort()
            ->values();

        return response()->json(['sizes' => $availableSizes]);
    }

    // search products
    public function search(Request $request)
    {
        $query = $request->get('q');

        $products = \App\Models\Product::with('galleries')
            ->where('title', 'like', "%{$query}%")
            ->inRandomOrder()
            ->take(8)
            ->get(['id', 'title', 'sku', 'slug'])
            ->map(function ($product) {
                $product->image_url = optional($product->galleries[0])->image_url;
                unset($product->images); // Optional
                return $product;
            }); // Grouping by title here (collection-level)


        return response()->json($products);
    }
}
