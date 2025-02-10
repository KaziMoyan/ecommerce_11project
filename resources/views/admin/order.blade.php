<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        table {
            border: 2px solid rgb(56, 133, 164);
            text-align: center;
            color: black;
        }

        th {
            background-color: rgb(0, 0, 0);
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: rgb(21, 237, 53);
        }

        td {
            color: rgb(0, 0, 0);
            padding: 10px;
            border: 1.5px solid rgb(0, 0, 0);
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="table_center">
                    <table id="orderTable">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Print PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->rec_address}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->product->title}}</td>
                                <td>{{$data->product->price}}</td>
                                <td>
                                    <img width="150" src="products/{{$data->product->image}}">
                                </td>
                                <td>
                                    @if($data->status == 'in progress')
                                    <span style="color: red">{{$data->status}}</span>
                                    @elseif($data->status == 'On The Way')
                                    <span style="color: skyblue">{{$data->status}}</span>
                                    @else
                                    <span style="color: green">{{$data->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the Way</a>
                                    <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#orderTable').DataTable();
        });
    </script>
</body>
</html>
