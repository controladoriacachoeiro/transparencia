@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
<link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')

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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Função / Subfunção / Órgão</th>
                            <th>Empenho</th>
                            <th>Liquidado</th>
                            <th>Pago</th>
                            <th>Rap pago</th>
                            <th>Total pago + RAP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                            //Link do arquivo xml, seja interno ou externo
                            $link = "http://localhost/despesa.xml";
                            $xml=simplexml_load_file($link) or die("Error: Cannot create object");
                            for ($i = 0; $i < count($xml); $i++) {
                                echo "<tr>";
                                echo "<td>" . $xml->despesa[$i]->CodigoOrgao . "</td>";
                                echo "<td>" . $xml->despesa[$i]->ValorEmpenho . "</td>";
                                echo "<td>" . $xml->despesa[$i]->ValorLiquidado . "</td>";
                                echo "<td>" . $xml->despesa[$i]->ValorPago . "</td>";
                                echo "<td>" . $xml->despesa[$i]->ValorRap . "</td>";
                                echo "<td>" . ((float)$xml->despesa[$i]->ValorRap + (float)$xml->despesa[$i]->ValorPago) . "</td>";
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
        <div class="col-md-6">
          <!-- PIE CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Gráfico de Pizza</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Gráfico de Barra</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
@endsection

@section('scriptsadd')
<!-- DataTables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollX": true,
            fixedColumns: { leftColumns: 1 },
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>

<!-- ChartJS 1.0.1 -->
<script src="{{ asset('/plugins/chartjs/Chart.min.js') }}"></script>
<script>
    $(function () {
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);

        var barChartData = {
            labels: ["Empenho", "Liquidado", "Pago", ],
            datasets: [
            {
                label: "Electronics",
                fillColor: "#d2d6de",
                strokeColor: "#d2d6de",
                pointColor: "#d2d6de",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#dcdcdc",
                data: [65, 59, 80]
            }]
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


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
          value: 700,
          color: "#f56954",
          highlight: "#f56954",
          label: "Chrome"
      },
      {
          value: 500,
          color: "#00a65a",
          highlight: "#00a65a",
          label: "IE"
      },
      {
          value: 400,
          color: "#f39c12",
          highlight: "#f39c12",
          label: "FireFox"
      }
    ];
    var pieOptions = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        //Number - The width of each segment stroke
        segmentStrokeWidth: 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 5, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: "easeOutBounce",
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
</script>
@endsection