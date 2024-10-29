<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session; // Import the Session facade
use Illuminate\Support\Str; // Import the Str facade for random string generation
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        // Fetch cart items from session
        $cartItems = Session::get('cart', []);
        
        // Calculate totals
        $subTotal = array_sum(array_column($cartItems, 'price'));
        $total = $subTotal; // Adjust if needed for shipping or taxes
        
        return view('checkout.form', compact('cartItems', 'subTotal', 'total'));
    }

    public function placeOrder(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'work_phone_no' => 'required|string|max:20',
            'cell_no' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'category' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:500',
            'card_number' => 'required|string|max:19',
            'cvv' => 'required|string|max:4',
            'expiry_date' => 'required|date_format:Y-m',
        ]);

        // Create customer
        $customer = Customer::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'email' => $validatedData['email'],
            'work_phone_no' => $validatedData['work_phone_no'],
            'cell_no' => $validatedData['cell_no'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'category' => $validatedData['category'],
            'remarks' => $validatedData['remarks'],
        ]);

        // Calculate total amount (replace with actual logic if needed)
        $cartItems = session()->get('cart', []);
        $totalAmount = array_sum(array_column($cartItems, 'price'));

        // Create order
        $order = Order::create([
            'order_number' => Str::random(10),
            'customer_id' => $customer->id,
            'amount' => $totalAmount,
            'payment_status' => 'paid',
            'delivery_status' => 'pending',
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        // Redirect to thank you page with order number
        return redirect()->route('checkout.thank-you', ['orderNumber' => $order->order_number]);
    }
}