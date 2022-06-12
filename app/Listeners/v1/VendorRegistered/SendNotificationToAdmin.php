<?php

namespace App\Listeners\v1\VendorRegistered;

use App\Events\v1\VendorRegistered;
use App\Models\v1\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNotificationToAdmin implements ShouldQueue
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
        $vendor = $event->vendor;

        Mail::to(env('MAIL_ADMIN_APPROVAL', 'admin@sentralnusa.com'))
            ->send(new \App\Mail\v1\SendVendorRegisteredNotificationToAdmin($event->vendor));

        (new Notification)->create([
            'toVendorId' => 0,
            'toUserId' => 0,
            'title' => __('notification.title_new_vendor_registered'),
            'message' => __('notification.message_new_vendor_registered', [
                'companyName' => $vendor->name,
                'picEmail' => $vendor->picEmail
            ]),
            'context' => 'vendor',
            'recordId' => $vendor->id,
            'isRead' => false,
        ]);

        return true;
    }
}
