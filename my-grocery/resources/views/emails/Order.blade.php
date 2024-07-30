<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Shipped Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Body -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Order Shipped</h3>
            </div>
            <div class="card-body">
                <h4 class="card-title">Hello</h4>
                <p class="card-text">
                    We are pleased to inform you that your order has been shipped.
                </p>
                <hr>
                <h5>Order Details:</h5>
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                {{-- <p><strong>Product Name:</strong> {{ $order->product->title }}</p> --}}
                {{-- <p><strong>Quantity:</strong> {{ $order->quantity }}</p> --}}
                <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>
                <p><strong>Shipping Address:</strong> {{ $order->address }}</p>
                <hr>
                <p>
                    You can track your order using the tracking number provided in your email.
                    Thank you for shopping with us!
                </p>
                <p>If you have any questions, feel free to <a href="mailto:support@example.com">contact us</a>.</p>
            </div>
            <div class="card-footer text-muted">
                <small>Thank you for your purchase!</small>
            </div>
        </div>
    </div>

    <!-- End Body -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
