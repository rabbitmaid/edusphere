<?php

namespace App\Listeners;

use App\Events\RegistrationPaid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\RegistrationPaidNotification;

class SendRegistrationPaidNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegistrationPaid $event): void
    {
        $event->user->notify(new RegistrationPaidNotification($event->transaction));
    }
}
