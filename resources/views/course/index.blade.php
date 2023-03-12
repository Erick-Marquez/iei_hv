@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Cursos</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#modalGrado">
                Añadir Curso
            </button>     
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-courses">
                    <thead>
                        <tr class="bg-gray">
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td class="align-middle">{{$course->name}}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        <a class="btn btn-success btn-sm m-1" href="{{ route('course.skill.index', $course->id) }}"><i class="fas fa-layer-group"></i></a>
                                        <a class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm m-1"><i class="fas fa-trash"></i></a> 
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