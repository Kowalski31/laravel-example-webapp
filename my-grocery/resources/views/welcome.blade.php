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
    <header class="bg-primary-light">
        <div class="container">
            <div class="row py-2 align-items-center">
                <div class="col-md-6">
                    <a href="#" class="navbar-brand">Logo</a>
                </div>
                <div class="col-md-6 text-end">
                    <span class="me-3"><i class="bi bi-telephone"></i> Call 1300 000 XXX</span>
                    <a href="{{ route('login') }}" class="me-3">Sign In</a>
                    <a href="{{ route('register') }}" class="me-3">Register</a>
                    <a href="#" class="me-3"><i class="bi bi-cart"></i></a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Navigation -->
    @include('home.nav')

    <!-- Body -->
    @include('home.body')

    <!-- Footer -->
    @include('home.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
