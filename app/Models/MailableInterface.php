<?php

namespace App\Models;

interface MailableInterface
{
    public function toEmailAddress() : string;

    public function toCcEmailAddress() : string;
}
