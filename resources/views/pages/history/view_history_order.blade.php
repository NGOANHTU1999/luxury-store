@extends('layout')
@section('content')
    <!-- Hero Section Begin -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ __('Order History') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row featured__filter">
                <div class="col-lg-12">
                    <h4 class="card-title ">{{__('Shipping Information')}}</h4>
                    <table class="table">
                        <thead class="text-primary">
                        <th>
                            {{__('Recipient Name')}}
                        </th>

                        <th>
                            {{__('Address')}}
                        </th>

                        <th>
                            {{__('Phone')}}
                        </th>

                        <th>
                            {{__('Email')}}
                        </th>

                        <th>
                            {{__('Payment Method')}}
                        </th>

                        <th>
                            {{__('Note')}}
                        </th>
                        </thead>

                        <tbody>
                        <tr class="table-warning">
                            <td>
                                {{$shipping->shipping_name}}
                            </td>

                            <td>
                                {{$shipping->shipping_address}}
                            </td>

                            <td>
                                {{$shipping->shipping_phone}}
                            </td>

                            <td>
                                {{$shipping->shipping_email}}
                            </td>

                            <td>@if($shipping->shipping_method==0) {{__('Online Payment')}} @else {{__('Cash Payments')}} @endif
                            </td>

                            <td>
                                {{$shipping->shipping_note}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12">
                    <h4 class="card-title ">{{__('Order Information')}}</h4>
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            {{__('No.')}}
                        </th>

                        <th>
                            {{__('Product Name')}}
                        </th>

                        <th>
                            {{__('Order Quantity')}}
                        </th>

                        <th>
                            {{__('Price')}}
                        </th>

                        <th>
                            {{__('Shipping Fee')}}
                        </th>

                        <th>
                            {{__('Promo Code')}}
                        </th>

                        <th>
                            {{__('Total')}}
                        </th>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                            $total=0;
                        @endphp
                        @foreach($order_details as $key => $details)
                            @php
                                $i++;
                                $subtotal = $details->product_price*$details->product_sales_quantity;
                                $total+=$subtotal ;
                            @endphp
                            <tr class="table-warning">
                                <td>
                                    {{$i}}
                                </td>

                                <td>
                                    {{$details->product_name}}
                                </td>

                                <td>
                                    {{$details->product_sales_quantity}}
                                </td>

                                <td>
                                    {{number_format($details->product_price,0,',','.').' '.'VNĐ'}}
                                </td>

                                <td> {{number_format($details->product_feeship,0,',','.').' '.'VNĐ'}}</td>

                                <td>
                                    @if($details->product_coupon!='no')
                                        {{$details->product_coupon}}
                                    @else
                                         {{__('No Promo Code')}}
                                    @endif
                                </td>

                                <td>
                                    {{number_format($details->product_price*$details->product_sales_quantity,0,',','.').' '.'VNĐ'}}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            @if($coupon_condition == 0)
                                @php
                                    $total_after_coupon = ($total*$coupon_number)/100;
                                    echo '<div class = "badge badge-pill badge-success">Total Decrease : '.number_format($total_after_coupon,0,',','.').' '.'VNĐ</div>' ;
                                    $total_coupon =  $total - $total_after_coupon;
                                @endphp
                            @else
                                @php
                                    echo '<div class = "badge badge-pill badge-success">Total Decrease : '.number_format($coupon_number,0,',','.').' '.'VNĐ</div>' ;
                                    $total_coupon =  $total - $coupon_number;
                                @endphp
                            @endif
                        </tr>

                        <div class="badge badge-pill badge-info">{{__('Shipping Fee')}}
                            : {{number_format($details->product_feeship,0,',','.').' '.'VNĐ'}}</div>

                        <div class="badge badge-pill badge-danger">{{__('Total Payments')}}
                            : {{number_format($total_coupon+$details->product_feeship,0,',','.').' '.'VNĐ'}}</div>
                </div>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
    <!-- Featured Section End -->
@endsection
