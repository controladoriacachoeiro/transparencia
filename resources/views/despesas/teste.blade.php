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
                <h3 class="box-title">Gráfico barra</h3>
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
                <div class="chart">
                    <canvas id="barChart" style="height:350px"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>


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

?>
@endsection

@section('scriptsadd')
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('/plugins/chartjs/Chart.min.js') }}"></script>
<script>
    $(function () {
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
            labels: ["January", "February", "March", ],
            datasets: arrayData
        };

        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        };

        barChartOptions.datasetFill = true;
        barChart.Bar(barChartData, barChartOptions);
    });
</script>
@endsection