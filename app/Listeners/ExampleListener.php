<?php

namespace App\Listeners;

use App\Events\ExampleEvent;
use Illuminate\Support\Facades\Log;

class ExampleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ExampleEvent  $event
     * @return void
     */
    public function handle(ExampleEvent $event)
    {
        Log::info("Test Listener");
    }
}
