<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  config;


class cuscontroller extends Controller
{
 public function __construct(){
  //   $this->middleware('auth:admin');
}

    public function product(){
       return Admin::get();
    }
    public function login(){
        return view('pages.adminLogin');
    }
    public function welcomess(){
        return view('welcome');
    }
    public function checklogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
                'password'=>'required',
            ]
        );
        if ( Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password], $request->get('remember'))) {
           Auth::guard('admin')->user();

            return redirect()->intended('/admin');
        }
       //return redirect()->intended('/admin');
        return back()->withInput($request->only('email', 'remember'))->with('error');
    }
   /* public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function zzz(Request $request){
        return $request->all();
    }
   */

}
