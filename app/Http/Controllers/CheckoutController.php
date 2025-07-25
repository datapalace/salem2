<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

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
        // Only fetch what you need for the checkout page
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $brands = Product::select('brand')->groupBy('brand')->get();
        return view('user.checkout', compact('checkoutData', 'shopByCatMenus', 'brands', 'user'));
    }

    public function makeOrder(Request $request)
    {

        $checkoutData = session('checkout_data');
        $user = Auth::guard('customer')->user(); // Use the user guard
        $me = $user->id ?? null;

        // validate the shipping information
        $request->validate([

            'address' => 'required|string',
            'address2' => 'nullable|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'zip_code' => 'required|string',
            'phone' => 'required|string',
            'company_name' => 'nullable|string',

        ]);
        $ref = $_POST['stripe_payment_ref'];
        //dd($ref);
                // store the order in the database
        $order = Order::create([
            'user_id' => $me,
            'product_id' => $checkoutData['product_id'],
            'sizes' => $checkoutData['sizes'],
            'custom_design' => $checkoutData['custom_design_raw'],
            'product_title' => $checkoutData['product_title'],
            'unit_price' => $checkoutData['unit_price'],
            'embroidery_price' => $checkoutData['embroidery_price'],
            'total_price' => $checkoutData['total_price'],
            'decoration_price' => $checkoutData['decoration_price'],
            'custom_image' => $checkoutData['custom_image'],
            'custom_side' => $checkoutData['custom_side'],
            // submit payment ref from stripe
            'ref' => $ref,
            // generate a unique 13 digit number, number only, not alpanumeric
            'track_id' => str_pad(rand(0, 9999999999999), 13, '0', STR_PAD_LEFT),
            'decoration_type' => $checkoutData['decoration_type'] ?? 'print', // default to 'print' if not set
        ]);

        // store the shipping information only
        $shipping = Shipping::create([
            'order_id' => $order->id,
            'user_id' => $me,
            'address' => $request->input('address'),
            'address2' => $request->input('address2'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'zip_code' => $request->input('zip_code'),
            'phone' => $request->input('phone'),
            'company_name' => $request->input('company_name'),
        ]);

        // clear the checkout data from the session
        session()->forget('checkout_data');
        // dd($order->id . ' ' . $shipping->id);
        // Only fetch what you need for the About Us page
        return redirect("/order-details/{$order->id}");
    }

    public function orderDetails($id)
    {
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();
        $order = Order::with(['user', 'shipping'])->findOrFail($id);
        return view('user.order-details', compact('order', 'shopByCatMenus'));
    }



public function createStripeIntent(Request $request)
{
    $checkoutData = session('checkout_data');
    if (!$checkoutData) {
        return response()->json(['error' => 'No checkout data found.'], 400);
    }
    $amount = intval($checkoutData['total_price'] * 100); // in cents
    Stripe::setApiKey(config('services.stripe.secret'));
    $intent = PaymentIntent::create([
        'amount' => $amount,
        'currency' => 'gbp', // or your currency
        'metadata' => [
            'order_product' => $checkoutData['product_title'] ?? '',
        ],
    ]);
    return response()->json(['clientSecret' => $intent->client_secret]);
}

public function stripePay(Request $request)
{
    // You can verify payment here if needed, then call makeOrder()
    return $this->makeOrder($request);
}
//all my odrers
public function myOrders()
{
    $user = Auth::guard('customer')->user(); // Use the user guard
    $orders = Order::where('user_id', $user->id)->with(['shipping'])->get();
    $shopByCatMenus = Product::select('type')->groupBy('type')->get();
    return view('user.my-orders', compact('orders', 'shopByCatMenus'));
}

}
