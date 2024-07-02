<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.css" integrity="sha512-YEwcgX5JXVXKtpXI4oXqJ7GN9BMIWq1rFa+VWra73CVrKds7s+KcOfHz5mKzddIOLKWtuDr0FzlTe7LWZ3MTXw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/categories.css') }}" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    @include('admin.header')

    <div class="main-body">
        @include('admin.sidebar')

        <div class="main-content p-3 ">
            <h1 class="text-beige text-center">Category</h1>

            
                <div class="container mt-5">
                    <form class="mb-5" method="POST" action="{{ route('add_category') }}">
                        @csrf
                        <div class="mb-3 row d-flex">
                            <label for="categoryName" class="col-sm-2 col-form-label fs-3 ">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="categoryName" placeholder="Enter Category Name">
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>

                    <table class="table table-hover">
                        <thead class="table-warning">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>

                                    <td>
                                        {{-- {{ route('edit_category', $item->id) }} --}}
                                        <a class="btn btn-success" href="#">Edit</a>
                                    </td>
                                    
                                    <td>
                                        {{-- {{ route('delete_category', $item->id)}} --}}
                                        <a class="btn btn-danger" onclick="confirmation(event)" href="#">Delete</a>
                                    </td>

                                
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin-css/js/index.js') }}"></script>
    
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.js" integrity="sha512-3BIgFs7OIA76S6nx4QMAiSPlGXgCN+eITFIY6q0q0sFPxkuVzVXy0Vp/yQfXP3wyf+DmRpHRzEw3fQc/yrhk4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
