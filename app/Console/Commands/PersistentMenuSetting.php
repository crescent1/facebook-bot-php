<?php

namespace App\Console\Commands;

use App\Modules\BotFacebook\BFMessages;
use App\Modules\BotFacebook\BotFacebook;
use Illuminate\Console\Command;

class PersistentMenuSetting extends Command
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
    protected $signature = 'botfb:setpm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Digunakan untuk setting Persistent Menu';

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
     * @return mixed
     */
    public function handle()
    {
        $message = BFMessages::settingPersistentMenu();
        $this->botfacebook->messagesProfile($message);
        $this->info('Setting Persistent Menu Sukses!');
    }
}
