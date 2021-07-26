<?php


namespace App\Services\Auth;


use App\Models\TwoFactor;
use App\Models\User;
use Illuminate\Http\Request;

class TwoFactorAuthentication
{
    protected $request;
    protected $code;
    const CODE_SENT = 'code.sent';
    const INVALID_CODE = 'code.invalid';
    const ACTIVATED = 'code.activated';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function requestCode(User $user)
    {
        $code = TwoFactor::generateCodeFor($user);

        $this->setSession($code);

        $code->send();

        return static::CODE_SENT;
    }


    protected function setSession(TwoFactor $code)
    {
        session([
            'code_id' => $code->id,
            'user_id' => $code->user_id,
        ]);
    }

    protected function forgetSession()
    {
        session(['user_id','code_id']);
    }

    public function activate()
    {

        if (!$this->isValidCode()) return static::INVALID_CODE;
        # delete code
        $this->getToken()->delete();
        # active two factor
        $this->getUser()->activateTwoFactor();
        # return response
        $this->forgetSession();
        # response
        return static::ACTIVATED;
    }

    public function deactivate(User $user)
    {
       return $user->deactivateTwoFactor();
    }

    protected function isValidCode()
    {
       return !$this->getToken()->isExpired() && $this->getToken()->isEqualWith($this->request->code);
    }

    protected function getToken()
    {
        return $this->code ?? $this->code = TwoFactor::findOrFail(session('code_id'));
    }


    protected function getUser()
    {
        return User::findOrFail(session('user_id'));
    }

}
