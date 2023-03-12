<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseGrade;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();

        return view('grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }


    public function section($id)
    {
        $grade = Grade::with('sections')->find($id);

        //dd($grade->sections);

        return view('grade.section.index', compact('grade'));
    }

    public function sectionCreate(Request $request, $id)
    {
        Section::create([
            'grade_id' => $request->grade_id,
            'section' => $request->section,
        ]);

        return redirect()->route('grade.section.index', ['id' => $id]);
    }

    public function sectionDestroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        return redirect()->route('grade.section.index', ['id' => $section->grade_id]);
    }

    public function course($id)
    {
        $grade = Grade::with('courseGrades.course')->find($id);
        $courses = Course::all();

        return view('grade.course.index', compact('grade', 'courses'));
    }

    public function courseCreate(Request $request, $id)
    {
        CourseGrade::create([
            'course_id' => $request->course_id,
            'grade_id' => $request->grade_id,
        ]);

        return redirect()->route('grade.course.index', ['id' => $id]);
    }

    public function courseDestroy($id)
    {
        $course_grade = CourseGrade::find($id);
        $course_grade->delete();

        return redirect()->route('grade.course.index', ['id' => $course_grade->grade_id]);
    }
    
}

