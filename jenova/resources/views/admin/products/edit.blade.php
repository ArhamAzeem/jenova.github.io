@extends('admin.dashboard')
@section('title','Edit Product')

@section('main_content')
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" required>
    </div>

    <div class="form-group">
        <label for="discount_percentage">Discount Percentage</label>
        <input type="number" id="discount_percentage" name="discount_percentage" class="form-control" step="0.01" value="{{ old('discount_percentage', $product->discount_percentage) }}" max="100">
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control">
        @if($product->image_path)
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" width="100">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
@endsection