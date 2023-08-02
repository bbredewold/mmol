<?php

namespace App\Console\Commands;

use App\Events\NightscoutReloadTriggered;
use Illuminate\Console\Command;

class RefreshNightscoutEntries extends Command
{
    protected $signature = 'app:refresh-nightscout-entries';

    protected $description = 'Refresh entries from Nightscout API';

    public function handle(): void
    {
        NightscoutReloadTriggered::dispatch();
    }
}
