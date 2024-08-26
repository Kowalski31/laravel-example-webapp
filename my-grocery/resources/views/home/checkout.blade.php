@extends('layouts.home')

@section('title', 'Checkout')

@section('content')

    <!-- Body -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Billing Details -->
            <div class="col-md-7 border-end">
                <h2>Billing Details</h2>
                <form action="{{ route('order') }}" method="POST" id="checkoutForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="CustomerName" class="form-label">Customer Name *</label>
                            <input type="text" class="form-control" id="CustomerName" name="customer_name"
                                value="{{ $user->name }}" required>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address *</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country *</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ $user->address }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City / Town *</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="col-md-6">
                            <label for="zip" class="form-label">Postcode / ZIP *</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone *</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}" required>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email address *</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="col-12">
                            <label for="additionalInfo" class="form-label">Additional information</label>
                            <textarea class="form-control" id="additionalInfo" name="additional_info" rows="3"></textarea>
                        </div>


                    </div>
                </form>
            </div>
            <!-- Order Summary -->
            <div class="col-md-5">
                <h2 class="d-flex justify-content-between align-items-center mb-3">
                    <span>Your Cart</span>
                </h2>
                <ul class="list-group mb-3">
                    @foreach ($carts as $item)
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{ $item->product->title }}</h6>
                                <small class="text-muted">x {{ $item->quantity }}</small>
                            </div>
                            <span class="text-muted">${{ $item->product->price }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>${{ $total_price }}</strong>
                    </li>
                </ul>

                <!-- Payment Method -->
                <h2 class="mb-3">Payment Method</h2>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="paymentCash" value="CASH"
                        form="checkoutForm" required>
                    <label class="form-check-label" for="paymentCash">
                        Cash
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="paymentBank" value="TRANSFER"
                        form="checkoutForm" required>
                    <label class="form-check-label" for="paymentBank">
                        Bank Transfer
                    </label>
                </div>

                <!-- Bank Accounts (hidden by default) -->
                <div id="bankAccounts" class="mt-3" style="display: none;" >
                    <h3>Select Bank Account</h3>
                    @foreach ($bank_accounts as $account)
                        <div class="form-check">
                            <input class="form-check-input bank-account-input" type="radio" name="bank_account"
                                id="bankAccount-{{ $account->id }}" value="{{ $account->id }}" form="checkoutForm">
                            <label class="form-check-label" for="bankAccount-{{ $account->id }}">
                                {{ $account->bank_name }} - {{ $account->account_number }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-success w-100 mt-3" type="submit" form="checkoutForm">Place an Order</button>

            </div>
        </div>
    </div>
    <!-- End Body -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const paymentCash = document.getElementById('paymentCash');
        const paymentBank = document.getElementById('paymentBank');
        const bankAccountsDiv = document.getElementById('bankAccounts');
        const bankAccountInputs = document.querySelectorAll('.bank-account-input');

        paymentCash.addEventListener('change', function () {
            if (paymentCash.checked) {
                bankAccountsDiv.style.display = 'none';
                bankAccountInputs.forEach(input => input.required = false);
            }
        });

        paymentBank.addEventListener('change', function () {
            if (paymentBank.checked) {
                bankAccountsDiv.style.display = 'block';
                bankAccountInputs.forEach(input => input.required = true);
            }
        });

        // Set the initial state
        if (paymentBank.checked) {
            bankAccountsDiv.style.display = 'block';
            bankAccountInputs.forEach(input => input.required = true);
        }
    });
    </script>
@endsection
