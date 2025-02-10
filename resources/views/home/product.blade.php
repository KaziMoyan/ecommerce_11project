<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Latest Products</h2>
    </div>
    <style>
      /* Box Styling */
      .box {
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background: #000;
        color: #fff;
        transition: transform 0.3s ease, background 0.3s ease;
        border: 5px solid transparent; /* Initially transparent border */
        position: relative;
        padding: 15px;
      }

      /* Border Color Animation */
      .box:hover {
        transform: translateY(-10px);
        background: #1a1a1a;
        color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        animation: border-color-change 2s linear infinite; /* Apply the animation on hover */
      }

      @keyframes border-color-change {
        0% {
          border-color: #ff0000; /* Red */
        }
        25% {
          border-color: #ff7300; /* Orange */
        }
        50% {
          border-color: #000; /* Black */
        }
        75% {
          border-color: #00ff3c; /* Green */
        }
        100% {
          border-color: #00d8ff; /* Blue */
        }
      }

      /* Title Color Change on Hover */
      .box:hover .detail-box h6 {
        color: #ffffff; /* White color when hovering over the product box */
      }

      .box .detail-box h6 {
        color: #211c1c; /* Default color for the title */
        transition: color 0.3s ease;
      }

      /* Image Hover Effect */
      .box .img-box img {
        border-radius: 10px;
        width: 100%;
        height: auto;
        transition: transform 0.3s ease, filter 0.3s ease, border 0.3s ease;
        filter: brightness(0.8);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Add shadow to the image */
        border: 5px solid transparent; /* Initially no border */
      }

      .box .img-box img:hover {
        transform: scale(1.1);
        filter: brightness(1.2);
        border: 5px solid #000; /* Black border on hover */
      }

      /* Button Styling */
      .box .btn {
        padding: 5px 12px;
        font-size: 0.75rem;
        border-radius: 5px;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-weight: bold;
        text-transform: uppercase;
        transition: transform 0.3s ease, background 0.3s ease, color 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center; /* Center text inside the button */
      }

      .btn-success {
        background: linear-gradient(90deg, #264653, #2a9d8f);
      }

      .btn-success:hover {
        background: linear-gradient(90deg, #8ecae6, #219ebc);
        color: #000;
        transform: scale(1.1);
      }

      .btn-primary {
        background: linear-gradient(90deg, #6a0572, #d81e5b);
      }

      .btn-primary:hover {
        background: linear-gradient(90deg, #ffbf69, #ff9f1c);
        color: #000;
        transform: scale(1.1);
      }

      /* Detail Box Styling */
      .box .detail-box {
        padding: 15px;
        text-align: center;
      }

      /* Adjust button spacing */
      .d-flex.gap-2 a {
        margin: 0 5px;
      }
    </style>

    <div class="row">
      @if($product->isEmpty())
        <p class="text-center">No products available.</p>
      @else
        @foreach($product as $products)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('products/' . $products->image) }}" alt="Image of {{ $products->title }}">
              </div>
              <div class="detail-box">
                <h6>{{ $products->title }}</h6>
                <h6>Price<span> ${{ number_format($products->price, 2) }}</span></h6>
              </div>
              <div class="d-flex justify-content-center gap-2" style="padding: 20px;">
                <a class="btn btn-success" href="{{ url('product_details', $products->id) }}">Details</a>
                <a class="btn btn-primary" href="{{ url('add_cart', $products->id) }}">Add to Cart</a>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
