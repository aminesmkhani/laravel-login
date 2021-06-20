<?php

namespace App\Services\Notification\Providers;




use App\Models\User;
use App\Services\Notification\Contracts\Provider;
use App\Services\Notification\Exceptions\UserDoesNotHaveNumber;
use GuzzleHttp\Client;

class SmsProvider implements Provider
{

    private $user;
    private $text;


    public function __construct(User $user, String $text)
    {
        $this->user = $user;
        $this->text = $text;
    }


    public function send()
    {
        $this->havePhoneNumber();

        $client = new Client();

        $response = $client->post(config('services.sms.uri'),$this->prepareDataForSms());
        return $response->getBody();
    }


    private function prepareDataForSms()
    {
        $data = [
            'op' => 'send',
            'message' => $this->text,
            'to' => [$this->user->phone_number]
        ];
        return ['json' => array_merge($data,config('services.sms.auth'))];
    }

    private function havePhoneNumber()
    {
        if (is_null($this->user->phone_number)){
            throw new UserDoesNotHaveNumber();
        }
    }
}
