<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptEvent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $oEvent)
    {
        $this->oEvent = $oEvent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('challenge-programma@peter-romijn.nl')
                  ->subject('Evenement is goed gekeurd - Challenge programma')
                  ->view('mail/event/accept', [
                    'oEvent' => $this->oEvent,
                    'oOrganiser' => $this->oEvent->organiser,
                  ]);
    }
}
