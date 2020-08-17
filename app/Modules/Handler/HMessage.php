<?php

namespace App\Modules\Handler;

use App\ModelMessagePosition;
use App\Modules\BotFacebook\BFButtons;
use App\Modules\BotFacebook\BFMessages;
use App\Modules\BotFacebook\BotFacebook;
use App\Modules\Items\Text;
use Log;

class HMessage
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
     * handle message
     *
     * @param array $data
     * @return void
     */
    public function handle(array $data)
    {
        $senderID =  $data['entry']['0']['messaging']['0']['sender']['id'];
        $isiPesan = $data['entry']['0']['messaging']['0']['message']['text'];

        /**
         * @var object $data
         */
        $data = ModelMessagePosition::whereChatId($senderID)->first();

        if($data) {

            /**
             * @var string $posisi
             */
            $posisi = $data->posisi;

            switch ($posisi) {
                case 'value':
                    # buat sesuai kebutuhan
                    break;

                default:
                    # buat sesuai kebutujhan
                    break;
            }

        } else {

            /**
             * siapkan text
             */
            $text = Text::textChatElse();

            /**
             * siapkan button
             */
            $button = BFButtons::buttonWelcome();

            /**
             * siapkan data parameter
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
