<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Invitation;


class InvitaionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->invitation->group_report->owner);
        return $this->view('mail.invitation',['invitation' => $this->invitation]);
    }
}
