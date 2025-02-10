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
        'education_id',
        'other_training_id',
        'experience_id',
        'referees_id',
        'document_id',
        'status',
    ];

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }
    
    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }


    public function education()
    {
        return $this->hasMany(Education::class, 'user_id', 'id');
    }

    
    public function trainings() {
        return $this->hasMany(OtherTraining::class, 'user_id', 'id');
    }
    
    public function work_experiences() {
        return $this->hasMany(PreviousEmployment::class, 'user_id', 'id');
    }
    
    public function referees() {
        return $this->hasMany(Referee::class, 'user_id', 'id');
    }
    
    public function documents() {
        return $this->hasMany(Documents::class, 'user_id', 'id');
    }
    
    
}

// // Mass Assignment Protection
// $fillable: This property is an array that specifies which attributes should be mass-assignable. If you use this property, only the fields listed in the array can be mass assigned.

// $guarded: This property is an array that specifies which attributes should not be mass-assignable. If you use this property, all fields are mass assignable except those listed in the array.