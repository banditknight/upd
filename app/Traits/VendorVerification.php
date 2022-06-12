<?php

namespace App\Traits;

trait VendorVerification
{
    public function verify($user, $comment)
    {
        if (!$user || !$user->vendorId) {
            return [];
        }

        return \App\Models\v1\VendorVerification::create([
            'vendorId' => $user->vendorId,
            'comment' => $comment
        ]);
    }
}
