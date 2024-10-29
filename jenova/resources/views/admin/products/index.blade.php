@extends('admin.dashboard')
@section('title','Products')

@section('main_content')
<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>

@if($products->isEmpty())
    <p>No products found.</p>
@else
    <table class="table table-bordered table-hover my-3">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td><img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" width="100">

                    </td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->discount_percentage ? $product->discount_percentage . '%' : 'No Discount' }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection