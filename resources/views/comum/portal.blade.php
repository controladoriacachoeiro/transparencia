@extends('layouts.app')
@section('htmlheader_title', 'O Portal')

@section('cssheader')
@endsection

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
                        <li class="active">O Portal</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">O que tem no Portal?</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
              <div class="col-lg-10">
                <div class="box-body text-justify">
                    <p>O Portal da Transparência é uma iniciativa da Prefeitura de Cachoeiro de Itapemirim para que os cachoeirenses vejam e compreendam as informações da prefeitura, possibilitando que possam exercer o controle social, ou seja, questionar e avaliar as receitas, gastos, licitações e contratos.</p>

                    <p>Assim, conseguiremos com o APOIO DO CIDADÃO e a melhoria contínua da TRANSPARÊNCIA, gastar melhor os recursos públicos, e ter melhores serviços de saúde, educação, segurança e obras.</p>

                    <p>O Portal da Transparência contém dados e informações sobre os seguintes assuntos:</p>
                    <div id="lista-portal">
                      <li>Receitas que a prefeitura lança e arrecada;</li>
                      <li>Gastos públicos de cada órgão da prefeitura;</li>
                      <li>Compras que os órgãos realizam;</li>
                      <li>Contratos assinados;</li>
                      <li>Informações da Gestão fiscal da Prefeitura;</li>
                      <li>Relatórios de auditoria e inspeção da Controladoria Interna de Governo;</li>
                      <li>Informações dos servidores públicos e remuneração;</li>
                      <li>Recursos que a União e o Estado transferem para a prefeitura;</li>
                      <li>Convênios que o município faz com entidades;</li>
                      <li>Informações de obra executadas pela Prefeitura;</li>
                      <li>Planejamento e resultados dos Poderes do Estado;</li>
                      <li>Download de todas as informações em dados abertos.</li>
                    </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

@endsection

@section('scriptsadd')
@endsection