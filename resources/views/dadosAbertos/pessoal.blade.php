@extends('formFiltro')

@section('htmlheader_title')
    Download - Pessoal
@stop
@section('main-content')
<div class='row'>
    <div class='col-md-12'>
        <div id="navegacao" class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Navegação</h3>                   
            </div>
            <div class="box-body">                                                        
                <ol class="breadcrumb">
                    <li><a href="/">Início</a></li>                                                
                    <li class="active">Download - Pessoal</li>                                                                                                                           
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class=" box-body box box-solid">
            <div class="box-group" id="accordion">
                <!--Servidor-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Servidor                        
                    </h4>
                    </div>
                    <div id="collapse1">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/pessoal/servidores', 'method' => 'POST')) }}
                        <div class="row form-group">    
                            <div class="col-md-4">
                            {{ Form::label('Situação', '', array('id'=>'lblSituacao')) }}
                            {{ Form::select('selectSituacao', array(), 'default', array('id'=>'selectSituacao', 'class'=>'form-control ajuste-campo')) }} 
                            </div>
                        </div>                   
                        <div class="row form-group">
                            <div class="col-xs-2" style="width: 110px;">
                                {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}                                    
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#servidores">Detalhes</span>
                            </div>
                        </div>
                        {{ Form::close() }}
                        
                        <!-- Erro -->
                        @if(session()->has('mensagemSituacao'))
                            <div class="col-md-8 alert alert-danger" style="font-size:20px">
                                {{ session()->get('mensagemSituacao') }}
                            </div>
                        @endif
                        <!--Fim erro-->
                        
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="servidores" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de servidores">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                                </tr>
                                            </thead>                            
                                            <tbody>
                                                <tr>
                                                    <td scope="col">Matrícula</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Número de matrícula identificando o Servidor na Administração Municipal</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">CPF</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Número do CPF do servidor, podendo estar parte oculta</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Nome</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Nome completo do Servidor</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Cargo</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Indicação do nome do cargo efetivo que o servidor ocupa</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Função</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Identificação do Cargo Comissionado ou Função Gratificada que o servidor exerce</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Tipo Vínculo</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Tipo de vínculo, se Efetivo, Comissionado, Temporário ou outro</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Data Exercício</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Data em que o servidor entrou em exercício</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Data Demissão</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Data em que o servidor foi exonerado do seu cargo ou função</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Situação</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Situação do Servidor na data em pesquisa, se Ativo, em Licença Remunerada, em Licença sem Vencimentos, etc</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Órgão</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Órgão onde o servidor exerce suas atividades</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Carga Horária</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Informação da carga horária Semanal ou Diária do servidor</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Referência</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Campo responsável pelo enquadramento salarial</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Sigla</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Campo responsável pelo enquadramento salarial</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Referência Sigla</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Campo responsável pelo enquadramento salarial</td>
                                                </tr>
                                            </tbody>
                                        </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                </div>
                <!---Fim Servidor-->

                <!--Folha de Pagamento-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Folha de Pagamento                        
                    </h4>
                    </div>
                    <div id="collapse2">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/pessoal/folhapagamento', 'method' => 'POST')) }}
                        <div class="row form-group">   
                            <div class="col-sm-4 col-md-4 col-lg-2">
                                {{ Form::label('Mês', '', array('id'=>'lblTipoConsulta')) }}
                                {{ Form::select('txtMes', array('01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio',
                                '06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro'), 'default', array('id'=>'selectTipoConsulta2', 'class'=>'form-control ajuste-campo')) }}
                            </div>   
                            <div class="col-sm-4 col-md-4 col-lg-2">
                                {{ Form::label('ano', 'Ano') }}
                                {{ Form::select('selectAno', array(), 'default', array('id'=>'selectAno', 'class'=>'form-control ajuste-campo')) }}
                            </div> 
                        </div>                                              
                        <div class="row form-group">
                            <div class="col-xs-2" style="width: 110px;">
                                {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}                                    
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#folha">Detalhes</span>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <!-- Erro -->
                        @if(session()->has('mensagemFolhaPagamento'))
                            <div class="col-md-8 alert alert-danger" style="font-size:20px">
                                {{ session()->get('mensagemFolhaPagamento') }}
                            </div>
                        @endif
                        <!--Fim erro-->
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="folha" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de folha de pagamento">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                                </tr>
                                            </thead>
                                            <tbody>                           
                                                <tr>
                                                    <td scope="col">Matrícula</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Número de matrícula identificando o Servidor na Administração Municipal</td>
                                                </tr>   
                                                <tr>
                                                    <td scope="col">Nome</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Nome completo do servidor</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">CPF</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Número do CPF do servidor, podendo estar parte oculta</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Mês</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Mês ao qual se refere aquele pagamento</td>
                                                </tr>         
                                                <tr>
                                                    <td scope="col">Ano</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Ano ao qual se refere a rúbrica lançada no pagamento</td>
                                                </tr>   
                                                <tr>
                                                    <td scope="col">Evento</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Código numérico que identifica unicamente a rúbrica do pagamento</td>
                                                </tr>    
                                                <tr>
                                                    <td scope="col">Descrição Evento</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Descrição da rúbrica (ex.: Vencimento, Adicional por Tempo de Serviço, Décimo Terceiro Salário, etc)</td>
                                                </tr> 
                                                <tr>
                                                    <td scope="col">Tipo Envento</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Identificador se a rúbrica é uma rúbrica de crédito ou de débito</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Quantidade</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Refere-se ao campo “Quantidade” listado no contracheque. Exemplo: 11%, 27,5%, 29D, etc</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Valor</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Valor de crédito ou débito da rúbrica</td>
                                                </tr>
                                            </tbody>
                                        </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                </div>
                <!--Fim Folha de Pagamento-->
        </div>
    </div>    
</div>

@endsection

@section('scriptsadd')
<link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script> 
    <script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
    <script>
        // LoadPage
        $(function () {
            $(document).ready(function() {
                var sAno = document.getElementById("selectAno");
                var optionArrayAno = [];
                $.each(arrayGenerico('anos'), function (key, value) {
                    optionArrayAno.push(value+'|'+value);
                });
        
                $.each(montarObjDropdown(optionArrayAno), function (key, value) {
                    sAno.options.add(value);
                });
                
                
                var dadosDb=<?php echo $dadosDb ?>;
                $('#selectSituacao').show();
                $('#selectSituacao').addClass("select2");
                var select = document.getElementById("selectSituacao");
                arrayTipoConsulta2(dadosDb,select);
                $('#selectSituacao option[value="Ativo"]').attr("selected",true);
                $(".select2").select2();
             

            });
        });
    </script>
@endsection