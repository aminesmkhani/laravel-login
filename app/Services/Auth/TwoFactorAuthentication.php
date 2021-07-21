<?php


namespace App\Services\Auth;


use App\Models\TwoFactor;
use App\Models\User;
use Illuminate\Http\Request;

class TwoFactorAuthentication
{
    protected $request;
    const CODE_SENT = 'code.sent';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function requestCode(User $user)
    {
        $code = TwoFactor::generateCodeFor($user);

        $code->send();

        return static::CODE_SENT;
    }

}
