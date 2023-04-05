<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use App\Models\Score;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class ScoreTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = User::with('courseUsers.course', 'courseUsers.section.grade')->findOrFail(auth()->id());
        return view('score-teacher.index', compact('teacher'));
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
    
    public function addScore($course, $section, $period)
    {
        $students = Section::with([
            'students' => function ($query) use ($course, $period) {
                $query->with([
                    'scores' => function ($querys) use ($course, $period) {
                        $querys->where('course_id', $course)->where('period', $period);
                    }
                ])->orderBy('name', 'asc');
            }
        ])->findOrFail($section);
        return view('score-teacher.add-score.index', compact('students', 'course', 'section', 'period'));
    }

    public function createScore(Request $request, $course, $section, $period)
    {
        $valuesToNumbers = [
            'AD' => 4,
            'A' => 3,
            'B' => 2,
            'C' => 1,
            '' => 0
        ];

        $valuesToLetters = [
            4 => 'AD',
            3 => 'A',
            2 => 'B',
            1 => 'C',
            0 => ''
        ];

        foreach ($request->student as $key => $student) {
            
            $p1 = round(
                ((
                    $valuesToNumbers[$request->n1[$key]] + 
                    $valuesToNumbers[$request->n2[$key]] + 
                    $valuesToNumbers[$request->n3[$key]] + 
                    $valuesToNumbers[$request->n4[$key]]
                ) / 4), 0, PHP_ROUND_HALF_UP);
            $pt1 = $p1;

            $p2 = round(
                ((
                    $valuesToNumbers[$request->n5[$key]] + 
                    $valuesToNumbers[$request->n6[$key]] + 
                    $valuesToNumbers[$request->n7[$key]] + 
                    $valuesToNumbers[$request->n8[$key]]
                ) / 4), 0, PHP_ROUND_HALF_UP);
            $p3 = round(
                ((
                    $valuesToNumbers[$request->n9[$key]] + 
                    $valuesToNumbers[$request->n10[$key]] + 
                    $valuesToNumbers[$request->n11[$key]]
                ) / 3), 0, PHP_ROUND_HALF_UP);

            $pt2 = round((($p2 + $p3) / 2), 0, PHP_ROUND_HALF_UP);

            $pf2 = round((($pt1 + $pt2) / 2), 0, PHP_ROUND_HALF_UP);

            Score::updateOrCreate(
                ['period' => $period, 'course_id' => $course, 'section_id' => $section, 'user_id' => $student],
                [
                    'n1' => $request->n1[$key],
                    'n2' => $request->n2[$key],
                    'n3' => $request->n3[$key],
                    'n4' => $request->n4[$key],
                    'p1' => $valuesToLetters[$p1],
                    'pt1' => $valuesToLetters[$pt1],
                    
                    'n5' => $request->n5[$key],
                    'n6' => $request->n6[$key],
                    'n7' => $request->n7[$key],
                    'n8' => $request->n8[$key],
                    'p2' => $valuesToLetters[$p2],

                    'n9' => $request->n9[$key],
                    'n10' => $request->n10[$key],
                    'n11' => $request->n11[$key],
                    'p3' => $valuesToLetters[$p3],
                    'pt2' => $valuesToLetters[$pt2],

                    'pf2' => $valuesToLetters[$pf2],
                ]
            );
        }

        return redirect()->route('score-teacher.add-score.index', ['course' => $course, 'section' => $section, 'period' => $section]);
    }
}
