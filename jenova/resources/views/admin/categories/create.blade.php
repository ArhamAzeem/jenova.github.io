@extends('admin.dashboard')
@section('title','Create Categories')

@section('main_content')
<h1>Create New Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type" required>
            <option value="" disabled selected>Select Type</option>
            <option value="cosmetic" {{ old('type') === 'cosmetic' ? 'selected' : '' }}>Cosmetic</option>
            <option value="jewellery" {{ old('type') === 'jewellery' ? 'selected' : '' }}>Jewellery</option>
        </select>
        @error('type')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
</form>
@endsection
