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
    <title>Admin Dashboard</title>

    <style>
        
    </style>
</head>

<body>
    @include('admin.header')

    <div class="main-body">
        @include('admin.sidebar')

        <div class="main-content p-3 ">
            <!-- Button trigger modal -->


            <div class="container mt-4 d-flex justify-content-center">

                <div class="d-flex align-items-center">

                    <button type="button" class="btn btn-primary btn-lg me-3" data-bs-toggle="modal"
                        data-bs-target="#addProductModal">
                        Add Product
                    </button>

                    <form action="{{ route('filterProduct') }}" method="POST" class="d-flex">
                        @csrf
                        <div class="input-group">
                            <select class="form-select" id="category" name="category">
                                <option value="">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title position-absolute" id="addProductModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addProductForm" method="post" action="{{ route('addProduct') }} "
                                enctype="multipart/form-data">
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

                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control" id="category" name="categories[]" multiple required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="images" class="form-label">Product Images</label>
                                    <input type="file" class="form-control" id="images" name="images[]"
                                        multiple>
                                </div>

                                <div class="row" id="image-preview"></div>

                                <button type="submit" class="btn btn-primary ">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <div class="container mt-4 border border-1 border-dark p-1 rounded shadow">

                <table class="table table-hover ">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th class="text-center">Gallery</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $item)
                            <tr class="">
                                <td scope="col-2">{{ $item->id }}</td>
                                <td scope="col-2">{{ $item->title }}</td>
                                <td scope="col-2">{{ $item->description }}</td>
                                <td scope="col-2">{{ $item->price }}</td>
                                <td scope="col-2">{{ $item->quantity }}</td>
                                <td scope="col-2">
                                    @foreach ($item->categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </td>

                                <td scope="col-2">
                                    <div class="row d-flex justify-content-evenly">
                                        @foreach ($item->pictures as $image)
                                            {{-- {{dd($image)}} --}}
                                            <div class="col-md-3 mb-3 ">
                                                <img src="{{ asset('images/' . $image->link) }}"
                                                    class="card-img-top image-preview" alt="Image Preview">
                                            </div>
                                        @endforeach
                                    </div>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-secondary custom-btn "
                                        data-bs-toggle="modal"
                                        data-bs-target="#editProductModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                </td>

                                <!-- Edit Product Modal -->
                                <div class="modal fade " id="editProductModal-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="editProductModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title position-absolute" id="editProductModalLabel">
                                                    Edit
                                                    Product</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <form id="editProductForm-{{ $item->id }}" method="post"
                                                    action="{{ route('editProduct', $item->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title"
                                                            name="title" value="{{ $item->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description"
                                                            class="form-label">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $item->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="number" class="form-control" id="price"
                                                            name="price" step="0.01"
                                                            value="{{ $item->price }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantity" class="form-label">Quantity</label>
                                                        <input type="number" class="form-control" id="quantity"
                                                            name="quantity" value="{{ $item->quantity }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="category" class="form-label">Category</label>
                                                        <select class="form-control" id="category"
                                                            name="categories[]" multiple required>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ in_array($category->id, $item->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="images" class="form-label">Product
                                                            Images</label>
                                                        <input type="file" class="form-control" id="images"
                                                            name="images[]" multiple>
                                                    </div>



                                                    <button type="submit" class="btn btn-primary ">Edit
                                                        Product</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Edit Modal -->

                                <td>
                                    <a class="btn btn-danger custom-btn" onclick="confirmation(event)"
                                        href="{{ route('deleteProduct', $item->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-end">

                    {{ $products->links() }}

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

    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = ''; // Clear the previous images

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.classList.add('col-md-3', 'mb-3');
                    col.innerHTML = `
                        <div class="card">
                            <img src="${e.target.result}" class="card-img-top image-preview" alt="Image Preview">
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-danger btn-sm remove-image" data-index="${index}">Delete</button>
                            </div>
                        </div>
                    `;
                    previewContainer.appendChild(col);

                    // Re-bind the delete button event
                    col.querySelector('.remove-image').addEventListener('click', function() {
                        const dt = new DataTransfer();
                        Array.from(files).forEach((file, i) => {
                            if (i != index) {
                                dt.items.add(file);
                            }
                        });
                        document.getElementById('images').files = dt.files;
                        col.remove();
                    });
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>

</html>
