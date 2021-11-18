<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showResetAdminForm(Request $request, $token = null)
    {
        return view('admin.authAdmin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }
    protected function guard()
    {
        $prev_url =explode('/', session()->previousUrl());
        $is_client = in_array('client',$prev_url);
        $gua = $is_client ? 'client': 'web';


        return Auth::guard($gua);
    }
    public function broker()
    {
        $prev_url =explode('/', session()->previousUrl());
        $is_client = in_array('client',$prev_url);
        $table = $is_client ? 'clients': 'users';

        return Password::broker($table);
    }
}
