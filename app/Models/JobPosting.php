<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'position_needed',
        'job_grade',
        'advert_no',
        'description',
        'application_deadline',

    ];

    protected $casts = [
        'application_deadline' => 'date',
    ];
}

