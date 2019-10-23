<?php

namespace App\Listeners;

use App\Events\ResetPassword;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ResetPasswordEmail;

class SendMailResetPassword implements ShouldQueue
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
     * @param  ResetPassword  $event
     * @return void
     */
    public function handle(ResetPassword $event)
    {
        // dd($event);
        \Mail::to($event->password_reset->email)->send(new ResetPasswordEmail($event->password_reset));
    }
}
