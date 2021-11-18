<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

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

    use AuthenticatesUsers;
    public function showAdminLoginForm()
    {

            return view('admin.authAdmin.login');

    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $prev_url = app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName();


        switch ($prev_url){
            case 'admin.login':
                $user_info =['/admin','admin'];
                break;
            default:
                $user_info =['/','web'];
                break;

        }
        if (Auth::guard($user_info[1])->attempt($credentials)) {
            // Authentication passed...

            return redirect()->intended(url($user_info[0]));
        }
        return Redirect()->back()->withSuccess('Oppes! You have entered invalid credentials');

    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        $prev_url =URL::current();
        $prev_url =explode('/',$prev_url);;
        $is_client = in_array('admin',$prev_url);
        $gua = $is_client ? 'admin': 'web';

        Auth::guard($gua)->logout();
        $request->session()->regenerate();
        //$request->session()->invalidate();
        if($gua == 'admin'){
            return $this->loggedOut($request) ?: redirect('/admin/login');
        }
        return $this->loggedOut($request) ?: redirect('/');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        $prev_url =explode('/', session()->previousUrl());
        $is_client = in_array('admin',$prev_url);
        $gua = $is_client ? 'admin': 'web';


        return Auth::guard($gua);
    }
}
