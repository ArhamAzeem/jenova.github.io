@extends('admin.dashboard')
@section('title', 'Edit Order')

@section('main_content')
<div class="container">
    <h1 class="mb-4">Edit Order</h1>

    <form action="{{ route('admin.orders.update', $order->order_number) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Amount Field -->
        <div class="form-group mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" id="amount" name="amount" value="{{ old('amount', $order->amount) }}" class="form-control @error('amount') is-invalid @enderror" required>
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Payment Status Field -->
        <div class="form-group mb-3">
            <label for="payment_status" class="form-label">Payment Status</label>
            <select id="payment_status" name="payment_status" class="form-control @error('payment_status') is-invalid @enderror" required>
                <option value="">Select Payment Status</option>
                <option value="paid" {{ old('payment_status', $order->payment_status) == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="unpaid" {{ old('payment_status', $order->payment_status) == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="pending" {{ old('payment_status', $order->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
            @error('payment_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Delivery Status Field -->
        <div class="form-group mb-4">
            <label for="delivery_status" class="form-label">Delivery Status</label>
            <select id="delivery_status" name="delivery_status" class="form-control @error('delivery_status') is-invalid @enderror" required>
                <option value="">Select Delivery Status</option>
                <option value="pending" {{ old('delivery_status', $order->delivery_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="shipped" {{ old('delivery_status', $order->delivery_status) == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ old('delivery_status', $order->delivery_status) == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ old('delivery_status', $order->delivery_status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('delivery_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
@endsection
