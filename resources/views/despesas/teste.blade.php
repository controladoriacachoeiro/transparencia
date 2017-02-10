@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
  <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('main-content')
                <div class="row">
                    <div class="col-md-12">
                      <!-- BAR CHART -->
                      <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gráfico barra</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
                    <!-- /.col -->
                </div>
@endsection

@section('scriptsadd')  
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('/plugins/chartjs/Chart.min.js') }}"></script>
    <script>
        $(function () {
        
        var dados = null;

        //Read XML
        //"http://localhost/despesa.xml";
        $.ajax({
            url:'http://localhost/despesa.xml',
            dataType: 'xml',

            // Caso tenha encontrato o arquivo, leio os dados do xml
            success: function(xml){

                // Pegando todos os dados dentro da variavel array do arquivo xml
                $(xml).find('dataroot').each(function() {

                    var arrayWord = []; // Variavel para armazenar array de palavras e descricao

                    // Pegando todos os dados dentro da variavel option do arquivo xml
                    $(this).find('despesa').each(function(){

                        // Armazenando um array com indice word, description dentro do array arrayWord
                        arrayData.push(                         
                                [ 
                                    { 
                                        // 'Ano' : $(this).find('Ano').text(), 
                                        // 'ValorLiquidado' : $(this).find('ValorLiquidado').text()
                                        label: "Electronics",
                                        fillColor: "#d2d6de",
                                        strokeColor: "#d2d6de",
                                        pointColor: "#d2d6de",
                                        pointStrokeColor: "#c1c7d1",
                                        pointHighlightFill: "#fff",
                                        pointHighlightStroke: "#dcdcdc",
                                        data: [65, 59, 80]
                                    }  
                                ]
                            );

                            dados = arrayData;
                    });            

                    // Exibindo dados armazenado no array
                    // alert( arrayData[0] );
                    // alert( arrayData[1] );
                    // alert( arrayData[2] );

                }); 
            },

            // Se nao consegui ler o arquivo xml, exibo mensagem de erro no console
            error: function () {
                alert("Ocorreu um erro inesperado durante o processamento.");
            }
        });



          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $("#barChart").get(0).getContext("2d");
          var barChart = new Chart(barChartCanvas);

          var barChartData = {
              labels: ["January", "February", "March",],
              datasets: dados
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