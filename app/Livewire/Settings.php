<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Native\Laravel\Facades;

class Settings extends Component
{
    public ?string $name;

    public function render(): View
    {
        return view('livewire.settings');
    }

    public function mount()
    {
        $this->name = Facades\Settings::get('user.name');
    }

    public function updatedName(string $value): void
    {
        Facades\Settings::set('user.name', $value);
    }

    public function close(): void
    {
        Facades\Window::close('settings');
    }
}
