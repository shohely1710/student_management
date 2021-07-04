<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Session;

class Admincontrol extends Controller
{
    public function index()
    {
        return view('dashbord');
    }
    //
    public function adminlogin(){
        return view('adminlogin');
    }

    public function adminloged(Request $request){
        $admin = admin::where('username', $request->username)->where('password', $request->password)->get()->toArray();
        if($admin){
            $request->session()->put('admin_session',$admin[0]['id']); //Data can be stored in session using the put() method. The put() method will take two arguments, the “key” and the “value”.
            return redirect('dashbord/');
        }
        else{
            session::flash('coc', 'Email and Password not match');
            return redirect('loginpage/')->withInput(); //withInput() is for preserving the input during redirects. consider having your do_login do return redirect()->back()->withInput(Request::except("password")); though, to properly implement
        }
    }
}
