<!DOCTYPE html>
<html>
<head>
    @include('home.css')

    <style type="text/css">
        .div_center 
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table 
        {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th 
        {
            border: 2px solid black;
            background-color: #04AA6D;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        td
        {
            border: 2px solid black;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->

        <div class="div_center">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>
                
                @foreach($order as $item)                
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <img style="width: 120px;" src="/products/{{ $item->product->image }}">
                    </td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
    
    

    <!-- info section -->
    @include('home.footer')
</body>
</html>
