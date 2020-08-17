<?php

namespace App\Modules\Handler;

use App\Modules\BotFacebook\BFButtons;
use App\Modules\BotFacebook\BFMessages;
use App\Modules\BotFacebook\BotFacebook;
use App\Modules\Items\Text;
use Log;

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

        switch ($payload) {
            case 'MULAI':
                /**
                 * ketika tombol get started ditekan, bot akan mengambil alih controll
                 */

                /**
                 * siapkan parameter yang dibutuhkan untuk take thread control
                 */
                $takeControl = BFMessages::takeThreadControl($senderID);

                /**
                 * kirim pesan take thread control
                 */
                $this->botfacebook->takeThreadControl($takeControl);

                /**
                 * siapkan text balasan
                 */
                $text = Text::textWelcome();

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
                break;

            case 'CHATBOT' :

                /**
                 * siapkan parameter yang dibutuhkan untuk take thread control
                 */
                $takeControl = BFMessages::takeThreadControl($senderID);

                /**
                 * kirim pesan take thread control
                 */
                $this->botfacebook->takeThreadControl($takeControl);

                /**
                 * siapkan text
                 */
                $text = Text::textChatBOT();

                /**
                 * siapkan tombol
                 */
                $button = BFButtons::buttonQuickReply();

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
                $message = BFMessages::quickReply($data);

                /**
                 * kirim pesan quick reply
                 */
                $this->botfacebook->messages($message);


                break;

            case 'CHATCS':

                /**
                 * siapkan parameter untuk pass thread control
                 */
                $passControll = BFMessages::passThreadControl($senderID);

                /**
                 * kirim pesan pass thread control
                 */
                $this->botfacebook->passThreadControl($passControll);

                /**
                 * siapkan text
                 */
                $text = Text::textChatCS();

                /**
                 * @var array $data
                 */
                $data = [
                    'senderID' => $senderID,
                    'text' => $text,
                ];

                /**
                 * siapkan parameter
                 */
                $message = BFMessages::messageOnly($data);

                /**
                 * kirim pesan
                 */
                $this->botfacebook->messages($message);

                break;

            default:
                # code...
                break;
        }

    }

}

