@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>Customer Information</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td>{{$order_by_id->customer_name}}</td>
                                <td>{{$order_by_id->customer_phone}}</td>
                                <td>{{$order_by_id->customer_email}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>Shipping Information</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Recipient Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td>{{$order_by_id->shipping_name}}</td>
                                <td>{{$order_by_id->shipping_address}}</td>
                                <td>{{$order_by_id->shipping_phone}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>Order Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td>{{$order_by_id->product_name}}</td>
                                <td>{{$order_by_id->product_sales_quantity}}</td>
                                <td>{{$order_by_id->product_price}}</td>
                                <td>{{number_format($order_by_id->product_price*$order_by_id->product_sales_quantity).' '.'VNĐ'}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--js phân trang tìm kiếm-->

    {{-- <script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/backend/js/matrix.tables.js')}}"></script> --}}
@endsection
