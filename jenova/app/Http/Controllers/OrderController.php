<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a list of orders
    public function index()
    {
        // Fetch orders with customer details
        $orders = Order::with('customer')->get(); 
        return view('admin.orders.index', compact('orders'));
    }

    // Show details of a specific order
    public function show($orderNumber)
    {
        // Fetch the order with its items and customer  
        $order = Order::where('order_number', $orderNumber)
                      ->with('items', 'customer') // Include order items and customer
                      ->firstOrFail();

        return view('admin.orders.show', compact('order'));
    }

    // Show form for editing a specific order
    public function edit($orderNumber)
    {
        // Fetch the order for editing
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        return view('admin.orders.edit', compact('order'));
    }

    // Update a specific order
    public function update(Request $request, $orderNumber)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric|min:0', // Ensure amount is a positive number
            'payment_status' => 'required|string|in:paid,unpaid,pending', // Validate against allowed values
            'delivery_status' => 'required|string|in:pending,shipped,delivered,cancelled', // Validate against allowed values
            // Add validation rules for other fields as needed
        ]);

        // Fetch and update the order
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        $order->update($request->only(['amount', 'payment_status', 'delivery_status'])); // Update only specified fields

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }

    // Delete a specific order
    public function destroy($orderNumber)
    {
        // Fetch and delete the order
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }
}
