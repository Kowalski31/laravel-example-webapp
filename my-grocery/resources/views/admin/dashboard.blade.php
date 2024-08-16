
@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.css"
        integrity="sha512-YEwcgX5JXVXKtpXI4oXqJ7GN9BMIWq1rFa+VWra73CVrKds7s+KcOfHz5mKzddIOLKWtuDr0FzlTe7LWZ3MTXw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    {{-- yield css field --}}
@endsection


@section('content')
    @include('admin.body')
@endsection


@section('scripts')
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.js"
    integrity="sha512-3BIgFs7OIA76S6nx4QMAiSPlGXgCN+eITFIY6q0q0sFPxkuVzVXy0Vp/yQfXP3wyf+DmRpHRzEw3fQc/yrhk4w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        window.productName = @json($top_products_name);
        window.productQuantity = @json($top_products_quantity);
    </script>

    <script src="{{ asset('admin-css/js/index.js') }}"></script>
@endsection
