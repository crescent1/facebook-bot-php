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
        $idPengirim =  $data['entry']['0']['messaging']['0']['sender']['id'];

        if($status === 'TAKETHREAD') {

            // belum bibuat

        }

        if($status === 'REQUESTTHREAD') {

         

        }

        if($status === 'PASSTHREAD') {

            
        }

    }

}
