<?php

namespace App\Livewire;

use Cache;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Main extends Component
{
    public function render(): View
    {
        $entries = Cache::get('entries');

        return view('livewire.main', compact('entries'));
    }
}
