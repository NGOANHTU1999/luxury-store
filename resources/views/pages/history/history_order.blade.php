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
                    <table class="table">
                        <thead class="text-primary">

                        <th>
                            No.
                        </th>

                        <th>
                            {{ __('Order Code') }}
                        </th>

                        <th>
                            {{ __('Order Date') }}
                        </th>

                        <th>
                            {{ __('Order Status') }}
                        </th>

                        <th></th>
                        <th></th>
                        </thead>

                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($getorder as $key =>$order)
                            @php
                                $i++;
                            @endphp
                            <tr class="table-warning">
                                <td>{{$i}}</td>
                                <td>{{$order->order_code}}</td>
                                <td>{{date('d-m-Y H:i:s', strtotime($order->created_at))}}</td>

                                <td>
                                    @if ($order->order_status == 1)
                                        <span><b>New Orders</span>
                                    @elseif($order->order_status == 2)
                                        <span class="text-success"><b>Order Processed</span>
                                    @else
                                        <span class="text-danger"><b>Canceled Order</span>
                                    @endif
                                </td>

                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                        <a class="material-icons"
                                           href="{{URL::to('/view-history-order/'.$order->order_code)}}"
                                           data-original-title="Update">{{ __('View order details') }}</a>
                                    </button>
                                </td>

                                <td>
                                @if($order->order_status !=3)
                                    <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-info btn-rose" data-toggle="modal"
                                                data-target="#huydon">Cancel Orders
                                        </button>
                                    @endif
                                    <form>
                                    @csrf
                                    <!-- Modal -->
                                        <div id="huydon" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Reason</h4>
                                                    </div>

                                                    <textarea class="lydohuydon" rows="5"
                                                              required placeholder="Add Your Reason Here"></textarea>

                                                    <div class="modal-footer">
                                                        <button type="button" id="{{$order->order_code}}"
                                                                onclick="Huydonhang(this.id)" class="btn btn-success">
                                                            Send
                                                        </button>
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">
                <span>{!!$getorder->links()!!}</span>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
@endsection
