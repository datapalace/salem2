<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewOrderStatus;
use App\Mail\NewOrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
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
            'product_title'     => 'nullable|string',
            'unit_price'        => 'nullable|numeric',
            'embroidery_price'  => 'nullable|numeric',
            'total_price'       => 'nullable|numeric',
            'decoration_price'  => 'nullable|numeric',
            'custom_image'      => 'nullable|url',
        ]);

        // Add custom_designs from session to checkout_data
        session([
            'checkout_data' => [
                'product_id'        => $request->input('product_id'),
                'color'             => $request->input('color'),
                'decoration_type'   => $request->input('decoration_type'),
                'sizes'             => $request->input('sizes'),
                'product_title'     => $request->input('product_title'),
                'unit_price'        => $request->input('unit_price'),
                'embroidery_price'  => $request->input('embroidery_price'),
                'total_price'       => $request->input('total_price'),
                'decoration_price'  => $request->input('decoration_price'),
                'custom_image'      => $request->input('custom_image'),
                'custom_designs'    => session('custom_designs', []), // <-- add this line
            ]
        ]);
        // print_r(session('checkout_data'));
        // die();
        return redirect()->route('checkout.payment');
    }

    /**
     * View custom designs for a specific order
     */
    public function viewOrderDesigns($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);

        // Check if user owns this order
        if (auth('customer')->id() !== $order->user_id) {
            abort(403, 'Unauthorized');
        }

        $customDesigns = $order->custom_designs ?? [];

        return view('order-designs', compact('order', 'customDesigns'));
    }

    /**
     * Get design data for re-editing (loads design back to canvas)
     */
    public function getDesignData($orderId, $designIndex)
    {
        $order = Order::findOrFail($orderId);

        // Check if user owns this order
        if (auth('customer')->id() !== $order->user_id) {
            abort(403, 'Unauthorized');
        }

        $customDesigns = $order->custom_designs ?? [];

        if (!isset($customDesigns[$designIndex])) {
            return response()->json(['error' => 'Design not found'], 404);
        }

        return response()->json([
            'design' => $customDesigns[$designIndex]
        ]);
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

        if (!$checkoutData) {
            return redirect()->route('welcome')->with('error', 'No checkout data found.');
        }

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

        // Debug: Check what custom_designs data looks like
        Log::info('Custom designs data:', [
            'custom_designs' => $checkoutData['custom_designs'] ?? 'null',
            'type' => gettype($checkoutData['custom_designs'] ?? 'null')
        ]);

        // store the order in the database
        $order = Order::create([
            'user_id' => $me,
            'product_id' => $checkoutData['product_id'],
            'sizes' => $checkoutData['sizes'],
            'custom_designs' => json_encode($checkoutData['custom_designs'] ?? []), // Ensure it's JSON string
            'product_title' => $checkoutData['product_title'],
            'unit_price' => $checkoutData['unit_price'],
            'embroidery_price' => $checkoutData['embroidery_price'],
            'total_price' => $checkoutData['total_price'],
            'decoration_price' => $checkoutData['decoration_price'],
            'custom_image' => $checkoutData['custom_image'],
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

        // clear the custom designs and checkout data from the session
        session()->forget('custom_designs');
        session()->forget('checkout_data');

        // dd($order->id . ' ' . $shipping->id);
        // Only fetch what you need for the About Us page

        try {
            // Debug: Log user information
            Log::info('Order created successfully', [
                'order_id' => $order->id,
                'user_id' => $user->id ?? 'null',
                'user_email' => $user->email ?? 'null',
                'user_name' => $user->name ?? 'null',
                'mail_driver' => config('mail.mailers.smtp.host')
            ]);

            // Send email to customer
            if ($user && $user->email) {
                // Try to send the email
                $customerMail = new NewOrderStatus($order);
                Mail::to($user->email)->send($customerMail);
                Log::info('Customer email sent successfully to: ' . $user->email);

                // Alternative: Queue the email if immediate sending fails
                // Mail::to($user->email)->queue($customerMail);

            } else {
                Log::error('User or user email not found for order: ' . $order->id);
            }

            // Send email to admin
            $adminMail = new AdminNewOrderStatus($order);
            Mail::to('admin@salemapparel.co.uk')->send($adminMail);
            Log::info('Admin email sent successfully');

        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage(), [
                'order_id' => $order->id,
                'user_email' => $user->email ?? 'null',
                'exception' => $e->getTraceAsString(),
                'mail_config' => [
                    'driver' => config('mail.default'),
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port')
                ]
            ]);

            // Try alternative method - queue the emails
            try {
                if ($user && $user->email) {
                    Mail::to($user->email)->queue(new NewOrderStatus($order));
                    Log::info('Customer email queued as fallback');
                }
                Mail::to('admin@salemapparel.co.uk')->queue(new AdminNewOrderStatus($order));
                Log::info('Admin email queued as fallback');
            } catch (\Exception $queueException) {

            }
        }


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

    public function showCheckout()
    {
        $customDesigns = session('custom_designs', []);
        // ...other checkout data...
        return view('checkout.blade', compact('customDesigns'));
    }
}
