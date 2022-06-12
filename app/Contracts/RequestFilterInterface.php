<?php

namespace App\Contracts;

interface RequestFilterInterface
{
    public function except(array $except = []);

    public function only(array $only = []);
}
