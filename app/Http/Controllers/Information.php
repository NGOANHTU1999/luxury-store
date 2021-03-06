<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cateblog;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\FooterRequests;
use App\Http\Requests;
use Session;
use App\Models\Contact;
use Illuminate\support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class Information extends Controller
{
    public function AuthenLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function layout_footer()
    {
        $this->AuthenLogin();
        return view('admin.Information.footer_infor');
    }

    public function save_footer(FooterRequests $request)
    {
        $this->AuthenLogin();
        $data = $request->all();
        $footer = new Contact();
        $footer->info_contact = $data['contact_info'];
        $footer->info_map = $data['map_info'];
        $footer->info_fanpage = $data['fanpage_info'];
        $get_image = $request->file('image_info');
        $path = 'public/upload/contact/';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $footer->info_logo = $new_image;
        }
        $footer->save();
        return redirect()->back()->with('message', 'Add successful');
    }

    public function all_footer()
    {
        $this->AuthenLogin();
        $contact = Contact::All();
        return view('admin.Information.all_footer')->with(compact('contact'));
    }

    public function edit_footer($info_id)
    {
        $this->AuthenLogin();
        $contact = Contact::where('info_id', $info_id)->get();
        return view('admin.Information.edit_footer')->with(compact('contact'));
    }

    public function update_footer(FooterRequests $request, $info_id)
    {
        $this->AuthenLogin();
        $data = $request->all();
        $contact = Contact::find($info_id);
        $contact->info_contact = $data['contact_info'];
        $contact->info_map = $data['map_info'];
        $contact->info_fanpage = $data['fanpage_info'];
        $get_image = $request->file('image_info');
        $path = 'public/upload/contact/';

        if ($get_image) {
            unlink($path . $contact->info_logo);
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $contact->info_logo = $new_image;
        }

        $contact->save();
        return redirect()->back()->with('message', 'Update successful');
    }

    public function delete_footer($info_id)
    {
        $this->AuthenLogin();
        $delete = Contact::find($info_id);
        $delete->delete();
        return redirect()->back()->with('message', 'Delete successful');
    }

    public function lien_he(Request $request)
    {
        //seo
        $meta_desc = "Contact";
        $meta_keywords = "Contact";
        $meta_title = "Contact || Luxury - Store";
        $url_canonical = $request->url();
        //--seo
        //category blog
        $category_blog = Cateblog::orderBy('cate_blog_id', 'DESC')->get();
        //

        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $contact = Contact::All();
        return view('pages.contact.lien_he')->with(compact('category', 'brand', 'meta_desc', 'meta_keywords',
            'meta_title', 'url_canonical', 'category_blog', 'contact'));


    }
}
