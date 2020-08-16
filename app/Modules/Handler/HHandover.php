<?php

namespace App\Modules\Handler;

use Log;

class HHandover
{
    /**
     * hanle handover sesuai status yang diberikan
     *
     * @param string $status
     * @param array $data
     * @return void
     */
    public function handle(string $status, array $data)
    {
        if($status === 'STANDBY') {

            $idPengirim =  $data['entry']['0']['stanby']['0']['sender']['id'];

            //belum dibuat

            // Log::info('stanby');
            // Log::info(json_encode($data));

        }

        if($status === 'TAKETHREAD') {

            // belum bibuat

        }

        if($status === 'REQUESTTHREAD') {

            $idPengirim =  $data['entry']['0']['messaging']['0']['sender']['id'];

        }

        if($status === 'PASSTHREAD') {

            $idPengirim =  $data['entry']['0']['messaging']['0']['sender']['id'];

        }

    }

}
