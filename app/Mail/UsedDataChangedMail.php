<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsedDataChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $messageForUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $messageForUser)
    {
        //
        $this->user = $user;
        $this->messageForUser = $messageForUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your used data has been changed')
                    ->view('emails.used-data-changed');
    }
}
