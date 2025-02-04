<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'institution_name',
        'academic_level',
        'course',
        'grade',
        'start_date',
        'end_date',
    ];
}
