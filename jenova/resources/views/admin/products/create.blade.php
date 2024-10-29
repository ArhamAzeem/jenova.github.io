@extends('admin.dashboard')
@section('title','Add Product')

@section('main_content')
<h1>Add Product</h1>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class='py-3'>
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
    </div>

    <div class="form-group">
        <label for="discount_percentage">Discount Percentage</label>
        <input type="number" id="discount_percentage" name="discount_percentage" class="form-control" step="0.01" value="{{ old('discount_percentage') }}" max="100">
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
    <label for="image" class="form-label">Upload Image</label>
    <div class="custom-file">
        <input type="file" id="image" name="image" class="custom-file-input" onchange="displayFileName()">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>
</div>
<script>
    function displayFileName() {
    const fileInput = document.getElementById('image');
    const fileName = fileInput.files[0].name;
    const label = fileInput.nextElementSibling;
    label.innerHTML = fileName;
}
</script>
    <button type="submit" class="btn btn-primary">Save Product</button>
</form>
@endsection