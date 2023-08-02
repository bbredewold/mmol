<?php

namespace App\Listeners;

use App\Events\NightscoutReloadTriggered;
use App\Events\ReloadSettingsClickedEvent;
use App\Support\Nightscout\Entry;
use App\Support\NightscoutService;
use Illuminate\Support\Facades\Cache;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Notification;

class UpdateAppState
{
    public function __construct(public readonly NightscoutService $service)
    {
    }

    public function handle(NightscoutReloadTriggered|ReloadSettingsClickedEvent $event): void
    {
        $entries = $this->service->getEntries();

        $this->updateMenuBar($entries->last());
        $this->triggerWarnings($entries->last());

        Cache::put('entries', $entries);

        if ($event instanceof ReloadSettingsClickedEvent) {
            Notification::title('Nightscout Reloaded')
                ->message('The data from Nightscout was succesfully reloaded!')
                ->show();
        }
    }

    public function updateMenuBar(Entry $entry): void
    {
        MenuBar::label($entry->getMmol());
    }

    public function triggerWarnings(Entry $entry): void
    {
        // If - Alerts are on - and not silenced - and above threshold...
        // Also, push an event, so the right alert component is shown??
        if ($entry->getMmol() > 10) {
            Notification::title('Oh oh')->message('A bit high isn\'t it?')->send();
        }
    }
}
