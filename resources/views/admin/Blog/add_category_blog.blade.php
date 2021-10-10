@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <form action="{{URL::to('/save-category-blog')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="card">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">{{__('Add Category Blog')}}</h4>
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
                        <label class="col-sm-2 col-form-label">{{__('Category Post Name')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="cate_blog_name" onkeyup="ChangeToSlug();"
                                       id="slug" placeholder="{{__('Enter Category Post Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Post Slug')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" id="convert_slug" name="cate_blog_slug"
                                       placeholder="{{__('Enter Unsigned Category Post Slug Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Post Description')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea style="resize: none;" name="cate_blog_desc" class="form-control" rows="6"
                                          placeholder="{{__('Enter Category Post Description')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Post Status')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round"
                                        name="cate_blog_status">
                                    <option value="0">{{__('Hide')}}</option>
                                    <option selected value="1">{{__('Display')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <center>
                            <button type="submit" class="btn btn-rose"
                                    name="add_cate_product">{{__('Add Category Post')}}</button>
                        </center>
                    </div>
        </form>
    </div>
@endsection
