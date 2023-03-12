<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use App\Models\User;
use Illuminate\Http\Request;

class ScoreStudentController extends Controller
{
    //
    public function index()
    {
        $student = User::with('section.grade.courseGrades.course', 'section.courseUsers')->findOrFail(auth()->id());
        $teachers = User::role('Docente')->get()->toArray();
        
        return view('score-student.index', compact('student', 'teachers'));
    }

    public function showScore($id)
    {
        $course = CourseUser::with([
            'user',  
            'section.grade', 
            'section.students',
            'course.skills',
            'course' => function ($query) {
                $query->withCount('skills');
            }
        ])
        ->findOrFail($id);
        return view('score-student.show-score.index', compact('course'));
    }
}
