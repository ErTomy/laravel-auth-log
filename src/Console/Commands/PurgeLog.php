<?php

namespace Ertomy\Authlog\Console\Commands;

use Illuminate\Console\Command;
use Ertomy\Authlog\Models\Log;

class PurgeLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authlog:purge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vaciar la tabla de log';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::truncate();
        $this->info("Log borrado");
    }
}
