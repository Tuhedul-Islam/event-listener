<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\JsonResponse;
use Illuminate\Queue\InteractsWithQueue;

class SendAdminMail
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
            'email'=> 'admin'.rand(11,999).'@gmail.com'
        ]);

        return $Subscriber;
    }
}
