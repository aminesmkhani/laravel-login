<?php

namespace App\Models;

use App\Jobs\SendEmail;
use App\Mail\SendMagicLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function send(array $options)
    {
        SendEmail::dispatch($this->user, new SendMagicLink($this, $options));
    }
}
