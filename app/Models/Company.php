<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'website', 'email', 'password', 'logo', 'linkedin_url'];


    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
}
