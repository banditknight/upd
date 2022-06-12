<?php

namespace App\Http\Controllers\BackOffice\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenderController extends AbstractController
{
    public function index(Request $request)
    {
        return $this->responseSuccess([
            'progress' => [
                [
                    'step' => 1,
                    'name' => 'Tender Creator',
                    'iconClass' => 'fa fa-user',
                    'iconImage' => 'img.png',
                    'isFinished' => true
                ],
                [
                    'step' => 2,
                    'name' => 'Admin Level 6',
                    'iconClass' => 'fa fa-user',
                    'iconImage' => 'img.png',
                    'isFinished' => true
                ],
                [
                    'step' => 3,
                    'name' => 'Admin Level 5',
                    'iconClass' => 'fa fa-user',
                    'iconImage' => 'img.png',
                    'isFinished' => true
                ],
                [
                    'step' => 4,
                    'name' => 'Admin Level 4',
                    'iconClass' => 'fa fa-user',
                    'iconImage' => 'img.png',
                    'isFinished' => true
                ],
                [
                    'step' => 5,
                    'name' => 'Admin Level 3',
                    'iconClass' => 'fa fa-user',
                    'iconImage' => 'img.png',
                    'isFinished' => true
                ],
                [
                    'step' => 6,
                    'name' => 'Admin Level 2',
                    'iconClass' => 'fa fa-user',
                    'iconImage' => 'img.png',
                    'isFinished' => false
                ],
                [
                    'step' => 7,
                    'name' => 'Admin Level 1',
                    'iconClass' => 'fa fa-user',
                    'iconImage' => 'img.png',
                    'isFinished' => false
                ],
            ]
        ]);
    }
}
