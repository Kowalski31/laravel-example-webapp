@extends('layouts.home')

@section('title', 'Welcome')

@section('content')

    <!-- Featured Products -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h3>Featured Products</h3>
        </div>

        {{-- <div class="col-md-5">
            <form action="{{ route('filterProductHome') }}" method="GET" class="d-flex">
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
        </div> --}}

    </div>

    <div class="row featured-products">
        @foreach ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100 product-card" data-product-id="{{ $product->id }}">
                    <div class="card-img-top-wrapper">
                        <img src="./images/{{ $product->pictures->first() ? $product->pictures->first()->link : 'temp.png' }}"
                            class="card-img-top" alt="{{ $product->title }}">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">${{ $product->price }}</p>
                        <form action="{{ route('addCart', $product->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">

                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
    </div>
@endsection
