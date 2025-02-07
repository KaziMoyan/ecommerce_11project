<!DOCTYPE html>
<html>
  <head> 
    @include("admin.css")
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- jQuery (Required for Toastr) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Flasher Toastr -->
@flasher_render

  </head>
  <body>
    
    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            @include('admin.body')



          </div>
      </div>
    </div>
    <!-- jQuery (Required for Toastr) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>