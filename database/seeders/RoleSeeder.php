<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $director = Role::create(['name' => 'Director']);
        $docente = Role::create(['name' => 'Docente']);
        $alumno = Role::create(['name' => 'Alumno']);


        Permission::create(['name' => 'student.index', 'description' => 'Ver Lista de Alumnos'])->syncRoles([$director]);
        Permission::create(['name' => 'student.create', 'description' => 'Crear alumno'])->syncRoles([$director]);
        Permission::create(['name' => 'student.edit', 'description' => 'Editar alumno'])->syncRoles([$director]);
        Permission::create(['name' => 'student.destroy', 'description' => 'Eliminar Alumno'])->syncRoles([$director]);

        Permission::create(['name' => 'teacher.index', 'description' => 'Ver Lista de Docentes'])->syncRoles([$director]);
        Permission::create(['name' => 'teacher.create', 'description' => 'Crear Docente'])->syncRoles([$director]);
        Permission::create(['name' => 'teacher.edit', 'description' => 'Editar Docente'])->syncRoles([$director]);
        Permission::create(['name' => 'teacher.destroy', 'description' => 'Eliminar Docente'])->syncRoles([$director]);

        Permission::create(['name' => 'teacher.course.index', 'description' => 'Ver lista de curso por Docente'])->syncRoles([$director]);
        Permission::create(['name' => 'teacher.course.create', 'description' => 'Añadir curso por Docente'])->syncRoles([$director]);
        Permission::create(['name' => 'teacher.course.destroy', 'description' => 'Eliminar curso por Docente'])->syncRoles([$director]);

        Permission::create(['name' => 'course-teacher.index', 'description' => 'Ver Lista de Cursos Docente'])->syncRoles([$director, $docente]);
        Permission::create(['name' => 'course-teacher.edit', 'description' => 'Editar Curso Docente'])->syncRoles([$director, $docente]);


        Permission::create(['name' => 'score-teacher.index', 'description' => 'Ver Lista de Cursos para las notas'])->syncRoles([$director, $docente]);
        
            Permission::create(['name' => 'score-teacher.add-score.index', 'description' => 'Lista de Notas para añadir al curso'])->syncRoles([$director, $docente]);


        Permission::create(['name' => 'course.index', 'description' => 'Ver Lista de Cursos'])->syncRoles([$director]);
        Permission::create(['name' => 'course.create', 'description' => 'Crear Curso'])->syncRoles([$director]);
        Permission::create(['name' => 'course.edit', 'description' => 'Editar Curso'])->syncRoles([$director]);
        Permission::create(['name' => 'course.destroy', 'description' => 'Eliminar Curso'])->syncRoles([$director]);

            Permission::create(['name' => 'course.skill.index', 'description' => 'Ver lista de competencias por Curso'])->syncRoles([$director]);
            Permission::create(['name' => 'course.skill.create', 'description' => 'Crear competencias por Curso'])->syncRoles([$director]);
            Permission::create(['name' => 'course.skill.destroy', 'description' => 'Eliminar competencias por Curso'])->syncRoles([$director]);



        Permission::create(['name' => 'grade.index', 'description' => 'Ver Lista de Grados'])->syncRoles([$director]);

            Permission::create(['name' => 'grade.section.index', 'description' => 'Ver Lista de Secciones'])->syncRoles([$director]);
            Permission::create(['name' => 'grade.section.create', 'description' => 'Crear sección'])->syncRoles([$director]);
            Permission::create(['name' => 'grade.section.destroy', 'description' => 'Eliminar Sección'])->syncRoles([$director]);

                Permission::create(['name' => 'grade.section.student.index', 'description' => 'Ver lista de alumnos por sección'])->syncRoles([$director]);
                Permission::create(['name' => 'grade.section.student.create', 'description' => 'Añadir alumno por sección'])->syncRoles([$director]);
                Permission::create(['name' => 'grade.section.student.destroy', 'description' => 'Eliminar alumno por sección'])->syncRoles([$director]);

            Permission::create(['name' => 'grade.course.index', 'description' => 'Ver Lista de Cursos por grado'])->syncRoles([$director]);
            Permission::create(['name' => 'grade.course.create', 'description' => 'Añadir curso al grado'])->syncRoles([$director]);
            Permission::create(['name' => 'grade.course.destroy', 'description' => 'Eliminar curso al grado'])->syncRoles([$director]);
    
            
    }
}
