<!DOCTYPE html>
<html>
<head>
  @include('admin.css')

  <style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }

    .table_deg {
        border: 2px solid yellowgreen;
    }

    th 
    {
        background-color: skyblue;
        color: white;
        font-size: 19px;
        font-weight: bold;
        padding: 15px;
    }

    td {
        border: 1px solid skyblue;
        text-align: center;
        color: while;
        padding: 15px;
        font-size: 18px;
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
        
        <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Product Tilte</th>
                    
                    <th>Description</th>
                    
                    <th>Category</th>
                    
                    <th>Price</th>

                    <th>Quantity</th>
                    
                    <th>Image</th>  
                    
                    <th>Delete</th>
                </tr>
                
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->title }}</td>

                    <td>{!!Str::words($item->description, 50)!!}</td>
                    
                    <td>{{ $item->category }}</td>
                    
                    <td>{{ $item->price }}</td>
                    
                    <td>{{ $item->quantity }}</td>
                    
                    <td>
                        <img height="120" width="120" src="products/{{ $item->image }}" alt="">
                    </td>

                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{ route('delete_product', $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                
            </table>

            
        </div>  

        <div class="div_deg">
            {{ $data->onEachSide(1)->links() }}
        </div>
        
      </div>
    </div>
  </div>
  
  <script>
    function confirmation(event)
    {
      event.preventDefault();

      var urlToRedirect = event.currentTarget.getAttribute('href');

      console.log(urlToRedirect);

      swal({
        title: "Are You Sure to Delete This",
        text: "this delete will be permanent",
        icon: "warning",
        buttons: true,
        dangerMode: true
      })
      .then((willCancel) => {
        if (willCancel) {
          window.location.href = urlToRedirect;
        }
      });

    }
  </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
      integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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