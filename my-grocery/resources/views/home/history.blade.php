<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produc Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <style>

    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Navigation -->
    @include('home.nav')
    <!-- Product Detail -->

    <div class="container mt-5">
        <h2>Order History</h2>

        @if ($orders->isEmpty())
            <p>No Order</p>
        @else
            <div class="accordion" id="orderAccordion">
                @foreach ($orders as $order)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $order->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $order->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $order->id }}">
                                Order #{{ $order->id }} - {{ $order->created_at }}
                            </button>
                        </h2>
                        <div id="collapse{{ $order->id }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $order->id }}" data-bs-parent="#orderAccordion">
                            <div class="accordion-body">
                                <h5>Order Details</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_details[$order->id] as $detail)
                                            <tr>
                                                <td>{{ $detail->product->title }}</td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>${{ $detail->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-end">
                                    <strong>Total: ${{ $order->total_price }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Footer -->
    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
