<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use App\Notifications\ContactCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendContactNotification
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
     * @param  ContactCreated  $event
     * @return void
     */
    public function handle(ContactCreated $event)
    {
        $contact = $event->contact;
        $contact->notify(new ContactCreatedNotification($contact));
    }
}
