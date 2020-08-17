<?php

namespace App\Modules\BotFacebook;

class BFButtons
{
    /**
     * set buttons untuk buttonTempalte
     * button welcome
     *
     * @return array
     */
    public static function buttonWelcome()
    {
        /**
         * @var array $button
         */
        $button = [
            [
                'type' => 'postback',
                'title' => 'CHAT BOT',
                'payload' => 'CHATBOT'
            ],
            [
                'type' => 'postback',
                'title' => 'CHAT CS',
                'payload' => 'CHATCS'
            ],
        ];

        return $button;
    }

    /**
     * siapkan tombol untuk quick reply
     *
     * @return array
     */
    public static function buttonQuickReply()
    {
        /**
         * @var array $button
         */
        $button = [
            [
                'content_type' => 'text',
                'title' => 'TEST',
                'payload' => 'TEST'
            ],
            [
                'content_type' => 'text',
                'title' => 'TEST',
                'payload' => 'TEST'
            ],
            [
                'content_type' => 'text',
                'title' => 'TEST',
                'payload' => 'TEST'
            ],
            [
                'content_type' => 'text',
                'title' => 'TEST',
                'payload' => 'TEST'
            ],

        ];

        return $button;

    }

}
