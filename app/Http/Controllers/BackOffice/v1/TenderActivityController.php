<?php

namespace App\Http\Controllers\BackOffice\v1;

use Carbon\Carbon;

class TenderActivityController extends AbstractController
{
    public function index()
    {
        $activity = [
            [
                'name' => 'Suherman Atqiya',
                'description' => 'Join Tender',
                'createdAt' => Carbon::now()->addMinutes(-10)->timestamp,
            ],
            [
                'name' => 'Ivan S.',
                'description' => 'Fill Document Praqualification',
                'createdAt' => Carbon::now()->addMinutes(-30)->timestamp,
            ]
        ];

        return $this->responseSuccess($activity);
    }
}
