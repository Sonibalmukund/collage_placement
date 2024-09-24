<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAppliction extends Model
{
    use HasFactory;
    protected $table = 'job_applications';
    protected $fillable = ['student_id', 'job_id', 'resume_id','status','tenth_mark','twelfth_mark','graduation_mark'];

    public function student()
    {
        return $this->belongsTo(Student::class ,'student_id');
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class,'job_id');
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
