<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;


    public function showResetForm(Request $request)
    {
        return view('auth.reset-password',[
            'email' => $request->query('email'),
            'token' => $request->query('token')
        ]);
    }


    public function reset(Request $request)
    {

        # validate
        $this->validateForm($request);
        # check token and email

        # reset password
        # redirect
    }



    protected function validateForm($request)
    {
        $request->validate([
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'email'     => ['required', 'email', 'exists:users'],
            'token'     => ['required', 'string'],
        ]);
    }
}
