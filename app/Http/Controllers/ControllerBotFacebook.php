<?php

namespace App\Http\Controllers;

use App\Modules\Handler\Handler;
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
        /**
         * @var string $hubMode
         */
        $hubMode = $request->input('hub_mode');

        /**
         * @var string $subscribe
         */
        $subscribe = 'subscribe';

        /**
         * @var string $hubVerifyToken
         */
        $hubVerifyToken = $request->input('hub_verify_token');

        /**
         * @var string $token
         */
        $token = config('botfacebook.fb_token');

        /**
         * @var string $hubChallenge
         */
        $hubChallenge = $request->input('hub_challenge');



        if($hubMode === $subscribe && $hubVerifyToken === $token) {

            return response($hubChallenge, 200);

        } else {

            return response('Forbiden!', 403);
        }

    }

    /**
     * Undocumented function
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function webhook(Request $request)
    {
        /**
         * @var string $message
         */
        $message = $request->getContent();

        Log::info($message);

        /**
         * @var \App\Modules\Handler\Handler $handle
         */
        $handle = new Handler();
        $handle->handle($message);

        return response('OK', 200);

    }
}
