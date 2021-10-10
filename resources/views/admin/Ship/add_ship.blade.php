@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <form>
            @csrf
            <div class="card">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">{{__('Add Shipping fee')}}</h4>
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
                        <label class="col-sm-2 col-form-label">{{__('Choose the city')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="form-control input-sm m-bot15 choose city" name="city" id="city">
                                    <option value="">-----{{__('Choose the city')}}-----</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Select District')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select name="province" id="province"
                                        class="form-control input-sm m-bot15 choose province">
                                    <option value="">-----{{__('Select District')}}-----</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Select Commune/Ward')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">-----{{__('Select Commune/Ward')}}-----</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Shipping Fee')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control fee_ship" type="text" name="fee_ship"
                                       placeholder="{{__('Enter Shipping Fee')}}..."/>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <center>
                            <button type="button" class="btn btn-rose add_ship"
                                    name="add_ship">{{__('Add Shipping Fee')}}</button>
                        </center>
                    </div>
        </form>
        <div id="load_delivery">

        </div>
    </div>
@endsection
