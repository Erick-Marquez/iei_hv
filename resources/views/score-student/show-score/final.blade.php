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
                            <th class="align-middle text-center">Primer Bimestre</th>
                            <th class="align-middle text-center">Segundo Bimestre</th>
                            <th class="align-middle text-center">Tercer Bimestre</th>
                            <th lass="align-middle text-center">Cuarto Bimestre</th>
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
                        @php
                            $color = [
                                'AD' => 'btn-success',
                                'A' => 'btn-primary',
                                'B' => 'btn-warning',
                                'C' => 'btn-danger',
                                '' => 'btn-secondary',
                            ]
                        @endphp
                        <tr>
                            @for ($i = 1; $i < 5; $i++)
                                <td class="align-middle text-center px-0">
                                    @php
                                        $index = array_search($i, array_column(json_decode(json_encode($scores), TRUE), 'period'));
                                        $score = $index != "" ? $scores[$index] : ['pf2' => '', 'cd' => '']
                                    @endphp
                                    <a 
                                        tabindex="0"
                                        class="btn btn-lg {{ $color[$score['pf2']] }}"
                                        role="button"
                                        data-toggle="popover"
                                        data-placement="top"
                                        data-trigger="focus"
                                        title="Conclusión descriptiva"
                                        data-content="{{ $score['cd'] }}"
                                    >
                                        {{ $score['pf2'] == '' ? '-' :  $score['pf2'] }}
                                    </a>
                                </td>
                            @endfor

                            <td class="align-middle text-center">
                                @php
                                    $index = array_search(5, array_column(json_decode(json_encode($scores), TRUE), 'period'));
                                    $score = $index != "" ? $scores[$index] : ['pf2' => '']
                                @endphp
                                <a 
                                    tabindex="0"
                                    class="btn btn-lg {{ $color[$score['pf2']] }}"
                                    role="button"
                                >
                                    {{ $score['pf2'] == '' ? '-' :  $score['pf2'] }}
                                </a>
                            </td>
                        </tr>
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