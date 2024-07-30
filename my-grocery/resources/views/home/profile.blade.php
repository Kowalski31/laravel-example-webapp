<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

</head>

<body>
    <!-- Header -->
    @include('home.header')
    <!-- End Header -->

    <!-- Navigation -->
    @include('home.nav')
    <!-- End Navigation -->

    <!-- Body -->

    <a href="{{ route('view_bank') }}">Bank</a>
    <!-- End Body -->

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('home-js/home_index.js') }}"></script>
</body>

</html>
