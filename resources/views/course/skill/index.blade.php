@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <h1>Competencias</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#modalSkill">
                Añadir Competencias
            </button>     
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-skills">
                    <thead>
                        <tr class="bg-gray">
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($course->skills as $skill)
                            <tr>
                                <td class="align-middle">{{$skill->name}}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        <form action="{{route('course.skill.destroy', $skill->id)}}" method="POST">
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
    <div class="modal fade" id="modalSkill" tabindex="-1" role="dialog" aria-labelledby="modalSkillLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSkillLabel">Añadir competencia al curso {{ $course->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('course.skill.create', $course->id) }}" method="post" id="form">
                        @csrf
                        <div class="mb-3">
                            <label for="course" class="form-label">Curso</label>
                            <input type="text" class="form-control" id="course" value="{{ $course->name }}" disabled>
                        </div>
                        <input type="text" class="form-control" id="course_id" name="course_id" value="{{ $course->id }}" hidden>
                        <div class="mb-3">
                            <label for="name" class="form-label">Competencias</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off">
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
            $("#table-skills").DataTable({
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