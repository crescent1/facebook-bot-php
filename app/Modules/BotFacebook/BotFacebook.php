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
     * uppdate to .env
     *
     * @param string $token
     * @return void
     */
    public function updateENV(string $token)
    {
        /**
         * @var string
         */
        $key = 'FACEBOOK_TOKEN=';

        /**
         * @var string
         */
        $oldValue = $this->token;

        /**
         * @var string
         */
        $newValue = $token;

        /**
         * @var string $path
         */
        $path = base_path('.env');

        if (file_exists($path)) {

            if($oldValue == '') {

                $oldValue = 'old';
            }

            file_put_contents($path, str_replace(
                $key . $oldValue, $key . $newValue, [file_get_contents($path)]
            ));
        }
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

    /**
     * delete messageProfile
     *
     * @param array $message
     * @return void
     */
    public function messagesDeleteProfile(array $message)
    {
        $this->http->delete('messenger_profile?access_token=' . $this->token, [
            'form_params' => $message
        ]);
    }

    /**
     * kirim pass thread control
     *
     * @param array $message
     * @return void
     */
    public function passThreadControl(array $message)
    {
        $this->http->post('pass_thread_control?access_token=' . $this->token, [
            'form_params' => $message
        ]);
    }

    /**
     * kirim take thread control
     *
     * @param array $message
     * @return void
     */
    public function takeThreadControl(array $message)
    {
        $this->http->post('take_thread_control?access_token=' . $this->token, [
            'form_params' => $message
        ]);
    }
}
