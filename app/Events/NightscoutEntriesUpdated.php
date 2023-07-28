<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class NightscoutEntriesUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Collection $entries)
    {
    }
}
