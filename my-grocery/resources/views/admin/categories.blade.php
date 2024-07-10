<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Apex Charts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.css"
        integrity="sha512-YEwcgX5JXVXKtpXI4oXqJ7GN9BMIWq1rFa+VWra73CVrKds7s+KcOfHz5mKzddIOLKWtuDr0FzlTe7LWZ3MTXw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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


            <div class="container mt-5 border border-1 border-dark p-2 rounded shadow">
                <form class="mb-5" method="post" action="{{ route('add_category') }}">
                    @csrf
                    <div class="mb-3 row d-flex align-items-center">
                        <label for="categoryName" class="col-sm-2 col-form-label fs-3 ">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="categoryName"
                                placeholder="Enter Category Name" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>

                <table class="table table-hover ">
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

                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal-{{ $item->id }}">
                                        Edit
                                    </button>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="confirmationModal-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title position-absolute" id="exampleModalLabel">
                                                        Update Category Name</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ route('edit_category', $item->id) }}"
                                                        id="editCategoryForm-{{ $item->id }}">
                                                        @csrf
                                                        <div class="mb-3 row d-flex">
                                                            <label for="categoryName"
                                                                class="col-sm-2 col-form-label fw-bolder fs-6">New
                                                                Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="name"
                                                                    class="form-control"
                                                                    id="categoryName {{ $item->id }}"
                                                                    placeholder="Enter Category Name"
                                                                    value="{{ $item->name }}" required>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-secondary"
                                                        form="editCategoryForm-{{ $item->id }}">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- End Edit Modal -->
                                </td>

                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event)"
                                        href="{{ route('delete_category', $item->id) }}">Delete</a>
                                </td>


                            </tr>

                            
                        @endforeach
                    </tbody>

                </table>



            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- Sweetalert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin-css/js/category.js') }}"></script>

    
</body>

</html>
