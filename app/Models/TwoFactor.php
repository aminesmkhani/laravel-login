<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoFactor extends Model
{
    use HasFactory;
    protected $table = 'two_factor';
    protected $fillable = [
      'user_id',
      'code',
    ];


    public static function generateCodeFor(User $user)
    {
        $user->code()->delete();
        return static::create([
           'user_id' => $user->id,
           'code'    => mt_rand(1000, 9999),
        ]);
    }
}
