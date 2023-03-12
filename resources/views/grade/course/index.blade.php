@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Cursos del {{ $grade->symbol }} grado</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#modalCourse">
                Añadir cursos
            </button>     
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-courses">
                    <thead>
                        <tr class="bg-gray">
                            <th>Grado</th>
                            <th>Curso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($grade->courseGrades as $courseGrade)
                            <tr>
                                <td class="align-middle">{{$grade->symbol}}</td>
                                <td class="align-middle">{{$courseGrade->course->name}}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        <form action="{{route('grade.course.destroy', $courseGrade->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm m-1"><i class="fas fa-trash"></i></button>
                                        </form> 
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
    <div class="modal fade" id="modalCourse" tabindex="-1" role="dialog" aria-labelledby="modalCourseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCourseLabel">Añadir curso al {{ $grade->symbol }} grado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grade.course.create', $grade) }}" method="post" id="form">
                        @csrf
                        <div class="mb-3">
                            <label for="symbol" class="form-label">Grado</label>
                            <input type="text" class="form-control" id="symbol" value="{{ $grade->symbol }}" disabled>
                        </div>
                        <input type="text" class="form-control" id="grade_id" name="grade_id" value="{{ $grade->id }}" hidden>
                        <div class="mb-3">
                            <label for="course" class="form-label">Curso</label>
                            <select class="form-control" id="course" name="course_id">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
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