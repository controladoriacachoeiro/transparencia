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
                        <li class="active">Lei de Diretrizes Orçamentárias</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">LDO - Lei de Diretrizes Orçamentárias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">  
            <ul class="links-gestao">
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'projldo2019'])}}">Projeto LDO 2019</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metldo2019'])}}">Metodologia LDO 2019</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'Ata-Audiencia-LDO-LOA2018'])}}">Ata da Audiência Pública LDO e LOA de 2018</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2018'])}}">LDO 2018</a>
            </li>
            <li> 
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metldo2018'])}}">Metodologia LDO 2018</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2017'])}}">LDO 2017</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2017'])}}">Metodologia LDO 2017</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2016'])}}">LDO 2016</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2016'])}}">Metodologia LDO 2016</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'lei2015'])}}">Lei 7228 Altera LDO 2015</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2015'])}}">LDO 2015</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2015'])}}">Metodologia LDO 2015</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2014'])}}">LDO 2014</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2013'])}}">LDO 2013</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2013'])}}">Metodologia LDO 2013</a>
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