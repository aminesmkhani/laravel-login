<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function showToggleForm()
    {
        return view('auth.two-factor.toggle');
    }
}
