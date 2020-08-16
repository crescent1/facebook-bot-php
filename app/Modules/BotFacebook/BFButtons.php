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

}
