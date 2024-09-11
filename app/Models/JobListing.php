<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'skills',
        'salary_range',
        'location',
        'work_type',
        'application_deadline',
        'employer_id', // Ensure this is included
    ];

    // Optionally, define the relationship with the Employer model
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    // protected $fillable = [
    //     'title', 'description', 'skills', 'salary_range', 'location', 'work_type', 'application_deadline', 'employer_id',
    // ];

    // public function employer()
    // {
    //     return $this->belongsTo(Employer::class);
    // }
}


