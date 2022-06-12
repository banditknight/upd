<?php

namespace Tests;

trait UserTrait
{
    public $vendorId;

    public $userId;

    public function getVendorUser()
    {
        $vendor = \App\Models\v1\User::where('email', '=', 'vendor@sentralnusa.com')->first();

        $this->vendorId = $vendor->vendorId;
        $this->userId = $vendor->userId;

        return $vendor;
    }

    public function getSuperAdminUser()
    {
        $superAdmin = \App\Models\v1\User::where('email', '=', 'admin@sentralnusa.com')->first();

        $this->vendorId = $superAdmin->vendorId;
        $this->userId = $superAdmin->userId;

        return $superAdmin;
    }
}
