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
                'title' => 'HOME',
                'payload' => 'HOME'
            ],
            [
                'content_type' => 'text',
                'title' => 'TEMPLATE',
                'payload' => 'TEMPLATE'
            ],

        ];

        return $button;

    }

    /**
     * siapkan tombol untuk quick reply
     *
     * @return array
     */
    public static function buttonMenuTemplate()
    {
        /**
         * @var array $button
         */
        $button = [
            [
                'content_type' => 'text',
                'title' => 'BACK',
                'payload' => 'BHOME'
            ],
            [
                'content_type' => 'text',
                'title' => 'GENERIC TEMPLATE',
                'payload' => 'GNR'
            ],
            [
                'content_type' => 'text',
                'title' => 'BUTTON TEMPLATE',
                'payload' => 'BTN'
            ],
            [
                'content_type' => 'text',
                'title' => 'MEDIA TEMPLATE',
                'payload' => 'MDA'
            ],
            [
                'content_type' => 'text',
                'title' => 'LIST TEMPLATE',
                'payload' => 'LST'
            ],

        ];

        return $button;

    }

}
