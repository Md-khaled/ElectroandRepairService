<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::guard($guard)->check() && ((!empty(Auth::user()->role->role) == 0)||(!empty(Auth::user()->role->role) == 1)||(!empty(Auth::user()->role->role) == 2))&&Auth::user()->role_id !=NULL) {
            return redirect()->route('admin.dashboard');
        }elseif (Auth::guard($guard)->check() && Auth::user()->role_id == NULL) {
            return redirect('/');
        }else{
           return $next($request); 
        }

        
    }
}
