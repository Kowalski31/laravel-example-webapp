@extends('layouts.home')

@section('title', 'Product detail')

@section('content')
<!-- Product Detail -->
    <div class="container mt-5">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6 border rounded shadow-sm">
                <div id="product-images" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if ($product->pictures && $product->pictures->isNotEmpty())
                            @foreach ($product->pictures as $index => $pic)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('images/' . $pic->link) }}" class="d-block w-100"
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
                <form method="POST" action="{{ route('addCart', $product->id) }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="number" name="quantity" class="form-control" placeholder="QTY" value="1"
                            min="1">
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

@endsection
