<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        ])->where('type', 'T-shirt')->latest()->take(5)->get();

        $secondMen = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('type', 'Polo')->latest()->skip(5)->take(5)->get();

        $ladies = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('type', 'hood')->latest()->skip(5)->take(5)->get();
        $secondLadies = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('type', 'Jacket')->latest()->take(5)->get();

        $kids = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(3);
            }
        ])->where('type', 'Headwear')->latest()->take(5)->get();

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
        ])->where('type', 'T-Shirt')->inRandomOrder()->take(3)->get();

        $trendingProducts = Product::with([
            'galleries',
            'price',
            'attributes' => function ($query) {
                $query->limit(2);
            }
        ])->where('type', 'Jacket')->latest()->inRandomOrder()->skip(1000)->take(8)->get();




        $popularCategories = Product::with(['galleries'])
            ->whereIn('type', ['Headwear', 'Jacket', 'Shirt', 'Sweatshirt', 'Hood', 'Bag', 'Polo'])
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)') // Gets the newest product per type
                    ->from('products')
                    ->whereIn('type', ['Headwear', 'Jacket', 'Shirt', 'Sweatshirt', 'Hood', 'Bag', 'Polo'])
                    ->groupBy('type');
            })
            ->inRandomOrder()
            ->take(6)
            ->get();
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
        return view('user.welcome', compact('men', 'secondMen', 'ladies', 'secondLadies', 'kids', 'secondKids', 'bannerProducts', 'trendingProducts', 'popularCategories', 'topRates', 'shopByCatMenus', 'brands', 'footwears', 'bannerSides'));
    }

    public function myAccount()
    {
        $user = Auth::guard('customer')->user();
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();

        // Get user's recent orders and wishlist count
        $recentOrders = Order::where('user_id', $user->id)->latest()->take(5)->get();
        $wishlistCount = Wishlist::where('user_id', $user->id)->count();

        return view('user.my-account', compact('user', 'shopByCatMenus', 'recentOrders', 'wishlistCount'));
    }

    public function orders()
    {
        $user = Auth::guard('customer')->user();
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();

        // Get user's orders with pagination
        $orders = Order::where('user_id', $user->id)->latest()->paginate(10);

        return view('user.my-orders', compact('orders', 'shopByCatMenus'));
    }

    public function settings()
    {
        $user = Auth::guard('customer')->user();
        $shopByCatMenus = Product::select('type')->groupBy('type')->get();

        return view('user.settings', compact('user', 'shopByCatMenus'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function updateNotifications(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $notifications = $request->input('notifications', []);

        $user->update([
            'notification_preferences' => $notifications
        ]);

        return back()->with('success', 'Notification preferences updated successfully!');
    }

    public function downloadData()
    {
        $user = Auth::guard('customer')->user();
        $orders = Order::where('user_id', $user->id)->get();
        $wishlist = Wishlist::where('user_id', $user->id)->with('product')->get();

        $data = [
            'user_data' => [
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'phone' => $user->phone,
                'address' => $user->address,
                'city' => $user->city,
                'country' => $user->country,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ],
            'orders' => $orders->toArray(),
            'wishlist' => $wishlist->toArray(),
        ];

        $filename = 'my_data_' . date('Y-m-d_H-i-s') . '.json';

        return response()->json($data)
            ->header('Content-Type', 'application/json')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password is incorrect.']);
        }

        // Delete user's related data
        Order::where('user_id', $user->id)->delete();
        Wishlist::where('user_id', $user->id)->delete();

        // Delete user account
        $user->delete();

        // Logout and redirect
        Auth::guard('customer')->logout();

        return redirect('/')->with('success', 'Your account has been permanently deleted.');
    }
}
