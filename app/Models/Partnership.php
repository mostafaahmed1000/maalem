<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    protected $guarded = [];

    protected $casts = [
        'school_type' => 'array',
        'curriculum' => 'array',
        'pathways' => 'array',
        'participants' => 'array',
        'departments' => 'array',
        'priorities' => 'array',
    ];
}
