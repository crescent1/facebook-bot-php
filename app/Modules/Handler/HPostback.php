<?php

namespace App\Modules\Handler;

use App\Modules\BotFacebook\BFButtons;
use App\Modules\BotFacebook\BFMessages;
use App\Modules\BotFacebook\BotFacebook;
use App\Modules\Items\Text;

class HPostback
{
    /**
     * set $botfacebook
     *
     * @var \App\Modules\BotFacebook\BotFacebook $botfacebook
     */
    private $botfacebook;

    public function __construct()
    {
        $this->botfacebook = new BotFacebook();
    }
    /**
     * handle postback
     *
     * @param array $data
     * @return void
     */
    public function handle(array $data)
    {
        $senderID =  $data['entry']['0']['messaging']['0']['sender']['id'];
        $payload =  $data['entry']['0']['messaging']['0']['postback']['payload'];

        if($payload === 'MULAI') {

            /**
             * siapkan text
             */
            $text = Text::textWelcome();

            /**
             * siapkan button
             */
            $button = BFButtons::buttonWelcome();

            /**
             * siapkan data untuk parameter
             *
             * @var array $data
             */
            $data = [
                'senderID' => $senderID,
                'text' => $text,
                'button' => $button,
            ];

            /**
             * siapkan parameter
             */
            $message = BFMessages::buttonTemplate($data);

            /**
             * kirimkan pesan balasan ke user
             */
            $this->botfacebook->messages($message);


        }

    }

}

