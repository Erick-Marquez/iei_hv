@section('plugins.Datatables', true)


@extends('adminlte::page')

@section('title', 'Calificaciones')

@section('content_header')
    <h1>Calificaciones del curso {{ $course->name }}</h1>
@stop

@section('css')
    <style> 
        .verticalText {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            max-height: 250px;
        }
        .table thead tr th{
            border: 2px solid black;
        }
        .table tbody tr td{
            border: 1px solid black;
        }
    </style>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- <div class="alert alert-info alert-dismissible fade show" role="alert" style="background-color: #d1ecf1; border-color: #bee5eb; color: #0c5460">
                ¡Para ver la conclusión descriptiva hacer click a la nota!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-score-teacher">
                    <thead>
                        <tr>
                            <th colspan="5" style="background-color: rgb(255, 192, 0)">COMPETENCIA N° 1</th>
                            <th rowspan="3" style="background-color: rgb(255, 192, 0)"><p class="verticalText">PROMEDIO</p></th>
                            <th colspan="10" style="background-color: rgb(255, 192, 0)">COMPETENCIA TRANSVERSAL</th>
                            <th rowspan="3" style="background-color: rgb(197, 223, 181)"><p class="verticalText">NIVEL DE LOGRO PROMEDIO</p></th>
                        </tr>
                        <tr>
                            <th colspan="5" style="background-color: rgb(144, 209, 78)">Gestiona proyectos de empredimiento económico o social</th>
                            <th colspan="5" style="background-color: rgb(144, 209, 78)">Interactúa en entornos virtuales generados por las TICs</th>
                            <th colspan="5" style="background-color: rgb(144, 209, 78)">Gestiona su aprendizaje de manera autónoma</th>
                        </tr>
                        <tr style="height: 200px">
                            <th style="background-color: rgb(254, 217, 102)"><p class="verticalText">Crea propuesta de valor</p></th>
                            <th style="background-color: rgb(254, 217, 102)"><p class="verticalText">Aplica habilidades tecnicas</p></th>
                            <th style="background-color: rgb(254, 217, 102)"><p class="verticalText">Trabaja cooperativamente lograr metas y objetivos</p></th>
                            <th style="background-color: rgb(254, 217, 102)"><p class="verticalText">Evalua proyectos de proyectos de empredimiento</p></th>
                            <th style="background-color: rgb(248, 203, 172)"><p class="verticalText">NIVEL DE LOGRO</p></th>

                            <th style="background-color: rgb(0, 175, 80)"><p class="verticalText">Personaliza entornos virtuales</p></th>
                            <th style="background-color: rgb(0, 175, 80)"><p class="verticalText">Gestiona información del entorno virtual</p></th>
                            <th style="background-color: rgb(0, 175, 80)"><p class="verticalText">Interactua en entornos virtuales</p></th>
                            <th style="background-color: rgb(0, 175, 80)"><p class="verticalText">Crea objetos virtuales en diversos formatos</p></th>
                            <th style="background-color: rgb(248, 203, 172)"><p class="verticalText">NIVEL DE LOGRO</p></th>

                            <th style="background-color: rgb(172, 184, 202)"><p class="verticalText">Define metas de aprendizaje</p></th>
                            <th style="background-color: rgb(172, 184, 202)"><p class="verticalText">para alcanzar su metas</p></th>
                            <th style="background-color: rgb(172, 184, 202)"><p class="verticalText">Desempeño durante el proceso</p></th>
                            <th style="background-color: rgb(248, 203, 172)"><p class="verticalText">NIVEL DE LOGRO</p></th>
                            <th style="background-color: rgb(255, 192, 0)"><p class="verticalText">PROMEDIO</p></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $scoreNull = [ 
                                'n1' => '', 'n2' => '', 'n3' => '', 'n4' => '', 'p1' => '', 'pt1' => '',
                                'n5' => '', 'n6' => '', 'n7' => '', 'n8' => '', 'p2' => '',
                                'n9' => '', 'n10' => '', 'n11' => '', 'p3' => '', 'pt2' => '', 'pf2' => '',

                            ];
                            $score =  count($scores) == 0 ? $scoreNull : $scores[0]
                        @endphp
                        <tr>
                            <td><x-select-score name="n1" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n2" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n3" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n4" :score="$score" disabled="disabled"/></td>
                            <td style="background-color: rgb(248, 203, 172)"><x-select-score name="p1" :score="$score" disabled="disabled"/></td>
                            <td style="background-color: rgb(255, 192, 0)"><x-select-score name="pt1" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n5" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n6" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n7" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n8" :score="$score" disabled="disabled"/></td>
                            <td style="background-color: rgb(248, 203, 172)"><x-select-score name="p2" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n9" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n10" :score="$score" disabled="disabled"/></td>
                            <td><x-select-score name="n11" :score="$score" disabled="disabled"/></td>
                            <td style="background-color: rgb(248, 203, 172)"><x-select-score name="p3" :score="$score" disabled="disabled"/></td>
                            <td style="background-color: rgb(255, 192, 0)"><x-select-score name="pt2" :score="$score" disabled="disabled"/></td>
                            <td style="background-color: rgb(197, 223, 181)"><x-select-score name="pf2" :score="$score" disabled="disabled"/></td>
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