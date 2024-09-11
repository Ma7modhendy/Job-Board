<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function jobListings()
    {
        return $this->hasMany(JobListing::class);
    }
}

