<?php

namespace App\Listeners\v1\VendorRegistered;

use App\Events\v1\VendorRegistered;
use App\Jobs\v1\SendMailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeMail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'listeners';

    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 60;

    /**
     * The number of times the queued listener may be attempted.
     *
     * @var int
     */
    public $tries = 5;

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
        //
    }

    /**
     * Determine whether the listener should be queued.
     *
     * @param VendorRegistered $event
     * @return bool
     */
    public function shouldQueue(VendorRegistered $event)
    {
        dispatch(new SendMailJob($event->vendor));

        return true;
    }

    /**
     * Handle a job failure.
     *
     * @param  VendorRegistered  $event
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(VendorRegistered $event, $exception)
    {
        //
    }

    /**
     * Determine the time at which the listener should timeout.
     *
     * @return \DateTime
     */
    public function retryUntil()
    {
        return \Carbon\Carbon::now()->addMinutes(5);
    }
}
