<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && ((!empty(Auth::user()->role->role) == 0)||(!empty(Auth::user()->role->role) == 1)||(!empty(Auth::user()->role->role) == 2))&&Auth::user()->role_id !=NULL) {
            $this->redirectTo=route('admin.dashboard');
        }else{
             $this->redirectTo='/';
        }
        $this->middleware('guest')->except('logout');
    }
}
