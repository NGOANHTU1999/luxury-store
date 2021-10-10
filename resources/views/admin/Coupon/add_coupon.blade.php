@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <form action="{{URL::to('/save-coupon')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="card">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">{{__('Add Promo Code')}}</h4>
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
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Promo Code Name')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="coupon_name"
                                       placeholder="{{__('Enter Promo Code Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Promo Code')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="coupon_code" class="form-control"
                                       placeholder="{{__('Enter Promo Code')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Quantity of Promo Codes')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="coupon_qty"
                                       placeholder="{{__('Enter Quantity of Promo Codes')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Start Time')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" id="startcoupon" type="text" name="coupon_date_start"
                                       placeholder="{{__('Enter Start Time')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('End time')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" id="endcoupon" type="text" name="coupon_date_end"
                                       placeholder="{{__('Enter End Time')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Code Features')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round"
                                        name="coupon_condition">
                                    <option value="0">{{__('Percentage Discount %')}}</option>
                                    <option selected value="1">{{__('Discount By Money')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Value of Promo code')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="coupon_number"
                                       placeholder="{{__('Enter Reduced value')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <center>
                            <button type="submit" class="btn btn-rose"
                                    name="add_coupon">{{__('Add Promo Code')}}</button>
                        </center>
                    </div>
        </form>
    </div>
@endsection
