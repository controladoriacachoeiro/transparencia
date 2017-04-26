@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@extends('layouts.breadcrumb')

@section('main-content')
    <!--Dados para tabelas-->
    <?php
        //criando a string com a versátil função php implode para passar para o script
        $string_array_colunas = implode("|", $colunaDados);
    ?>

    <div clas='row'>
        <div class='col-md-12'>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtro Temporal</h3>
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
                    <?php 
                        if (isset($_SESSION["parametrosTemporal"])) {
                            $periodo = $_SESSION["parametrosTemporal"]['periodo'];
                            switch($periodo){
                                case 'Livre':
                                    $dataInicio = $_SESSION["parametrosTemporal"]['dataInicio'];
                                    $dataFim = $_SESSION["parametrosTemporal"]['dataFim'];
                                    echo $periodo . '>' . $dataInicio . '>' . $dataFim;
                                    break;
                                case 'Mês':
                                    $ano = $_SESSION["parametrosTemporal"]['ano'];
                                    $mes = $_SESSION["parametrosTemporal"]['mes'];
                                    echo $periodo . '>' . $ano . '>' . $mes;
                                    break;
                                case 'Bimestral':
                                    $ano = $_SESSION["parametrosTemporal"]['ano'];
                                    $bimestre = $_SESSION["parametrosTemporal"]['bimestre'];
                                    echo $periodo . '>' . $ano . '>' . $bimestre;
                                    break;
                                case 'Trimestral':
                                    $ano = $_SESSION["parametrosTemporal"]['ano'];
                                    $trimestre = $_SESSION["parametrosTemporal"]['trimestre'];
                                    echo $periodo . '>' . $ano . '>' . $trimestre;
                                    break;
                                case 'Quadrimestral':
                                    $ano = $_SESSION["parametrosTemporal"]['ano'];
                                    $quadrimestre = $_SESSION["parametrosTemporal"]['quadrimestre'];
                                    echo $periodo . '>' . $ano . '>' . $quadrimestre;
                                    break;
                                case 'Semestral':
                                    $ano = $_SESSION["parametrosTemporal"]['ano'];
                                    $semestre = $_SESSION["parametrosTemporal"]['semestre'];
                                    echo $periodo . '>' . $ano . '>' . $semestre;
                                    break;
                                default:
                                    break;
                            }
                        }
                    ?>
                </div>
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
              <li><a href="#tab_4" data-toggle="tab" class="text-muted"><i class="fa fa-line-chart text-warning"></i></a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <!--Tabela-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
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
                            <div class="box-body">
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <?PHP
                                                foreach ($colunaDados as $valor) {
                                                    echo "<th>" . $valor . "</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
                                            foreach ($dadosDb as $valor) {
                                                echo "<tr>";

                                                foreach ($colunaDados as $valorColuna) {
                                                    switch ($valorColuna) {
                                                        case 'Órgãos':
                                                            if($link === '#'){
                                                                echo "<td>".$valor->UnidadeGestora."</td>";
                                                            } else {
                                                                echo "<td><a href='". linkReplace($link, $valor->UnidadeGestora) ."'>".$valor->UnidadeGestora."</a></td>";
                                                            }
                                                            break;
                                                        case 'Fornecedores':
                                                            $beneficiario = '"'.ajusteUrl($valor->Beneficiario).'"';
                                                            if($link === '#'){
                                                                echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'><i class='fa fa-search'></i></a> ".$valor->Beneficiario."</td>";
                                                            }else{
                                                                echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'><i class='fa fa-search'></i></a> <a href='". linkReplace($link, $valor->Beneficiario) ."'>".$valor->Beneficiario."</a></td>";
                                                            }
                                                            break;
                                                        case 'Funções':
                                                            if($link === '#'){
                                                                echo "<td>".$valor->Funcao."</td>";
                                                            } else {
                                                                echo "<td><a href='". linkReplace($link, $valor->Funcao) ."'>".$valor->Funcao."</a></td>";
                                                            }
                                                            break;
                                                        case 'Elementos':
                                                            if($link === '#'){
                                                                echo "<td>".$valor->ElemDespesa."</a></td>";
                                                            } else {
                                                                echo "<td><a href='". linkReplace($link, $valor->ElemDespesa) ."'>".$valor->ElemDespesa."</a></td>";
                                                            }
                                                            break;
                                                        case 'AnoExercicio':
                                                            echo "<td>" . $valor->AnoExercicio . "</td>";
                                                            break;
                                                        case 'CPF/CNPJ':
                                                            $cpfCnpj = str_replace(' ','',$valor->CPF_CNPJ);
                                                            $beneficiario = '"'.ajusteUrl($valor->Beneficiario).'"';
                                                            
                                                            if(strlen($cpfCnpj) === 11)
                                                            {
                                                                echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'>". mask($cpfCnpj,'###.###.###-##') ."</a></td>";
                                                            }
                                                            else if(strlen($cpfCnpj) === 14)
                                                            {
                                                                echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'>". mask($cpfCnpj,'##.###.###/####-##') ."</a></td>";
                                                            }
                                                            else
                                                            {
                                                                echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'>". $cpfCnpj ."</a></td>";
                                                            }
                                                            break;
                                                        // Empenho
                                                            case 'Nota de Empenho':
                                                                $numNota = '"' . $valor->NotaEmpenho.'"';
                                                                echo "<td><a href='#' onclick=notaShow(". $numNota .") data-toggle='modal' data-target='#myModal'>". $valor->NotaEmpenho ."</a></td>";
                                                                break;
                                                            case 'Data de Empenho':
                                                                echo "<td>" . date("d-m-Y", strtotime($valor->DataEmpenho )) . "</td>";
                                                                break;
                                                            case 'Valor Empenhado':
                                                            echo "<td>R$ " . number_format($valor->ValorEmpenho, 2,',','.') . "</td>";
                                                            break;
                                                        // Pagamento
                                                            case 'Nota de Pagamento':
                                                                $numNota = '"' . $valor->NotaPagamento.'"';
                                                                echo "<td><a href='#' onclick=notaShow(". $numNota .") data-toggle='modal' data-target='#myModal'>". $valor->NotaPagamento ."</a></td>";
                                                                break;
                                                            case 'Data do Pagamento':
                                                                echo "<td>" . date("d-m-Y", strtotime($valor->DataPagamento )) . "</td>";
                                                                break;
                                                            case 'Valor Pago':
                                                                echo "<td>R$ " . number_format($valor->ValorPago, 2,',','.') . "</td>";
                                                                break;
                                                    }
                                                }

                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <!--Pizza-->
                <div class="row">
                    <?php
                        foreach ($colunaDados as $coluna) {
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
                        <div class="box box-warning">
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
    
        // Dados Model
        function notaShow(numeroNota) {
            document.getElementById("modal-body").innerHTML = '';
            document.getElementById("titulo").innerHTML = '';
            
            $.get("{{ route('rota.despesas.showNota') }}", {subConsulta: '<?php echo $subConsulta ?>', nota: numeroNota}, function(value){
                    data = value[0];
                    document.getElementById("titulo").innerHTML = '<span>Número da nota: </span> ' + data['NotaEmpenho'];
                    document.getElementById("titulo").innerHTML = '<span>Número da nota: </span> ' + data['NotaPagamento'];
                    var body = ''+
                    '<div class="row">'+
                        '<div class="col-md-12">'+
                            '<p><span>Número da nota: </span> ' + data['NotaEmpenho'] + '</p>' +
                            '<p><span>Unidade Gestora: </span> ' + data['UnidadeGestora'] + '</p>' +
                            '<p><span>Beneficiário: </span> ' + data['Beneficiario'] + '</p>' +
                            '<p><span>CPF/CNPJ: </span> ' + data['CPF_CNPJ'] + '</p>' +
                            '<p><span>Ano de Exercício: </span> ' + data['AnoExercicio'] + '</p>' +
                            '<p><span>Dado do Empenho: </span> ' + data['DataEmpenho'] + '</p>' +
                            '<p><span>Elemento: </span> ' + data['ElemDespesa'] + '</p>' +
                            '<p><span>Fonte de Recursos: </span> ' + data['FonteRecursos'] + '</p>' +
                            '<p><span>Programa: </span> ' + data['Programa'] + '</p>' +
                            '<p><span>Ação: </span> ' + data['Acao'] + '</p>' +
                            '<p><span>Categoria Econômica: </span> ' + data['CatEconomica'] + '</p>' +
                            '<p><span>Função: </span> ' + data['Funcao'] + '</p>' +
                            '<p><span>Modalidade de Aplicação: </span> ' + data['ModalidadeAplicacao'] + '</p>' +
                            '<p><span>Modalidade Licitatoria: </span> ' + data['ModalidadeLicitatoria'] + '</p>' +
                            '<p><span>Natureza Despesa: </span> ' + data['NaturezaDespesa'] + '</p>' +
                            '<p><span>Processo: </span> ' + data['Processo'] + '</p>' +
                            '<p><span>Produto Servico: </span> ' + data['ProdutoServico'] + '</p>' +
                            '<p><span>Subfunção: </span> ' + data['SubFuncao'] + '</p>' +
                            '<p><span>Subtítulo: </span> ' + data['Subtitulo'] + '</p>' +
                            '<p><span>Valor do Empenho: </span> ' + data['ValorEmpenho'] + '</p>' +
                        '</div>'+
                    '</div>';

                    document.getElementById("modal-body").innerHTML = body;
            });
        }
        function fornecedorShow(nomeFornecedor) {
            document.getElementById("modal-body").innerHTML = '';
            document.getElementById("titulo").innerHTML = 'Título';

            $.get("{{ route('rota.despesas.showFornecedor') }}", {nomeFornecedor: nomeFornecedor}, function(value){
                    data = value[0];
                    document.getElementById("titulo").innerHTML = data['Beneficiario'];
                    var body = ''+
                    '<div class="row">'+
                        '<div class="col-md-12">'+
                            '<p><span>Beneficiário: </span> ' + data['Beneficiario'] + '</p>' +
                            '<p><span>CPF/CNPJ: </span> ' + data['CPF_CNPJ'] + '</p>' +
                        '</div>'+
                    '</div>';

                    document.getElementById("modal-body").innerHTML = body;
            });
        }

        $(function () {
            $(document).ready(function() {
                alert('Página despesa.blade');
                $('#ddColunas').multiselect();
            });

            //- DATATABLE -
                $("#tabela").DataTable(dataTableJs());

            //- DATE CHART -            
                //recebe a string com elementos (título dos gráficos) separados, vindos do PHP
                //transforma esta string em um array próprio do Javascript
                var labels = ("<?php echo $string_array_colunas; ?>").split("|");

                var arrayData = dadosJs(<?php echo $dadosDb; ?>, labels);

            //- PIE -
                var arrayConfigPie = arrayConfig(arrayData, labels);

            //- BAR -
                var configBar = configBarJs(arrayData, labels);

            //- LINE -
                var configLine = configLineJs(arrayData, labels);

            //-------------
            //- Buttons -
            //-------------
            
                var randomScalingFactor = function() {
                    return Math.round(Math.random() * 100);
                };

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