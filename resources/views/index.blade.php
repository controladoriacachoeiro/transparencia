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
                <br>despesas do Municipio, servidores, licitações, contratos e muito mais.</p>                 
            </div>
        </div>
    </div>

    <div class="tabs-dark" style="padding:0;">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs">
            <li id="default" class="active">
                <a href="#despesas" data-toggle="tab" class="border-min">Despesas</a>
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
            <li>
                <a href="#dados" data-toggle="tab" class="border-min">Dados Abertos</a>
            </li>            
        </ul>
        <!-- End Tab Navigation -->
        <!-- Tab Panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="despesas">
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3>Empenhos</h3>
                            <p><a href="#">Por Órgão</a></p>
                            <p><a href="#">Por Fornecedor</a></p>
                            <p><a href="#">Por Função</a></p>
                            <p><a href="#">Por Elemento de Despesa</a></p>
                            <p><a href="#">Por Nota de Empenho</a></p>
                        </div>                        
                    </div>                   
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3>Liquidações</h3>
                            <p><a href="#">Por Órgão</a></p>
                            <p><a href="#">Por Fornecedor</a></p>
                            <p><a href="#">Por Função</a></p>
                            <p><a href="#">Por Elemento de Despesa</a></p>
                            <p><a href="#">Por Nota de Empenho</a></p>
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3>Pagamentos</h3>
                            <p><a href="#">Por Órgão</a></p>
                            <p><a href="#">Por Fornecedor</a></p>
                            <p><a href="#">Por Função</a></p>
                            <p><a href="#">Por Elemento de Despesa</a></p>
                            <p><a href="#">Por Nota de Empenho</a></p>
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3>Restos a Pagar</h3>
                            <p><a href="#">Por Órgão</a></p>
                            <p><a href="#">Por Fornecedor</a></p>
                            <p><a href="#">Por Função</a></p>
                            <p><a href="#">Por Elemento de Despesa</a></p>
                            <p><a href="#">Por Nota de Empenho</a></p>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="receitas">               
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3>Arrecadada</h3>
                            <p><a href="#">Por Órgão</a></p>
                            <p><a href="#">Por Categoria</a></p>                            
                        </div>                        
                    </div>                   
                </div>
            </div>
            <div class="tab-pane fade" id="licitacoes">
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Licitações em Andamento</a></h3>                            
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Licitações Concluídas</a></h3>                            
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Contratos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Bens e Produtos Adquiridos</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
            </div>
            <div class="tab-pane fade" id="gestaofiscal">
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Legislação Orçamentária</a></h3>                            
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Relatórios da LRF</a></h3>                            
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Prestações de Contas</a></h3>                            
                        </div>                        
                    </div>                                                           
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Auditorias e Inspeções</a></h3>                            
                        </div>                        
                    </div>                                       
                </div>
            </div>
            <div class="tab-pane fade" id="patrimonio">
                <div class="col-md-4">                    
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Almoxarifado</a></h3>                           
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">                                        
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3>BensMóveis</h3>
                            <p><a href="#">Por Órgão</a></p>
                            <p><a href="#">Por Número Patrimônio</a></p>                           
                        </div>                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Frota</a></h3>
                        </div>                        
                    </div>                                       
                </div>                
            </div>
            <div class="tab-pane fade" id="pessoal">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Servidores e Salários</a></h3>
                        </div>                        
                    </div>                                        
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Estrutura de Pessoal</a></h3>
                        </div>                        
                    </div>                   
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Concurso Público</a></h3>
                        </div>                        
                    </div>                                       
                </div>                
            </div>
            <div class="tab-pane fade" id="convenios">
                <div class="col-md-offset-2 col-md-4">                    
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Recursos Recebidos</a></h3>
                        </div>                        
                    </div>                                        
                </div>
                <div class=" col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Recursos Concedidos</a></h3>
                        </div>                        
                    </div> 
                </div>                              
            </div>
            <div class="tab-pane fade" id="dados">
                <div class="col-md-offset-2 col-md-4 col-sm-6">                    
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3>Downloads</h3>
                            <p><a href="#">Despesas</a></p>
                            <p><a href="#">Receitas</a></p>
                            <p><a href="#">Licitações e Contratos</a></p>
                            <p><a href="#">Patrimônios</a></p>
                            <p><a href="#">Pessoal</a></p>
                            <p><a href="#">Convênios e Transferências</a></p>
                        </div>                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">                    
                    <div class="media">
                        <div class="media-left">
                            <div class="icon-wrapper">
                                <i class="fa fa-users custom-icon">
                                </i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3><a href="#">Web Service</a></h3>                            
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

    <script>
        $( document ).ready(function() {
            $("#default").addClass("active");
        });        
    </script>
@endsection
