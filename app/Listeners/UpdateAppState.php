<?php

namespace App\Listeners;

use App\Events\NightscoutEntriesUpdated;
use App\Support\Nightscout\Entry;
use Native\Laravel\Facades\MenuBar;

class UpdateAppState
{
    public function handle(NightscoutEntriesUpdated $event): void
    {
        $entries = $event->entries;

        $this->updateMenuBar($entries->first());
        $this->triggerWarnings($entries->first());
    }

    public function updateMenuBar(Entry $entry): void
    {
        MenuBar::label($entry->getMmol());
    }

    public function triggerWarnings(Entry $entry): void
    {
        // If - Alerts are on - and not silenced - and above threshold...
        // Also, push an event, so the right alert component is shown??
        if ($entry->getMmol() > 10 || true) {
            // Show application window
            MenuBar::show();
        }
    }
}
