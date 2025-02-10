<!-- Header Section Starts -->
<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="index.html">
      <span>YoUr SHoP</span>
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link btn active" href="{{url('dashboard')}}">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" href="{{url('shop')}}">
            Shop
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" href="{{url('about')}}">
            About Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" href="{{url('testimonial')}}">
            Testimonial
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" href="{{url('contact')}}">
            Contact Us
          </a>
        </li>
      </ul>
      <div class="user_option">
        @if (Route::has('login'))
        @auth
        <a href="{{url('myorders')}}" class="btn">
          Orders
        </a>
        <a href="{{ url('mycart') }}" class="btn">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          [{{$count}}]
        </a>
        <form method="POST" action="{{ route('logout') }}" class="form-inline d-inline-block">
          @csrf
          <button type="submit" class="btn">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
          </button>
        </form>
        @else
        <a href="{{ url('/login') }}" class="btn">
          <i class="fa fa-user" aria-hidden="true"></i> Login
        </a>
        <a href="{{ url('/register') }}" class="btn">
          <i class="fa fa-vcard" aria-hidden="true"></i> Register
        </a>
        @endauth
        @endif
      </div>
    </div>
  </nav>
</header>
<!-- Header Section Ends -->

<!-- Styles -->
<style>
  /* General Button Styling */
  .navbar-nav .nav-link,
  .user_option .btn {
    margin: 5px;
    padding: 12px 20px; /* Adjusted padding for consistent button size */
    font-size: 1rem;
    font-weight: 600;
    color: white;
    text-align: center;
    border-radius: 5px;
    background: linear-gradient(90deg, #ff8a00, #e52e71);
    border: none;
    transition: all 0.4s ease-in-out;
    box-shadow: 0 4px 10px rgba(255, 138, 0, 0.5);
    display: inline-block;
  }

  /* Hover Effect */
  .navbar-nav .nav-link:hover,
  .user_option .btn:hover {
    transform: translateY(-2px);
    background: linear-gradient(90deg, #e52e71, #ff8a00);
    box-shadow: 0 6px 15px rgba(255, 138, 0, 0.7);
  }

  /* Active Button Styling */
  .navbar-nav .nav-link.active {
    background: linear-gradient(90deg, #e52e71, #ff8a00);
    box-shadow: 0 6px 12px rgba(255, 138, 0, 0.7);
    transform: scale(1.08);
  }

  /* Uniform Button Spacing */
  .navbar-nav .nav-item,
  .user_option .btn {
    margin: 5px; /* Equal spacing between all buttons */
  }

  /* Inline Form Adjustment */
  .form-inline.d-inline-block {
    display: inline-block;
    margin: 0;
  }
</style>
