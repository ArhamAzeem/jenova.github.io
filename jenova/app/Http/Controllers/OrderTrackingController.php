<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    // Show the track order form
    public function showTrackOrderForm()
    {
        return view('track-order');
    }

    // Handle the form submission and show order details
    public function trackOrder(Request $request)
    {
        $request->validate([
            'order_number' => 'required|exists:orders,order_number',
        ]);

        $order = Order::where('order_number', $request->order_number)
                      ->with('items') // Include order items
                      ->firstOrFail();

        return view('order-details', compact('order'));
    }

    // Show order details
    public function showOrderDetails($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
                      ->with('items') // Include order items
                      ->firstOrFail();

        return view('order-details', compact('order'));
    }

    // Delete an order
    public function destroy($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        $order->delete();

        return redirect()->route('track.order.form')->with('success', 'Order deleted successfully');
    }
}
