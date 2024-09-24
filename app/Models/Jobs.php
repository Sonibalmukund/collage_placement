<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'application_deadline', 'company_id','position','vacancy','location','salary'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function applications()
    {
        return $this->hasMany(JobAppliction::class,'job_id');
    }
}
