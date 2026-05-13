<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'full_name',
        'email',
        'phone',
        'resume_path',
        'portfolio_url',
        'cover_letter',
    ];

    public function job()
    {
        return $this->belongsTo(JobListing::class, 'job_id');
    }
}
