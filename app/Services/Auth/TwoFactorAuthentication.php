<?php


namespace App\Services\Auth;


use App\Models\TwoFactor;
use App\Models\User;
use Illuminate\Http\Request;

class TwoFactorAuthentication
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function requestCode(User $user)
    {
        # Generate Code
        $code = TwoFactor::generateCodeFor($user);
        dd($code);
        # Send Code
        # Return Response
    }

}
