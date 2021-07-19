<?php


namespace App\Services\Auth\Traits;


use App\Models\LoginToken;
use Illuminate\Support\Str;

trait MagicallyAuthenticable
{
    public function magicToken()
    {
        return $this->hasOne(LoginToken::class);
    }

    public function createToken()
    {
        # Delete The Past Token In Table
        $this->magicToken()->delete();

        # Generate Token
        return $this->magicToken()->create([
           'token' => Str::random('50')
        ]);
    }
}
