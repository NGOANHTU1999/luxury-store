@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-text">
                    <h4 class="card-title">{{__('Footer Information')}}</h4>
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
            <div class="card-body">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
                           style="width:100%">
                        <thead class="text-primary">
                        <tr>
                            <th>{{__('Contact Info')}}</th>
                            <th>{{__('Map')}}</th>
                            <th>{{__('Fanpage')}}</th>
                            <th>{{__('Logo Image')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contact as $key => $c)
                            <tr>
                                <td>{!!$c->info_contact!!}</td>
                                <td style="height: 5%;width: 5%;">{!!$c->info_map!!}</td>
                                <td>{!!$c->info_fanpage!!}</td>
                                <td><img src="{{asset('public/upload/contact/'.$c->info_logo)}}" height="100"
                                         width="100"></td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                        <a class="fa fa-pencil-square-o" href="{{URL::to('/edit-footer/'.$c->info_id)}}"
                                           data-original-title="Update"></a>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                        <a class="fa fa-trash-o" href="{{URL::to('/delete-footer/'.$c->info_id)}}"
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
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
@endsection
