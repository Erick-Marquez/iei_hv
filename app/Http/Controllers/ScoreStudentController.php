<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Score;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class ScoreStudentController extends Controller
{
    //
    public function index()
    {
        $courses = Section::with('courses.user', 'courses.course')->findOrFail(auth()->user()->section_id);
        
        
        return view('score-student.index', compact('courses'));
    }

    public function showScore($course, $section, $period)
    {
        $course = Course::findOrFail($course);
        $scores = Score::where('period', $period)
            ->where('course_id', $course->id)
            ->where('section_id', $section)
            ->where('user_id', auth()->id())
            ->get();
        return view('score-student.show-score.index', compact('scores', 'course'));
    }
}
