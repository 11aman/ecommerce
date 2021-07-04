<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Admin;
use Auth;

class AdminController extends Controller
{
	public function login(Request $request){
		if($request->isMethod('post')){
			$data = $request->all();
			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
				return view('Admin.dashboard');
			}else{
				return redirect('/admin')->with('delete','Invalid email or password');
			}
		}
		return view('Admin.admin_login');
	}
	public function logout(){
    	Session::flush();
    	return redirect('/admin')->with('success','Logged out successfully!');
    }   
}
