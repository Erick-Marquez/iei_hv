<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'name',
        'description',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function courseGrades()
    {
        return $this->hasMany(CourseGrade::class);
    }
}
