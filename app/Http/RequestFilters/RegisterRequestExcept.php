<?php

namespace App\Http\RequestFilters;

class RegisterRequestExcept extends AbstractRequestFilter
{
    protected $except = [
        'isActive'
    ];
}
