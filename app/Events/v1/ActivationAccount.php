<?php

namespace App\Events\v1;

use App\Models\v1\Vendor;

class ActivationAccount extends Event
{
    /**
     * @var $vendor
     */
    public $vendor;

    /**
     * @var @requestData
     */
    public $requestData;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Vendor $vendor, $requstData)
    {
        $this->vendor = $vendor;
        $this->requestData = $requstData;
    }
}
