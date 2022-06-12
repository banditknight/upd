<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\JWTAuth;

abstract class AbstractController extends Controller
{
    protected $JWTAuth;

    public function __construct(JWTAuth $JWTAuth)
    {
        $this->JWTAuth = $JWTAuth;
    }
}
