<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Code;
use App\Models\User;
use App\Rules\Recaptcha;
use App\Services\Auth\TwoFactorAuthentication;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ThrottlesLogins;
    protected $twoFactor;

    public function __construct(TwoFactorAuthentication $twoFactor)
    {
        $this->middleware('guest')->except('logout');
        $this->twoFactor = $twoFactor;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showCodeForm()
    {
        return view('auth.two-factor.login-code');
    }

    public function login(Request $request)
    {
        $this->validateForm($request);


        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (!$this->isValidateCredentials($request))
        {
            $this->incrementLoginAttempts($request);
            return  $this->sendLoginFailedResponse();
        }


        # if use active 2 auth system

        $user = $this->getUser($request);
        if ($user->hasTwoFactor())
        {
            $this->twoFactor->requestCode($user);
            return $this->sendHasTwoFactorResponse();
        }


        Auth::login($user, $request->remember);
        return $this->sendSuccessRedirect();

    }


    protected function isValidateCredentials ($request)
    {
        return Auth::validate($request->only([
            'email', 'password'
        ]));
    }

    protected function sendHasTwoFactorResponse()
    {
        return redirect()->route('auth.login.code.form');
    }


    public function confirmCode(Code $request)
    {
        $response = $this->twoFactor->login();
        return $response === $this->twoFactor::AUTHENTICATED
            ? $this->sendSuccessRedirect()
            : back()->with('invalidCode', true);
    }

    protected function validateForm(Request $request)
    {
        $request->validate(
        [
           'email' => ['required', 'email', 'exists:users'],
           'password' => ['required'],
           'g-recaptcha-response'  => ['required',new Recaptcha],
        ],
        [
            'g-recaptcha-response.required' => __('public.recaptcha'),
        ]
    );
    }


    protected function sendSuccessRedirect()
    {
        session()->regenerate();
        return redirect()->intended();
    }

    protected function sendLoginFailedResponse()
    {
        return back()->with('wrongCredentials',true);
    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        return redirect()->route('home');
    }


    protected function username()
    {
        return 'email';
    }


    protected function   getUser($request)
    {
        return User::where('email', $request->email)->firstOrFail();
    }
}
