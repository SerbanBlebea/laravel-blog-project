<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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
        $this->middleware('guest')->except('logout');
        $this->redirectTo = config('auth.redirect_after_login');
    }

    // Overwrite the method from AuthenticatesUsers trait
    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))->where('verified', true)->first();
        if($user)
        {
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember')
            );
        }
        return false;
    }
}
