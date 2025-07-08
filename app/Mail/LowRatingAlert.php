<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LowRatingAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function build()
    {
        return $this->subject('Alert: Product Rating is Low')
                    ->view('Mail.lowrating');
    }
}
