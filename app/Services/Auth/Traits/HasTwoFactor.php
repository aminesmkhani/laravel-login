<?php


namespace App\Services\Auth\Traits;


use App\Models\TwoFactor;

trait HasTwoFactor
{
    public function code()
    {
        return $this->hasOne(TwoFactor::class);
    }

    public function activateTwoFactor()
    {
        $this->has_two_factor = true;
        $this->save();
    }
}