@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Calificaciones')

@section('content_header')
    <h1>Calificaciones del curso {{ $course->course->name }} - {{ $course->section->grade->symbol }} {{ $course->section->section }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="alert alert-info alert-dismissible fade show" role="alert" style="background-color: #d1ecf1; border-color: #bee5eb; color: #0c5460">
                ¡Para ver la conclusión descriptiva hacer click a la nota!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-score-teacher">
                    <thead>
                        <tr class="bg-gray">
                            <th rowspan="2" class="align-middle text-center">Competencias</th>
                            <th class="align-middle text-center">Primer Bimestre</th>
                            <th class="align-middle text-center">Segundo Bimestre</th>
                            <th class="align-middle text-center">Tercer Bimestre</th>
                            <th class="align-middle text-center">Cuarto Bimestre</th>
                            <th rowspan="2" class="align-middle text-center">Promedio</th>   
                        </tr>
                        <tr class="bg-gray">
                            <th class="align-middle text-center">NL</th>
                            <th class="align-middle text-center">NL</th>
                            <th class="align-middle text-center">NL</th>
                            <th class="align-middle text-center">NL</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($course->section->students as $student)
                            @foreach ($course->course->skills as $skill)
                                <tr>
                                    <td class="align-middle text-center"><h5><span class="badge badge-secondary">{{ $skill->name }}</span></h5></td>
                                    @for ($i = 0; $i < 4; $i++)
                                        <td class="align-middle text-center">
                                            <a 
                                                tabindex="0"
                                                class="btn btn-lg btn-danger"
                                                role="button"
                                                data-toggle="popover"
                                                data-placement="top"
                                                data-trigger="focus"
                                                title="Conclusión descriptiva"
                                                data-content="lorem lorem"
                                            >
                                                AD
                                            </a>
                                        </td>
                                    @endfor
                                    
                                    <td class="align-middle text-center">
                                        <a 
                                            tabindex="0"
                                            class="btn btn-lg btn-danger"
                                            role="button"
                                        >
                                            AD
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
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
            $('[data-toggle="popover"]').popover()
        })
    </script>
@stop