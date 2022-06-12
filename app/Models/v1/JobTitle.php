<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends AbstractModel
{
    protected $table = 'jobTitles';

    protected $fillable = [
        'code',
        'name',
        'description',
    ];
}
