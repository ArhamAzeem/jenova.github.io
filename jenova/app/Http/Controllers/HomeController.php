<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch up to 4 products for the category type 'cosmetic'
        $cosmeticProducts = Product::whereHas('category', function ($query) {
            $query->where('type', 'cosmetic');
        })
        ->limit(4)
        ->get();
    
        // Fetch up to 4 products for the category type 'jewellery'
        $jewelleryProducts = Product::whereHas('category', function ($query) {
            $query->where('type', 'jewellery');
        })
        ->limit(4)
        ->get();
    
        // Return the view with both product collections
        return view('home', compact('cosmeticProducts', 'jewelleryProducts'));
    }    
}
