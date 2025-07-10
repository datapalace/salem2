<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function custom(Request $request)
    {
        $request->validate([
            'product_id'        => 'required|exists:products,id',
            'color'             => 'nullable|string',
            'decoration_type'   => 'nullable|string',
            'sizes'             => 'required|string',
            'custom_design'     => 'required|string',
            'product_title'     => 'nullable|string',
            'unit_price'        => 'nullable|numeric',
            'embroidery_price'  => 'nullable|numeric',
            'total_price'       => 'nullable|numeric',
            'decoration_price'  => 'nullable|numeric',
            'custom_image'      => 'nullable|url',
            'custom_side'       => 'nullable|string',
        ]);

        $base64Image = $request->input('custom_design');

        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
            $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
            $type = strtolower($type[1]);

            if (!in_array($type, ['jpg', 'jpeg', 'png'])) {
                return back()->with('error', 'Unsupported image type.');
            }

            $decodedImage = base64_decode($base64Image);
            if ($decodedImage === false) {
                return back()->with('error', 'Base64 decode failed.');
            }

            $filename = 'custom_designs/' . Str::uuid() . '.' . $type;
            Storage::disk('public')->put($filename, $decodedImage);
            $imageUrl = Storage::url($filename);

            // ✅ Store checkout data in session
            session([
                'checkout_data' => [
                    'product_id'        => $request->input('product_id'),
                    'color'             => $request->input('color'),
                    'decoration_type'   => $request->input('decoration_type'),
                    'sizes'             => $request->input('sizes'),
                    'custom_design'     => $imageUrl,
                    'custom_design_raw' => $base64Image,
                    'product_title'     => $request->input('product_title'),
                    'unit_price'        => $request->input('unit_price'),
                    'embroidery_price'  => $request->input('embroidery_price'),
                    'total_price'       => $request->input('total_price'),
                    'decoration_price'  => $request->input('decoration_price'),
                    'custom_image'      => $request->input('custom_image'),
                    'custom_side'       => $request->input('custom_side'),
                ]
            ]);
            // view store data in session
            // print post array
            //dd($request->all());
            // dd(session('checkout_data'));
            // ✅ Redirect to success page
            return redirect()->route('checkout.payment');
        }

        return back()->with('error', 'Invalid image data format.');
    }



    public function checkout(Request $request)
    {
        $checkoutData = session('checkout_data');
        $user = Auth::guard('customer')->user(); // Use the user guard 

        if (!$checkoutData) {

            return redirect()->route('welcome')->with('error', 'No checkout data found.');
        }
        // Only fetch what you need for the About Us page
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $brands = Product::select('brand')->groupBy('brand')->get();
        return view('user.checkout', compact('checkoutData', 'shopByCatMenus', 'brands', 'user'));
    }

    public function makePaymentNow(Request $request)
    {
        $checkoutData = session('checkout_data');
        $user = Auth::guard('customer')->user(); // Use the user guard 

        if (!$checkoutData) {

            return redirect()->route('welcome')->with('error', 'No checkout data found.');
        }
        // Only fetch what you need for the About Us page
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $brands = Product::select('brand')->groupBy('brand')->get();
        return view('user.payment', compact('checkoutData', 'shopByCatMenus', 'brands', 'user'));
    }
}
