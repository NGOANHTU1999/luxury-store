@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <form action="{{URL::to('/save-post')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">{{__('Add Post')}}</h4>
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
                        <label class="col-sm-2 col-form-label">{{__('Post Name')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" onkeyup="ChangeToSlug();" id="slug"
                                       name="post_title" placeholder="{{__('Enter Post Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Slug Post')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="post_slug" id="convert_slug"
                                       placeholder="{{__('Enter the Post Slug Name without accents')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Keywords Post')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="post_keywords"
                                       placeholder="{{__('Enter Keywords Post')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Meta Post')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="post_meta_desc"
                                       placeholder="{{__('Enter Meta Post')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Post Image')}} :</label>
                        <div class="col-sm-7">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset('public/backend/assets/img/image_placeholder.jpg')}}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                <span class="btn btn-rose btn-round btn-file">
                  <span class="fileinput-new">Select image</span>
                  <span class="fileinput-exists">Change</span>
                  <input type="file" name="post_image" class="form-control"/>
                </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Post Description')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea style="resize: none;" name="post_desc" class="form-control" rows="6"
                                          placeholder="{{__('Enter Post Description')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Content Post')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea style="resize: none;" id="ckeditor1" name="post_content" class="form-control"
                                          rows="6" placeholder="{{__('Enter Content Post')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Post')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round" name="cate_blog_id">
                                    @foreach($cate_post as $key => $cate)
                                        <option value="{{$cate->cate_blog_id}}">{{$cate->cate_blog_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Status')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round" name="post_status">
                                    <option value="0">{{__('Hide')}}</option>
                                    <option selected value="1">{{__('Display')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <center>
                            <button type="submit" class="btn btn-rose" name="add_post">{{__('Add Post')}}</button>
                        </center>
                    </div>
        </form>
    </div>
@endsection
