<?php

namespace App\Events\v1;

use App\Models\v1\User;

class AccountForgotPassword extends Event
{
    /**
     * @var $user
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
