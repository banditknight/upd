<?php

namespace App\Traits;

trait User
{
    protected $user;

    public function getUser()
    {
        if ($this->user !== null) {
            return $this->user;
        }

        $user = auth()->user();

        if (!$user) {
            return null;
        }

        $this->user = $user;

        return $user;
    }
}
