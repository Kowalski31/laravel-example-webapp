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
            <!-- Button trigger modal -->
            <div class="container mt-4 d-flex justify-content-center">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                    data-bs-target="#addProductModal">
                    Add Product
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title position-absolute" id="addProductModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addProductForm" method="post" action="{{ route('add_product') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        step="0.01" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                </div>
                                <button type="submit" class="btn btn-primary ">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <div class="container mt-4 border border-1 border-dark p-1 rounded shadow">

                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>Product 1 Description</td>
                            <td>100</td>
                            <td>10</td>
                            <td>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#editProductModal">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteProductModal">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin-css/js/index.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlHXlT6v3rHk6goR6yFc9b5b9g5FOHpZHIuNayp29Gp4ILM9B8Gh0phIImE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
