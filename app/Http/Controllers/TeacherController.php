<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = User::role('Docente')->get();

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'dni' => $request->dni,
            
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ])->syncRoles(['Docente']);

        return redirect()->route('teacher.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('teacher.index');
    }

    public function course($id)
    {
        //
        $course_users = CourseUser::with('course', 'section.grade')->where('user_id', $id)->get();
        $teacher = User::find($id);
        $courses = Course::all();
        $sections = Section::with('grade')->get();

        return view('teacher.course.index', compact('course_users', 'teacher', 'courses', 'sections'));
    }

    public function courseCreate(Request $request, $id)
    {
        CourseUser::create([
            'course_id' => $request->course_id,
            'section_id' => $request->section_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('teacher.course.index', ['id' => $id]);
    }

    public function courseDestroy($id)
    {
        $course_grade = CourseUser::find($id);
        $course_grade->delete();

        return redirect()->route('teacher.course.index', ['id' => $course_grade->user_id]);
    }
}
