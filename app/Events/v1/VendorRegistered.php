<?php

namespace App\Events\v1;

use App\Models\v1\Vendor;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class VendorRegistered extends Event
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var Vendor
     */
    public $vendor;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }
}
