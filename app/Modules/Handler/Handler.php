<?php

namespace App\Modules\Handler;

use App\Modules\BotFacebook\BFMessages;
use Log;

class Handler
{
    /**
     * set $handover
     *
     * @var \App\Modules\Handler\HHandover $handover
     */
    private $handover;

    public function __construct()
    {
        $this->handover = new HHandover();

    }

    /**
     * olah data dari messager
     *
     * @param string $message
     * @return void
     */
    public function handle(string $message)
    {

        /**
         * decode pesan
         *
         * @var array $data
         */
        $data = BFMessages::messageDecode($message);

        /**
         * cek status pesan
         *
         * @var string $status
         */
        $status = BFMessages::messageStatus($data);
        if($status === 'STANDBY'){

            $this->handover->handle($status, $data);

        } else {

            /**
             * cek type message
             *
             * @var string $type
             */
            $type =BFMessages::messageType($data);
            if($type === 'POSTBACK') {

                /**
                 * @var \App\Modules\Handler\HPostback $handle
                 */
                $handle = new HPostback();
                $handle->handle($data);

            } elseif($type === 'MESSAGE') {

                $contents = BFMessages::messageContentsType($data);
                if($contents === 'QUICK_REPLY') {

                    /**
                     * @var \App\Modules\Handler\HQuickReply $handle
                     */
                    $handle = new HQuickReply();
                    $handle->hanlde($data);

                } elseif($contents === 'MESSAGE') {

                    /**
                     * @var \App\Modules\Handler\HMessage $handle
                     */
                    $handle = new HMessage();
                    $handle->handle($data);

                } else {

                    /**
                     * @var \App\Modules\Handler\HOther $handle
                     */
                    $handle = new HOther();
                    $handle->handle($data);

                }

            } elseif($type === 'TAKETHREAD') {

                $this->handover->handle($type, $data);

            } elseif($type === 'REQUESTTHREAD') {

                $this->handover->handle($type, $data);

            } elseif($type === 'PASSTHREAD') {

                $this->handover->handle($type, $data);

            } else {

                /**
                 * @var \App\Modules\Handler\HOther $handle
                 */
                $handle = new HOther();
                $handle->handle($data);

            }
        }

    }
}
