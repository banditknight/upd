<?php

namespace App\Providers;

use App\Events\v1\{AccountForgotPassword, ActivationAccount, VendorRegistered};
use App\Events\v1\RepositoryEntityCreated;
use App\Events\v1\RepositoryEntityDeleted;
use App\Events\v1\RepositoryEntityUpdated;
use App\Listeners\CleanCacheRepository;
use App\Listeners\v1\AccountForgotPassword\SendForgotPasswordEmail;
use App\Listeners\v1\ActivationAccount\SendActivationEmail;
use App\Listeners\v1\ActivationAccount\SendInActivationEmail;
use App\Listeners\v1\VendorRegistered\{CreateUserAccount,
    MoveAttachmentsIntoDirectory,
    SendNotificationToAdmin,
    SendWelcomeMail,
    SendWelcomeNotification
};
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
use App\Listeners\v1\Workflow\TenderWorkflowSubscriber;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
        VendorRegistered::class => [
            MoveAttachmentsIntoDirectory::class,
            CreateUserAccount::class,
            SendNotificationToAdmin::class,
            SendWelcomeMail::class,
            SendWelcomeNotification::class,
        ],
        AccountForgotPassword::class => [
            SendForgotPasswordEmail::class,
        ],
        ActivationAccount::class => [
            SendActivationEmail::class,
            SendInActivationEmail::class
        ],
        RepositoryEntityCreated::class => [
            CleanCacheRepository::class
        ],
        RepositoryEntityUpdated::class => [
            CleanCacheRepository::class
        ],
        RepositoryEntityDeleted::class => [
            CleanCacheRepository::class
        ]
    ];

    protected $subscribe = [
        TenderWorkflowSubscriber::class,
    ];
}
