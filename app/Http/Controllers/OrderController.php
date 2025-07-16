<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatusChanged;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // show
    public function show()
    {
        // Logic to show orders
        // select all orders from the database with the relationship

        $orders = Order::with('user', 'shipping', 'product')->get(); // Assuming you have an Order model
        //dd($orders); // Debugging line to check the orders data
        return view('order', compact('orders')); // Return the view with orders data
    }

    // order details
    public function orderDetails($id)
    {
        // Logic to show order details
        $order = Order::with('user', 'shipping', 'product')->findOrFail($id); // Fetch the order by ID with relationships
        return view('order-details', compact('order')); // Return the view with order details
    }

    // update order status

    public function updateStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->status = $request->status;
        $order->save();

        Mail::to($order->user->email)->send(new OrderStatusChanged($order));

        return response()->json(['success' => true, 'status' => $order->status]);
    }
}
