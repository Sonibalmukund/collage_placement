<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'resume_name','resume_file'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function applications()
    {
        return $this->hasMany(JobAppliction::class);
    }
}
