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
        'referee_id', 
        'document_id', 
    ];

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }
    
    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }

    public function education() {
        return $this->belongsTo(Education::class, 'education_id');
    }
    
    public function trainings() {
        return $this->belongsTo(OtherTraining::class, 'other_training_id');
    }
    
    public function work_experiences() {
        return $this->belongsTo(PreviousEmployment::class, 'experience_id');
    }
    
    public function referee() {
        return $this->belongsTo(Referee::class, 'referees_id');
    }
    
    public function document() {
        return $this->belongsTo(Documents::class, 'documents_id');
    }
    
    
}

// // Mass Assignment Protection
// $fillable: This property is an array that specifies which attributes should be mass-assignable. If you use this property, only the fields listed in the array can be mass assigned.

// $guarded: This property is an array that specifies which attributes should not be mass-assignable. If you use this property, all fields are mass assignable except those listed in the array.