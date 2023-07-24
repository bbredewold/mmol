<?php

namespace App\Http\Controllers;

use App\Support\NightscoutService;
use Native\Laravel\Facades\MenuBar;

class AppController extends Controller
{
    public function index(NightscoutService $service)
    {
        $readings = $service->getEntries();
        $lastReading = $readings->first();

        MenuBar::label($lastReading->getMmol());

        return view('index', compact('readings', 'lastReading'));
    }

    public function setup()
    {
        // Welcome to mmol!
    }

    public function settings()
    {
        // Settings screen
    }
}
