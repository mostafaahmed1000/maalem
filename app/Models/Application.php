<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    protected $casts = [
        'levels' => 'array',
        'school_type' => 'array',
        'curriculum' => 'array',
        'participants' => 'array',
        'departments' => 'array',
        'priorities' => 'array',
    ];
}
