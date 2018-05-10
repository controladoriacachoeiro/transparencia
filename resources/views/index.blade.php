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
                <h3>{{__("Gestão transparente")}},<br> {{__("Cidade inteligente")}}.</h3>
                <p class="acessibilidade">{{__("Aqui você encontra informações sobre as receitas e")}}
                <br>{{__("despesas do Município, servidores, licitações, contratos e muito mais")}}.</p>
            </div>
        </div>
    </div>

    <div class="tabs-dark" style="padding:0;">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="nav-desktop">
            <li id="default" class="active">
                <a class="acessibilidade" href="#despesas" data-toggle="tab">{{__("Despesas")}}</a>
            </li>
            <li>
                <a href="#receitas" data-toggle="tab" class="border-min acessibilidade">{{__("Receitas")}}</a>
            </li>
            <li>
                <a href="#licitacoes" data-toggle="tab" class="border-min acessibilidade">{{__("Licitações e Contratos")}}</a>
            </li>
            <li>
                <a href="#gestaofiscal" data-toggle="tab" class="border-min acessibilidade">{{__("Gestão Fiscal")}}</a>
            </li>
            <li>
                <a href="#patrimonio" data-toggle="tab" class="border-min acessibilidade">{{__("Patrimônio")}}</a>
            </li>
            <li>
                <a href="#pessoal" data-toggle="tab" class="border-min acessibilidade">{{__("Pessoal")}}</a>
            </li>
            <li>
                <a href="#convenios" data-toggle="tab" class="border-min acessibilidade">{{__("Convênios e Transferências")}}</a>
            </li>
            <li id="li-dados">
                <a href="#dados" data-toggle="tab" class="border-min acessibilidade">{{__("Dados Abertos")}}</a>
            </li>            
        </ul>

        <div class="NavforMobile">
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">                    
                    <a href="#despesas" class="acessibilidade active-Mobile" id="default-Mobile" data-toggle="tab">{{__("Despesas")}}</a>                    
                </div>
                <div class="col-xs-6" style="padding-right: 0px">                    
                    <a class="acessibilidade" href="#receitas" data-toggle="tab">{{__("Receitas")}}</a>                    
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#licitacoes" data-toggle="tab">{{__("Licitações e Contratos")}}</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a  class="acessibilidade" href="#gestaofiscal" data-toggle="tab">{{__("Gestão Fiscal")}}</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#patrimonio" data-toggle="tab">{{__("Patrimônio")}}</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#pessoal" data-toggle="tab">{{__("Pessoal")}}</a>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#convenios" data-toggle="tab">{{__("Convênios e Transferências")}}</a>
                </div>
                <div class="col-xs-6" style="padding-right: 0px">
                    <a class="acessibilidade" href="#dados" data-toggle="tab">{{__("Dados Abertos")}}</a>
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
                            <h3>{{__("Empenhos")}}</h3>
                            <p><a class="acessibilidade" href="/despesas/empenhos/orgaos">{{__("Por Órgão")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/fornecedores">{{__("Por Fornecedor")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/funcoes">{{__("Por Função")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/elementos">{{__("Por Elemento de Despesa")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/empenhos/nota">{{__("Por Nota de Empenho")}}</a></p>
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
                            <h3>{{__("Liquidações")}}</h3>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/orgaos">{{__("Por Órgão")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/fornecedores">{{__("Por Fornecedor")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/funcoes">{{__("Por Função")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/elementos">{{__("Por Elemento de Despesa")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/liquidacoes/nota">{{__("Por Nota de Liquidação")}}</a></p>
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
                            <h3>{{__("Pagamentos")}}</h3>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/orgaos">{{__("Por Órgão")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/fornecedores">{{__("Por Fornecedor")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/funcoes">{{__("Por Função")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/elementos">{{__("Por Elemento de Despesa")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/pagamentos/nota">{{__("Por Nota de Pagamento")}}</a></p>
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
                            <h3>{{__("Restos a Pagar")}}</h3>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/orgaos">{{__("Por Órgão")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/fornecedores">{{__("Por Fornecedor")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/funcoes">{{__("Por Função")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/elementos">{{__("Por Elemento de Despesa")}}</a></p>
                            <p><a class="acessibilidade" href="/despesas/restosapagar/nota">{{__("Por Nota de Pagamento")}}</a></p>
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
                            <h3>{{__("Lançada")}}</h3>
                            <p><a class="acessibilidade" href="/receitas/lancamentos/servico">{{__("Por Serviço")}}</a></p>
                            <p><a class="acessibilidade" href="/receitas/lancamentos/categoria">{{__("Por Categoria")}}</a></p>
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
                            <h3>{{__("Arrecadada")}}</h3>
                            <p><a class="acessibilidade" href="/receitas/recebimentos/orgao">{{__("Por Órgão")}}</a></p>
                            <p><a class="acessibilidade" href="/receitas/recebimentos/categoria">{{__("Por Categoria")}}</a></p>                            
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
                            <h3><a class="acessibilidade" href="/licitacoescontratos/licitacoes">{{__("Licitações")}}</a></h3>
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
                            <h3><a class="acessibilidade" href="/licitacoescontratos/contratos">{{__("Contratos")}}</a></h3>                            
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
                            <h3><a class="acessibilidade" href="/licitacoescontratos/bensadquiridos/orgao">{{__("Bens e Produtos Adquiridos")}}</a></h3>                            
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
                            <h3><a class="acessibilidade" href="/licitacoescontratos/ataregistropreco">{{__("Atas de Registro de Preço")}}</a></h3>
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
                            <h3>{{__("Legislação Orçamentária")}}</h3>
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
                            <h3>{{__("Relatórios da LRF")}}</h3>   
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
                            <h3><a class="acessibilidade" href="/gestaofiscal/prestacaoconta">{{__("Prestação de Contas")}}</a></h3>                            
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
                            <h3><a class="acessibilidade" href="/patrimonios/almoxarifado/porAlmoxarifado">{{__("Almoxarifado")}}</a></h3>                           
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
                            <h3>{{__("Bens Móveis")}}</h3>
                            <p><a class="acessibilidade" href="{{'/patrimonios/bensmoveis/orgao'}}">{{__("Por Órgão")}}</a></p>
                            <p><a class="acessibilidade" href="{{('/patrimonios/bensmoveis/numeropatrimonio')}}">{{__("Por Número Patrimônio")}}</a></p>                           
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
                            <h3><a class="acessibilidade" href="{{'/patrimonios/bensimoveis'}}">{{__("Bens Imóveis")}}</a></h3>                                                     
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
                            <h3><a class="acessibilidade" href="/patrimonios/frota">{{__("Frota")}}</a></h3>
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
                            <h3>{{__("Servidores e Salários")}}</h3>
                            <p><a class="acessibilidade" href="{{'/servidores/nome'}}">{{__("Por Nome")}}</a></p>
                            <p><a class="acessibilidade" href="{{'/servidores/orgao'}}">{{__("Por Órgão")}}</a></p>
                            <p><a class="acessibilidade" href="{{'/servidores/cargofuncao'}}">{{__("Por Cargo/Função")}}</a></p>
                            <p><a class="acessibilidade" href="{{'/servidores/matricula'}}">{{__("Por Matrícula")}}</a></p>
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
                            <h3><a class="acessibilidade" href="/estruturapessoal">{{__("Estrutura de Pessoal")}}</a></h3>
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
                            <h3><a class="acessibilidade" href="/concursos">{{__("Concurso Público")}}</a></h3>
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
                            <h3><a class="acessibilidade" href="/convenios/recebidos/todos">{{__("Recursos Recebidos")}}</a></h3>
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
                            <h3><a class="acessibilidade" href="/convenios/cedidos/todos">{{__("Recursos Concedidos")}}</a></h3>
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
                            <p><a class="acessibilidade" href="/dadosabertos/despesas">{{__("Despesas")}}</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/receitas">{{__("Receitas")}}</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/licitacoescontratos">{{__("Licitações e Contratos")}}</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/patrimonios">{{__("Patrimônios")}}</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/pessoal">{{__("Pessoal")}}</a></p>
                            <p><a class="acessibilidade" href="/dadosabertos/convenios">{{__("Convênios e Transferências")}}</a></p>
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
            <h3>{{__("Estamos aqui para te ajudar")}}</h3>
            <p>{{__("Encontre a informação que precisa utilizando o campo abaixo")}}</p>
            <form action="/resultado" method="get" role="search" class="tab-busca-form">
                    <div class="input-group">
                        <input type="hidden" name="cx" value="010719052729445061611:ntj0aehspma" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="utf-8" />
                        <label for="PesquisaInferior" style="display:none">Pesquisar</label>
					    <input type="text" id="PesquisaInferior" title="Caixa de Pesquisa inferior" style="width: 326px;" value="Pesquisa" name="q" class="form-control" placeholder="{{__("Pesquisar")}}...">
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