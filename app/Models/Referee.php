<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Associate referees with users
        'name',
        'email',
        'phone',
        'relationship',
    ];
}
