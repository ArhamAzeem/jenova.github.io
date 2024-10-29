@extends('admin.dashboard')
@section('title', 'Customer Details')

@section('main_content')
<div class="container my-4">
    <h1 class="mb-4">Customer Details</h1>

    <div class="card p-4">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9">{{ $customer->id }}</dd>

                <dt class="col-sm-3">Name:</dt>
                <dd class="col-sm-9">{{ $customer->name ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9">{{ $customer->email ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Work Phone No:</dt>
                <dd class="col-sm-9">{{ $customer->work_phone_no ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Cell Phone:</dt>
                <dd class="col-sm-9">{{ $customer->cell_no ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Date of Birth:</dt>
                <dd class="col-sm-9">{{ $customer->date_of_birth ? \Carbon\Carbon::parse($customer->date_of_birth)->format('d M Y') : 'N/A' }}</dd>

                <dt class="col-sm-3">Category:</dt>
                <dd class="col-sm-9">{{ $customer->category ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Remarks:</dt>
                <dd class="col-sm-9">{{ $customer->remarks ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Address:</dt>
                <dd class="col-sm-9">{{ $customer->address ?? 'N/A' }}</dd>
            </dl>

            <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
