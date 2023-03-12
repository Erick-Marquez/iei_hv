@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Calificaciones')

@section('content_header')
    <h1>Calificaciones del curso {{ $course->course->name }} - {{ $course->section->grade->symbol }} {{ $course->section->section }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-score-teacher">
                    <thead>
                        <tr class="bg-gray">
                            <th rowspan="2" class="align-middle text-center">Alumnos</th>
                            <th rowspan="2" class="align-middle text-center">Competencias</th>
                            <th colspan="2" class="align-middle text-center">Primer Bimestre</th>
                            <th colspan="2" class="align-middle text-center">Segundo Bimestre</th>
                            <th colspan="2" class="align-middle text-center">Tercer Bimestre</th>
                            <th colspan="2" class="align-middle text-center">Cuarto Bimestre</th>
                            <th rowspan="2" class="align-middle text-center">Promedio</th>   
                        </tr>
                        <tr class="bg-gray">
                            <th class="align-middle text-center">NL</th>
                            <th class="align-middle text-center">Conclusión descriptiva</th>
                            <th class="align-middle text-center">NL</th>
                            <th class="align-middle text-center">Conclusión descriptiva</th>
                            <th class="align-middle text-center">NL</th>
                            <th class="align-middle text-center">Conclusión descriptiva</th>
                            <th class="align-middle text-center">NL</th>
                            <th class="align-middle text-center">Conclusión descriptiva</th> 
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($course->section->students as $student)
                            @foreach ($course->course->skills as $skill)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{ $course->course->skills_count }}" class="align-middle text-center">{{ $student->name }}</td>
                                    @endif
                                    <td class="align-middle text-center">{{ $skill->name }}</td>
                                    @for ($i = 0; $i < 4; $i++)
                                        <td class="align-middle text-center">
                                            AD
                                        </td>
                                        <td class="align-middle text-center px-0">
                                            <textarea class="w-100" name="" id="" cols="10" rows="2" style="resize: none">

                                            </textarea>
                                        </td>
                                    @endfor
                                    
                                    <td class="align-middle text-center">AD</td>
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

    </script>
@stop