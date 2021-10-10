@extends('layout')
@section('content')
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>{{__('Your Cart')}}</h2>
                        <br>
                        <br>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {!! session()->get('message') !!}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {!! session()->get('error') !!}
                            </div>
                        @endif
                    </div>
                    <div class="shoping__cart__table">
                        {{-- lấy ra những gì đã thềm vào giỏ hàng --}}
                        {{-- <?php
                        $content = Cart::content();

                        ?> --}}
                        {{--  --}}
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">{{__('Product')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Quantity')}}</th>
                                <th>{{__('Total')}}</th>
                                <th><a class="site-btn" type="submit"
                                       href="{{URL::to('/delete-all-cart')}}">{{__('Delete All')}}</a></th>
                            </tr>
                            </thead>
                            <form action="{{URL::to('/update-cart')}}" method="POST">
                                {{csrf_field()}}
                                <tbody>

                                @php
                                    $total = 0;
                                @endphp
                                @if(Session::get('cart')==true)
                                    @foreach(Session::get('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total+=$subtotal;
                                        @endphp
                                        {{--  @foreach($content as $v_content) --}}
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{URL::to('public/upload/product/'.$cart['product_image'])}}"
                                                     width="100px" height="100px" alt="">
                                                <h5>{{$cart['product_name']}}</h5>

                                            </td>
                                            <td class="shoping__cart__price">
                                                {{number_format($cart['product_price'],0,',','.')}}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="buttons_added">
                                                    <input class="minus is-form" type="button" value="-"/>

                                                    <input name="cart_qty[{{$cart['session_id']}}]" class="input-qty"
                                                           max="1000" min="1" type="number"
                                                           value="{{$cart['product_qty']}}"/>


                                                    <input class="plus is-form" type="button" value="+"/>
                                                    <input class="site-btn" type="submit" name="update_qty"
                                                           value="{{__('Update')}}">
                                                </div>

                                            </td>
                                            <td class="shoping__cart__total">
                                                {{number_format($subtotal,0,',','.')}}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a class="fa fa-trash-o"
                                                   href="{{URL::to('/delete-cart/'.$cart['session_id'])}}"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </form>
                            @else
                                <td style="color: white" colspan="5">
                                    <center>
                                        @php
                                            echo "Your Cart is Empty!";
                                        @endphp
                                    </center>
                                </td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{URL::to('/trang-chu')}}" class="primary-btn cart-btn">{{__('Continue Shopping')}}</a>
                    </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>{{__('Promo Code')}}</h5>
                            @if(Session::get('cart'))
                                <form action="{{URL::to('/check-coupon')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="text" placeholder="Enter your coupon code" name="coupon"
                                    >
                                    <button type="submit" style="text-align: center;" class="site-btn"
                                            name="check_coupon">{{__('Add')}}</button>
                                    <a class="site-btn" style="text-align: center;"
                                       href="{{URL::to('/unset-coupon')}}">{{__('Delete')}}</a>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>{{__('Total Cart Money')}}</h5>
                        <ul>
                            <li>{{__('Product Price')}}<span>{{number_format($total,0,',','.').' '.'VNĐ'}}</span></li>
                        </ul>

                        <ul>
                            <li>{{__('Total')}}<span>{{number_format($total,0,',','.').' '.'VNĐ'}}</span></li>
                        </ul>
                        <ul>
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key =>$cou)
                                    @if($cou['coupon_condition']==0)
                                        <ul>
                                            <li>{{__('Promo Code')}}: <span>{{$cou['coupon_number']}} %</span></li>
                                        </ul>
                                        @php
                                            $total_coupon = ($total * $cou['coupon_number'])/100;
                                            echo '<li>Total Decrease:<span>'.number_format($total_coupon,0,',','.').' '.'VNĐ</span></li>';

                                        @endphp

                                    @else
                                        <ul>
                                            <li>{{__('Promo Code')}}: <span>{{$cou['coupon_number']}} VNĐ</span></li>
                                        </ul>
                                        @php
                                            $total_coupon = $total - $cou['coupon_number'];
                                            echo '<li>Total Decrease:<span>'.number_format($total_coupon,0,',','.').' '.'VNĐ</span></li>';
                                        @endphp

                                    @endif
                                @endforeach
                            @endif
                        </ul>
                        {{-- kiểm tra id khách hàng nếu chưa bắt đăng nhập --}}
                        <?php
                        $customer_id = Session::get('customer_id');
                        if ($customer_id != NULL) {

                        ?>
                        <a href="{{URL::to('/checkout')}}" class="primary-btn">{{__('Confirm')}}</a>
                        <?php
                        }else{
                        ?>

                        <a href="{{URL::to('/login-checkout')}}" class="primary-btn">{{__('Confirm')}}</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
