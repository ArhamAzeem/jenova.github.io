@extends('admin.dashboard')
@section('title','Feed Backs')

@section('main_content')

<div class="container mt-5">
    <h1>Feedback Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $feedback->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $feedback->email }}</h6>
            <p class="card-text">{{ $feedback->message }}</p>
            <p class="card-text"><small class="text-muted">Submitted on {{ $feedback->created_at->format('d M Y, h:i A') }}</small></p>

            <a href="{{ route('feedback.index') }}" class="btn btn-secondary">Back to Feedback List</a>
            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection
