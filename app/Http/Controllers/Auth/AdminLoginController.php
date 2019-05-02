<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);

    }
    public function showLoginForm(){
        return view('admin.pages.login');
    }
    public function login(Request $request){
        //Validate the form data
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        //Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}