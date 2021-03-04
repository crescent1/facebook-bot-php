<?php

namespace App\Console\Commands;

use App\Modules\BotFacebook\BotFacebook;
use Illuminate\Console\Command;

class FBToken extends Command
{
    /**
     * set $botfacebook
     *
     * @var \App\Modules\BotFacebook\BotFacebook $botfacebook
     */
    protected $botfacebook;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebook:token {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Digunakan untuk input token dari app console';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BotFacebook $data)
    {
        parent::__construct();

        $this->botfacebook = $data;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /**
         * @var string
         */
        $token = $this->argument('token');

        $this->botfacebook->updateENV($token);

        $this->info('Token berhasil disimpan!');
        return 0;
    }
}
