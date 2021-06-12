<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateForm($request);

        if ($this->attemptLogin($request)){
            $this->sendSuccessRedirect();
        }
        return $this->sendLoginFailedResponse();

    }


    protected function validateForm(Request $request)
    {
        $request->validate([
           'email' => ['required', 'email', 'exists:users'],
           'password' => ['required']
        ]);
    }



    protected function attemptLogin(Request $request)
    {
       return Auth::attempt($request->only('email', 'password'), $request->filled('remember-me'));

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
}
