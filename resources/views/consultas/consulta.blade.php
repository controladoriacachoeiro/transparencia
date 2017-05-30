@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@extends('layouts.breadcrumb')

@section('main-content')

    <div clas='row'>
        <div class='col-md-9'>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Navegação</h3>
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
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Período</h3>
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
                        switch ($periodo) {
                            case 'Livre':
                                $dataInicio = $_SESSION["parametrosTemporal"]['dataInicio'];
                                $dataFim = $_SESSION["parametrosTemporal"]['dataFim'];
                                echo 'Período: ' . $periodo . '<br>' .
                                     'Data Inicial: ' . $dataInicio . '<br>' .
                                     'Data Final: ' . $dataFim;
                                break;
                            case 'Mês':
                                $ano = $_SESSION["parametrosTemporal"]['ano'];
                                $mes = $_SESSION["parametrosTemporal"]['mes'];
                                echo 'Período: ' . $periodo . '<br>' .
                                     'Ano: ' . $ano . '<br>' .
                                     'Mês: ' . $mes;
                                break;
                            case 'Bimestral':
                                $ano = $_SESSION["parametrosTemporal"]['ano'];
                                $bimestre = $_SESSION["parametrosTemporal"]['bimestre'];
                                echo 'Período: ' . $periodo . '<br>' .
                                     'Ano: ' . $ano . '<br>' .
                                     $bimestre;
                                break;
                            case 'Trimestral':
                                $ano = $_SESSION["parametrosTemporal"]['ano'];
                                $trimestre = $_SESSION["parametrosTemporal"]['trimestre'];
                                echo 'Período: ' . $periodo . '<br>' .
                                     'Ano: ' . $ano . '<br>' .
                                     $trimestre;
                                break;
                            case 'Quadrimestral':
                                $ano = $_SESSION["parametrosTemporal"]['ano'];
                                $quadrimestre = $_SESSION["parametrosTemporal"]['quadrimestre'];
                                echo 'Período: ' . $periodo . '<br>' .
                                     'Ano: ' . $ano . '<br>' .
                                     $quadrimestre;
                                break;
                            case 'Semestral':
                                $ano = $_SESSION["parametrosTemporal"]['ano'];
                                $semestre = $_SESSION["parametrosTemporal"]['semestre'];
                                echo 'Período: ' . $periodo . '<br>' .
                                     'Ano: ' . $ano . '<br>' .
                                     $semestre;
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
                                        <div class="row">
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
                                                                    if ($link === '#') {
                                                                        echo "<td>".$valor->UnidadeGestora."</td>";
                                                                    } else {
                                                                        echo "<td><a href='". linkReplace($link, $valor->UnidadeGestora) ."'>".$valor->UnidadeGestora."</a></td>";
                                                                    }
                                                                    break;
                                                                case 'Fornecedores':
                                                                    $beneficiario = '"'.ajusteUrl($valor->Beneficiario).'"';
                                                                    if ($link === '#') {
                                                                        echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'><i class='fa fa-search'></i></a> ".$valor->Beneficiario."</td>";
                                                                    } else {
                                                                        echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'><i class='fa fa-search'></i></a> <a href='". linkReplace($link, $valor->Beneficiario) ."'>".$valor->Beneficiario."</a></td>";
                                                                    }
                                                                    break;
                                                                case 'Funções':
                                                                    if ($link === '#') {
                                                                        echo "<td>".$valor->Funcao."</td>";
                                                                    } else {
                                                                        echo "<td><a href='". linkReplace($link, $valor->Funcao) ."'>".$valor->Funcao."</a></td>";
                                                                    }
                                                                    break;
                                                                case 'Elementos':
                                                                    if ($link === '#') {
                                                                        echo "<td>".$valor->ElemDespesa."</a></td>";
                                                                    } else {
                                                                        echo "<td><a href='". linkReplace($link, $valor->ElemDespesa) ."'>".$valor->ElemDespesa."</a></td>";
                                                                    }
                                                                    break;
                                                                case 'AnoExercicio':
                                                                    echo "<td>" . $valor->AnoExercicio . "</td>";
                                                                    break;
                                                                case 'CPF/CNPJ':
                                                                    $cpfCnpj = str_replace(' ', '', $valor->CPF_CNPJ);
                                                                    $beneficiario = '"'.ajusteUrl($valor->Beneficiario).'"';
                                                                        
                                                                    if (strlen($cpfCnpj) === 11) {
                                                                        echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'>". mask($cpfCnpj, '###.###.###-##') ."</a></td>";
                                                                    } elseif (strlen($cpfCnpj) === 14) {
                                                                        echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'>". mask($cpfCnpj, '##.###.###/####-##') ."</a></td>";
                                                                    } else {
                                                                        echo "<td><a href='#' onclick=fornecedorShow(". $beneficiario .") data-toggle='modal' data-target='#myModal'>". $cpfCnpj ."</a></td>";
                                                                    }
                                                                    break;
                                                                // Empenho
                                                                case 'Nota de Empenho':
                                                                    $numNota = '"' . $valor->NotaEmpenho .'"';
                                                                    $anoExercicio = '"' . $valor->AnoExercicio .'"';
                                                                    echo "<td><a href='#' onclick=notaShow(". $numNota . ',' . $anoExercicio .") data-toggle='modal' data-target='#myModal'>". $valor->NotaEmpenho ."</a></td>";
                                                                    break;
                                                                case 'Data de Empenho':
                                                                    echo "<td>" . date("d-m-Y", strtotime($valor->DataEmpenho )) . "</td>";
                                                                    break;
                                                                case 'Valor Empenhado':
                                                                    // echo "<td>R$ " . number_format($valor->ValorEmpenho, 2,',','.') . "</td>";
                                                                    echo "<td>" . $valor->ValorEmpenho . "</td>";
                                                                    break;
                                                                // Liquidação
                                                                case 'Nota de Liquidação':
                                                                    $numNota = '"' . $valor->NotaLiquidacao.'"';
                                                                    $anoExercicio = '"' . $valor->AnoExercicio .'"';
                                                                    echo "<td><a href='#' onclick=notaShow(". $numNota . ',' . $anoExercicio .") data-toggle='modal' data-target='#myModal'>". $valor->NotaLiquidacao ."</a></td>";
                                                                    break;
                                                                case 'Data de Liquidação':
                                                                    echo "<td>" . date("d-m-Y", strtotime($valor->DataLiquidacao )) . "</td>";
                                                                    break;
                                                                case 'Valor Liquidação':
                                                                    // echo "<td>R$ " . number_format($valor->ValorPago, 2,',','.') . "</td>";
                                                                    echo "<td>" . $valor->ValorLiquidado . "</td>";
                                                                    break;
                                                                // Pagamento
                                                                case 'Nota de Pagamento':
                                                                    $numNota = '"' . $valor->NotaPagamento.'"';
                                                                    $anoExercicio = '"' . $valor->AnoExercicio.'"';
                                                                    echo "<td><a href='#' onclick=notaShow(". $numNota . ',' . $anoExercicio .") data-toggle='modal' data-target='#myModal'>". $valor->NotaPagamento ."</a></td>";
                                                                    break;
                                                                case 'Data do Pagamento':
                                                                    echo "<td>" . date("d-m-Y", strtotime($valor->DataPagamento )) . "</td>";
                                                                    break;
                                                                case 'Valor Pago':
                                                                    // echo "<td>R$ " . number_format($valor->ValorPago, 2,',','.') . "</td>";
                                                                    echo "<td>" . $valor->ValorPago . "</td>";
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
    <!--<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>-->
    <!--<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>-->
    <!-- Chart -->
        <!--paginação-->
        <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
        <!--grafico-->    
        <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
        <!--tabela-->
        <script src="{{ asset('/js/highcharts.js') }}"></script>
        <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->
    <!-- fim Chart //-->

    <script>
        // Dados Model
            function notaShow(numeroNota, anoExercicio) {
                document.getElementById("modal-body").innerHTML = '';
                document.getElementById("titulo").innerHTML = '';
                
                $.get("{{ route('rota.consulta.showNota') }}", {subConsulta: '<?php echo $subConsulta ?>', nota: numeroNota, anoexercicio: anoExercicio}, function(value){
                        data = value[0];
                        var subConsulta = "<?php echo $subConsulta ?>"
                        var conteudo;

                        switch (subConsulta)
                         {
                             case 'empenhos':
                                 document.getElementById("titulo").innerHTML = '<span>Nota de Empenho Nº: </span> ' + data['NotaEmpenho'] + '/' + data['AnoExercicio'];
                                //  body = body + '<p><span>Valor do Empenho: </span> ' + data['ValorEmpenho'] + '</p>';
                                conteudo = {Data: '<td>Data do Empenho:</td>' +
                                                        '<td>' + data['DataEmpenho'] + 
                                                        '</td>', 
                                                 Extra: '', 
                                                 
                                                 Valor: '<table class="table table-sm">'+
                                                            '<thead>'+
                                                                '<tr>'+
                                                                '<th>VALOR DO EMPENHO</th>'+                                                    
                                                                '</tr>'+
                                                            '</thead>'+
                                                            '<tbody>'+
                                                                '<tr>'+                                                    
                                                                '<td>' + 'R$' + data['ValorEmpenho'] +'</td>' +
                                                                '</tr>'+                                                                                                               
                                                            '</tbody>'+
                                                        '</table>'}
                             break;

                             case 'pagamentos':
                                 document.getElementById("titulo").innerHTML = '<span>Nota de Pagamento Nº: </span> ' + data['NotaPagamento'] + '/' + data['AnoExercicio'];
                                 conteudo = {Data: '<td>Data do Pagamento:</td>' +
                                                        '<td>' + data['DataPagamento'] + 
                                                        '</td>', 
                                                  Extra:'<tr>'+                                                        
                                                        '<td>Nota do Empenho:</td>' +
                                                        '<td>' + data['NotaEmpenho'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>Nota da Liquidação:</td>' +
                                                        '<td>' + data['NotaLiquidacao'] + '</td>'+                                                        
                                                        '</tr>', 
                                                  Valor:'<table class="table table-sm">'+
                                                            '<thead>'+
                                                                '<tr>'+
                                                                '<th>VALOR DO PAGAMENTO</th>'+                                                    
                                                                '</tr>'+
                                                            '</thead>'+
                                                            '<tbody>'+
                                                                '<tr>'+                                                    
                                                                '<td>' + 'R$' + data['ValorPago'] +'</td>' +
                                                                '</tr>'+                                                                                                               
                                                            '</tbody>'+
                                                        '</table>'
                                                    }
                             break;

                             case 'liquidacoes':
                                 document.getElementById("titulo").innerHTML = '<span>Nota de Liquidacao Nº: </span> ' + data['NotaLiquidacao'] + '/' + data['AnoExercicio'];
                                 conteudo = {Data: '<td>Data da Liquidação:</td>' +
                                                        '<td>' + data['DataLiquidacao'] + 
                                                        '</td>', 
                                                  Extra:'<tr>'+                                                        
                                                        '<td>Nota do Empenho:</td>' +
                                                        '<td>' + data['NotaEmpenho'] + '</td>'+                                                        
                                                        '</tr>', 
                                                  Valor:'<table class="table table-sm">'+
                                                            '<thead>'+
                                                                '<tr>'+
                                                                '<th>VALOR DA LIQUIDAÇÃO</th>'+                                                    
                                                                '</tr>'+
                                                            '</thead>'+
                                                            '<tbody>'+
                                                                '<tr>'+                                                    
                                                                '<td>' + 'R$' + data['ValorLiquidado'] +'</td>' +
                                                                '</tr>'+                                                                                                               
                                                            '</tbody>'+
                                                        '</table>'
                                                    }
                             break;
                         }                                              
                        
                        var body = '' + '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<table class="table table-sm">'+
                                                    '<thead>'+
                                                        '<tr>'+
                                                        '<th colspan="2">DADOS</th>'+                                                    
                                                        '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>'+
                                                        '<tr>'+                                                    
                                                        '<td>Órgão:</td>' +
                                                        '<td>' + data['NotaEmpenho'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>Produto/Serviço:</td>' +
                                                        '<td>' + data['ProdutoServico'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>Projeto/Atividade:</td>' +
                                                        '<td>' + data['Acao'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>Elemento da Despesa:</td>' +
                                                        '<td>' + data['ElemDespesa'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>Fonte de Recursos:</td>' +
                                                        '<td>' + data['FonteRecursos'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>Função:</td>' +
                                                        '<td>' + data['Funcao'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<td>Subfunção:</td>' +
                                                        '<td>' + data['SubFuncao'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>Ano Exercicio:</td>' +
                                                        '<td>' + data['AnoExercicio'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        conteudo.Data + 
                                                        '<tr>'+                                                        
                                                        '<td>Modalidade Licitatória:</td>' +
                                                        '<td>' + data['ModalidadeLicitatoria'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        conteudo.Extra +                                                                                                               
                                                    '</tbody>'+
                                                '</table>'+

                                                '<table class="table table-sm">'+
                                                    '<thead>'+
                                                        '<tr>'+
                                                        '<th colspan="2">CREDOR</th>'+                                                    
                                                        '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>'+
                                                        '<tr>'+                                                    
                                                        '<td>Nome:</td>' +
                                                        '<td>' + data['Beneficiario'] + '</td>'+                                                        
                                                        '</tr>'+
                                                        '<tr>'+                                                        
                                                        '<td>CPF/CNPJ:</td>' +
                                                        '<td>' + data['CPF_CNPJ'] + '</td>'+                                                        
                                                    '</tbody>'+
                                                '</table>'+

                                                conteudo.Valor;                                                                            
                        

                        body = body + '</div>' + '</div>';


                        document.getElementById("modal-body").innerHTML = body;
                });
            }
            function fornecedorShow(nomeFornecedor) {
                document.getElementById("modal-body").innerHTML = '';
                document.getElementById("titulo").innerHTML = 'Título';

                $.get("{{ route('rota.consulta.showFornecedor') }}", {nomeFornecedor: nomeFornecedor}, function(value){
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
        // Fim Dados Model

        $(function () {
            // Charts
                var $table = $('#tabela'), 
                    $chartFiltro = $('#chart-filtro'), 
                    $chartPorPagina = $('#chart-por-pagina'), 
                    $chartInfo = $('#chart-info'), 
                    $chartPaginacao = $('#chart-paginacao');

                var baseConfig = {
                    credits: {
                        enabled: false
                    },
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        width: $('#tabela').width()
                    },
                    legend: {
                        // align: 'right',
                        // verticalAlign: 'middle',
                        // layout: 'vertical'
                        verticalAlign: 'top'
                    },
                    title: {
                        text: null
                    },
                    xAxis: {
                        categories: ['Título']
                    },
                    yAxis: [{
                        labels: {
                            format: 'R$ {value},00',
                            style: {
                                color: '#4572A7'
                            }
                        },
                        title: {
                            text: 'Total R$',
                            style: {
                                color: '#4572A7'
                            }
                        }
                    }],
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    }
                };

                // Crie uma função para atualizar o gráfico com o conjunto atual de registros 
                // de dynatable, após todas as operações terem sido executadas.
                function updateChart() {
                    // Data
                        var dynatable = $table.data('dynatable'), arrayData = [], i = 0;
                        $.each(dynatable.settings.dataset.records, function() {
                            var row = Object.values(this);
                            var obj = {
                                name: Object.values(row[1])[0],
                                y: parseFloat(row[row.length - 1]),
                                color: Highcharts.getOptions().colors[i]
                            };
                            arrayData.push(obj);
                            i++;
                        });
                    // Fim data
                    
                    // Column
                        var coluna = [];
                        $.each(arrayData, function() {
                            var obj = {
                                type: 'column',
                                name: this.name,
                                data: [this.y]
                            };
                            coluna.push(obj);
                        });
                        var dataColumn = {
                            series: coluna,
                            tooltip: {
                                formatter: function() {
                                    return '<small style="color: '+this.series.color+'">'+
                                    this.series.name +'</small>: <b>'+ 
                                    this.y.toLocaleString("pt-BR", { minimumFractionDigits: 2 , style: 'currency', currency: 'BRL' });
                                }
                            }
                        };
                    // Fim column

                    // Pie
                        var dataPie = {
                            series: [{
                                type: 'pie',
                                data: arrayData
                            }],        
                            tooltip: {
                                formatter: function() {
                                    return '<small style="color: '+this.point.color+'">'+
                                    this.key +'</small>: <b>'+ 
                                    this.y.toLocaleString("pt-BR", { minimumFractionDigits: 2 , style: 'currency', currency: 'BRL' });
                                }
                            }
                        };
                    // Fim pie

                    $('#divColumn').highcharts(
                        $.extend(baseConfig, dataColumn)
                    );
                    $('#divPie').highcharts(
                        $.extend(baseConfig, dataPie)
                    );
                };

                // Anexe dynatable à nossa tabela e ative nossa 
                // função de atualização sempre que interagimos com ela.
                $table
                    .dynatable({
                        inputs: {
                            queryEvent: 'blur change keyup',
                            recordCountTarget: $chartInfo,
                            paginationLinkTarget: $chartPaginacao,
                            searchTarget: $chartFiltro,
                            perPageTarget: $chartPorPagina,
                            
                            paginationPrev: 'Anterior',
                            paginationNext: 'Próximo',
                            searchText: 'Pesquisar: ',
                            perPageText: 'Mostrar: ',
                            pageText: 'Páginas: ',
                            recordCountPageBoundTemplate: ' de {pageLowerBound} até {pageUpperBound} de',
                            recordCountPageUnboundedTemplate: '{recordsShown} de',
                            recordCountTotalTemplate: '{recordsQueryCount} {collectionName}',
                            recordCountFilteredTemplate: ' (Filtrados de {recordsTotal} registros)',
                            recordCountText: 'Mostrando',
                            recordCountTextTemplate: '{text} {pageTemplate} {totalTemplate} {filteredTemplate}',
                            recordCountTemplate: '<span id="dynatable-record-count-{elementId}" class="dynatable-record-count">{textTemplate}</span>',
                            processingText: 'Processando...'
                        },
                        params: {
                            queries: 'consultas',
                            sorts: 'classificar',
                            page: 'página',
                            perPage: 'por página',
                            records: 'registros'
                        },
                        dataset: {
                            perPageOptions: [5, 10],
                            sortTypes: {
                                'valor': 'number'
                            }
                        }
                    })
                    // .hide()
                    .bind('dynatable:afterProcess', updateChart);

                // Execute nossa função updateChart pela primeira vez.
                updateChart();
            // Fim charts
        });
    </script>
@endsection
