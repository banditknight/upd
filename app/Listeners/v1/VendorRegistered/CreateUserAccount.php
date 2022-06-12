<?php

namespace App\Listeners\v1\VendorRegistered;

use App\Events\v1\VendorRegistered;
use App\Models\v1\User;

class CreateUserAccount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  VendorRegistered  $event
     * @return void
     */
    public function handle(VendorRegistered $event)
    {
        /** @var User $user */
        $user = User::factory()->create([
            'code' => 'U'.sprintf('%05d',User::count()+1),
            'name' => $event->vendor->picFullName,
            'email' => $event->vendor->picEmail,
            'phone' => $event->vendor->picMobileNumber,
            'vendorId' => $event->vendor->id,
            'isPrimary' => true
        ]);

        // assign vendor role.
        $user->assignRole('vendor');

        $event->vendor->update([
            'picId' => $user->id
        ]);
    }
}
