<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        
    }

    label {
        display: inline-block;
        width: 200px;
        padding: 20px;
        color: white !important;
    }

    input[type="text"]
    {
        width: 300px;
        height: 50px;
    }

    textarea {
        width: 450px;
        height: 100px;
    }

    .input_btn {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    
    </style>
</head>
<body>
    @include('admin.header')

    <!-- Sidebar Navigation -->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end -->

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            
            <h1 style="color:white; ">Update Product</h1>

            <div class="div_deg">

                <form action="{{ route('update_product', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $data->title }}">
                    </div>

                    <div>
                        <label>Description</label>
                        <textarea name="description" id="">{{ $data->description }}</textarea>
                    </div>

                    <div>
                        <label>Price</label>
                        <input type="text" name="price" value="{{ $data->price }}">
                    </div>

                    <div>
                        <label>Quantity</label>
                        <input type="text" name="quantity" value="{{ $data->quantity }}">
                    </div>

                    <div>
                        <label>Category</label>
                        <select name="category">
                            @foreach($category as $item)
                            <option value="{{ $item->category_name }}">
                                {{ $item->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label>Current Image</label>
                        <img height="120" width="120" src="/products/{{$data->image}}">
                    </div>

                    <div>
                        <label>New Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="input_btn">
                        <input class="btn btn-success" type="submit" value="Edit Product">
                    </div>
                </form>

            </div>


            </div>
        </div>
    </div>
  

  <!-- JavaScript files -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>