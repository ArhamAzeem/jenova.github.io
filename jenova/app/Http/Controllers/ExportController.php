<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function exportReport()
    {
        try {
            $response = new StreamedResponse(function () {
                $handle = fopen('php://output', 'w');

                // Add CSV headers
                fputcsv($handle, ['Top 10 Customers']);
                fputcsv($handle, ['Customer Name', 'Total Spent']);

                // Fetch top customers
                $topCustomers = Customer::select('customers.name', \DB::raw('SUM(orders.amount) as total_spent'))
                    ->join('orders', 'customers.id', '=', 'orders.customer_id')
                    ->groupBy('customers.id')
                    ->orderBy('total_spent', 'desc')
                    ->limit(10)
                    ->get();

                foreach ($topCustomers as $customer) {
                    fputcsv($handle, [$customer->name, $customer->total_spent]);
                }

                fputcsv($handle, []); // Blank row

                // Add CSV headers for products
                fputcsv($handle, ['Top 10 Products']);
                fputcsv($handle, ['Product Name', 'Quantity Sold']);

                // Fetch top products
                $topProducts = OrderItem::select('order_items.product_name', \DB::raw('SUM(order_items.quantity) as total_sold'))
                    ->groupBy('order_items.product_name')
                    ->orderBy('total_sold', 'desc')
                    ->limit(10)
                    ->get();

                foreach ($topProducts as $product) {
                    fputcsv($handle, [$product->product_name, $product->total_sold]);
                }

                fclose($handle);
            });

            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="report.csv"');

            return $response;

        } catch (\Exception $e) {
            // Log error and return response
            \Log::error('Error exporting report: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate report.'], 500);
        }
    }
}
