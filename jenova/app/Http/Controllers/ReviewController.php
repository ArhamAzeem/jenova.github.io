<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product')->get(); // Fetch reviews with their related product data
        return view('admin.reviews.index', compact('reviews'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);
    
        Review::create([
            'product_id' => $productId,
            'email' => $request->input('email'),
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);
    
        return redirect()->back()->with('success', 'Review submitted successfully!');        
}

public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
