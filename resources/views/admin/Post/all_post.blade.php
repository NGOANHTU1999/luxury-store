@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-text">
                    <h4 class="card-title">{{__('List Post')}}</h4>
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
                            <th>{{__('Post Name')}}</th>
                            <th>{{__('Image')}}</th>
                            <th>{{__('Slug Post')}}</th>
                            <th>{{__('Post Description')}}</th>
                            <th>{{__('Keywords')}}</th>
                            <th>{{__('Status')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_post as $key => $post)
                            <tr>
                                <td>{{$post->post_title}}</td>
                                <td><img src="{{asset('public/upload/post/'.$post->post_image)}}" height="100"
                                         width="100"></td>
                                <td>{{$post->post_slug}}</td>
                                <td>{{$post->post_desc}}</td>
                                <td>{{$post->post_keywords}}</td>
                                <td>
                                    <?php
                                    if($post->post_status == 0)
                                    {
                                    ?>
                                    {{__('Hide')}}
                                    <?php
                                    }else{
                                    ?>
                                    {{__('Display')}}
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" class="btn btn-success">
                                        <a class="fa fa-pencil-square-o"
                                           href="{{URL::to('/edit-post/'.$post->post_id)}}"
                                           data-original-title="Update"></a>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                        <a class="fa fa-trash-o" href="{{URL::to('/delete-post/'.$post->post_id)}}"
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
        <div class="col-lg-12">
            {!!$all_post->links()!!}
        </div>
    </div>
    <!-- end col-md-12 -->
@endsection
