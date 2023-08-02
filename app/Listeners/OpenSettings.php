<?php

namespace App\Listeners;

use Native\Laravel\Facades\Window;

class OpenSettings
{
    /**
     * Handle the event.
     */
    public function handle(): void
    {
        Window::open('settings')
            ->width(600)
            ->height(400)
            ->route('settings')
            ->resizable(false)
            ->showDevTools(false)
            ->frameless();
    }
}
