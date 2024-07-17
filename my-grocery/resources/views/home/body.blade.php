<!-- Main Content -->
<main class="container my-4">
    <!-- Featured Products -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h3>Featured Products</h3>
        </div>
    </div>

    <div class="row featured-products">
        @foreach ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100 product-card" data-product-id="{{ $product->id }}">
                    <div class="card-img-top-wrapper"> <img src="./images/{{ $product->pictures->first() ? $product->pictures->first()->link : 'temp.png' }}"
                            class="card-img-top" alt="{{ $product->title }}">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">${{ $product->price }}</p>
                        <a href="#" class="btn btn-primary add-to-cart-btn">Add to Cart</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
