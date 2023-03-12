@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Curso del docente</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-courses-teacher">
                    <thead>
                        <tr class="bg-gray">
                            <th>Curso</th>
                            <th>Seccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($teacher->courseUsers as $course_user)
                            <tr>
                                <td class="align-middle">{{$course_user->course->name}}</td>
                                <td class="align-middle">{{$course_user->section->grade->symbol}} {{ $course_user->section->section }}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        @can('course-teacher.edit')
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm m-1 btn-edit" 
                                                data-id="{{ $course_user->id }}" 
                                                data-amount-score="{{ $course_user->amount_score }}"
                                                data-name="{{ $course_user->course->name }}"
                                                data-section="{{$course_user->section->grade->symbol}} {{ $course_user->section->section }}"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </button>     
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
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Añadir cantidad de notas al curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('course-teacher.edit') }}" method="post" id="form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Curso</label>
                            <input type="text" class="form-control" id="name" autocomplete="off" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Sección</label>
                            <input type="text" class="form-control" id="section" autocomplete="off" disabled>
                        </div>
                        <input type="hidden" name="id" id="id">

                        <div class="mb-3">
                            <label for="amount_scores" class="form-label">Cantidad de notas</label>
                            <input type="text" class="form-control" id="amount_scores" autocomplete="off">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-add">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

        $('.btn-edit').on('click', function () {
            
            $('#name').val($(this).attr('data-name'))
            $('#section').val($(this).attr('data-section'))

            $('#id').val($(this).attr('data-id'))
            $('#amount_scores').val($(this).attr('data-amount-score'))

            $('#modalEdit').modal('show')

        })


        $(function () {
            $("#table-courses-teacher").DataTable({
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