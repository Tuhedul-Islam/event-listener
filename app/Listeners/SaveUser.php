<?php

namespace App\Listeners;

use App\Events\UserSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveUser
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
     * @param  \App\Events\UserSaving  $event
     * @return void
     */
    public function handle(UserSaving $event)
    {
        app('log')->info($event->user);
    }
}
