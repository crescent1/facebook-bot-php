<?php

namespace App\Modules\Handler;

use App\ModelMessagePosition;
use Log;

class HMessage
{
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

        }

    }

}
