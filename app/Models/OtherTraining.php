<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherTraining extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'institution_name',
        'course',
        'start_date',
        'end_date',
    ];
}
