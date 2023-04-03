@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Ingreso de notas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-score-teacher">
                    <thead>
                        <tr class="bg-gray">
                            <th>Curso</th>
                            <th>Sección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($teacher->courseUsers as $course_user)
                            <tr>
                                <td class="align-middle">{{ $course_user->course->name }}</td>
                                <td class="align-middle">{{ $course_user->section->grade->symbol}} {{ $course_user->section->section }}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        @can('score-teacher.add-score.index')
                                            <a class="btn btn-warning btn-sm m-1"  href="{{route('score-teacher.add-score.index', ['course' => $course_user->id, 'section' => $course_user->section->id, 'period' => 1])}}"><strong>I</strong></a>
                                            <a class="btn btn-warning btn-sm m-1"  href="{{route('score-teacher.add-score.index', ['course' => $course_user->id, 'section' => $course_user->section->id, 'period' => 2])}}"><strong>II</strong></a>
                                            <a class="btn btn-warning btn-sm m-1"  href="{{route('score-teacher.add-score.index', ['course' => $course_user->id, 'section' => $course_user->section->id, 'period' => 3])}}"><strong>III</strong></a>
                                            <a class="btn btn-warning btn-sm m-1"  href="{{route('score-teacher.add-score.index', ['course' => $course_user->id, 'section' => $course_user->section->id, 'period' => 4])}}"><strong>IV</strong></a>
                                            <a class="btn btn-warning btn-sm m-1"  href="{{route('score-teacher.add-score.index', ['course' => $course_user->id, 'section' => $course_user->section->id, 'period' => 5])}}"><i class="far fa-clipboard"></i></a>
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

@endsection

@section('js')
    <script> 
    
        $(function () {
            $("#table-score-teacher").DataTable({
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