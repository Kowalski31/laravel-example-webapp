<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.css" integrity="sha512-YEwcgX5JXVXKtpXI4oXqJ7GN9BMIWq1rFa+VWra73CVrKds7s+KcOfHz5mKzddIOLKWtuDr0FzlTe7LWZ3MTXw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    @include('admin.header')

    <div class="main-body">
        @include('admin.sidebar')

        <div class="main-content">
            <h1 style="color: white">Categories</h1>
        </div>
    </div>
        

    <script src="{{ asset('admin-css/js/index.js') }}"></script>
    
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.js" integrity="sha512-3BIgFs7OIA76S6nx4QMAiSPlGXgCN+eITFIY6q0q0sFPxkuVzVXy0Vp/yQfXP3wyf+DmRpHRzEw3fQc/yrhk4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>


</html>