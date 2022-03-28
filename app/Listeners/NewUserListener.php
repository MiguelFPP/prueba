<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Models\Person;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class NewUserListener
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
    public function handle(NewUserEvent $event)
    {
        $user = Person::where('email', $event->person->email)->get();
        Notification::send($user, new NewUserNotification($event->person));
    }
}
