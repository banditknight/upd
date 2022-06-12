<?php

namespace App\Listeners\v1\Workflow;

use App\Models\v1\SpatiePermission;
use App\Traits\User;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;
use ZeroDaHero\LaravelWorkflow\Events\LeaveEvent;
use ZeroDaHero\LaravelWorkflow\Events\TransitionEvent;
use ZeroDaHero\LaravelWorkflow\Events\EnterEvent;
use ZeroDaHero\LaravelWorkflow\Events\EnteredEvent;
use ZeroDaHero\LaravelWorkflow\Events\GuardEvent;

// https://github.com/zerodahero/laravel-workflow
class TenderWorkflowSubscriber
{
    use User;
    /**
     * Handle workflow guard events.
     */
    public function onGuard(GuardEvent $event)
    {
        /** @var \Symfony\Component\Workflow\Event\GuardEvent $originalEvent */
        $originalEvent = $event->getOriginalEvent();

        $transition = $originalEvent->getTransition();

        $currentMetaData = $transition ? $originalEvent
            ->getWorkflow()->getMetadataStore()->getTransitionMetadata($transition) : [];

        $role = $currentMetaData['role'] ?? null;

        $user = $this->getUser();

        /** @var \App\Models\v1\User $user */
        if ($user && !$user->can($role)) {
            $originalEvent->setBlocked(true);
        }
    }

    /**
     * Handle workflow leave event.
     */
    public function onLeave($event)
    {
        // The event can also proxy to the original event
        /** @var \Symfony\Component\Workflow\Event\GuardEvent $originalEvent */
        $originalEvent = $event->getOriginalEvent();

        $transition = $originalEvent->getTransition();

        $currentMetaData = $transition ? $originalEvent
            ->getWorkflow()->getMetadataStore()->getTransitionMetadata($transition) : [];

        $role = $currentMetaData['role'] ?? null;
        $note = $currentMetaData['note'] ?? null;

        $user = SpatiePermission::join(
            'spatieRoleHasPermissions', 'spatieRoleHasPermissions.permission_id', '=', 'spatiePermissions.id'
        )->join(
            'spatieModelHasRoles', 'spatieModelHasRoles.role_id', '=', 'spatieRoleHasPermissions.role_id'
        )->where('spatiePermissions.name', '=', $role)
            ->where('spatieModelHasRoles.model_type', '=', \App\Models\v1\User::class)
            ->get(['spatieModelHasRoles.model_id'])->toArray();

        if ($user && is_countable($user)) {
            $modelIds = array_column($user, 'model_id');
            $findUser = \App\Models\v1\User::whereIn('id', $modelIds)->get(['email'])->toArray();
            $emails = array_column($findUser, 'email');

            // dispatch email;
            Log::info('Dispatch email to correspondent user.');
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            GuardEvent::class,
            'App\Listeners\v1\Workflow\TenderWorkflowSubscriber@onGuard'
        );

        $events->listen(
            LeaveEvent::class,
            'App\Listeners\v1\Workflow\TenderWorkflowSubscriber@onLeave'
        );
    }

    public function __invoke()
    {
        //
    }
}
