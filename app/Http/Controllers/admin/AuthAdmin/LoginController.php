<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function showLoginForm()
    {
        return view('admin.authAdmin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'    => 'require|email',
            'password' => 'require|min:6',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
       if(Auth::guard('admin')->attemp($credential,$request->membere)){
           return redirect()->intended(route('admin'));
       }
       return redirect()->back()->withInput([$request->only('email','password')]);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
