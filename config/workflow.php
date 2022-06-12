<?php

// Full workflow, annotated.
return [
    // Name of the workflow is the key
    'tender' => [
        'type' => 'state_machine', // or 'state_machine', defaults to 'workflow' if omitted
        // The marking store can be omitted, and will default to 'multiple_state'
        // for workflow and 'single_state' for state_machine if the type is omitted
        'marking_store' => [
            'type' => 'single_state', // or 'single_state', can be omitted to default to workflow type's default
            'property' => 'currentPlace', // this is the property on the model, defaults to 'marking'
            'class' => \ZeroDaHero\LaravelWorkflow\MarkingStores\EloquentMarkingStore::class, // optional, uses EloquentMethodMarkingStore by default (for Eloquent models)
        ],
        // optional top-level metadata
        'metadata' => [
            // any data
        ],
        'supports' => [\App\Models\v1\Tender::class], // objects this workflow supports
        // Specifies events to dispatch (only in 'workflow', not 'state_machine')
        // - set `null` to dispatch all events (default, if omitted)
        // - set to empty array (`[]`) to dispatch no events
        // - set to array of events to dispatch only specific events
        // Note that announce will dispatch a guard event on the next transition
        // (if announce isn't dispatched the next transition won't guard until checked/applied)
        'events_to_dispatch' => [
            Symfony\Component\Workflow\WorkflowEvents::ENTER,
            Symfony\Component\Workflow\WorkflowEvents::LEAVE,
            Symfony\Component\Workflow\WorkflowEvents::TRANSITION,
            Symfony\Component\Workflow\WorkflowEvents::ENTERED,
            Symfony\Component\Workflow\WorkflowEvents::COMPLETED,
            Symfony\Component\Workflow\WorkflowEvents::ANNOUNCE,
        ],
        'places' => [
            'draft',
            'inProgress',
            'inApprovalLevelOne',
            'inApprovalLevelTwo',
            'inApprovalLevelThree',
            'inApprovalLevelFour',
            'inApprovalLevelFive',
            'inApprovalLevelSix',
            'done',
            'rejected'
        ],
        'initial_places' => ['draft'], // defaults to the first place if omitted
        'transitions' => [
            'start_progress' => [
                'from' => 'draft',
                'to' => 'inProgress',
                // optional transition-level metadata
                'metadata' => [
                    // any data
                ]
            ],
            'mark_as_reject_to_draft' => [
                'from' => 'rejected',
                'to' => 'draft'
            ],
            'mark_as_in_approval_level_one' => [
                'from' => 'inProgress',
                'to' => 'inApprovalLevelOne',
                'metadata' => [
                    'role' => 'approveTenderLevelOne',
                    'note' => [

                    ],
                ]
            ],
            'mark_as_in_approval_level_two' => [
                'from' => 'inApprovalLevelOne',
                'to' => 'inApprovalLevelTwo',
                'metadata' => [
                    'role' => 'approveTenderLevelTwo',
                    'note' => [

                    ],
                ]
            ],
            'mark_as_in_approval_level_three' => [
                'from' => 'inApprovalLevelTwo',
                'to' => 'inApprovalLevelThree',
                'metadata' => [
                    'role' => 'approveTenderLevelThree',
                    'note' => [

                    ],
                ]
            ],
            'mark_as_in_approval_level_four' => [
                'from' => 'inApprovalLevelThree',
                'to' => 'inApprovalLevelFour',
                'metadata' => [
                    'role' => 'approveTenderLevelFour',
                    'note' => [

                    ],
                ]
            ],
            'mark_as_in_approval_level_five' => [
                'from' => 'inApprovalLevelFour',
                'to' => 'inApprovalLevelFive',
                'metadata' => [
                    'role' => 'approveTenderLevelFive',
                    'note' => [

                    ],
                ]
            ],
            'mark_as_in_approval_level_six' => [
                'from' => 'inApprovalLevelFive',
                'to' => 'inApprovalLevelSix',
                'metadata' => [
                    'role' => 'approveTenderLevelSix',
                    'note' => [

                    ],
                ]
            ],
            'mark_as_reject' => [
                'from' => [
                    'inApprovalLevelOne',
                    'inApprovalLevelTwo',
                    'inApprovalLevelThree',
                    'inApprovalLevelFour',
                    'inApprovalLevelFive',
                    'inApprovalLevelSix',
                ],
                'to' => 'inProgress'
            ],
            'mark_as_done' => [
                'from' => 'inApprovalLevelSix',
                'to' => 'done'
            ]
        ],
    ]
];
