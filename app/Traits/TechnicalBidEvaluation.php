<?php

namespace App\Traits;

use App\Models\v1\{Tender, Vendor};

trait TechnicalBidEvaluation
{
    public function calculate(Vendor $vendor, Tender $tender) : int
    {
        return 0;
    }
}
