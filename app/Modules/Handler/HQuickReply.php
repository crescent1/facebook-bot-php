<?php

namespace App\Modules\Handler;

use App\Modules\BotFacebook\BFButtons;
use App\Modules\BotFacebook\BFMessages;
use App\Modules\BotFacebook\BotFacebook;
use App\Modules\Items\Text;
use Log;

class HQuickReply
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
     * handle quickreply
     *
     * @param array $data
     * @return void
     */
    public function hanlde(array $data)
    {
        $senderID =  $data['entry']['0']['messaging']['0']['sender']['id'];
        $payload = $data['entry']['0']['messaging']['0']['message']['quick_reply']['payload'];

        switch ($payload) {
            case 'HOME':

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

            case 'TEMPLATE':

                /**
                 * siapkan text balasan
                 */
                $text = Text::textTemplate();

                /**
                 * siapkan button
                 */
                $button = BFButtons::buttonMenuTemplate();

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
                 * kirimkan pesan balasan ke user
                 */
                $this->botfacebook->messages($message);
                break;

            case 'BHOME':

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

            case 'GNR':

                /**
                 * siapkan data text dll
                 */
                $text = Text::textGenertic();

                /**
                 * siapkan tombol quick replay
                 */
                $button = BFButtons::buttonBackTemplate();

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
                $message = BFMessages::genericTemplate($data);

                /**
                 * kirim pesan generic template
                 */
                $this->botfacebook->messages($message);

                break;

            case 'BTN':

                Log::info('BUTTON');
                break;

            case 'MDA':

                Log::info('media');
                break;

            default:
                # code...
                break;
        }

    }

}
