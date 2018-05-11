@extends('layouts.app')
@section('htmlheader_title', __("O Portal"))

@section('cssheader')
@endsection

@section('main-content')
    <div class='row'>
        <div class='col-md-12'>
            <div id="navegacao" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Navegação")}}</h3>                   
                </div>
                <div class="box-body">                                                        
                    <ol class="breadcrumb">
                        <li><a href="/">{{__('Início')}}</a></li>                                                
                        <li class="active">{{__("O Portal")}}</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{__("O que tem no Portal?")}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
              <div class="col-lg-10">
                <div class="box-body text-justify">
                    <p>{{__("O Portal da Transparência é uma iniciativa da Prefeitura de Cachoeiro de Itapemirim para que os cachoeirenses vejam e compreendam as informações da prefeitura, possibilitando que possam exercer o controle social, ou seja, questionar e avaliar as receitas, gastos, licitações e contratos.")}}</p>

                    <p>{{__("Assim, conseguiremos com o APOIO DO CIDADÃO e a melhoria contínua da TRANSPARÊNCIA, gastar melhor os recursos públicos, e ter melhores serviços de saúde, educação, segurança e obras.")}}</p>

                    <p>{{__("O Portal da Transparência contém dados e informações sobre os seguintes assuntos:")}}</p>
                    <div id="lista-portal">
                      <li>{{__("Receitas que a prefeitura lança e arrecada;")}}</li>
                      <li>{{__("Gastos públicos de cada órgão da prefeitura;")}}</li>
                      <li>{{__("Compras que os órgãos realizam;")}}</li>
                      <li>{{__("Contratos assinados;")}}</li>
                      <li>{{__("Informações da Gestão fiscal da Prefeitura;")}}</li>
                      <li>{{__("Relatórios de auditoria e inspeção da Controladoria Interna de Governo;")}}</li>
                      <li>{{__("Informações dos servidores públicos e remuneração;")}}</li>
                      <li>{{__("Recursos que a União e o Estado transferem para a prefeitura;")}}</li>
                      <li>{{__("Convênios que o município faz com entidades;")}}</li>
                      <li>{{__("Informações de obra executadas pela Prefeitura;")}}</li>
                      <li>{{__("Planejamento e resultados dos Poderes do Estado;")}}</li>
                      <li>{{__("Download de todas as informações em dados abertos.")}}</li>
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