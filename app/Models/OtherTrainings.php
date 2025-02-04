<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherTrainings extends Model
{
    use HasFactory;
    protected $fillable = [
        'institution_name',
        'course',
        'start_date',
        'end_date',
    ];
}
