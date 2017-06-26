@extends('layouts.app')
@section('htmlheader_title')
    Tabela
@stop

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@extends('layouts.breadcrumb')


@section('main-content')
    <div clas='row'>
        <div class='col-md-9'>
            <div id="navegacao" class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Navegação</h3>
                   <!-- <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>-->
                </div>
                <div class="box-body">
                    <?php
                        // echo $nivel;
                        $primeiro = true;
                        echo '<ol class="breadcrumb">';
                     foreach ($breadcrumbNavegacao as $k => $data) {
                         foreach ($data as $titulo => $url) {
                             if ($url != '#') {
                                 echo '<li><a href='.$url.'>'.$titulo.' </a></li>';
                             } else {
                                 echo '<li class="active">'.$titulo.'</li>';
                             }
                         }
                     }
                        echo '</ol>';
                    ?>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div id="divPeriodo" class="box box-sucess">
                <div class="box-header with-border">
                    <h3 class="box-title">Período</h3>
                   <!-- <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>-->
                </div>
                <!--<div class="box-body">
                    <?php
                    // if (isset($_SESSION["parametrosTemporal"])) {
                    //     $periodo = $_SESSION["parametrosTemporal"]['periodo'];
                    //     switch ($periodo) {
                    //         case 'Livre':
                    //             $dataInicio = $_SESSION["parametrosTemporal"]['dataInicio'];
                    //             $dataFim = $_SESSION["parametrosTemporal"]['dataFim'];
                    //                 //  echo 'Período: ' . $periodo . '<br>' .
                    //                  echo 'Data Inicial: ' .date("d/m/Y", strtotime($dataInicio )). '<br>' .
                    //                  'Data Final: ' .date("d/m/Y", strtotime($dataFim ));                                
                    //             break;
                    //         case 'Mês':
                    //             $ano = $_SESSION["parametrosTemporal"]['ano'];
                    //             $mes = $_SESSION["parametrosTemporal"]['mes'];
                    //             echo 'Período: ' . $periodo . '<br>' .
                    //                  'Ano: ' . $ano . '<br>' .
                    //                  'Mês: ' . $mes;
                    //             break;
                    //         case 'Bimestral':
                    //             $ano = $_SESSION["parametrosTemporal"]['ano'];
                    //             $bimestre = $_SESSION["parametrosTemporal"]['bimestre'];
                    //             echo 'Período: ' . $periodo . '<br>' .
                    //                  'Ano: ' . $ano . '<br>' .
                    //                  $bimestre;
                    //             break;
                    //         case 'Trimestral':
                    //             $ano = $_SESSION["parametrosTemporal"]['ano'];
                    //             $trimestre = $_SESSION["parametrosTemporal"]['trimestre'];
                    //             echo 'Período: ' . $periodo . '<br>' .
                    //                  'Ano: ' . $ano . '<br>' .
                    //                  $trimestre;
                    //             break;
                    //         case 'Quadrimestral':
                    //             $ano = $_SESSION["parametrosTemporal"]['ano'];
                    //             $quadrimestre = $_SESSION["parametrosTemporal"]['quadrimestre'];
                    //             echo 'Período: ' . $periodo . '<br>' .
                    //                  'Ano: ' . $ano . '<br>' .
                    //                  $quadrimestre;
                    //             break;
                    //         case 'Semestral':
                    //             $ano = $_SESSION["parametrosTemporal"]['ano'];
                    //             $semestre = $_SESSION["parametrosTemporal"]['semestre'];
                    //             echo 'Período: ' . $periodo . '<br>' .
                    //                  'Ano: ' . $ano . '<br>' .
                    //                  $semestre;
                    //             break;
                    //         default:
                    //             break;
                    //     }
                    // }
                    // ?>
                </div>-->
            </div>
        </div>
    </div>


     <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>
                    <li><a href="#tab_2" data-toggle="tab" class="text-muted"><i class="fa fa-pie-chart text-danger"></i></a></li>
                    <li><a href="#tab_3" data-toggle="tab" class="text-muted"><i class="fa fa-bar-chart text-success"></i></a></li>
                    <li class="pull-right"><div id="chart-por-pagina"></div></li>
                    <li class="pull-right"><div id="chart-filtro"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <!--Tabela-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info" id='divTable'>
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tabela</h3>                                       
                                    </div>
                                    <div class="box-body">
                                        @yield('contentTabela')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Pizza</h3>                                        
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div id="divPie"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Barra</h3>                                        
                                    </div>                                    
                                    <div class="box-body">
                                        <div id="divColumn"></div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <ul class="nav nav-tabs">
                    <li><div id="chart-info"></div></li>
                    <li class="pull-right"><div id="chart-paginacao"></div></li>
                </ul>
            </div>            
        </div>        
    </div>    
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>    
    <!--paginação-->
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->    
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
    <!--tabela-->
    <script src="{{ asset('/js/highcharts.js') }}"></script>
    <!--<script src="https://code.highcharts.com/highcharts.js"></script>--> 
@stop 