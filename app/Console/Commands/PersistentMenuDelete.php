<?php

namespace App\Console\Commands;

use App\Modules\BotFacebook\BFMessages;
use App\Modules\BotFacebook\BotFacebook;
use Illuminate\Console\Command;

class PersistentMenuDelete extends Command
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
    protected $signature = 'botfb:delpm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Digunakan untuk  menghapus/nonaktifkan Persistent Menu';

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
        $message = BFMessages::deletePersistentMenu();
        $this->botfacebook->messagesDeleteProfile($message);
        $this->info('Delete Persistent Menu Sukses!');
    }
}
