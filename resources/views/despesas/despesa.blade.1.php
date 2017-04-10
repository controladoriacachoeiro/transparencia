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
                        <canvas id="barChart"></canvas>
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
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Gráfico de Área</h3>

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
                        <canvas id="areaChart"></canvas>
                    </div>
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
                    <h3 class="box-title">Gráfico de Linha</h3>

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
                        <canvas id="lineChart"></canvas>
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
        <?php
            $arrayColunas = [ 'Empenho', 'Liquidado', 'Pago' ];
            //criando a string com a versátil função php implode para passar para o script
            $string_array_colunas = implode("|", $arrayColunas);

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
                var labels = ["Empenho", "Liquidado", "Pago"];


            //-------------
            //- BAR CHART -
            //-------------
                //Contexto                
                var ctxBarChartCanvas = $("#barChart").get(0).getContext("2d");
                var barChart = new Chart(ctxBarChartCanvas, {
                        type: 'bar',
                        data: chartOptionsJs(arrayData, labels, false, false, false), //Função para add as opções do gráfico
                        options: {
                            responsive: true
                        }
                    });

                
            //-------------
            //- AREA CHART -
            //-------------
                //Contexto                
                var ctxLineChartCanvas = $("#areaChart").get(0).getContext("2d");
                var lineChart = new Chart(ctxLineChartCanvas, {
                        type: 'line',
                        data: chartOptionsJs(arrayData, labels, true, true, false),
                        options: {
                            responsive: true
                        }
                    });

                
            //-------------
            //- LINE CHART -
            //-------------
                //Contexto                
                var ctxLineChartCanvas = $("#lineChart").get(0).getContext("2d");
                var lineChart = new Chart(ctxLineChartCanvas, {
                        type: 'line',
                        data: chartOptionsJs(arrayData, labels, false, false, false),
                        options: {
                            responsive: true
                        }
                    });


            //-------------
            //- PIE CHART -
            //-------------
                //Dados para o gráfico PIE
                    var arrayLabel = new Array();
                    var arrayColor = new Array();
                    var arrayDados = new Array();

                    var despesa_empenho = new Array();
                    var despesa_liquidado = new Array();
                    var despesa_pago = new Array();

                    $.each(<?php echo $despesas; ?>, function (key, value) {
                        arrayLabel[key] =  value.despesa_orgao;

                        despesa_empenho[key] = value.despesa_empenho;
                        despesa_liquidado[key] = value.despesa_liquidado;
                        despesa_pago[key] = value.despesa_pago;
                    });
                    
                    arrayDados.push(despesa_empenho, despesa_liquidado, despesa_pago);

                    //recebe a string com elementos (título dos gráficos) separados, vindos do PHP
                    var string_array = "<?php echo $string_array_colunas; ?>";
                    //transforma esta string em um array próprio do Javascript
                    var arrayColunas = string_array.split("|");


                //Cria os gráfico
                    $.each(arrayColunas, function (key, value) {

                        var dados = arrayDados[key];

                        var ctx = $('#'.concat(value)).get(0).getContext("2d");   
                        var pieChart = new Chart(ctx, {
                            type: 'pie',
                            data: chartOptionsJs(dados, arrayLabel, false, false, true), //Função para add as opções do gráfico
                            options: {
                                responsive: true
                            }
                        });
                    });

        });
        
    </script>
@endsection