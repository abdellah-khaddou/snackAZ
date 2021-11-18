<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLinkAdminRequestForm(Request $request, $token = null)
    {

        return view('admin.authAdmin.passwords.email');
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
