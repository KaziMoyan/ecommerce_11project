<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style type="text/css">
    .div_design {
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
      color: white;
      font-size: 20px;
      font-weight: bold;
      background-color: black;
    }

    td {
      border: 1px solid skyblue;
    }

    .cart_value {
      text-align: center;
      margin-bottom: 70px;
      padding: 18px;
    }

    label {
      display: inline-block;
      width: 150px;
    }

    .div_gap {
      padding: 20px;
    }

    /* Styling for receiver info box */
    .receiver-box {
      background-color: #f4f6f6;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      width: 100%;
      max-width: 600px;
      opacity: 0; /* Start with invisible */
      animation: fadeIn 1.5s forwards; /* Add animation */
    }

    /* Animation for fade-in effect */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .receiver-box input,
    .receiver-box textarea {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .receiver-box textarea {
      resize: vertical;
      height: 120px;
    }

    .btn-container {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .btn-container input,
    .btn-container a {
      width: 48%;
      padding: 12px;
      text-align: center;
      font-size: 16px;
      border-radius: 5px;
      text-decoration: none;
    }

    .btn-container input {
      background-color: #2980b9;
      color: white;
      border: none;
    }

    .btn-container a {
      background-color: #27ae60;
      color: white;
      display: inline-block;
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

  <div class="div_design">
    <div>
      <form action="{{url('confirm_order')}}" method="Post">
        @csrf
        <div class="receiver-box">
          <h3>Receiver Information</h3>
          <div class="div_gap">
            <label>Receiver Name</label>
            <input type="text" name="name" value="{{Auth::user()->name}}">
          </div>
          <div class="div_gap">
            <label>Receiver Address</label>
            <textarea name="address">{{Auth::user()->address}}</textarea>
          </div>
          <div class="div_gap">
            <label>Receiver Phone</label>
            <input type="text" name="phone" value="{{Auth::user()->phone}}">
          </div>
          <div class="btn-container">
            <input class="btn btn-primary" type="submit" value="Cash On Delivery">
            <a class="btn btn-success" href="">Pay using Card</a>
          </div>
        </div>
      </form>
    </div>

    <table>
      <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Remove</th>
      </tr>

      <?php
          $value= 0;
      ?>

      @foreach($cart as $cart)
      <tr>
        <td>{{$cart->product->title}}</td>
        <td>{{$cart->product->price}}</td>
        <td>
          <img width="150" src="/products/{{$cart->product->image}}" alt="">
        </td>
        <td>
          <button class="btn btn-danger" onclick="confirmDelete('{{url('delete_cart',$cart->id)}}')">Remove</button>
        </td>
      </tr>

      <?php
          $value= $value + $cart->product->price;
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
