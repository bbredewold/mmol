<?php

namespace App\Providers;

use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        $interactions = Menu::new()
            ->link('https://nativephp.com', 'Force reload from Nightscout')
            ->separator()
            ->quit();

        MenuBar::create()
            ->width(400)
            ->height(300)
            ->withContextMenu($interactions)
            ->label('mmol...');

        Menu::new()
            ->submenu('mmol', $interactions)
            ->register();

    }
}
