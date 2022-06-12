<?php

namespace App\Jobs\v1;

use App\Models\MailableInterface;
use App\Models\v1\ResetPasswordToken;
use App\Models\v1\User;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordEmailJob extends AbstractJob
{
    /** @var User */
    public $mailAbleInterface;

    /** @var ResetPasswordToken */
    public $resetPasswordToken;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MailableInterface $mailable, ResetPasswordToken $resetPasswordToken)
    {
        $this->mailAbleInterface = $mailable;
        $this->resetPasswordToken = $resetPasswordToken;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mailAbleInterface->toEmailAddress())
            ->send(new \App\Mail\v1\SendForgotPasswordEmail($this->mailAbleInterface, $this->resetPasswordToken))
        ;
    }
}
