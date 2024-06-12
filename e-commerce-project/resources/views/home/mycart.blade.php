<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            background-color: black;
            color: white;
            font: 20px;
            font-weight: bold;
        }

        td {
            border: 1px solid skyblue;
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }        

    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->

    </div>
    <!-- end hero area -->

    <div class="div_deg">
        <table>
            <tr>
                <th>Product Title</th>

                <th>Price</th>

                <th>Image</th>

                <th>Remove</th>
            </tr>

            <?php 
                $value = 0;
            ?>

            @foreach($cart as $item)
            <tr>
                <td>{{ $item->product->title }}</td>
                
                <td>{{ $item->product->price }}</td>
                
                <td><img width="150px" src="/products/{{ $item->product->image }}" alt=""></td>

                <td><a class="btn btn-danger" href="{{ route('delete_cart', $item->id) }}">Remove</a></td>
            </tr>

            <?php 
                $value = $value + $item->product->price;    
            ?>
            @endforeach
        </table>
    </div>

    <div class="cart_value">
        <h3>Total Value of Cart is: ${{$value}}</h3>
    </div>
    <!-- info section -->
    @include('home.footer')
</body>
</html>
