<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeMail
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
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        // subscribe to the newsletter
        $Subscriber = Subscriber::create([
            'email'=> rand(11,999).'@gmail.com'
        ]);

        return $Subscriber;
    }
}
