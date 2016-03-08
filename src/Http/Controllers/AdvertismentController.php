<?php

namespace Odotmedia\Advertisements\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Event;

class AdvertisementController extends Controller
{
    /**
     * Clicked advertisement.
     *
     * @param string $uuid
     *
     * @return RedirectResponse
     */
    public function clicked($uuid)
    {
        // Get first record that belongs to the UUID
        // If null, redirect to a config determined URL.
        // Fire off new event.
        // Redirect to advertisement click_url.
    }
}