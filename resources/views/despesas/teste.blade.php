@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')
    <!--Dados para tabelas-->
    <?php
        $arrayColunas = [ 'Empenho', 'Liquidado', 'Pago' ];
        //criando a string com a versátil função php implode para passar para o script
        $string_array_colunas = implode("|", $arrayColunas);
    ?>
    
    <!--Filtro-->
    <div class="row">
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtro</h3>

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
                        {{ Form::open(array('route' => 'despesa.filtro', 'method' => 'POST')) }}
                            {{Form::text('id', '', array('placeholder' => 'ID'))}}
                            {{Form::text('empenho', '', array('placeholder' => 'Empenho'))}}
                            {{Form::submit('Filtrar')}}
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Botões de ação</h3>

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
                    <button id="randomizeData">Randomize Data</button>
                    <button id="addDataset">Add Dataset</button>
                    <button id="removeDataset">Remove Dataset</button>
                    <button id="addData">Add Data</button>
                    <button id="removeData">Remove Data</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>        
    </div>
    <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table"></i></a></li>
              <li><a href="#tab_2" data-toggle="tab" class="text-muted"><i class="fa fa-pie-chart"></i></a></li>
              <li><a href="#tab_3" data-toggle="tab" class="text-muted"><i class="fa fa-bar-chart"></i></a></li>
              <li><a href="#tab_4" data-toggle="tab" class="text-muted"><i class="fa fa-line-chart"></i></a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <!--Tabela-->
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
                                            //Realiza um foreach com os dados passado pela model
                                            foreach ($despesas as $despesa) {
                                                echo "<tr>";
                                                echo "<td>" . $despesa->despesa_orgao . "</td>";
                                                echo "<td>" . $despesa->despesa_empenho . "</td>";
                                                echo "<td>" . $despesa->despesa_liquidado . "</td>";
                                                echo "<td>" . $despesa->despesa_pago . "</td>";
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
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <!--Pizza-->
                <div class="row">
                    <?php
                        foreach ($arrayColunas as $coluna) {
                            echo '<div class="col-md-4">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">' . $coluna . '</h3>
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
                                        <canvas id="' . $coluna . '"></canvas>
                                    </div>
                                </div>
                            </div>';
                        }
                    ?>

                </div>
                <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Barra</h3>
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
                                <canvas id="canvas"></canvas>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Barra</h3>
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
                                <canvas id="canvas-line"></canvas>
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
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->




    



    <!--Gráficos-->
    <div class="row">
        <!--Colunas-->
        <div class="col-md-6">
            <canvas id="canvas"></canvas>
        </div>
        <!--Linhas-->
        <div class="col-md-6">
            <canvas id="canvas-line" />
        </div>
    </div>
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <!--<script src="{{ asset('/plugins/chartjs/Chart.min.js') }}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- page script -->
    <script src="http://susansantana.com.br/samples/utils.js"></script>
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
                $.each(<?php echo $despesas; ?>, function (key, value) {
                    var todosCampos = [];
                        todosCampos.push(value.despesa_empenho);
                        todosCampos.push(value.despesa_liquidado);
                        todosCampos.push(value.despesa_pago);

                    arrayData[key] = {
                        label: value.despesa_orgao,
                        data: todosCampos,
                    };
                });

                //Labels todos os campos
                
                //recebe a string com elementos (título dos gráficos) separados, vindos do PHP
                var string_array = "<?php echo $string_array_colunas; ?>";
                //transforma esta string em um array próprio do Javascript
                var labels = string_array.split("|");
                
                var color = Chart.helpers.color;
                var Tabelas = ["Liquidado", "Pago"];

            //-------------
            //- PIE -
            //-------------
                var randomScalingFactor = function() {
                    return Math.round(Math.random() * 100);
                };

                var arrayConfigPie = new Array();
                $.each(labels, function (key, value) {

                    var arrayDataPie = new Array();
                    var arrayLabelPie = new Array();                    
                    $.each(arrayData, function (keyData, valueData) {
                        arrayDataPie.push(valueData.data[key]);
                        arrayLabelPie.push(valueData.label);
                    });

                    var configPie = {
                        type: 'pie',
                        data: chartPieOptionsJs(arrayDataPie, arrayLabelPie, value),
                        options: {
                            responsive: true
                        }
                    };

                    arrayConfigPie.push(configPie);                    
                });


            //-------------
            //- BAR -
            //-------------
                var configBar = {
                    type: 'bar',
                    data: chartOptionsJs(arrayData, labels, true, false), //Função para add as opções do gráfico,
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        }
                    }
                };


            //-------------
            //- LINE -
            //-------------
                var configLine = {
                    type: 'line',
                    data: chartOptionsJs(arrayData, labels, false, true), //Função para add as opções do gráfico,
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: true,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }
                    }
                };


            //-------------
            //- Buttons -
            //-------------

                window.onload = function() {
                    var ctxBar = document.getElementById("canvas").getContext("2d");
                    window.myBar = new Chart(ctxBar, configBar);

                    //----

                    $.each(arrayConfigPie, function (key, value) {
                        var ctx = $('#'.concat(value.data.datasets[0].label)).get(0).getContext("2d");
                        window.myPie = new Chart(ctx, value);
                    });

                    //----

                    var ctxLine = document.getElementById("canvas-line").getContext("2d");
                    window.myLine = new Chart(ctxLine, configLine);
                };

                document.getElementById('randomizeData').addEventListener('click', function() {
                    var zero = Math.random() < 0.2 ? true : false;
                    configBar.data.datasets.forEach(function(dataset) {
                        dataset.data = dataset.data.map(function() {
                            return zero ? 0.0 : randomScalingFactor();
                        });

                    });
                    window.myBar.update();

                    //---
                    
                    configPie.data.datasets.forEach(function(dataset) {
                        dataset.data = dataset.data.map(function() {
                            return randomScalingFactor();
                        });
                    });

                    window.myPie.update();

                    //---

                    configLine.data.datasets.forEach(function(dataset) {
                        dataset.data = dataset.data.map(function() {
                            return randomScalingFactor();
                        });

                    });

                    window.myLine.update();
                });

                var colorNames = Object.keys(window.chartColors);
                document.getElementById('addDataset').addEventListener('click', function() {
                    var colorName = colorNames[configBar.data.datasets.length % colorNames.length];
                    var dsColor = window.chartColors[colorName];
                    var newDataset = {
                        label: 'Dataset ' + configBar.data.datasets.length,
                        backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                        borderColor: dsColor,
                        borderWidth: 1,
                        data: []
                    };

                    for (var index = 0; index < configBar.data.labels.length; ++index) {
                        newDataset.data.push(randomScalingFactor());
                    }

                    configBar.data.datasets.push(newDataset);
                    window.myBar.update();

                    //----

                    var newDataset = {
                        backgroundColor: [],
                        data: [],
                        label: 'New dataset ' + configPie.data.datasets.length,
                    };

                    for (var index = 0; index < configPie.data.labels.length; ++index) {
                        newDataset.data.push(randomScalingFactor());

                        var colorName = colorNames[index % colorNames.length];;
                        var newColor = window.chartColors[colorName];
                        newDataset.backgroundColor.push(newColor);
                    }

                    configPie.data.datasets.push(newDataset);
                    window.myPie.update();

                    //----

                    var colorName = colorNames[configLine.data.datasets.length % colorNames.length];
                    var newColor = window.chartColors[colorName];
                    var newDataset = {
                        label: 'Dataset ' + configLine.data.datasets.length,
                        backgroundColor: newColor,
                        borderColor: newColor,
                        data: [],
                        fill: false
                    };

                    for (var index = 0; index < configLine.data.labels.length; ++index) {
                        newDataset.data.push(randomScalingFactor());
                    }

                    configLine.data.datasets.push(newDataset);
                    window.myLine.update();
                });

                document.getElementById('removeDataset').addEventListener('click', function() {
                    configBar.data.datasets.splice(0, 1);
                    window.myBar.update();

                    //---

                    configPie.data.datasets.splice(0, 1);
                    window.myPie.update();

                    //----

                    configLine.data.datasets.splice(0, 1);
                    window.myLine.update();
                });

                document.getElementById('addData').addEventListener('click', function() {
                    if (configBar.data.datasets.length > 0) {
                        var tabela = Tabelas[configBar.data.labels.length % Tabelas.length];
                        configBar.data.labels.push(tabela);

                        for (var index = 0; index < configBar.data.datasets.length; ++index) {
                            configBar.data.datasets[index].data.push(randomScalingFactor());
                        }

                        window.myBar.update();
                    }


                    //-----

                    if (configLine.data.datasets.length > 0) {
                        var tabela = Tabelas[configLine.data.labels.length % Tabelas.length];
                        configLine.data.labels.push(tabela);

                        configLine.data.datasets.forEach(function(dataset) {
                            dataset.data.push(randomScalingFactor());
                        });

                        window.myLine.update();
                    }
                });

                document.getElementById('removeData').addEventListener('click', function() {
                    configBar.data.labels.splice(-1, 1); // remove the label first

                    configBar.data.datasets.forEach(function(dataset, datasetIndex) {
                        dataset.data.pop();
                    });

                    window.myBar.update();

                    //----

                    configLine.data.labels.splice(-1, 1); // remove the label first

                    configLine.data.datasets.forEach(function(dataset, datasetIndex) {
                        dataset.data.pop();
                    });

                    window.myLine.update();
                });
        });        
    </script>
@endsection