<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 E-commerce Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Navigation -->
    @include('home.nav')

    <!-- Body -->
    @include('home.body')

    <!-- Footer -->
    @include('home.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                card.addEventListener('click', function(event) {
                    // Prevent navigation if 'Add to Cart' button is clicked
                    if (event.target.classList.contains('add-to-cart-btn')) {
                        return;
                    }

                    const productId = card.getAttribute('data-product-id');
                    window.location.href = `/product_detail/${productId}`;
                });
            });
        });
    </script>
</body>

</html>
