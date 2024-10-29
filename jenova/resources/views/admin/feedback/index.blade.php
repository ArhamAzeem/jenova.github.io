@extends('admin.dashboard')
@section('title','Feed Backs')

@section('main_content')
<h1>Feedback Messages</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($feedbacks->isEmpty())
    <p>No feedback messages found.</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ Str::limit($feedback->message, 50) }}</td>
                    <td>{{ $feedback->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('feedback.show', $feedback->id) }}" class="btn btn-info btn-sm">View</a>
                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</div>

@endsection