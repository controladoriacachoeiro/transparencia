@extends('layouts.app')
@section('htmlheader_title', 'Home')

@section('cssheader')
@show

@section('header')    
@Show

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="banner">
                <h3>Gestão transparente,<br> Cidade inteligente.</h3>
                <p>Aqui você encontra informações sobre as receitas e
                <br>despesas do Município, servidores, licitações, contratos e muito mais.</p>
            </div>
        </div>
    </div>

    <div class="tabs-dark" style="padding:0;">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs">
            <li id="default" class="active">
                <a href="#despesas" data-toggle="tab">Despesas</a>
            </li>
            <li>
                <a href="#receitas" data-toggle="tab" class="border-min">Receitas</a>
            </li>
            <li>
                <a href="#licitacoes" data-toggle="tab" class="border-min">Licitações e Contratos</a>
            </li>
            <li>
                <a href="#gestaofiscal" data-toggle="tab" class="border-min">Gestão Fiscal</a>
            </li>
            <li>
                <a href="#patrimonio" data-toggle="tab" class="border-min">Patrimônio</a>
            </li>
            <li>
                <a href="#pessoal" data-toggle="tab" class="border-min">Pessoal</a>
            </li>
            <li>
                <a href="#convenios" data-toggle="tab" class="border-min">Convênios e Transferências</a>
            </li>
            <li id="li-dados">
                <a href="#dados" data-toggle="tab" class="border-min">Dados Abertos</a>
            </li>            
        </ul>

        <div class="NavforMobile" style="display: none">
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6 ">                    
                        <a href="#despesas" data-toggle="tab">Despesas</a>                    
                </div>
                <div class="col-xs-6 ">                    
                        <a href="#receitas" data-toggle="tab">Receitas</a>                    
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6 ">
                    <a href="#licitacoes" data-toggle="tab">Licitações e Contratos</a>
                </div>
                <div class="col-xs-6 ">
                    <a href="#gestaofiscal" data-toggle="tab">Gestão Fiscal</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6 ">
                    <a href="#patrimonio" data-toggle="tab">Patrimônio</a>
                </div>
                <div class="col-xs-6 ">
                    <a href="#pessoal" data-toggle="tab">Pessoal</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6 ">
                    <a href="#convenios" data-toggle="tab">Convênios e Transferências</a>
                </div>
                <div class="col-xs-6 ">
                    <a href="#dados" data-toggle="tab">Dados Abertos</a>
                </div>
            </div>
        </div>
        <!-- End Tab Navigation -->
        <!-- Tab Panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="despesas">
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-bar-chart fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Empenhos</h3>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'orgaos'])}}">Por Órgão</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'fornecedores'])}}">Por Fornecedor</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'funcoes'])}}">Por Função</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'elementos'])}}">Por Elemento de Despesa</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'nota'])}}">Por Nota de Empenho</a></p>
                        </div>                        
                    </div>                   
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-area-chart fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Liquidações</h3>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'orgaos'])}}">Por Órgão</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'fornecedores'])}}">Por Fornecedor</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'funcoes'])}}">Por Função</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'elementos'])}}">Por Elemento de Despesa</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'nota'])}}">Por Nota de Liquidação</a></p>
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-usd fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Pagamentos</h3>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'orgaos'])}}">Por Órgão</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'fornecedores'])}}">Por Fornecedor</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'funcoes'])}}">Por Função</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'elementos'])}}">Por Elemento de Despesa</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'nota'])}}">Por Nota de Pagamento</a></p>
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-calendar fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Restos a Pagar</h3>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'orgaos'])}}">Por Órgão</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'fornecedores'])}}">Por Fornecedor</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'funcoes'])}}">Por Função</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'elementos'])}}">Por Elemento de Despesa</a></p>
                            <p><a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'nota'])}}">Por Nota de resto a Pagar</a></p>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="receitas">               
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-line-chart fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Arrecadada</h3>
                            <p><a href="/receitas/recebimentos/orgao">Por Órgão</a></p>
                            <p><a href="/receitas/recebimentos/categoria">Por Categoria</a></p>                            
                        </div>                        
                    </div>                   
                </div>
            </div>
            <div class="tab-pane fade" id="licitacoes">
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-users fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/licitacoescontratos/andamento">Licitações em Andamento</a></h3>                            
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-check-circle fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/licitacoescontratos/concluida">Licitações Concluídas</a></h3>                            
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text-o fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/licitacoescontratos/contratos">Contratos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cart-plus fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/licitacoescontratos/bensadquiridos/orgao">Bens e Produtos Adquiridos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
            </div>
            <div class="tab-pane fade" id="gestaofiscal">
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-gavel fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Legislação Orçamentária</h3>
                            <p><a href="/gestaofiscal/legislacao/ppa">PPA</a></p>
                            <p><a href="/gestaofiscal/legislacao/ldo">LDO</a></p>                             
                            <p><a href="/gestaofiscal/legislacao/loa">LOA</a></p>
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pie-chart fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Relatórios da LRF</h3>   
                            <p><a href="/gestaofiscal/lrf/rgf">RGF</a></p>
                            <p><a href="/gestaofiscal/lrf/rreo">RREO</a></p>                             
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-percent fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/gestaofiscal/prestacaoconta">Prestação de Contas</a></h3>                            
                        </div>                        
                    </div>                                                           
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-search fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/gestaofiscal/auditorias/">Auditorias e Inspeções</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
            </div>
            <div class="tab-pane fade" id="patrimonio">
                <div class="col-md-4">                    
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-briefcase fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/patrimonios/almoxarifado/porAlmoxarifado">Almoxarifado</a></h3>                           
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">                                        
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-desktop fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Bens Móveis</h3>
                            <p><a href="{{'/patrimonios/bensmoveis/orgao'}}">Por Órgão</a></p>
                            <p><a href="{{('/patrimonios/bensmoveis/numeropatrimonio')}}">Por Número Patrimônio</a></p>                           
                        </div>                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-car fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/patrimonios/frota">Frota</a></h3>
                        </div>                        
                    </div>                                       
                </div>                
            </div>
            <div class="tab-pane fade" id="pessoal">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-user fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Servidores e Salários</h3>
                            <p><a href="{{'/servidores/nome'}}">Por Nome</a></p>
                            <p><a href="{{'/servidores/orgao'}}">Por Órgão</a></p>
                            <p><a href="{{'/servidores/cargofuncao'}}">Por Cargo/Função</a></p>
                            <p><a href="{{'/servidores/matricula'}}">Por Matrícula</a></p>
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-sitemap fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/estruturapessoal">Estrutura de Pessoal</a></h3>
                        </div>                        
                    </div>                   
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pencil fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/concursos">Concurso Público</a></h3>
                        </div>
                    </div>                                       
                </div>                
            </div>
            <div class="tab-pane fade" id="convenios">
                <div class="col-md-offset-2 col-md-4">                    
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-level-down fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/convenios/recebidos/todos">Recursos Recebidos</a></h3>
                        </div>                        
                    </div>                                        
                </div>
                <div class=" col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-level-up fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/convenios/cedidos/todos">Recursos Concedidos</a></h3>
                        </div>                        
                    </div> 
                </div>                              
            </div>
            <div class="tab-pane fade" id="dados">
                <div class="col-md-offset-2 col-md-4 col-sm-6">                    
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-download fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3>Downloads</h3>
                            <p><a href="/dadosabertos/despesas">Despesas</a></p>
                            <p><a href="/dadosabertos/receitas">Receitas</a></p>
                            <p><a href="/dadosabertos/licitacoescontratos">Licitações e Contratos</a></p>
                            <p><a href="/dadosabertos/patrimonios">Patrimônios</a></p>
                            <p><a href="/dadosabertos/pessoal">Pessoal</a></p>
                            <p><a href="/dadosabertos/convenios">Convênios e Transferências</a></p>
                        </div>                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">                    
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud-download fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a href="/api">Web Service</a></h3>
                        </div>                        
                    </div>                   
                </div>                              
            </div>
        </div>
    </div>
    <div class="tab-busca">
        <div class="col-md-6 ">
            <h3>Estamos aqui para te ajudar</h3>
            <p>Encontre a informação que precisa utilizando o campo abaixo</p>
            <form action="/resultado" method="get" class="tab-busca-form">
                    <div class="input-group">
                        <input type="hidden" name="cx" value="010719052729445061611:ntj0aehspma" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="utf-8" />
                        <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" class="btn"><i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>    

    <!-- Adicionar propriedades CSS -->
    <script>
        $("#conteudo-principal").addClass("padding-zero");
        $( document ).ready(function() {
            $("#default").addClass("active");            
        });
    </script>
@endsection
