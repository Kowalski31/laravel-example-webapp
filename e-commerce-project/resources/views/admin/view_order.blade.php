<!DOCTYPE html>
<html>
<head>
  @include('admin.css')

  <style type="text/css">
    table {
        font-family: Arial, sans-serif;
        text-align: centerl;
        align-items: center;
        border: 2px solid rgb(65, 207, 194);
        
    }

    th {
        background-color: #04AA6D;
        border: 1px solid rgb(65, 207, 194);
        color: white;
        padding: 10px;
        font-size: 20px;
        text-align: center;
    }

    td {
        border: 1px solid rgb(65, 207, 194);
        padding: 10px;
        color: white;
        text-align: center;
    }

    .table_center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
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

        <div class="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>

                @foreach($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->rec_address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>
                      <img style="width: 120px; height: 100px" src="/products/{{ $item->product->image }}" alt="">
                    </td>
                    <td>
                      @if($item->status == 'Delivered')
                      
                        <span style="color:skyblue;">{{ $item->status }}</span>
                      
                      @elseif($item->status == 'On The Way')
                        
                        <span style="color:yellow">{{ $item->status }}</span>
                      
                      @else
                        
                        <span style="color:red">{{ $item->status }}</span>
                      
                      @endif
                    </td>
                    <td>
                      <a class="btn btn-primary" href="{{ url('on_the_way', $item->id) }}">On The Way</a>
                      <a class="btn btn-success" href="{{ url('delivered', $item->id) }}">Delivered</a>
                    </td>
                </tr>
                @endforeach
            </table>
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