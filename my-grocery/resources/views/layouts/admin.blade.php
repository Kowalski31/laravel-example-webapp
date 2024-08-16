<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @yield('css')
</head>
<body>

    @include('admin.header')

    <div class="main-body">
        @include('admin.sidebar')

        <div class="main-content p-3">
            @yield('content')
        </div>
    </div>


    @yield('scripts')
</body>
</html>
