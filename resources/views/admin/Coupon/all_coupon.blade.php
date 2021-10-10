@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-text">
                    <h4 class="card-title ">{{__('List Promo Code')}}</h4>
                </div>
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
            <br>
            <br>
            {{-- validate --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body table-full-width table-hover">
                <div class="table-responsive">
                    {{-- validate import ex --}}
                    @if(session()->has('failures'))
                        <div>
                            <table class="table table-danger">
                                <thead class="text-primary">
                                <th>{{__('Row Errors')}}</th>
                                <th>{{__('Error Column')}}</th>
                                <th>{{__('Error')}}</th>
                                <th>{{__('Value')}}</th>
                                </thead>
                                @foreach(session()->get('failures') as $erroo)
                                    <tr>
                                        <td>{{ $erroo->row() }}</td>
                                        <td>{{ $erroo->attribute() }}</td>
                                        <td>
                                            <ul>
                                                @foreach($erroo->errors() as $e)
                                                    <li>{{$e}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            {{ $erroo->values()[$erroo->attribute()] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    {{-- validate import ex --}}
                    <table class="table">
                        <thead class="text-primary">
                        <th>
                            {{__('Promo Code Name')}}
                        </th>
                        <th>
                            {{__('Promo Code')}}
                        </th>
                        <th>
                            {{__('Quantity of Promo Codes')}}
                        </th>
                        <th>
                            {{__('Start Time')}}
                        </th>
                        <th>
                            {{__('End time')}}
                        </th>
                        <th>
                            {{__('Code Features')}}
                        </th>
                        <th>
                            {{__('Discount By Amount/ Percent')}}
                        </th>
                        <th>
                            {{__('Status')}}
                        </th>
                        <th>
                            {{__('Promo Code Expired')}}
                        </th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        @php
                            $day = 0;
                        @endphp
                        @foreach($all_coupon as $key => $coupon)
                            <tr class="table-info">
                                <td>{{$coupon->coupon_name}}</td>
                                <td>{{$coupon->coupon_code}}</td>
                                <td>{{$coupon->coupon_qty}}</td>
                                <td>{{$coupon->coupon_date_start}}</td>
                                <td>{{$coupon->coupon_date_end}}</td>
                                <td>
                                    <?php
                                    if($coupon->coupon_condition == 0)
                                    {
                                    ?>
                                    <a> {{__('Percentage Discount')}}</span></a>
                                    <?php
                                    }else{
                                    ?>
                                    <a>{{__('Discount By Money')}}</span></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>{{$coupon->coupon_number}}</td>
                                <td>
                                    <?php
                                    if($coupon->coupon_status == 0)
                                    {
                                    ?>
                                    <a> {{__('No Activation')}}</span></a>
                                    <?php
                                    }else{
                                    ?>
                                    <a>{{__('Activated')}}</span></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $coupon_date_end = date_create($coupon->coupon_date_end); ?>
                                    <?php
                                    if(date_format($coupon_date_end, "m") >= $month && date_format($coupon_date_end,
                                        "Y") >= $year && $coupon->coupon_date_end >= $today)
                                    {
                                    ?>
                                    <span style="color: green;">{{__('Promo Code Expired')}}</span>
                                    <?php
                                    }else{
                                    ?>
                                    <span style="color: red;">{{__('Promo Code No Expiration')}}</span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div style="right: 10px;"><a
                                            href="{{URL::to('send-coupon',['coupon_qty'=>$coupon->coupon_qty,'coupon_name'=>$coupon->coupon_name,'coupon_condition'=>$coupon->coupon_condition,'coupon_number'=>$coupon->coupon_number,'coupon_code'=>$coupon->coupon_code])}}"
                                            class="btn btn-warning">{{__('Send promo codes to customers')}}</a></div>
                                </td>
                                <td class="td-actions">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                        <a class="fa fa-pencil-square-o"
                                           href="{{URL::to('/edit-coupon/'.$coupon->coupon_id)}}"
                                           data-original-title="Update"></a>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                        <a class="fa fa-trash-o"
                                           href="{{URL::to('/delete-coupon/'.$coupon->coupon_id)}}"
                                           onclick="return confirm('Do you want to delete ?')"
                                           data-original-title="Delete"></a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="margin-left: 700px">
                        <table>
                            <form action="{{url('/import-coupon')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".xlsx"><br>
                                <input type="submit" value="Import File Excel" name="import_excel"
                                       class="btn btn-warning">
                            </form>
                            <form action="{{url('/export-coupon')}}" method="POST">
                                @csrf
                                <input type="submit" value="Export File Excel" name="export_excel"
                                       class="btn btn-success">
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        {!!$all_coupon->links()!!}
    </div>
    </div>
@endsection
