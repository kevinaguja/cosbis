<?php

namespace App\Listeners;

use App\Events\ResendVerification;
use App\Mail\VerificationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationListener
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
     * @param  ResendVerification  $event
     * @return void
     */
    public function handle(ResendVerification $event)
    {
        \Mail::to($event->user)->send(new VerificationEmail($event->user));
    }
}
