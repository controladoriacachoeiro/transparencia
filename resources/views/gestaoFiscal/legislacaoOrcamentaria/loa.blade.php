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
              <li class="active">Lei Orçamentária Anual</li>                                                                       
              </ol>        
            </div>
          </div>            
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">LOA - Lei Orçamentária Anual</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">
              <ul class="links-gestao acessibilidade">
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'QDD 2020.pdf'])}}">QDD 2020</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'LOA 2020 - Lei 7802 - Diario 5976.pdf'])}}">LOA 2020</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'ManualOrçamento_2020.pdf'])}}">Manual do Orçamento 2020</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa', 'nomeArquivo' => 'Ata da Audiência Pública LDO e LOA 2020.pdf'])}}">Ata da Audiência Pública LDO e LOA 2020</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa', 'nomeArquivo' => 'Projeto LOA 2020.pdf'])}}">Projeto LOA 2020</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' , 'nomeArquivo' => 'LOA 2019 - Lei 7651 - Diario 5730.pdf'])}}">LOA 2019</a>
                </li> 
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'ManualOrçamento_2019.pdf'])}}">Manual Técnico para Elaboração do Orçamento 2019</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'QDD 2019.pdf'])}}">QDD 2019</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'Ata_Audiencia_Publica_LDO_LOA_2019.pdf'])}}">Ata da Audiência Pública LDO e LOA de 2019</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'QDD 2018 E&L.pdf'])}}">QDD 2018</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'Ata_Audiencia_Publica_LDO_LOA_2018.pdf'])}}">Ata da Audiência Pública LDO e LOA de 2018</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'loa 2018.pdf'])}}">Orçamento 2018</a>
                </li>        
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'loa 2017.pdf'])}}">Orçamento 2017</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'loa 2016.pdf'])}}">Orçamento 2016</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'loa 2015.pdf'])}}">Orçamento 2015</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'loa 2014.pdf'])}}">Orçamento 2014</a>
                </li>
                <li>
                  <a target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa' ,'nomeArquivo' => 'loa 2013.pdf'])}}">Orçamento 2013</a>
                </li>
              </ul>
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