<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ScoreTeacherController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/alumnos', [StudentController::class, 'index'])->name('student.index');
Route::post('/alumnos/create', [StudentController::class, 'create'])->name('student.create');
Route::delete('/alumnos/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/docente', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('/docente/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::delete('/docente/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('/docente/{id}/cursos', [TeacherController::class, 'course'])->name('teacher.course.index');
Route::post('/docente/{id}/cursos/create', [TeacherController::class, 'courseCreate'])->name('teacher.course.create');
Route::delete('/docente/cursos/delete/{id}', [TeacherController::class, 'courseDestroy'])->name('teacher.course.destroy');

Route::get('/cursos-docente', [CourseTeacherController::class, 'index'])->name('course-teacher.index');
Route::post('/cursos-docente/edit', [CourseTeacherController::class, 'edit'])->name('course-teacher.edit');

Route::get('/notas-docente', [ScoreTeacherController::class, 'index'])->name('score-teacher.index');
Route::get('/notas-docente/{id}/agregar', [ScoreTeacherController::class, 'addScore'])->name('score-teacher.add-score.index');


Route::get('/cursos', [CourseController::class, 'index'])->name('course.index');

Route::get('/cursos/{id}/competencias', [SkillController::class, 'index'])->name('course.skill.index');
Route::post('/cursos/{id}/competencias/create', [SkillController::class, 'create'])->name('course.skill.create');
Route::delete('/cursos/competencias/delete/{id}', [SkillController::class, 'destroy'])->name('course.skill.destroy');


// Grados
Route::get('/grados', [GradeController::class, 'index'])->name('grade.index');

Route::get('/grados/{id}/secciones', [GradeController::class, 'section'])->name('grade.section.index');
Route::post('/grados/{id}/secciones/create', [GradeController::class, 'sectionCreate'])->name('grade.section.create');
Route::delete('/grados/secciones/delete/{id}', [GradeController::class, 'sectionDestroy'])->name('grade.section.destroy');

Route::get('/grados/{id}/cursos', [GradeController::class, 'course'])->name('grade.course.index');
Route::post('/grados/{id}/cursos/create', [GradeController::class, 'courseCreate'])->name('grade.course.create');
Route::delete('/grados/cursos/delete/{id}', [GradeController::class, 'courseDestroy'])->name('grade.course.destroy');
