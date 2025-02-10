<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('home.css')
    <style type="text/css">

    .div_center{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 50px;
    }
    table{
        border: 3px solid rgb(14, 14, 15);
        text-align: center;
        width: 800px;

    }
    th{
        border:2px solid seagreen;
        background-color: rgb(247, 244, 244);
        color: wheat
        font-size: 19px;
        font-weight: bolder;
        text-align: center;
    } 
    td{
        border: 3px solid skyblue;
        padding: 10px;
    }

    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
    
    
        <!-- end slider section -->
      </div>

      <div class="div_center">
        <table>
            <tr>
                <th>Product name </th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image </th>
            </tr>
            @foreach ($order as $order )
                
          
            <tr>
                <th>{{$order->product->title}}</th>
                <th>{{$order->product->price}}</th>
                <th>{{$order->status}}</th>
                <th>
                    <img height="100" width="100"  src="/products/{{$order->product->image}}">
                </th>
                
            </tr>

            @endforeach
        </table>
      </div>

      @include('home.footer')

</body>
</html>