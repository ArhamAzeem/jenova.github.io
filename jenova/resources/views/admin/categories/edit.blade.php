@extends('admin.dashboard')
@section('title','Edit Categories')

@section('main_content')
<h1>Edit Category</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type" required>
            <option value="" disabled>Select Type</option>
            <option value="cosmetic" {{ old('type', $category->type) === 'cosmetic' ? 'selected' : '' }}>Cosmetic</option>
            <option value="jewellery" {{ old('type', $category->type) === 'jewellery' ? 'selected' : '' }}>Jewellery</option>
        </select>
        @error('type')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
</form>
@endsection
