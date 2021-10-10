@extends('layout')
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>{{__('Payments Information')}}</h2>
                    </div>
                    <h6><span class="icon_tag_alt"></span>{{__('With Promo Code ?')}} <a
                            href="{{URL::to('/gio-hang')}}">{{__('Click Here ?')}}</a> {{__('To Enter Your Code')}}
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>{{__('First and Last name')}}<span>*</span></p>
                                        <input type="text" placeholder="{{__('Please enter your first and last name')}}"
                                               id="shipping_name" name="shipping_name" class="shipping_name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>{{__('City')}}<span>*</span></p>
                                <input type="text" placeholder="{{__('Please add city')}}" name="shipping_city"
                                       class="shipping_city">
                            </div>
                            <div class="checkout__input">
                                <p>{{__('Address')}}<span>*</span></p>
                                <input type="text" placeholder="{{__('House No., Neighborhood, Street Name, Ward/District')}}"
                                       class="shipping_address" name="shipping_address" id="shipping_address">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>{{__('Phone Number')}}<span>*</span></p>
                                        <input type="text" placeholder="{{__('Please enter the phone number')}}"
                                               id="shipping_phone" name="shipping_phone" class="shipping_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" placeholder="{{__('Please enter the email')}}"
                                               id="shipping_email" name="shipping_email" class="shipping_email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>{{__('Note')}}<span></span></p>
                                <input type="text" placeholder="{{__('Please enter the note')}}"
                                       name="shipping_note" class="shipping_note">
                            </div>
                            <div class="checkout__input__checkbox">
                                <p>{{__('Payment Methods')}}<span>*</span></p>
                                <label for="payment">
                                    {{ __('Payment by VNPAY')}}
                                    <input id="payment" type="radio" name="payment" class="payment" value="0">

                                    <img src="{{asset('public/frontend/image/payment2.png')}}" width="40px"
                                         height="30px">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    {{ __('Payment by Cash') }}
                                    <input id="paypal" checked="checked" type="radio" name="payment" class="payment"
                                           value="1">

                                    <img src="{{asset('public/frontend/image/payment1.png')}}" width="30px"
                                         height="30px">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key => $cou)
                                    <input type="hidden" name="order_coupon" class="order_coupon"
                                           value="{{$cou['coupon_code']}}">
                                @endforeach
                            @else
                                <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                            @endif
                            <div class="shoping__cart__btns">
                                <a href="{{URL::to('/trang-chu')}}"
                                   class="primary-btn cart-btn">{{__('Continue Shopping')}}</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <center>
                                    <h4>{{__('Shipping fee')}}</h4>
                                    <form>
                                        @csrf
                                        <div class="">
                                            <label class="">{{__('Choose the city')}}</label>
                                            <div>
                                                <select class="form-control input-sm m-bot15 choose city" name="city"
                                                        id="city">
                                                    <option value="">-----{{__('Choose the city')}}-----</option>
                                                    @foreach($city as $key => $ci)
                                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="">
                                            <label class="">{{__('Select District')}}</label>
                                            <div>
                                                <select name="province" id="province"
                                                        class="form-control input-sm m-bot15 choose province">
                                                    <option value="">-----{{__('Select District')}}-----</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="">
                                            <label class="">{{__('Select Commune/Ward')}}</label>
                                            <div>
                                                <select name="wards" id="wards"
                                                        class=" form-control input-sm m-bot15 wards">
                                                    <option value="">-----{{__('Select Commune/Ward')}}-----</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if(Session::get('customer_id'))
                                            @if(Session::get('cart'))
                                                <button name="calculate" type="button"
                                                        class="site-btn calculate">{{__('Confirm')}}</button>
                                            @else
                                                <button name="null-cart" type="button"
                                                        class="site-btn null-cart">{{__('Confirm')}}</button>
                                            @endif
                                        @else
                                            <button name="null-customer" type="button"
                                                    class="site-btn null-customer">{{__('Confirm')}}</button>
                                        @endif
                                    </form>
                                </center>

                            </div>
                            <div class="checkout__order">
                                <h4>{{__('Your Order')}}</h4>
                                <div class="checkout__order__products">{{__('Product')}}<span>Total</span></div>
                                @php
                                    $subtotal = 0;
                                    $total = 0;
                                @endphp
                                @if(Session::get('cart')==true)
                                    @foreach(Session::get('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total+=$subtotal;
                                        @endphp
                                        <ul>
                                            <div class="checkout__order__subtotal">{{$cart['product_name']}}
                                                <span>{{number_format($subtotal,0,',','.').' '.'VNĐ'}}</span></div>
                                        </ul>
                                    @endforeach
                                @endif
                                <div class="checkout__order__subtotal">{{__('Total')}}
                                    <span>{{number_format($total,0,',','.').' '.'VNĐ'}}</span></div>
                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key =>$cou)
                                        @if($cou['coupon_condition']==0)
                                            <div class="checkout__order__products"><a class="cart_quantity_delete"
                                                                                      href="{{url('/unset-coupon')}}"><i
                                                        class="fa fa-times"></i></a>{{__('Promo Code')}}: <span>{{$cou['coupon_number']}} %</span>
                                            </div>
                                            @php
                                                $total_after_coupon = ($total * $cou['coupon_number'])/100;
                                            @endphp
                                        @else
                                            <div class="checkout__order__products"><a class="cart_quantity_delete"
                                                                                      href="{{url('/unset-coupon')}}"><i
                                                        class="fa fa-times"></i></a>{{__('Promo Code')}}: <span>{{$cou['coupon_number']}} VNĐ</span>
                                            </div>
                                            @php
                                                $total_after_coupon = $total - $cou['coupon_number'];
                                            @endphp

                                        @endif
                                    @endforeach
                                @endif
                                @if(Session::get('fee'))
                                    <div class="checkout__order__products"><a class="cart_quantity_delete"
                                                                              href="{{url('/del-fee')}}"><i
                                                class="fa fa-times"></i></a>{{__('Shipping fee')}}: <span>{{number_format(Session::get('fee'),0,',','.')}} VNĐ</span>
                                    </div>
                                    <?php $total_after_fee = $total + Session::get('fee'); ?>
                                @endif
                                <div class="checkout__order__products">{{__('Total Remaining')}} :
                                    <span>
                                            @php
                                                if(Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total_after_fee;
                                                    echo number_format($total_after,0,',','.').' '.'VNĐ';
                                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    echo number_format($total_after,0,',','.').' '.'VNĐ';
                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    $total_after = $total_after + Session::get('fee');
                                                    echo number_format($total_after,0,',','.').' '.'VNĐ';
                                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total;
                                                    echo number_format($total_after,0,',','.').' '.'VNĐ';
                                                }

                                            @endphp
                                          </span>
                                </div>
                                @if(Session::get('customer_id'))
                                    @if(Session::get('fee'))
                                        <button type="button" class="send-order site-btn"
                                                name="send-order">{{__('Payment')}}</button>
                                    @else
                                        <button type="button" class="site-btn null-fee"
                                                name="null-fee">{{__('Payment')}}</button>
                                    @endif
                                @else
                                    <button type="button" class="site-btn null-customer"
                                            name="null-customer">{{__('Payment')}}</button>
                                @endif
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
