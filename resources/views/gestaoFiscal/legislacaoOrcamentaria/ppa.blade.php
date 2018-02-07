@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

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
                        <li class="active">Plano Plurianual</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">PPA - Plano Plurianual</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">
            <ul class="links-gestao">
            <li> 
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'Plano2018-2021'])}}">Plano Plurianual 2018-2021</a>
            </li>
            <li>     
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'Plano2014-2017'])}}">Plano Plurianual 2014-2017</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'Plano2010-2013'])}}">Plano Plurianual 2010-2013</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'Plano2010a2013'])}}">Plano Plurianual 2010 a 2013 - Manual de Elaboração</a>
            </li>            
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