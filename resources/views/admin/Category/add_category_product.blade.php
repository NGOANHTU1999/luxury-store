@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <form action="{{URL::to('/save-category-product')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="card">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">{{__('Add Category Product')}}</h4>
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
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Name')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="category_product_name"
                                       onkeyup="ChangeToSlug();" id="slug"
                                       placeholder="{{__('Enter Product Category Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Name En')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="category_product_name_en"
                                       class="form-control" placeholder="{{__('Enter Category Name En')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Slug Category')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="category_slug" id="convert_slug"
                                       placeholder="{{__('Enter Unsigned Category Slug Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Description')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea style="resize: none;" name="category_product_desc" class="form-control"
                                          rows="6" placeholder="{{__('Enter Category Description')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Status')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round"
                                        name="category_product_status">
                                    <option value="0">{{__('Hide')}}</option>
                                    <option selected value="1">{{__('Display')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <center>
                            <button type="submit" class="btn btn-rose"
                                    name="add_category_product">{{__('Add Category')}}</button>
                        </center>
                    </div>
        </form>
    </div>
@endsection
