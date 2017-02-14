@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')

    <!-- -------------------------------- -->
    <!-- FUNÇÃO PHP OBTER DADOS PARA O JS -->
    <!-- -------------------------------- -->
    <?php
        //criar variável para alocar o array
        $array = array();
        //Recebe a variável "$obj" passada pelo controller
        //Precisa do foreach pois a variável "$obj" é um array de objetos,
        //e precisa ser convertida em um array simples
        foreach($obj->chart as $valor){
        $array[] = array(
            $valor->label,
            $valor->fillColor,
            $valor->strokeColor,
            $valor->pointColor,
            $valor->pointStrokeColor,
            $valor->pointHighlightFill,
            $valor->pointHighlightStroke,
            $valor->data
            );
        }

        //Converte o array em json para ser enviado para o javascript
        $arrayDataJson = json_encode(array_values($array));

        
        define('CONSTARRAY', $array);
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tabela" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Função / Subfunção / Órgão</th>
                                <th>Empenho</th>
                                <th>Liquidado</th>
                                <th>Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP                                
                                $date = constant('CONSTARRAY');

                                for ($i = 0; $i < count($date); $i++) {
                                    echo "<tr>";
                                    echo "<td>" . $date[$i][0] . "</td>";
                                    echo "<td>" . $date[$i][7][0] . "</td>";
                                    echo "<td>" . $date[$i][7][1] . "</td>";
                                    echo "<td>" . $date[$i][7][2] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Gráfico de Barra</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4">
            <!-- PIE CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Empenho</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChartEmpenho" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-4">
            <!-- PIE CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Liquidado</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChartLiquidado" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (CENTER) -->
        <div class="col-md-4">
            <!-- PIE CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Pago</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChartPago" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->
    
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('/plugins/chartjs/Chart.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            //-------------
            //- DATATABLE -
            //-------------
                $("#tabela").DataTable(dataTableJs());

            //----------------------------------
            //- DADOS PARA EXIBIR NOS GRÁFICOS -
            //----------------------------------
                //Cria um array vazio no javascript
                var arrayData = new Array();
                //Variável de controle
                var i = 0;
                //Recebe os dados passados pelo php dessa mesma página
                //e realiza um foreach para alocar no array do javascript
                $.each(<?php echo $arrayDataJson; ?>, function (key, value) {
                    arrayData[i] = {
                        label: value[0],
                        fillColor: value[1],
                        strokeColor: value[2],
                        pointColor: value[3],
                        pointStrokeColor: value[4],
                        pointHighlightFill: value[5],
                        pointHighlightStroke: value[6],
                        data: value[7]
                    };
                    i++;
                });


            //-------------
            //- BAR CHART -
            //-------------
                var barChartCanvas = $("#barChart").get(0).getContext("2d");
                var barChart = new Chart(barChartCanvas);

                var barChartData = {
                    labels: ["Empenho", "Liquidado", "Pago", ],
                    datasets: arrayData
                };

                var barChartOptions = barOptionsJs();

                barChartOptions.datasetFill = true;
                barChart.Bar(barChartData, barChartOptions);

            //-------------
            //- PIE CHART -
            //-------------
                //Dados para o gráfico PIE
                    //Empenho
                    var arrayDataEmpenho = new Array();
                    var i = 0;
                    $.each(<?php echo $arrayDataJson; ?>, function (key, value) {
                        arrayDataEmpenho[i] = {
                            label: value[0],
                            color: value[1],
                            highlight: value[2],
                            value: value[7][0]
                        };
                        i++;
                    });
                    //Liquidado
                    var arrayDataLiquidado = new Array();
                    var i = 0;
                    $.each(<?php echo $arrayDataJson; ?>, function (key, value) {
                        arrayDataLiquidado[i] = {
                            label: value[0],
                            color: value[1],
                            highlight: value[2],
                            value: value[7][1]
                        };
                        i++;
                    });
                    //Pago
                    var arrayDataPago = new Array();
                    var i = 0;
                    $.each(<?php echo $arrayDataJson; ?>, function (key, value) {
                        arrayDataPago[i] = {
                            label: value[0],
                            color: value[1],
                            highlight: value[2],
                            value: value[7][2]
                        };
                        i++;
                    });


                
                //Contexto dos gráficos
                    //Empenho
                    var pieChartCanvasEmpenho = $("#pieChartEmpenho").get(0).getContext("2d");
                    var pieChartEmpenho = new Chart(pieChartCanvasEmpenho);
                    //Liquidado
                    var pieChartCanvasLiquidado = $("#pieChartLiquidado").get(0).getContext("2d");
                    var pieChartLiquidado = new Chart(pieChartCanvasLiquidado);
                    //Pago
                    var pieChartCanvasPago = $("#pieChartPago").get(0).getContext("2d");
                    var pieChartPago = new Chart(pieChartCanvasPago);
                
                //Cria os gráficos
                pieChartEmpenho.Doughnut(arrayDataEmpenho, pieOptionsJs());
                pieChartLiquidado.Doughnut(arrayDataLiquidado, pieOptionsJs());
                pieChartPago.Doughnut(arrayDataPago, pieOptionsJs());

        });
    </script>
@endsection