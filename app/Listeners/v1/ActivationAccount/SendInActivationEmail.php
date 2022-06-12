<?php

namespace App\Listeners\v1\ActivationAccount;

use App\Events\v1\ActivationAccount;
use App\Jobs\v1\SendInActivationEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendInActivationEmail implements ShouldQueue
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
     * @param  ActivationAccount  $event
     * @return void
     */
    public function handle(ActivationAccount $event)
    {
        //
    }

    /**
     * Determine whether the listener should be queued.
     *
     * @param ActivationAccount $event
     * @return bool
     */
    public function shouldQueue(ActivationAccount $event)
    {
        $vendor = $event->vendor;
        $requestData = $event->requestData;

        if ($requestData['isActive'] === 0) {
            dispatch(new SendInActivationEmailJob($vendor));
        }

        return true;
    }

    /**
     * Handle a job failure.
     *
     * @param  ActivationAccount  $event
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(ActivationAccount $event, $exception)
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
