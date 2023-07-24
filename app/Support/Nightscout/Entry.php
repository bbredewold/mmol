<?php

namespace App\Support\Nightscout;

use Arr;
use Carbon\Carbon;

class Entry
{
    public readonly ?string $type;

    public readonly ?Carbon $date;

    public readonly ?int $sgv;

    public readonly ?string $direction;

    public readonly ?int $noise;

    public readonly ?int $filtered;

    public readonly ?int $unfiltered;

    public readonly ?int $rssi;

    public readonly ?string $device;

    public function __construct(array $data)
    {
        $this->type = Arr::get($data, 'type');

        $this->date = Carbon::parse(Arr::get($data, 'dateString'))->utc();
        $this->sgv = Arr::get($data, 'sgv');
        $this->direction = Arr::get($data, 'direction');

        $this->noise = Arr::get($data, 'noise');
        $this->filtered = Arr::get($data, 'filtered');
        $this->unfiltered = Arr::get($data, 'unfiltered');
        $this->rssi = Arr::get($data, 'rssi');
        $this->device = Arr::get($data, 'device');
    }

    public function getMgdl(): ?int
    {
        return $this->sgv;
    }

    public function getMmol(): ?float
    {
        return round($this->sgv / 18.018018, 1);
    }

    public function getMmolString(): ?string
    {
        return number_format($this->getMmol(), 1);
    }
}