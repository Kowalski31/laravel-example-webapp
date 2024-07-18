<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produc Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <style>
        .carousel-item img {
            width: 800px; /* Set width as desired */
            height: 400px; /* Set height as desired */
            object-fit: contain; /* Ensure the image covers the container */
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Navigation -->
    @include('home.nav')
    <!-- Product Detail -->
    <div class="container mt-5">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6">
                <div id="product-images" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if ($product->pictures && $product->pictures->isNotEmpty())
                            @foreach ($product->pictures as $index => $pic)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('images/' . $pic->link) }}" class="d-block w-50"
                                        alt="Product Image">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img src="{{ asset('images/temp.png') }}" class="d-block w-100" alt="Default Image">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#product-images"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#product-images"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-md-6">
                <h2>{{ $product->title }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>

                <!-- Quantity and Add to Cart -->
                <form method="POST" action="{{ route('add_cart', $product->id) }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="number" name="quantity" class="form-control" placeholder="QTY" value="1" min="1">
                        <button class="btn btn-primary" type="submit">Add to Cart</button>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                </form>

                <!-- Categories -->
                <p>Category:</p>
                <ul>
                    @foreach ($product->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>

                <!-- Add to Wishlist and Compare -->
                <div>
                    <button class="btn btn-outline-secondary">Add to Wishlist</button>
                    <button class="btn btn-outline-secondary">Add to Compare</button>
                </div>

            </div>
        </div>

        <!-- Tabs Section -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description"
                            role="tab" aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                            aria-controls="reviews" aria-selected="false">Reviews</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="shipping-tab" data-bs-toggle="tab" href="#shipping" role="tab"
                            aria-controls="shipping" aria-selected="false">Shipping Information</a>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <p>Customer Reviews</p>
                    </div>
                    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                        <p>Shipping Information</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tabs Section -->
    </div>


    <!-- Footer -->
    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
