<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Verify Your Email - ResellZone')
            ->view('Mail.verify-email')
            ->with([
                'verificationLink' => url('/verify-email/' . $this->user->verification_token),
                'user' => $this->user,
            ]);
    }
}
