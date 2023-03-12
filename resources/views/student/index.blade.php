@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Alumnos</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            @can('student.create')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#modalStudent">
                    Añadir Alumnos
                </button>     
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-students">
                    <thead>
                        <tr class="bg-gray">
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Grado</th>
                            <th>Sección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="align-middle">{{$student->name}}</td>
                                <td class="align-middle">{{$student->email}}</td>
                                <td class="align-middle">{{$student->section ? $student->section->grade->name : 'Sin grado'}}</td>
                                <td class="align-middle">{{$student->section ? $student->section->section : 'Sin sección'}}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        @can('student.destroy')
                                            <a class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('student.destroy')
                                            <form action="{{route('student.destroy', $student->id)}}" method="POST">
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
    <div class="modal fade" id="modalStudent" tabindex="-1" role="dialog" aria-labelledby="modalStudentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStudentLabel">Añadir Alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student.create') }}" method="post" id="form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Grado y Sección</label>
                            <select class="form-control" id="section" name="section_id">
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->grade->symbol }} {{ $section->section }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
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
            $("#table-students").DataTable({
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