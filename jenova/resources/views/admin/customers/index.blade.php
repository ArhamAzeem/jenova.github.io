@extends('admin.dashboard')
@section('title','Customers')

@section('main_content')
<div class="container">
    <h1>Customers List</h1>
    @if($customers->isNotEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->cell_no }}</td>
                        <td>
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-info">View</a>
                            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
        <p>No customers found.</p>
    @endif
</div>

@endsection