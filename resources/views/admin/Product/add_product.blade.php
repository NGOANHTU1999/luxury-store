@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <form action="{{URL::to('/save-product')}}" enctype="multipart/form-data" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="card">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">{{__('Add Product')}}</h4>
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
                        <label class="col-sm-2 col-form-label">{{__('Product Name')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" onkeyup="ChangeToSlug();" id="slug"
                                       name="product_name" placeholder="{{__('Enter Product Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Product Name En')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="product_name_en" class="form-control"
                                       placeholder="{{__('Enter Product Name En')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Slug Product')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" id="convert_slug" name="product_slug"
                                       placeholder="{{__('Enter Unsigned Product Slug Name')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Product Price')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="product_price" placeholder="{{__('Enter Product Price')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Quantity of products')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="product_qty"
                                       placeholder="{{__('Enter Product Quantity')}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Add photos')}} :</label>
                        <div class="col-sm-7">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset('public/backend/assets/img/image_placeholder.jpg')}}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                  <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select </span>
                                   <span class="fileinput-exists">Change</span>
                                      <input type="file" name="product_image" class="form-control"/>
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Product Description')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea style="resize: none;" name="product_desc" class="form-control" rows="6"
                                          placeholder="{{__('Enter Product Description')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Product Contents')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea name="product_content" id="ckeditor1" class="" rows="6"
                                          placeholder="{{__('Enter Product Contents')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Product Contents En')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea name="product_content_en" id="ckeditor2" class="" rows="12"
                                          placeholder="{{__('Enter Product Contents En')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Category Product')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round"
                                        title="{{__('--Choose Category--')}}" name="product_cate">
                                    @foreach($cate_product as $key =>$cate_product)
                                        <option
                                            value="{{($cate_product->category_id)}}">{{($cate_product->category_name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Brand')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round"
                                        title="{{__('--Choose Brand--')}}" name="product_brand">
                                    @foreach($brand_product as $key =>$brand_product)
                                        <option
                                            value="{{($brand_product->brand_id)}}">{{($brand_product->brand_name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{__('Status')}} :</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="selectpicker" data-style="btn btn-primary btn-round"
                                        name="product_status">
                                    <option value="0">{{__('Hide')}}</option>
                                    <option selected value="1">{{__('Display')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <center>
                            <button type="submit" class="btn btn-rose"
                                    name="add_product">{{__('Add Product')}}</button>
                        </center>
                    </div>
        </form>
    </div>
@endsection
