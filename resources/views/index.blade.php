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
                <h3>Gestão transparente,<br> Cidade inteligente.</h3>
                <p class="acessibilidade">Aqui você encontra informações sobre as receitas e
                <br>despesas do Município, servidores, licitações, contratos e muito mais.</p>
            </div>
        </div>
    </div>

    <div class="tabs-dark" style="padding:0;">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="nav-desktop">
            <li id="default" class="active">
                <a class="acessibilidade" href="#despesas" data-toggle="tab">Despesas</a>
            </li>
            <li>
                <a href="#receitas" data-toggle="tab" class="border-min acessibilidade">Receitas</a>
            </li>
            <li>
                <a href="#licitacoes" data-toggle="tab" class="border-min acessibilidade">Licitações e Contratos</a>
            </li>
            <li>
                <a href="#gestaofiscal" data-toggle="tab" class="border-min acessibilidade">Gestão Fiscal</a>
            </li>
            <li>
                <a href="#patrimonio" data-toggle="tab" class="border-min acessibilidade">Patrimônio</a>
            </li>
            <li>
                <a href="#pessoal" data-toggle="tab" class="border-min acessibilidade">Pessoal</a>
            </li>
            <li>
                <a href="#convenios" data-toggle="tab" class="border-min acessibilidade">Convênios e Transferências</a>
            </li>
            <li id="li-dados">
                <a href="#dados" data-toggle="tab" class="border-min acessibilidade">Dados Abertos</a>
            </li>
            <li>
                <a href="#controleinterno" data-toggle="tab" class="border-min acessibilidade">Controle Interno</a>
            </li>
        </ul>

        <div class="NavforMobile">
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">                    
                    <a href="#despesas" class="acessibilidade active-Mobile" id="default-Mobile" data-toggle="tab">Despesas</a>                    
                </div>
                <div class="col-xs-6" style="padding-right: 0px">                    
                    <a class="acessibilidade" href="#receitas" data-toggle="tab">Receitas</a>                    
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#licitacoes" data-toggle="tab">Licitações e Contratos</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a  class="acessibilidade" href="#gestaofiscal" data-toggle="tab">Gestão Fiscal</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#patrimonio" data-toggle="tab">Patrimônio</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#pessoal" data-toggle="tab">Pessoal</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#convenios" data-toggle="tab">Convênios e Transferências</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#dados" data-toggle="tab">Dados Abertos</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#controleinterno" data-toggle="tab">Controle Interno</a>
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
                            <p><a class="acessibilidade" href="/despesas/empenhos/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/nota">Por Nota de Empenho</a></p>
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
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/nota">Por Nota de Liquidação</a></p>
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
                            <p><a class="acessibilidade" href="/despesas/pagamentos/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/nota">Por Nota de Pagamento</a></p>
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
                            <p><a class="acessibilidade" href="/despesas/restosapagar/orgaos">Por Órgão</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/fornecedores">Por Fornecedor</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/funcoes">Por Função</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/elementos">Por Elemento de Despesa</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/nota">Por Nota de Pagamento</a></p>
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
                            <h3>Lançada</h3>
                            <p><a class="acessibilidade" href="/receitas/lancamentos/servico">Por Serviço</a></p>
                            <p><a class="acessibilidade" href="/receitas/lancamentos/categoria">Por Categoria</a></p>
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
                            <h3>Arrecadada</h3>
                            <p><a class="acessibilidade" href="/receitas/recebimentos/orgao">Por Órgão</a></p>
                            <p><a class="acessibilidade" href="/receitas/recebimentos/categoria">Por Categoria</a></p>                            
                        </div>                        
                    </div>                   
                </div>                
            </div>
            <div class="tab-pane fade" id="licitacoes">
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-users fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade" href="/licitacoescontratos/licitacoes">Licitações</a></h3>
                        </div>
                    </div>                                        
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text-o fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade" href="/licitacoescontratos/contratos">Contratos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cart-plus fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade" href="/licitacoescontratos/bensadquiridos/orgao">Bens e Produtos Adquiridos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade" href="/licitacoescontratos/ataregistropreco">Atas de Registro de Preço</a></h3>
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
                            <h3>Legislação Orçamentária</h3>
                            <p><a class="acessibilidade" href="/gestaofiscal/legislacao/ppa">PPA</a></p>
                            <p><a class="acessibilidade" href="/gestaofiscal/legislacao/ldo">LDO</a></p>                             
                            <p><a class="acessibilidade" href="/gestaofiscal/legislacao/loa">LOA</a></p>
                            <p><a class="acessibilidade" href="/gestaofiscal/legislacao/creditosadicionais">Créditos Adicionais</a></p>
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
                            <h3>Relatórios da LRF</h3>   
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
                            <h3><a class="acessibilidade" href="/gestaofiscal/prestacaoconta">Prestação de Contas</a></h3>
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
                            <h3><a class="acessibilidade" href="/patrimonios/almoxarifado/porAlmoxarifado">Almoxarifado</a></h3>                           
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
                            <h3>Bens Móveis</h3>
                            <p><a class="acessibilidade" href="{{'/patrimonios/bensmoveis/orgao'}}">Por Órgão</a></p>
                            <p><a class="acessibilidade" href="{{('/patrimonios/bensmoveis/numeropatrimonio')}}">Por Número de Patrimônio</a></p>                           
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
                            <h3><a class="acessibilidade" href="{{'/patrimonios/bensimoveis'}}">Bens Imóveis</a></h3>                                                     
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
                            <h3><a class="acessibilidade" href="/patrimonios/frota">Frota</a></h3>
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
                            <p><a class="acessibilidade" href="{{'/servidores/nome'}}">Por Nome</a></p>
                            <p><a class="acessibilidade" href="{{'/servidores/orgao'}}">Por Órgão</a></p>
                            <p><a class="acessibilidade" href="{{'/servidores/cargofuncao'}}">Por Cargo/Função</a></p>
                            <p><a class="acessibilidade" href="{{'/servidores/matricula'}}">Por Matrícula</a></p>
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
                            <h3><a class="acessibilidade" href="/estruturapessoal">Estrutura de Pessoal</a></h3>
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
                            <h3><a class="acessibilidade" href="/concursos" target="_blank">Concurso Público</a></h3>
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
                            <h3><a class="acessibilidade" href="/convenios/recebidos/todos">Recursos Recebidos</a></h3>
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-level-up fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade" href="/convenios/cedidos/todos">Recursos Concedidos</a></h3>
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
                            <p><a class="acessibilidade" href="/dadosabertos/despesas">Despesas</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/receitas">Receitas</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/licitacoescontratos">Licitações e Contratos</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/patrimonios">Patrimônios</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/pessoal">Pessoal</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/convenios">Convênios e Transferências</a></p>
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
            <div class="tab-pane fade" id="controleinterno">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-balance-scale fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade" href="/controleinterno/auditoriaseinspecoes">Auditorias e Inspeções</a></h3>
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-files-o fa-stack-1x fa-inverse custom-icon"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3><a class="acessibilidade" href="/controleinterno/normativa">Instruções Normativas</a></h3>
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
                            <h3><a class="acessibilidade" href="/controleinterno/prestacaoconta">Prestação de Contas</a></h3>
                        </div>                        
                    </div>                                                           
                </div>                
            </div>
        </div>
    </div>
    <div class="tab-busca">
        <div class="col-md-6">
            <h3>Estamos aqui para te ajudar</h3>
            <p class="acessibilidade">Encontre a informação que precisa utilizando o campo abaixo</p>
            <form action="/resultado" method="get" role="search" class="tab-busca-form">
                    <div class="input-group">
                        <input type="hidden" name="cx" value="010719052729445061611:ntj0aehspma" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="utf-8" />
                        <label for="PesquisaInferior" style="display:none">Pesquisar</label>
					    <input type="text" id="PesquisaInferior" title="Caixa de Pesquisa inferior" name="q" class="form-control" placeholder="Pesquisar...">
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