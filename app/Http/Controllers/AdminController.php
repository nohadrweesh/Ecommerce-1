<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function login(){
        return view('admin.admin_login');
    }
    public function doLogin(Request $request){
        $data=$request->input();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>1]))
            return redirect('/admin/dashboard');
        else
            return redirect('/admin')->withErrors('Invalid email or password');
    }
    public function viewDashboard(){
        return view('admin.dashboard');
    }
    public function viewSettings(){
        return view('admin.settings');
    }
    public function logout(){
        Auth::logout();
        return redirect('/admin')->with('success','Logged out successfully');

    }

    public function checkPwd(Request $request){
       // return("hj");
        $data= $request->all();
        $current_pwd=$data['current_pwd'];
        $check_pwd=User::where('admin',1)->first();
        //$check_pwd=User::where('email',Auth::user()->email)->first();
        if(Hash::check($current_pwd,$check_pwd->password))
            return 'true';
        else
            return 'false';
    }

    public function updatePwd(Request $request){
        $data= $request->all();
        $current_pwd=$data['current_pwd'];
        $check_pwd=User::where('email',Auth::user()->email)->first();
        if(Hash::check($current_pwd,$check_pwd->password)) {
            $password=bcrypt($data['new_pwd']);
            User::where('email',Auth::user()->email)->update(['password'=>$password]);
            return redirect('/admin/settings')->with('success','Password changed successfully');

        }else {
            return redirect('/admin/settings')->withErrors('Incorrect current password');
        }

    }
}
