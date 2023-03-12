<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseGrade extends Model
{
    use HasFactory;

    protected $table = "course_grade";

    protected $fillable = [
        'course_id',
        'grade_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
