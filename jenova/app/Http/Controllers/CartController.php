<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Add a product to the cart.
     */
    public function addToCart(Request $request)
    {
        // Retrieve the product by ID
        $product = Product::findOrFail($request->product_id);

        // Determine the quantity
        $quantity = $request->input('quantity', 1); // Default quantity is 1 if not provided

        // Add to cart (assuming you are storing cart in session)
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$product->id])) {
            // Update the quantity if it already exists
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // Add new product to cart
            $cart[$product->id] = [
                'name' => $product->name,
                'specie' => $product->category->type === 'plant' ? $product->species : null,
                'description' => $product->description,
                'image' => $product->image_path,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }

        // Store the updated cart in the session
        session()->put('cart', $cart);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    /**
     * Display the cart items.
     */
    public function index()
    {
        // Assuming cart items are stored in the session
        $cartItems = session()->get('cart', []);
        
        // Calculate the subtotal
        $subtotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        // Calculate the total with a $30 addition
        $total = $subtotal + 30;

        return view('cart.index', compact('cartItems', 'subtotal', 'total'));
    }

    /**
     * Update the quantity of a product in the cart.
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}
    