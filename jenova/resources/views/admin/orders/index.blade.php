@extends('admin.dashboard')
@section('title', 'Orders')

@section('main_content')
<div class="container">
    <h1>Orders List</h1>
    @if($orders->isNotEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>
                            {{ $order->customer ? $order->customer->name : 'N/A' }}
                        </td>
                        <td>
                            {{ $order->customer ? $order->customer->address : 'N/A' }}
                        </td>
                        <td>
                            {{ $order->customer ? $order->customer->email : 'N/A' }}
                        </td>
                        <td>${{ $order->amount }}</td>
                        <td>{{ ucfirst($order->payment_status) }}</td>
                        <td>{{ ucfirst($order->delivery_status) }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->order_number) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.orders.edit', $order->order_number) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.orders.destroy', $order->order_number) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No orders found.</p>
    @endif
</div>
@endsection
