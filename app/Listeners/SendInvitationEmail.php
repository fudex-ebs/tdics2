<?php

namespace App\Listeners;

use App\Events\InvitaionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;


use App\Mail\InvitaionMail;
use Illuminate\Support\Facades\Mail;
use App\Invitation;
use Log;
class SendInvitationEmail
{
    use Queueable;

     public $invitation;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Handle the event.
     *
     * @param  InvitaionCreated  $event
     * @return void
     */
    public function handle(InvitaionCreated $event)
    {
        // Mail::queue('mail.invitation', ['invitation' => $this->invitation], function ($m) {
        //             $m->from(env('MAIL_USERNAME', 'info@tdics.com'), 'tdics');
        //             $m->to($this->invitation->email)->subject('tdics invitation');
        // });
        Mail::to(['address' => $event->invitation->email])->send(new InvitaionMail($event->invitation));


    }
}
