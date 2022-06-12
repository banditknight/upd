<?php

namespace App\Mail\v1;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationCode extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $context;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$context)
    {
        $this->code = $code;
        $this->context = $context;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.account.verificationcode')->subject($this->context);
    }
}
