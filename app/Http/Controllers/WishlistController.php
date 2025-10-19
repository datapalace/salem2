<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist
     */
    public function index()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
        }

        $user = Auth::guard('customer')->user();

        // Get wishlist items with product details
        $wishlistItems = Wishlist::where('user_id', $user->id)
            ->with(['product.galleries', 'product.price'])
            ->latest()
            ->paginate(12);

        $shopByCatMenus = Product::select('type')->groupBy('type')->get();

        return view('user.wishlist', compact('wishlistItems', 'shopByCatMenus'));
    }

    /**
     * Add a product to wishlist
     */
    public function add(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add items to wishlist',
                'redirect' => route('login')
            ]);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $user = Auth::guard('customer')->user();
        $productId = $request->product_id;

        // Check if product is already in wishlist
        $existingItem = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            return response()->json([
                'success' => false,
                'message' => 'Product is already in your wishlist'
            ]);
        }

        // Add to wishlist
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $productId
        ]);

        // Get updated wishlist count
        $wishlistCount = Wishlist::where('user_id', $user->id)->count();

        return response()->json([
            'success' => true,
            'message' => 'Product added to wishlist successfully',
            'wishlist_count' => $wishlistCount
        ]);
    }

    /**
     * Remove a product from wishlist
     */
    public function remove(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ]);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $user = Auth::guard('customer')->user();
        $productId = $request->product_id;

        $deleted = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->delete();

        if ($deleted) {
            // Get updated wishlist count
            $wishlistCount = Wishlist::where('user_id', $user->id)->count();

            return response()->json([
                'success' => true,
                'message' => 'Product removed from wishlist',
                'wishlist_count' => $wishlistCount
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found in wishlist'
        ]);
    }

    /**
     * Toggle product in wishlist (add if not exists, remove if exists)
     */
    public function toggle(Request $request)
    {
        try {
            Log::info('Wishlist toggle request received', [
                'user_authenticated' => Auth::guard('customer')->check(),
                'request_data' => $request->all(),
                'headers' => $request->headers->all()
            ]);

            if (!Auth::guard('customer')->check()) {
                Log::info('User not authenticated, redirecting to login');
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to manage wishlist',
                    'redirect' => route('login')
                ]);
            }

            $validation = $request->validate([
                'product_id' => 'required|exists:products,id'
            ]);

            Log::info('Validation passed', $validation);

            $user = Auth::guard('customer')->user();
            $productId = $request->product_id;

            Log::info('User and product details', [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'product_id' => $productId
            ]);

            // Check if product is already in wishlist
            $existingItem = Wishlist::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

            Log::info('Existing wishlist item check', [
                'existing_item_found' => $existingItem ? 'yes' : 'no'
            ]);

            if ($existingItem) {
                // Remove from wishlist
                $existingItem->delete();
                $action = 'removed';
                $message = 'Product removed from wishlist';
                Log::info('Product removed from wishlist');
            } else {
                // Add to wishlist
                $newItem = Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => $productId
                ]);
                $action = 'added';
                $message = 'Product added to wishlist';
                Log::info('Product added to wishlist', ['wishlist_id' => $newItem->id]);
            }

            // Get updated wishlist count
            $wishlistCount = Wishlist::where('user_id', $user->id)->count();
            Log::info('Updated wishlist count', ['count' => $wishlistCount]);

            return response()->json([
                'success' => true,
                'action' => $action,
                'message' => $message,
                'wishlist_count' => $wishlistCount
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in wishlist toggle', [
                'errors' => $e->errors(),
                'message' => $e->getMessage()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Invalid product ID: ' . implode(', ', $e->errors()['product_id'] ?? ['Unknown error'])
            ], 422);
        } catch (\Exception $e) {
            Log::error('Exception in wishlist toggle', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating wishlist: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get wishlist count for authenticated user
     */
    public function getCount()
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['count' => 0]);
        }

        $count = Wishlist::where('user_id', Auth::guard('customer')->user()->id)->count();

        return response()->json(['count' => $count]);
    }
}
