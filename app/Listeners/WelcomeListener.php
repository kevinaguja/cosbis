<?php

namespace App\Listeners;

use App\Events\WelcomeVerification;
use App\Mail\WelcomeEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeListener
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
     * @param  WelcomeVerification  $event
     * @return void
     */
    public function handle(WelcomeVerification $event)
    {
        \Mail::to($event->user)->send(new WelcomeEmail($event->user));
    }
}
