<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'job_id',
    ];
}

// // Mass Assignment Protection
// $fillable: This property is an array that specifies which attributes should be mass-assignable. If you use this property, only the fields listed in the array can be mass assigned.

// $guarded: This property is an array that specifies which attributes should not be mass-assignable. If you use this property, all fields are mass assignable except those listed in the array.