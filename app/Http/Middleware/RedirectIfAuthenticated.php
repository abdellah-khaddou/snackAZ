<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $prev_url = URL::current();
       $prv = explode('/',$prev_url);
       $is_admin = in_array('admin',$prv) ;


       if($is_admin){
           if(Auth::guard('admin')->check()){
               return redirect('/admin');
           }
       }else{
           if (Auth::guard('web')->check()) {
               return redirect('/');
           }
       }



        return $next($request);
    }
}
