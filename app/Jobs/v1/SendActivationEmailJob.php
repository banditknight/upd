<?php

namespace App\Jobs\v1;

use App\Models\MailableInterface;
use App\Models\v1\Vendor;
use Illuminate\Support\Facades\Mail;

class SendActivationEmailJob extends AbstractJob
{
    /** @var Vendor */
    public $mailAbleInterface;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MailableInterface $mailable)
    {
        $this->mailAbleInterface = $mailable;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mailAbleInterface->toEmailAddress())
            ->send(new \App\Mail\v1\SendActivationEmail($this->mailAbleInterface))
        ;
    }
}
