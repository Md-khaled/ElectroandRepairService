<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('guest');
    }
}
