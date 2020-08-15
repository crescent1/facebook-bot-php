<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class ControllerBotFacebook extends Controller
{
    /**
     * Verifikasi setting webhook dari apps facebook
     * di link berikut : https://developers.facebook.com/apps/
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function setWebhook(Request $request)
    {
        $hubMode = $request->input('hub_mode');
        $hubVerifyToken = $request->input('hub_verify_token');
        $hubChallenge = $request->input('hub_challenge');
        $token = config('botfacebook.fb.token');

        if($hubMode === 'subscribe' && $hubVerifyToken === $token) {

            return response($hubChallenge, 200);

        } else {

            return response('Forbiden!', 403);
        }

    }

    public function webhook(Request $request)
    {

    }
}
