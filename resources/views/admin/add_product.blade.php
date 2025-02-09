<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style type="text/css">
        .page-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust as needed */
        }

        .form-container {
            width: 80%; /* Adjust width as needed */
            max-width: 800px; /* Max width for responsiveness */
            background-color: #110f0f; /* Example background color */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #f3f3f3;
            margin-bottom: 30px;
        }

        label {
            font-size: 18px;
            color: #555;
        }

        input[type='text'], input[type='number'], textarea, select, input[type='file'] {
            width: 100%;
            height: 50px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        input[type='text']:focus, input[type='number']:focus, textarea:focus, select:focus, input[type='file']:focus {
            border-color: skyblue;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .btn-success {
            width: 100%;
            height: 50px;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="form-container">
            <h1>Add Product</h1>

            <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" name="title" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" required>
                </div>

                <div class="form-group">
                    <label>Product Category</label>
                    <select name="category" required>
                        <option>Select an option</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image" required>
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Add Product">
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
