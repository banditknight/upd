<?php

namespace App\Mail\v1;

use App\Models\v1\ResetPasswordToken;
use App\Models\v1\User;
use App\Models\v1\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SendInActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Vendor
     */
    public $vendor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.account.inactive')->with([
        ])->subject(__('email.subject_inactivation'));
    }
}
