<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Event;
use App\User;

class StudentEventRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $oEvent, User $oUser)
    {
        $this->oEvent = $oEvent;
        $this->oUser = $oUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from(env('MAIL_USERNAME'))
                  ->subject('Acceptatie Challenge programma')
                  ->view('mail/event/register')
                  ->with([
                    'oUser' => $this->oUser,
                    'oEvent' => $this->oEvent,
                  ]);
    }
}
