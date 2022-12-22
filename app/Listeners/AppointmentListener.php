<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\AppointmentNotification;
use Illuminate\Support\Facades\Notification;

class AppointmentListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::all()->each(function (User $user) use ($event) {
            Notification::send($user, new AppointmentNotification($event->appointment));
        });
    }
}
