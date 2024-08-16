@extends('layouts.home')

@section('title', 'Cart')

@section('content')

    <!-- Body -->
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <!-- Cart Items -->
            <h1 class="text-center mb-4">Your Cart</h1>

            @if ($cart_count == 0)
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Your cart is empty</h4>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-8 border-end" id="cart-items">


                    @foreach ($cart as $item)
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
                                <input type="number" class="form-control me-3 item-quantity" value="{{ $item->quantity }}"
                                    style="width: 60px;" min="1">

                                <p class="mb-0 me-3 item-total">${{ $item_subtotals[$item->id] }}</p>
                                <button class="btn btn-danger btn-sm remove-item" data-id="{{ $item->id }}"
                                    aria-label="Remove item" title="Remove item">Remove</button>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('welcome') }}" class="btn btn-secondary">Continue Shopping</a>
                    </div>
                </div>



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
                                    <span id="total">${{ $total }}</span>
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
@endsection
