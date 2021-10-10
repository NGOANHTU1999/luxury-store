@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">{{__('Update Promo Code')}}</h4>
                </div>
                <span class="" style="margin-left: 800px;">
           <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="badge badge-pill badge-danger" >' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
         </span>
            </div>
            <br>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @foreach($edit_coupon as $key => $coupon)
                <form action="{{URL::to('/update-coupon',$coupon->coupon_id)}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="card-body ">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('Promo Code Name')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="coupon_name"
                                           value="{{$coupon->coupon_name}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('Promo Code')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="coupon_code" class="form-control"
                                           value="{{$coupon->coupon_code}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('Quantity of Promo Codes')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="coupon_qty"
                                           value="{{$coupon->coupon_qty}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('Start Time')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="startcoupon" type="text" name="coupon_date_start"
                                           value="{{$coupon->coupon_date_start}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('End time')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="endcoupon" type="text" name="coupon_date_end"
                                           value="{{$coupon->coupon_date_end}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('Code Features')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <select class="selectpicker" data-style="btn btn-primary btn-round"
                                            name="coupon_condition">
                                        @if($coupon->coupon_condition==0){
                                        <option selected value="0">{{__('Percentage Discount %')}}</option>
                                        <option value="1">{{__('Discount By Money')}}</option>
                                        }
                                        @else{
                                        <option value="0">{{__('Percentage Discount %')}}</option>
                                        <option selected value="1">{{__('Discount By Money')}}</option>
                                        }
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('Status')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <select class="selectpicker" data-style="btn btn-primary btn-round"
                                            name="coupon_status">
                                        @if($coupon->coupon_status==0){
                                        <option selected value="0">{{__('Hide')}}</option>
                                        <option value="1">{{__('Display')}}</option>
                                        }@else{
                                        <option value="0">{{__('Hide')}}</option>
                                        <option selected value="1">{{__('Display')}}</option>
                                        }
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('Value of Promo code')}} :</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="coupon_number"
                                           value="{{$coupon->coupon_number}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <center>
                                <button type="submit" class="btn btn-rose"
                                        name="update_coupon">{{__('Update Promo Code')}}</button>
                            </center>
                        </div>
                </form>
            @endforeach
        </div>
@endsection
