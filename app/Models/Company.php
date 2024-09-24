<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'website', 'email', 'password', 'logo', 'linkedin_url'];
    public function getLogoUrl()
    {
        if ($this->logo) {
            return asset('storage/logos/' . $this->logo);
        }

        // Default logo if no logo is uploaded
        return asset('images/download (14).jpeg');
    }

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
}
