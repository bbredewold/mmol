<?php

namespace App\Support;

use App\Support\Nightscout\Entry;
use Http;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;

class NightscoutService
{
    private PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::withUrlParameters([
            'domain' => config('services.nightscout.domain'),
            'version' => 'v1',
        ])
            ->timeout(3)
            ->retry(2);
    }

    /**
     * Returns a collection of Nightscout Entries
     *
     * @return Collection<int, Entry>
     */
    public function getEntries(): Collection
    {
        $entries = $this->client->get('{+domain}/api/{version}/entries.json')->json();

        return collect($entries)->mapInto(Entry::class);
    }
}
