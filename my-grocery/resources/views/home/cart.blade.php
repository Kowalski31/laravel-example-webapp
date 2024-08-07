<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <script srd="{{ asset('home-js/ajax.js') }}"></script>
    <style>
        .card-body {
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .card-title {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .list-group-item {
            font-size: 1rem;
        }
    </style>
    <script src="{{ asset('home-js/ajax.js') }}"></script>
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
        <div class="row d-flex justify-content-center">
            <!-- Cart Items -->
            <h1 class="text-center mb-4">Your Cart</h1>

            @if ($cart_count == 0)
                <div class="col-md-8" style="height: 32.7vh">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Your cart is empty</h4>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-8 border-end" id="cart-items">
                    @php
                        $subtotal = 0;
                        $shipping_fee = 0;
                    @endphp

                    @foreach ($cart as $item)
                        @php
                            $itemTotal = $item->price;
                            $subtotal += $itemTotal;
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3 cart-item"
                            data-id="{{ $item->id }}">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('./images/' . $item->link) }}" alt="{{ $item->product->title }}"
                                    class="img-fluid" style="width: 100px; height: 100px;" loading="lazy">
                                <div class="ms-3">
                                    <h5>{{ $item->product->title }}</h5>
                                    <p class="mb-1">${{ $item->product->price }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="number" class="form-control me-3 item-quantity"
                                    value="{{ $item->quantity }}" style="width: 60px;" min="1">

                                <p class="mb-0 me-3 item-total">${{ $itemTotal }}</p>
                                <button class="btn btn-danger btn-sm remove-item" data-id="{{ $item->id }}"
                                    aria-label="Remove item" title="Remove item">Remove</button>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('welcome') }}" class="btn btn-secondary">Continue Shopping</a>
                    </div>
                </div>

                @php
                    $cart_total = $subtotal + $shipping_fee;
                @endphp

                <!-- Cart Totals -->
                <div class="col-md-4" id="cart-totals">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Cart Total</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Subtotal
                                    <span id="subtotal">${{ $subtotal }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Shipping
                                    <span>Free</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total
                                    <span id="total">${{ $cart_total }}</span>
                                </li>
                            </ul>
                            <a href="{{ route('checkout') }}" class="btn btn-primary mt-4 w-100">Proceed to
                                Checkout</a>
                        </div>
                    </div>
                </div>
            @endif
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
