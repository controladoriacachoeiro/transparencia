@extends('layouts.app')
@section('htmlheader_title', 'Concursos Públicos')

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
                        <li class="active">Concursos Públicos</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">            
            <!-- /.box-header -->
            <div class="box-body text-justify">            
              <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
              <a target="_blank" href="http://www.cachoeiro.es.gov.br/site1.php?pag_site=CIDADE&subPagina=CONCURSO&id1=PROCESSO%20SELETIVO%20SIMPLIFICADO%20-%202017" target="_blank">SEMUS - PROCESSO SELETIVO SIMPLIFICADO - 2017</a>
              <br>
              <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
              <a target="_blank" href="http://www.cachoeiro.es.gov.br/site1.php?pag_site=CIDADE&subPagina=CONCURSO&id1=PROCESSO%20SELETIVO%20SIMPLIFICADO%20-%202016" target="_blank">SEME - PROCESSO SELETIVO SIMPLIFICADO - 2016</a>
              <br>
              <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
              <a target="_blank" href="http://www.cachoeiro.es.gov.br/site.php?nomePagina=CONC17EDU" target="_blank"> Concurso Público 001/2016</a>
              <br>
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