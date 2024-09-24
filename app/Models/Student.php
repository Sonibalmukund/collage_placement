<?php

// app/Models/Student.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email', 'username', 'password', 'full_name', 'gender', 'city', 'state','remember_token','contact_number','profile_photo'
    ];

    protected $hidden = [
        'password',
    ];
    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function applications()
    {
        return $this->hasMany(JobAppliction::class);
    }
}

