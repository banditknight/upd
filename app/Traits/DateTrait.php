<?php

namespace App\Traits;

use Carbon\Carbon;

trait DateTrait
{
    protected $dateFormat = 'd-m-Y';

    /**
     * @param $date
     * @return int
     */
    public function dateToTimestamp($date) : int
    {
        return Carbon::createFromFormat($this->dateFormat, $date)->timestamp;
    }

    /**
     * @param $timestamp
     * @return string
     */
    public function timestampToDate($timestamp) : string
    {
        return Carbon::createFromTimestamp($timestamp, config('app.timezone'))->format($this->dateFormat);
    }
}
