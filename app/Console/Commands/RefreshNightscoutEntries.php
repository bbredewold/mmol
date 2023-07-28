<?php

namespace App\Console\Commands;

use App\Events\NightscoutEntriesUpdated;
use App\Support\NightscoutService;
use Cache;
use Illuminate\Console\Command;

class RefreshNightscoutEntries extends Command
{
    protected $signature = 'app:refresh-nightscout-entries';

    protected $description = 'Refresh entries from Nightscout API';

    public function handle(NightscoutService $service): void
    {
        $entries = $service->getEntries();

        Cache::put('entries', $entries);

        NightscoutEntriesUpdated::dispatch($entries);
    }
}
