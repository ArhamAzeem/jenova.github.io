<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch monthly earnings
        $monthlyEarnings = Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        // Fetch total number of customers
        $totalCustomers = Customer::count();

        // Fetch total number of orders
        $totalOrders = Order::count();

        // Fetch top 10 customers by total amount spent
        $topCustomers = Customer::select('customers.name', DB::raw('SUM(orders.amount) as total_spent'))
            ->join('orders', 'customers.id', '=', 'orders.customer_id')
            ->groupBy('customers.id', 'customers.name')
            ->orderBy('total_spent', 'desc')
            ->limit(10)
            ->get();

        // Fetch top 10 products by quantity sold
        $topProducts = OrderItem::select('product_name', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_name')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->get();

        // Pass data to the view
        return view('admin.maindashboard', compact('monthlyEarnings', 'totalCustomers', 'totalOrders', 'topCustomers', 'topProducts'));
    }
}
