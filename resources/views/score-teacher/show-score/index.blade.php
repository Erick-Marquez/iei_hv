@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Calificaciones')

@section('content_header')
    <h1>Calificaciones del curso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-score-teacher">
                    <thead>
                        <tr class="bg-gray">
                            <th rowspan="2" class="align-middle text-center">Alumnos</th>
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
                        <form action="{{ route('score-teacher.add-score.create', ['course' => $course, 'section' => $section, 'period' => $period]) }}" method="post" id="form-scores">
                            @csrf
                            @foreach ($students->students as $student)
                                <tr>
                                    <td class="align-middle text-center">
                                        <input type="hidden" name="student[]" value="{{ $student->id }}">
                                        {{ $student->name }}
                                    </td>

                                    @for ($i = 1; $i < 5; $i++)
                                        <td class="align-middle text-center">
                                            @php
                                                $index = array_search($i, array_column(json_decode(json_encode($student->scores), TRUE), 'period'));
                                                $score = $index != "" ? $student->scores[$index] : ['pf2' => '', 'cd' => '']
                                            @endphp
                                            <input type="hidden" name="b{{$i}}[]" value="{{ $score['pf2'] }}">
                                            {{ $score['pf2'] }}
                                        </td>
                                        <td class="align-middle text-center px-0">
                                            <textarea class="w-100" name="cd{{$i}}[]" id="" cols="10" rows="2" style="resize: none">{{ $score['cd'] }}</textarea>
                                        </td>
                                    @endfor

                                    <td class="align-middle text-center">
                                        @php
                                            $index = array_search(5, array_column(json_decode(json_encode($student->scores), TRUE), 'period'));
                                            $score = $index != "" ? $student->scores[$index] : ['pf2' => '']
                                        @endphp
                                        {{ $score['pf2'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" id="btn-save">Guardar</button>
            {{-- <button class="btn btn-danger" id="btn-close-scores">Cerrar Registro</button> --}}
        </div>
    </div>

@endsection

@section('js')
    <script> 
        $('#btn-save').on('click', () =>{
            $('#form-scores').submit()
        })
    </script>
@stop