@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <span class="label">
                         <?php
                            $message = Session::get('message');
                            if ($message) {
                                echo '<span class="" >' . $message . '</span>';
                                Session::put('message', null);
                            }
                            ?>
                    </span>
                    </div>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header card-header-icon card-header-rose">
                                                <div class="card-text">
                                                    <h4 class="card-title ">{{__('Quản Lí Đơn Hàng')}}</h4>
                                                </div>
                                            </div>
                                            <div class="widget-content nopadding">
                                                <table class="table table-bordered data-table">
                                                    <thead>
                                                    <tr>
                                                        <th>{{__('No.')}}</th>
                                                        <th>{{__('Order Code')}}</th>
                                                        <th>{{__('Order Status')}}</th>
                                                        <th>{{__('Reason for Order Cancellation')}}</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach($order as $key => $ord)
                                                        @php
                                                            $i++;
                                                        @endphp

                                                        <tr class="gradeX">
                                                            <td>{{$i}}</td>
                                                            <td>{{$ord->order_code}}</td>

                                                            <td>
                                                                @if ($ord->order_status == 1)
                                                                    <span><b>Đơn hàng mới</span>
                                                                @elseif($ord->order_status == 2)
                                                                    <span
                                                                        class="text-success"><b>{{__('Order processed')}}</span>
                                                                @else
                                                                    <span class="text-danger"><b>{{__('Order Canceled')}}</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($ord->order_status == 3)
                                                                    {{$ord->order_destroy}}
                                                                @endif
                                                            </td>

                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip"
                                                                        class="btn btn-info btn-round">
                                                                    <a class="fa fa-eye"
                                                                       href="{{URL::to('/view-order/'.$ord->order_code)}}"
                                                                       data-original-title="Update"></a>
                                                                </button>
                                                                <button type="button" rel="tooltip"
                                                                        class="btn btn-danger btn-round">
                                                                    <a class="fa fa-trash-o"
                                                                       href="{{URL::to('/delete-order/'.$ord->order_id)}}"
                                                                       onclick="return confirm('Do you want to delete ?')"
                                                                       data-original-title="Delete"></a>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            {!!$order->links()!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--js phân trang tìm kiếm-->
@endsection
