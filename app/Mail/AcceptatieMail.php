<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class AcceptatieMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * The order instance.
     *
     * @var User
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
        return $this->from('main.mail.samebestserver.nl')
                    ->text('mail.acceptation');
    }
}
