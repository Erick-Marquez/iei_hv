@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Secciones')

@section('content_header')
    <h1>Secciones del {{ $grade->symbol }} grado</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#modalGrado">
                Añadir secciones
            </button>     
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-sections">
                    <thead>
                        <tr class="bg-gray">
                            <th>Grado</th>
                            <th>Sección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($grade->sections as $section)
                            <tr>
                                <td class="align-middle">{{$grade->symbol}}</td>
                                <td class="align-middle">{{$section->section}}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        <form action="{{route('grade.section.destroy', $section->id)}}" method="POST">
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
    <div class="modal fade" id="modalGrado" tabindex="-1" role="dialog" aria-labelledby="modalGradoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGradoLabel">Añadir sección al {{ $grade->symbol }} grado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grade.section.create', $grade) }}" method="post" id="form">
                        @csrf
                        <div class="mb-3">
                            <label for="symbol" class="form-label">Grado</label>
                            <input type="text" class="form-control" id="symbol" value="{{ $grade->symbol }}" disabled>
                        </div>
                        <input type="text" class="form-control" id="grade_id" name="grade_id" value="{{ $grade->id }}" hidden>
                        <div class="mb-3">
                            <label for="section" class="form-label">Sección</label>
                            <input type="text" class="form-control" id="section" name="section" autocomplete="off" required>
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
            $("#table-sections").DataTable({
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