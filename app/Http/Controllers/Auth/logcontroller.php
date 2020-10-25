<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class logcontroller extends Controller
{
    public function __construct()
    {

      // $this->middleware('guest:admin');

    }
    public function showAdminLoginForm()
    {
        return view('pages.adminLogin');
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
     //   return back()->withInput($request->only('email', 'remember'));
        return $request->email;
    }


    //
}
