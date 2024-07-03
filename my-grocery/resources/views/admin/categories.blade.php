<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                <form class="mb-5" method="post" action="{{ route('add_category') }}">
                    @csrf
                    <div class="mb-3 row d-flex">
                        <label for="categoryName" class="col-sm-2 col-form-label fs-3 ">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="categoryName"
                                placeholder="Enter Category Name">
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
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>

                                <td>
                                    {{-- {{ route('edit_category', $item->id) }} --}}
                                    <a class="btn btn-success" href="#">Edit</a>
                                </td>

                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event, {{ $item->id }})"
                                        href="{{ route('delete_category', $item->id) }}">Delete</a>
                                </td>


                            </tr>
                            
                            <!-- Modal -->
                            {{-- <div class="modal fade" id="confirmationModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this category?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <a id="confirmDeleteButton" class="btn btn-danger"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        @endforeach
                    </tbody>

                </table>

                

            </div>
        </div>
    </div>
    </div>

    

</body>

</html>
