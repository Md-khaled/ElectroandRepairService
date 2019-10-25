<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       // return Auth::user()->role_id;

        if (Auth::check() && ((!empty(Auth::user()->role->role) == 1)||(!empty(Auth::user()->role->role) == 0)) && Auth::user()->role_id !=NULL) {
            //echo Auth::user()->role_id;
             return $next($request);
        }elseif (Auth::check() && Auth::user()->role_id == NULL) {
            return redirect('/');
        }else {
            return redirect()->route('login');
        }
        
       
    }
}
