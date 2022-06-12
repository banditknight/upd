<?php

namespace App\Mail\v1;

use App\Models\v1\ResetPasswordToken;
use App\Models\v1\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;

    public $resetPasswordToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, ResetPasswordToken $resetPasswordToken)
    {
        $this->user = $user;
        $this->resetPasswordToken = $resetPasswordToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.account.forgot-password')->with([
            'token' => $this->resetPasswordToken->token
        ])->subject(__('email.subject_forgot_password'));
    }
}
