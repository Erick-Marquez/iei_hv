@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Docentes</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            @can('teacher.create')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#modalTeacher">
                    Añadir Docente
                </button>     
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-teachers">
                    <thead>
                        <tr class="bg-gray">
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td class="align-middle">{{$teacher->name}}</td>
                                <td class="align-middle">{{$teacher->email}}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        @can('teacher.course.index')
                                            <a class="btn btn-success btn-sm m-1" href="{{route('teacher.course.index', $teacher->id)}}"><i class="fas fa-book"></i></a>
                                        @endcan
                                        @can('teacher.edit')
                                            <a class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('teacher.destroy')
                                            <form action="{{route('teacher.destroy', $teacher->id)}}" method="POST">
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
                    <h5 class="modal-title" id="modalTeacherLabel">Añadir Docente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teacher.create') }}" method="post" id="form">
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
            $("#table-teachers").DataTable({
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