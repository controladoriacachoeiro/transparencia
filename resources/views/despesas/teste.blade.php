@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')
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
        <!-- /.col -->
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
        <!-- /.col -->
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
        <!-- /.col -->
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

            //--------------
            //- DATE CHART -
            //--------------
                //Cria um array vazio no javascript
                var arrayData = new Array();

                //Variável de controle
                var i = 0;

                //Realiza um foreach com os dados passado pela model
                $.each(<?php echo $despesas; ?>, function (key, value) {
                    var arr = [];
                        arr.push(value.despesa_empenho);
                        arr.push(value.despesa_liquidado);
                        arr.push(value.despesa_pago);
                    arrayData[i] = {
                        label: value.despesa_orgao,
                        data: arr,
                        fillColor: getMultiColor()[i],
                        strokeColor: getMultiColor()[i],
                        pointColor: getMultiColor()[i],
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#dcdcdc"
                    };
                    i++;
                });
                
                //Monta os dados no gráfico
                var chartData = {
                    labels: ["Empenho", "Liquidado", "Pago", ],
                    datasets: arrayData
                };
            //-------------
            //- BAR CHART -
            //-------------
                //Contexto
                var barChartCanvas = $("#barChart").get(0).getContext("2d");
                var barChart = new Chart(barChartCanvas);
                
                //Cria o gráfico
                barChart.Bar(chartData, barOptionsJs());

            //-------------
            //- PIE CHART -
            //-------------
                //Dados para o gráfico PIE
                    //Empenho
                    var arrayDataEmpenho = new Array();
                    var i = 0;
                    $.each(<?php echo $despesas; ?>, function (key, value) {
                        arrayDataEmpenho[i] = {
                            label: value.despesa_orgao,
                            value: value.despesa_empenho,
                            color: getMultiColor()[i],
                            highlight: getMultiColor()[i]
                        };
                        i++;
                    });
                    //Liquidado
                    var arrayDataLiquidado = new Array();
                    var i = 0;
                    $.each(<?php echo $despesas; ?>, function (key, value) {
                        var color = getRandomColor()
                        arrayDataLiquidado[i] = {
                            label: value.despesa_orgao,
                            value: value.despesa_liquidado,
                            color: getMultiColor()[i],
                            highlight: getMultiColor()[i]
                        };
                        i++;
                    });
                    //Pago
                    var arrayDataPago = new Array();
                    var i = 0;
                    $.each(<?php echo $despesas; ?>, function (key, value) {
                        var color = getRandomColor()
                        arrayDataPago[i] = {
                            label: value.despesa_orgao,
                            value: value.despesa_pago,
                            color: getMultiColor()[i],
                            highlight: getMultiColor()[i]
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

            //--------------
            //- AREA CHART -
            //--------------
                var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
                var areaChart = new Chart(areaChartCanvas);
                
                areaChart.Line(chartData, areaOptionsJs());

            //-------------
            //- LINE CHART -
            //--------------
                var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
                var lineChart = new Chart(lineChartCanvas);                
                lineChart.Line(chartData, lineOptionsJs());

            
        });
    </script>
@endsection