<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_name',
        'job_title',
        'academic_level',
        'job_group',
        'achievements',
        'start_date',
        'end_date',
    ];
}
