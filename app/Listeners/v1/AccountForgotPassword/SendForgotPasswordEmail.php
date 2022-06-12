<?php

namespace App\Listeners\v1\AccountForgotPassword;

use App\Events\v1\AccountForgotPassword;
use App\Jobs\v1\SendForgotPasswordEmailJob;
use App\Models\v1\ResetPasswordToken;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class SendForgotPasswordEmail implements ShouldQueue
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
     * @param  AccountForgotPassword  $event
     * @return void
     */
    public function handle(AccountForgotPassword $event)
    {
        //
    }

    /**
     * Determine whether the listener should be queued.
     *
     * @param AccountForgotPassword $event
     * @return bool
     */
    public function shouldQueue(AccountForgotPassword $event)
    {
        $user = $event->user;

        $currentTime = \Carbon\Carbon::now();

        $expiredFor = env('RESET_PASSWORD_TOKEN_EXPIRED_FOR', 10);
        $expiredTimeStamp = $currentTime::now()
            ->addMinutes(is_int($expiredFor) ? $expiredFor : 10)->timestamp;

        $findActiveResetPassword = ResetPasswordToken::where('userId', '=', $user->id)
            ->where('isActive', '=', 1)
            ->first();

        if (!$findActiveResetPassword) {
            $resetPasswordToken = new ResetPasswordToken();
            $resetPasswordToken->userId = $user->id;
            $resetPasswordToken->token = Str::random(64);
            $resetPasswordToken->expired = $expiredTimeStamp;

            $resetPasswordToken->save();
        }

        dispatch(new SendForgotPasswordEmailJob($user, $findActiveResetPassword ?: $resetPasswordToken));

        return true;
    }

    /**
     * Handle a job failure.
     *
     * @param  AccountForgotPassword  $event
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(AccountForgotPassword $event, $exception)
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
