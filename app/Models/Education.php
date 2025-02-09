<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations'; 

    protected $fillable = [
        'user_id',
        'institution_name',
        'academic_level',
        'course',
        'grade',
        'start_date',
        'end_date',
    ];

    // Define date attributes to be cast to Carbon instances
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function educations()
    // {
    //     return $this->hasMany(Education::class, 'user_id'); 
    // }


    
}
