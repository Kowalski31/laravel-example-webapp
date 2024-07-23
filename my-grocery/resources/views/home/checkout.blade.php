<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <style>


        h2 {
            margin-bottom: 20px;
        }

        .list-group-item {
            background-color: #fff;
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')
    <!-- End Header -->

    <!-- Navigation -->
    @include('home.nav')
    <!-- End Navigation -->

    <!-- Body -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Billing Details -->
            <div class="col-md-7 border-end">
                <h2>Billing Details</h2>
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First name *</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last name *</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address *</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country *</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Select an option...</option>
                                <option value="1">United States</option>
                                <option value="2">Canada</option>

                            </select>
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
                            <input type="text" class="form-control" id="phone" name="phone" required>
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
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="createAccount"
                                    name="create_account">
                                <label class="form-check-label" for="createAccount">
                                    Create an account?
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="shipToDifferent"
                                    name="ship_to_different">
                                <label class="form-check-label" for="shipToDifferent">
                                    Ship to a different address?
                                </label>
                            </div>
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
                    @foreach ($cart as $item)
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
                    <input class="form-check-input" type="radio" name="payment_method" id="paymentCash" value="cash" form="checkoutForm" required>
                    <label class="form-check-label" for="paymentCash">
                        Cash
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="paymentBank" value="bank_transfer" form="checkoutForm" required>
                    <label class="form-check-label" for="paymentBank">
                        Bank Transfer
                    </label>
                </div>

                <button class="btn btn-success w-100 mt-3" type="submit" form="checkoutForm">Place an Order</button>

            </div>


        </div>
    </div>
    <!-- End Body -->

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('home-js/home_index.js') }}"></script>
</body>

</html>