<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\TwoFactorAuthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showToggleForm()
    {
        return view('auth.two-factor.toggle');
    }

    public function activate(TwoFactorAuthentication $twofactor)
    {
        $response = $twofactor->requestCode(Auth::user());

        return $response === $twofactor::CODE_SENT
            ? redirect()->route('auth.two.factor.code.form')
            : back()->with('cantSendCode',true);
    }

    public function showEnterCodeForm()
    {
        return view('auth.two-factor.enter-code');
    }
}
