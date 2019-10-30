<?php

namespace App\Listeners;

use App\Events\ConfirmRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\UserEmail;

class SendMailConfirmRegister implements ShouldQueue
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
     * @param  ConfirmRegister  $event
     * @return void
     */
    public function handle(ConfirmRegister $event)
    {
        \Mail::to($event->user['email'])->send(new UserEmail($event->user));
        return true;
    }
}
