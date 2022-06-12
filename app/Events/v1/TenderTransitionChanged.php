<?php

namespace App\Events\v1;

use App\Models\v1\Tender;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class TenderTransitionChanged extends Event
{
    use InteractsWithSockets, SerializesModels;

    /** @var Tender $tender */
    public $tender;

    public $transition;

    public function __construct(Tender $tender, $transitionName)
    {
        $this->tender = $tender;
        $this->transition = $transitionName;
    }
}
