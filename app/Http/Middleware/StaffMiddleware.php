<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     if (Auth::check() && !empty(Auth::user()->role->role) == 2 && Auth::user()->role_id !=NULL) {
            //echo Auth::user()->role_id;
             return $next($request);
        }


     if (Auth::check() && ((!empty(Auth::user()->role->role) == 2)||(!empty(Auth::user()->role->role) == 0))) {
            //echo Auth::user()->role_id;
             return $next($request);
        }
     */
    public function handle($request, Closure $next)
    {
       if (Auth::check() && ((!empty(Auth::user()->role->role) == 2)||(!empty(Auth::user()->role->role) == 0)) && Auth::user()->role_id !=NULL) {
            //echo Auth::user()->role_id;
             return $next($request);
        }elseif (Auth::check() && Auth::user()->role_id == NULL) {
            return redirect('/');
        }else {
            return redirect()->route('login');
        }
    }
}
