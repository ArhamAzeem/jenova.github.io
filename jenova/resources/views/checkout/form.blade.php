@extends('frontend_partials.main_layout')
@section('front_title', 'Check Out')

@section('main_content')

<div class="container-fluid">
    <div class="row d-flex shop flex-row justify-content-center align-items-center py-5 text-center">
        <h1 class="fw-bolder fs-1"><i class="fa-solid fa-cart-shopping"></i> Check Out</h1>
    </div>
</div>

<div class="container my-5 p-5">
    <div class="row">
        <!-- Checkout Form -->
        <div class="col col-12 col-md-8 p-5 rounded-0 bg-secondary-subtle">
            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf

                <!-- General Error Alert -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Details Section -->
                <fieldset class='d-flex flex-column mb-5'>
                    <legend class='fw-bold text-danger fs-2 mb-4'>Billing Details</legend>
                    
                    @foreach ([
                        'name' => 'Full Name', 
                        'address' => 'Address', 
                        'email' => 'Email Address', 
                        'work_phone_no' => 'Work Phone No.', 
                        'cell_no' => 'Cell No.', 
                        'date_of_birth' => 'Date of Birth', 
                        'category' => 'Category', 
                        'remarks' => 'Remarks (Additional Information)'
                    ] as $field => $label)
                    <div class="form-group">
                        <label for="{{ $field }}" class="fw-semibold fs-6 my-2">{{ $label }}:</label>
                        @if($field === 'category')
                            <select class="form-control rounded-pill" id="{{ $field }}" name="{{ $field }}" required>
                                <option value="cosmetic">Cosmetic</option>
                                <option value="jewellery">Jewellery</option>
                            </select>
                        @elseif($field === 'date_of_birth')
                            <input type="date" class="form-control rounded-pill" id="{{ $field }}" name="{{ $field }}" required>
                        @else
                            <input type="{{ $field === 'email' ? 'email' : 'text' }}" class="form-control rounded-pill" id="{{ $field }}" name="{{ $field }}" placeholder="Enter your {{ $label }} ..." required>
                        @endif
                        @error($field)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @endforeach
                </fieldset>
                
                <!-- Payment Method Section -->
                <fieldset class='d-flex flex-column'>
                    <legend class='fw-bold text-danger fs-2 mb-4'>Payment Method</legend>
                    
                    @foreach (['card_number' => 'Credit/Debit Card Number', 'cvv' => 'CVV', 'expiry_date' => 'Expiry Date'] as $field => $label)
                    <div class="form-group">
                        <label for="{{ $field }}" class="fw-semibold fs-6 my-2">{{ $label }}:</label>
                        <input type="{{ $field === 'expiry_date' ? 'month' : 'text' }}" class="form-control rounded-pill" id="{{ $field }}" name="{{ $field }}" placeholder="{{ $label === 'Expiry Date' ? 'YYYY-MM' : '' }}" required>
                        @error($field)
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @endforeach
                </fieldset>
                
                <button type="submit" class="btn btn-danger rounded-pill mt-3 fs-6 w-100">Place Order</button>
            </form>
        </div>

        <!-- Cart Summary -->
        <div class="col col-12 col-md-4">
            <div class="card rounded-5 border-0 shadow">
                <div class="card-body p-4">
                    <div class="card-title fs-4 fw-bolder border-bottom pb-2">
                        Order Summary
                    </div>
                    <ol class="list-group list-group-numbered d-flex flex-column gap-2 py-2">
                        @foreach ($cartItems as $item)
                        <li class="list-group-item d-flex justify-content-between border-0">
                            {{ $item['name'] }}
                            <span>${{ $item['price'] }}</span>
                        </li>
                        @endforeach
                    </ol>
                    <div class="card-text d-flex justify-content-between border-top fw-semibold py-2">Sub-Total
                        <span id="subtotal">${{ $subTotal }}</span></div>
                    <div class="card-text d-flex justify-content-between border-top fw-bold py-2">Total
                        <span id="total">${{ $total }}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
