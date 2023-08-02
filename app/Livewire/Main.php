<?php

namespace App\Livewire;

use App\Events\NightscoutReloadTriggered;
use App\Support\Nightscout\Entry;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Main extends Component
{
    public function render(): View
    {
        //@todo TEMP!!
        NightscoutReloadTriggered::dispatch();

        /* @var Collection<Entry> $entries */
        $entries = Cache::get('entries');

        return view('livewire.main', compact('entries'));
    }
}
