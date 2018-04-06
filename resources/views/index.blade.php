@extends('layouts.app')
@section('htmlheader_title', 'Portal da Transparência da Prefeitura Municipal de Cachoeiro do Itapemirim / ES')

@section('cssheader')
@show

@section('header')    
@Show

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="banner">
                <h3 english="Transparent management, <br> Smart city." id="contentTitulo">Gestão transparente,<br> Cidade inteligente.</h3>
                <p class="acessibilidade" english="Here you will find information about revenues and <br> expenses of the County, public servers, biddings, contracts and much more." id="contentConteudoPrincipal">Aqui você encontra informações sobre as receitas e
                <br>despesas do Município, servidores, licitações, contratos e muito mais.</p>
            </div>
        </div>
    </div>

    <div class="tabs-dark" style="padding:0;">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="nav-desktop">
            <li id="default" class="active">
                <a class="acessibilidade despesas" href="#despesas" data-toggle="tab">Despesas</a>
            </li>
            <li>
                <a href="#receitas" data-toggle="tab" class="border-min acessibilidade receitas">Receitas</a>
            </li>
            <li>
                <a href="#licitacoes" data-toggle="tab" class="border-min acessibilidade licitacoesEContratos">Licitações e Contratos</a>
            </li>
            <li>
                <a href="#gestaofiscal" data-toggle="tab" class="border-min acessibilidade gestaoFiscal">Gestão Fiscal</a>
            </li>
            <li>
                <a href="#patrimonio" data-toggle="tab" class="border-min acessibilidade patrimonio">Patrimônio</a>
            </li>
            <li>
                <a href="#pessoal" data-toggle="tab" class="border-min acessibilidade pessoal">Pessoal</a>
            </li>
            <li>
                <a href="#convenios" data-toggle="tab" class="border-min acessibilidade convenios">Convênios e Transferências</a>
            </li>
            <li id="li-dados">
                <a href="#dados" data-toggle="tab" class="border-min acessibilidade dadosAbertos">Dados Abertos</a>
            </li>            
        </ul>

        <div class="NavforMobile">
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">                    
                    <a href="#despesas" class="acessibilidade active-Mobile despesas" id="default-Mobile" data-toggle="tab">Despesas</a>                    
                </div>
                <div class="col-xs-6" style="padding-right: 0px">                    
                    <a class="acessibilidade receitas" href="#receitas" data-toggle="tab">Receitas</a>                    
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade licitacoesEContratos" href="#licitacoes" data-toggle="tab">Licitações e Contratos</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a  class="acessibilidade gestaoFiscal" href="#gestaofiscal" data-toggle="tab">Gestão Fiscal</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade patrimonio" href="#patrimonio" data-toggle="tab">Patrimônio</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade pessoal" href="#pessoal" data-toggle="tab">Pessoal</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade convenios" href="#convenios" data-toggle="tab">Convênios e Transferências</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade dadosAbertos" href="#dados" data-toggle="tab">Dados Abertos</a>
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
                            <h3 class="empenhos">Empenhos</h3>
                            <p><a class="acessibilidade orgao" href="/despesas/empenhos/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade fornecedor" href="/despesas/empenhos/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade funcao" href="/despesas/empenhos/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade elementoDespesa" href="/despesas/empenhos/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade notaEmpenho" href="/despesas/empenhos/nota">Por Nota de Empenho</a></p>
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
                            <h3 class="liquidacoes">Liquidações</h3>
                            <p><a class="acessibilidade orgao" href="/despesas/liquidacoes/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade fornecedor" href="/despesas/liquidacoes/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade funcao" href="/despesas/liquidacoes/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade elementoDespesa" href="/despesas/liquidacoes/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade notaLiquidacao" href="/despesas/liquidacoes/nota">Por Nota de Liquidação</a></p>
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
                            <h3 class="pagamentos">Pagamentos</h3>
                            <p><a class="acessibilidade orgao" href="/despesas/pagamentos/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade fornecedor" href="/despesas/pagamentos/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade funcao" href="/despesas/pagamentos/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade elementoDespesa" href="/despesas/pagamentos/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade notaPagamentos" href="/despesas/pagamentos/nota">Por Nota de Pagamento</a></p>
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
                            <h3 class="restosAPagar">Restos a Pagar</h3>
                            <p><a class="acessibilidade orgao" href="/despesas/restosapagar/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade fornecedor" href="/despesas/restosapagar/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade funcao" href="/despesas/restosapagar/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade elementoDespesa" href="/despesas/restosapagar/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade notaRestos" href="/despesas/restosapagar/nota">Por Nota de Restos a Pagar</a></p>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="receitas"> 
                <div class="col-md-offset-3 col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-barcode fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="lancada">Lançada</h3>
                            <p><a class="acessibilidade servico" href="/receitas/lancamentos/servico">Por Serviço</a></p>
                            <p><a class="acessibilidade categoria" href="/receitas/lancamentos/categoria">Por Categoria</a></p>
                        </div>                        
                    </div>
                </div>              
                <div class=" col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-line-chart fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="arrecadada">Arrecadada</h3>
                            <p><a class="acessibilidade orgao" href="/receitas/recebimentos/orgao">Por Órgão</a></p>
                            <p><a class="acessibilidade categoria" href="/receitas/recebimentos/categoria">Por Categoria</a></p>                            
                        </div>                        
                    </div>                   
                </div>                
            </div>
            <div class="tab-pane fade" id="licitacoes">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-users fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade licitacoes" href="/licitacoescontratos/licitacoes">Licitações</a></h3>
                        </div>
                    </div>                                        
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text-o fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade contratos" href="/licitacoescontratos/contratos">Contratos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cart-plus fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade bens" href="/licitacoescontratos/bensadquiridos/orgao">Bens e Produtos Adquiridos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
            </div>
            <div class="tab-pane fade" id="gestaofiscal">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-gavel fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="legislacaoOrcamentaria">Legislação Orçamentária</h3>
                            <p><a class="acessibilidade" href="/gestaofiscal/legislacao/ppa">PPA</a></p>
                            <p><a class="acessibilidade" href="/gestaofiscal/legislacao/ldo">LDO</a></p>                             
                            <p><a class="acessibilidade" href="/gestaofiscal/legislacao/loa">LOA</a></p>
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pie-chart fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="relatoriosLRF">Relatórios da LRF</h3>   
                            <p><a class="acessibilidade" href="/gestaofiscal/lrf/rgf">RGF</a></p>
                            <p><a class="acessibilidade" href="/gestaofiscal/lrf/rreo">RREO</a></p>                             
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-percent fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade prestacaoDeConta" href="/gestaofiscal/prestacaoconta">Prestação de Contas</a></h3>                            
                        </div>                        
                    </div>                                                           
                </div>                
            </div>
            <div class="tab-pane fade" id="patrimonio">
                <div class="col-sm-6 col-md-3">                    
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-briefcase fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade almoxarifado" href="/patrimonios/almoxarifado/porAlmoxarifado">Almoxarifado</a></h3>                           
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-sm-6 col-md-3">                                        
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-desktop fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="bensMoveis">Bens Móveis</h3>
                            <p><a class="acessibilidade orgao" href="{{'/patrimonios/bensmoveis/orgao'}}">Por Órgão</a></p>
                            <p><a class="acessibilidade numeroPatrimonio" href="{{('/patrimonios/bensmoveis/numeropatrimonio')}}">Por Número Patrimônio</a></p>                           
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">                                        
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-university fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade bensImoveis" href="{{'/patrimonios/bensimoveis'}}">Bens Imóveis</a></h3>                                                     
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-car fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade frota" href="/patrimonios/frota">Frota</a></h3>
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
                            <h3 class="servidoresESalarios">Servidores e Salários</h3>
                            <p><a class="acessibilidade nome" href="{{'/servidores/nome'}}">Por Nome</a></p>
                            <p><a class="acessibilidade orgao" href="{{'/servidores/orgao'}}">Por Órgão</a></p>
                            <p><a class="acessibilidade cargoFuncao" href="{{'/servidores/cargofuncao'}}">Por Cargo/Função</a></p>
                            <p><a class="acessibilidade matricula" href="{{'/servidores/matricula'}}">Por Matrícula</a></p>
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
                            <h3><a class="acessibilidade estruturaPessoal" href="/estruturapessoal">Estrutura de Pessoal</a></h3>
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
                            <h3><a class="acessibilidade concursoPublico" href="/concursos">Concurso Público</a></h3>
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
                            <h3><a class="acessibilidade recursosRecebidos" href="/convenios/recebidos/todos">Recursos Recebidos</a></h3>
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
                            <h3><a class="acessibilidade recursosCedidos" href="/convenios/cedidos/todos">Recursos Concedidos</a></h3>
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
                            <p><a class="acessibilidade despesas" href="/dadosabertos/despesas">Despesas</a></p>
                            <p><a class="acessibilidade receitas" href="/dadosabertos/receitas">Receitas</a></p>
                            <p><a class="acessibilidade licitacoesEContratos" href="/dadosabertos/licitacoescontratos">Licitações e Contratos</a></p>
                            <p><a class="acessibilidade patrimonio" href="/dadosabertos/patrimonios">Patrimônios</a></p>
                            <p><a class="acessibilidade pessoal" href="/dadosabertos/pessoal">Pessoal</a></p>
                            <p><a class="acessibilidade convenios" href="/dadosabertos/convenios">Convênios e Transferências</a></p>
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
                            <h3><a class="acessibilidade" href="/api">Web Service</a></h3>
                        </div>                        
                    </div>                   
                </div>                              
            </div>
        </div>
    </div>
    <div class="tab-busca">
        <div class="col-md-6 ">
            <h3 id="contentTituloPesquisar" english="We are here to help">Estamos aqui para te ajudar</h3>
            <p id="contentSubTituloPesquisar" english="Find the information you need using the field below">Encontre a informação que precisa utilizando o campo abaixo</p>
            <form action="/resultado" method="get" role="search" class="tab-busca-form">
                    <div class="input-group">
                        <input type="hidden" name="cx" value="010719052729445061611:ntj0aehspma" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="utf-8" />
                        <label for="PesquisaInferior" style="display:none">Pesquisar</label>
					    <input type="text" id="PesquisaInferior" title="Caixa de Pesquisa inferior" style="width: 326px;" value="Pesquisa" name="q" class="form-control" placeholder="Pesquisar...">
                            <span class="input-group-btn">
                            <input type="submit" name="search" value=" " id="search-btn" class="btnsearch2" alt="Efetuar busca">
                                {{--  <button type="submit" name="search" class="btn"><i class="fa fa-search"></i>
                                </button>  --}}
                            </span>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.min.js') }}"></script>    

    <!-- Adicionar propriedades CSS -->
    <script>
        $("#conteudo-principal").addClass("padding-zero");
        $( document ).ready(function() {
            $("#default").addClass("active");
            $("#default-Mobile").addClass(".active-Mobile");
        });
    </script>

    <script>
        function addClass(el) {
            menu.removeClass('active-Mobile');
            $(el).addClass('active-Mobile');
        };
        var menu = $('.NavforMobile a');        
        menu.on('click', function () {
            addClass(this);
        });
    </script>
@endsection