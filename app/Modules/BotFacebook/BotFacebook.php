<?php

namespace App\Modules\BotFacebook;

use GuzzleHttp\Client;

class BotFacebook
{
    /**
     * set $http
     *
     * @var \GuzzleHttp\Client $http
     */
    private $http;

    /**
     * set token
     *
     * @var mixed|\Illuminate\Config\Repository
     */
    protected $token;

    public function __construct()
    {
        $this->token = config('botfacebook.fb_token');

        $this->http = new Client([
            'base_uri' => config('botfacebook.base_uri'),
        ]);

    }

    /**
     * Kirim pesan dengan menggunakan method messages
     *
     * @param array $message
     * @return void
     */
    public function messages(array $message)
    {
        $this->http->post('messages?access_token=' . $this->token, [
            'form_params' => $message,
        ]);
    }

    /**
     * Kirim pesan dengan menggunakan methd messageProfile
     *
     * @param array $message
     * @return void
     */
    public function messagesProfile(array $message)
    {
        $this->http->post('messenger_profile?access_token=' . $this->token, [
            'form_params' => $message
        ]);
    }
}
