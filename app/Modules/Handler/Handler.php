<?php

namespace App\Modules\Handler;

use Log;

class Handler
{
    /**
     * Undocumented function
     *
     * @param string $message
     * @return void
     */
    public function handle(string $message)
    {

        Log::info($message);

    }
}
