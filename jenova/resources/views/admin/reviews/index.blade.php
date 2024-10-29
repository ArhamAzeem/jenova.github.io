@extends('admin.dashboard')
@section('title','Reviews')

@section('main_content')

<div class="container py-5">
    <h1 class="mb-4">Manage Reviews</h1>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Product ID</th>
                <th>Email</th>
                <th>Review</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->product_id }}</td>
                    <td>{{ $review->email }}</td>
                    <td>{{ $review->review }}</td>
                    <td>
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No reviews found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection