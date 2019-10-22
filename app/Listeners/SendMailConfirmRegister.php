<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\UserEmail;

class SendMailConfirmRegister
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        // dd($event->user['name']);
        \Mail::to($event->user['email'])->send(new UserEmail($event->user));
        return true;
    }
}
