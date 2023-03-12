@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Grados')

@section('content_header')
    <h1>Grados</h1>
@stop

@section('content')
    <div class="card">
        <div class="table-responsive">
            <div class="card-body">
                <table class="table table-striped" id="table-grades">
                    <thead>
                        <tr class="bg-gray">
                            <th>Grado</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr>
                                <td class="align-middle">{{$grade->symbol}}</td>
                                <td class="align-middle">{{$grade->name}}</td>
                                <td width="10px" class="align-middle">
                                    <div class="d-flex">
                                        
                                        <a class="btn btn-primary btn-sm m-1" href="{{route('grade.section.index', $grade)}}"><i class="fas fa-th"></i></a>
                                        <a class="btn btn-warning btn-sm m-1" href="{{route('grade.course.index', $grade)}}"><i class="fas fa-book"></i></a>
                                    </div>
                                    {{-- @can('admin.categorias.edit')
                                        <a class="btn btn-primary btn-sm m-1" href="{{route('admin.categorias.edit', $categoria)}}"><i class="fas fa-edit"></i></a>
                                    @endcan
                                    @can('admin.categorias.destroy', )
                                        <form action="{{route('admin.categorias.destroy', $categoria)}}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm m-1"><i class="fas fa-trash"></i></button>
                                        </form>  
                                    @endcan --}}
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
            $("#table-grades").DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
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