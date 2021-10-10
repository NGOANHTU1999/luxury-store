@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">{{__('Add Gallery Product')}}</h4>
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
            <form action="{{url('/insert-gallery/'.$pro_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3" align="right">

                    </div>
                    <div class="col-md-6">
                        <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                        <span id="error_gallery"></span>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" name="upload" name="taianh" value="upload Image" class="btn btn-success ">
                    </div>

                </div>
            </form>

            <div class="card-body ">
                <input type="hidden" name="pro_id" value="{{$pro_id}}" class="pro_id">
                <form>
                    @csrf
                    <div id="gallery_load">

                    </div>
                </form>
            </div>
        </div>

@endsection
