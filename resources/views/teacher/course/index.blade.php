@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Curso del docente {{ $teacher->name }}</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            @can('teacher.course.create')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#modalTeacher">
                    Añadir Curso
                </button>     
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-courses">
                    <thead>
                        <tr class="bg-gray">
                            <th>Curso</th>
                            <th>Seccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($course_users as $course_user)
                            <tr>
                                <td class="align-middle">{{$course_user->course->name}}</td>
                                <td class="align-middle">{{$course_user->section->grade->symbol}} {{ $course_user->section->section }}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        @can('teacher.course.destroy')
                                            <form action="{{route('teacher.course.destroy', $course_user->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm m-1"><i class="fas fa-trash"></i></button>
                                            </form> 
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalTeacher" tabindex="-1" role="dialog" aria-labelledby="modalTeacherLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTeacherLabel">Añadir Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teacher.course.create', $teacher->id) }}" method="post" id="form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Docente</label>
                            <input type="text" class="form-control" id="name" autocomplete="off" disabled value="{{ $teacher->name }}">
                        </div>
                        <input type="hidden" name="user_id" id="" value="{{ $teacher->id }}">

                        <div class="mb-3">
                            <label for="course" class="form-label">Curso</label>
                            <select class="form-control" id="course" name="course_id">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Seccion</label>
                            <select class="form-control" id="section" name="section_id">
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->grade->symbol }} {{ $section->section }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-add">Añadir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script> 

        $('#btn-add').on('click', () => {
            $('#form').submit()
        })
    
        $(function () {
            $("#table-courses").DataTable({
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json'
                }
            });
        });
    </script>
@stop