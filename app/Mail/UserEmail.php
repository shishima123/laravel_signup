<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class UserEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $oUser;

    public function __construct(User $oUser)
    {
       $this->oUser = $oUser;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
        {
            return $this->markdown('emails.sendmail');
        }
}