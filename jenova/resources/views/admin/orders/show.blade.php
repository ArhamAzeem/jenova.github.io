@extends('admin.dashboard')
@section('title', 'Order Details')

@section('main_content')
<div class="container">
    <!-- Order Information -->
    <div class="mb-4">
        <h2 class="fw-bold">Order Information</h2>
        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
        <p><strong>Customer Name:</strong> {{ $order->customer->name }}</p>
        <p><strong>Amount:</strong> ${{ $order->amount }}</p>
        <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
        <p><strong>Delivery Status:</strong> {{ ucfirst($order->delivery_status) }}</p>
    </div>

    <!-- Order Items -->
    <div class="mb-4">
        <h2 class="fw-bold">Order Items</h2>
        @if($order->items->isNotEmpty())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No items found for this order.</p>
        @endif
    </div>
    
    <!-- Actions -->
    <div class="d-flex gap-2">
        <a href="{{ route('admin.orders.edit', $order->order_number) }}" class="btn btn-warning">Edit Order</a>
        <form action="{{ route('admin.orders.destroy', $order->order_number) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete Order</button>
        </form>
    </div>
</div>
@endsection
