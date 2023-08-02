<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
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
        MenuBar::create()
            ->icon(resource_path('icons/menuBarIconTemplate.png'))
            ->withContextMenu($interactions = Menu::new()
                ->link('https://nativephp.com', 'Force reload from Nightscout')
                ->separator()
                ->event(SettingsClickedEvent::class, 'Settings')
                ->quit())
            ->onlyShowContextMenu();

        $this->initApp();
    }

    public function initApp(): void
    {
        Artisan::call('app:refresh-nightscout-entries');

        // Boot App Logic here, that decides if app has settings.
        // No settings found?
        // -> Show Welcome screen (mini-wizard) with button to settings.
        // Settings found?
        //-> Init base state by running job that:
        // - gets shit from api
        // - cashes the shit
        // - update menubar en state

        // The Main App Component only checks the set state,
    }
}
