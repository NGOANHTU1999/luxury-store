<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\AddProductRequests;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Products;
use App\Models\Comments;
use App\Models\Gallery;
use App\Models\Rating;
use Auth;

if (!isset($_SESSION)) {
    session_start();
}

class Product extends Controller
{
    /*kiểm tra nếu admin mới cho truy cập*/
    public function AuthenLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function add_product()
    {
        $this->AuthenLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();
        return view('admin.Product.add_product')->with('cate_product', $cate_product)->with('brand_product',
            $brand_product);
    }

    public function all_product()
    {
        $this->AuthenLogin();
        //lấy ra sản phẩm thuộc danh mục nào và thương hiệu nào
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->orderby('tbl_product.product_id', 'desc')->paginate(100);
        $manager_product = view('admin.Product.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.Product.all_product', $manager_product);
    }

    public function save_product(AddProductRequests $request)
    {
        $this->AuthenLogin();
        $data = array();
        $data ['product_name'] = $request->product_name;
        $data ['product_name_en'] = $request->product_name_en;
        $data ['product_content_en'] = $request->product_content_en;
        $data ['product_slug'] = $request->product_slug;
        $data ['product_price'] = $request->product_price;
        $data ['product_qty'] = $request->product_qty;
        $data ['product_desc'] = $request->product_desc;
        $data ['product_content'] = $request->product_content;
        $data ['category_id'] = $request->product_cate;
        $data ['brand_id'] = $request->product_brand;
        $data ['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Add success');
            return Redirect::to('all-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Add failed');
        return Redirect::to('add-product');
    }

    public function unactive_product($product_id)
    {
        $this->AuthenLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Display Successful Products');
        return Redirect::to('all-product');
    }

    public function active_product($product_id)
    {
        $this->AuthenLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Hide Successful Products');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id)
    {
        $this->AuthenLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.Product.edit_product')->with('edit_product', $edit_product)
            ->with('cate_product', $cate_product)->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.Product.edit_product', $manager_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AuthenLogin();
        $data = array();
        $data ['product_name'] = $request->product_name;
        $data ['product_name_en'] = $request->product_name_en;
        $data ['product_content_en'] = $request->product_content_en;
        $data ['product_slug'] = $request->product_slug;
        $data ['product_price'] = $request->product_price;
        $data ['product_qty'] = $request->product_qty;
        $data ['product_desc'] = $request->product_desc;
        $data ['product_content'] = $request->product_content;
        $data ['category_id'] = $request->product_cate;
        $data ['brand_id'] = $request->product_brand;
        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Product update successful');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Product update successful');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id)
    {
        $this->AuthenLogin();
        $product = Products::find($product_id);
        $product_image = $product->product_image;
        if ($product_image) {
            $path = 'public/upload/product/' . $product_image;//đường dẫn
            unlink($path);//xóa hình ảnh bài viết
        }
        $product->delete();
        Session::put('message', 'Product delete successful');
        return redirect()->back();
    }

    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = DB::table('tbl_comment')->where('comment_product_id', $product_id)->get();
        $output = '';
        foreach ($comment as $key => $comm) {
            $output .= '<div class="row style_comment">

                                       <div class="col-sm-2">
                                            <img width="80%" style="margin-right: 10px" src="' . url('/public/frontend/image/1.png') . '"
                                             class="img img-responsive img-thumbnail">
                                        </div>
                                        <div class="col-md-5">
                                            <p style="color:red;">' . $comm->comment_name . '</p>
                                            <p style="color:#a2e6ef;">' . $comm->comment_date . '</p>
                                            <p style="color:#FFFFFF;">' . $comm->comment . '</p>
                                        </div>
                                    </div>
              ';
        }
        echo $output;
    }

    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comments();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->save();
    }

    //////////////////////////////////////////////////////////////////frontend//////////////////////////////////////////////////////////
    public function chi_tiet($product_slug, Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id',
            'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $chitiet_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=',
                'tbl_product.brand_id')->where('tbl_product.product_slug', $product_slug)->get();

        foreach ($chitiet_product as $key => $value) {
            $category_id = $value->category_id;
            $product_cate = $value->category_name;
            $product_brand = $value->brand_name;
            $product_id = $value->product_id;
            $cate_slug = $value->category_slug;
            $brand_slug = $value->brand_slug;
            //seo
            $meta_desc = $value->product_desc;
            $meta_keywords = $value->product_slug;
            $meta_title = $value->product_name;
            $url_canonical = $request->url();
            //--seo
            $product_id = $value->product_id;
        }
        $product_view = Products::where('product_id', $product_id)->first();
        $product_view->product_views = $product_view->product_views + 1;
        $product_view->save();

        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_slug',
                [$product_slug])->paginate(8);

        $gallery = Gallery::where('product_id', $product_id)->get();

        $rating = Rating::where('product_id', $product_id)->avg('rating');
        $rating = round($rating);

        return view('pages.product.chitiet_product')->with('category', $cate_product)->with('brand',
            $brand_product)->with('chitiet_product', $chitiet_product)->with('related_product',
            $related_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title',
            $meta_title)->with('url_canonical', $url_canonical)->with('rating', $rating)->with('product_cate',
            $product_cate)->with('product_brand',
            $product_brand)->with('cate_slug', $cate_slug)->with('brand_slug', $brand_slug)->with('gallery', $gallery);
    }

    public function insert_rating(Request $request)
    {
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }
}
