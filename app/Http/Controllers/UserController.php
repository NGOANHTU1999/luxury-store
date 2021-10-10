<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Route;
use App\Models\Roles;
use App\Models\Login;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $admin = Login::with('roles')->orderBy('admin_id', 'DESC')->get();
        return view('admin.user.all_user')->with(compact('admin'));
    }

    public function all_user()
    {
        $admin = Login::with('roles')->orderBy('admin_id', 'DESC')->get();
        return view('admin.user.all_user')->with(compact('admin'));
    }

    public function assign_roles(Request $request)
    {
        if (Auth::id() == $request->admin_id) {
            return redirect()->back()->with('message', 'You are not authorized yourself');
        }

        $user = Login::where('admin_email', $request->admin_email)->first();
        $user->roles()->detach();

        if ($request->author_role) {
            $user->roles()->attach(Roles::where('name', 'author')->first());
        }
        if ($request->user_role) {
            $user->roles()->attach(Roles::where('name', 'user')->first());
        }
        if ($request->admin_role) {
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        return redirect()->back()->with('message', 'Authorization successful');
    }

    public function delete_user_roles($admin_id)
    {
        if (Auth::id() == $admin_id) {
            return redirect()->back()->with('message', 'Can not Delete My Own Account!');
        }
        $admin = Login::find($admin_id);
        if ($admin) {
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message', 'Delete User Successfully');
    }

    public function impersonate($admin_id)
    {
        $user = Login::where('admin_id', $admin_id)->first();
        if ($user) {
            session()->put('impersonate', $user->admin_id);
        }
        return redirect('/users');
    }

    public function impersonate_destroy()
    {
        session()->forget('impersonate');
        return redirect('/users');
    }
}
