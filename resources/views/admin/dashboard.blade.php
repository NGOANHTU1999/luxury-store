@extends('admin_layout')
@section('admin_content')
    <h3>{{__('Order Number Statistics')}}</h3>
    <form autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-icon">
                            <i class="material-icons">today</i>
                        </div>
                        <h4 class="card-title">{{__('From Date')}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <input type="text" class="form-control datepicker" id="datepicker"
                                   value="{{__('Choose Date')}}">
                        </div>
                    </div>
                </div>
                <input type="button" id="btn-dashboard-filter" class="btn btn-dribbble" value="{{__('Filter Results')}}">
            </div>
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-icon">
                            <i class="material-icons">today</i>
                        </div>
                        <h4 class="card-title">{{__('To Date')}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <input type="text" id="datepicker2" class="form-control datepicker2"
                                   value="{{__('Choose Date')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <h4 class="card-title">{{__('Filter By')}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <select class="dashboard-filter selectpicker form-control"
                                    data-style="select-with-transition" title="{{__('Choose Filter')}}">
                                <option value="7ngayqua">{{__('the past 7 days')}}</option>
                                <option value="thangtruoc">{{__('last month')}}</option>
                                <option value="thangnay">{{__('this month')}}</option>
                                <option value="365ngayqua">{{__('365 days ago')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="col-sm-12 text-center">
        <div id="chart" style="height: 250px;"></div>
    </div>

    <h3>{{__('Statistical Access')}}</h3>
    <br>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">{{__('Online')}}</p>
                    <h3 class="card-title">{{$visiter_count}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">{{__('In this week')}}</p>
                    <h3 class="card-title">{{$visiter_tuan_count}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">{{__('This month')}}</p>
                    <h3 class="card-title">{{$visiter_thang_count}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">{{__('Total Access')}}</p>
                    <h3 class="card-title">{{$visiter_total_count}}</h3>
                </div>
            </div>
        </div>
    </div>
    <h3>{{__('Statistics Total Products, Posts, Products')}}</h3>
    <div class="row">
        <div class="col-md-4">
            <h3>Donut Chart</h3>
            <center>
                <div id="donut" style="height: 300px;width: 250px;"></div>
            </center>
        </div>
        <div class="col-md-4">
            <h3>{{__('Top Viewed Posts')}}</h3>
            <ol style="color: red">
                @foreach($post_view as $key =>$p)
                    <li>
                        <a style="color: #ffffff;font-size: 16px;"
                           href="{{URL::to('bai-viet/'.$p->post_slug)}}">{{$p->post_title}}</a>| <span
                            style="color: red;font-size: 16px;">({{$p->post_views}} view)</span>
                    </li>
                @endforeach
            </ol>
        </div>
        <div class="col-md-4">
            <h3>{{__('Top Viewed Products')}}</h3>
            <ol style="color: red">
                @foreach($product_view as $key =>$pro)
                    <li>
                        <a style="color: #ffffff;font-size: 16px;"
                           href="{{URL::to('chi-tiet-san-pham/'.$pro->product_slug)}}">{{$pro->product_name}}</a>| <span
                            style="color: red;font-size: 16px;">({{$pro->product_views}} view)</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
    <h3>{{__('New Post')}}</h3>
    <br>
    <div class="row" style="height: 400px;">
        @foreach($post_new as $key => $new)
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-header card-header-image" data-header-animation="true">
                        <a href="#pablo">
                            <img class="img" height="200" width="300"
                                 src="{{asset('public/upload/post/'.$new->post_image)}}" alt="{{$new->post_slug}}">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card-actions text-center">
                            <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                <i class="material-icons">build</i> {{__('Edit Image!')}}
                            </button>
                            <a type="button" href="{{URL::to('bai-viet/'.$new->post_slug)}}"
                               class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a type="button" href="{{URL::to('/edit-post/'.$new->post_id)}}"
                               class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                                <i class="material-icons">edit</i>
                            </a>
                            <a type="button" href="{{URL::to('/delete-post/'.$new->post_id)}}"
                               class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Delete">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                        <h4 class="card-title">
                            <a href="{{URL::to('bai-viet/'.$new->post_slug)}}">{{$new->post_title}}</a>
                        </h4>
                    </div>
                    <div class="card-footer">
                        <div class="price">
                            <h4 style="color: #ec407a;">Views: {{$new->post_views}}</h4>
                        </div>
                        <div class="stats">
                            <h4 style="color: #ec407a;" class="card-category"><i class="material-icons">description</i>
                                Status : <?php
                                if ($new->post_status == 0) {

                                ?>
                                {{__('Hide')}}
                                <?php
                                }else{
                                ?>
                                {{__('Display')}}
                                <?php
                                }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
