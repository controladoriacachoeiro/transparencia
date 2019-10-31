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
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'Ata da Audiência Pública LDO e LOA 2020.pdf'])}}">Ata da Audiência Pública LDO e LOA 2020</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'Projeto LDO 2020.pdf'])}}">Projeto LDO 2020</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2020 METODOLOGIA DA PREVISÃO DAS RECEITAS.pdf'])}}">Metodologia LDO 2020</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2019 - Lei 7650 -  Diario 5728.pdf'])}}">LDO 2019</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa', 'nomeArquivo' => 'Ata_Audiencia_Publica_LDO_LOA_2019.pdf'])}}">Ata da Audiência Pública LDO e LOA de 2019</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2019 METODOLOGIA DA PREVISÃO DAS RECEITAS.pdf'])}}">Metodologia LDO 2019</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'loa', 'nomeArquivo' => 'Ata_Audiencia_Publica_LDO_LOA_2018.pdf'])}}">Ata da Audiência Pública LDO e LOA de 2018</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2018.pdf'])}}">LDO 2018</a>
                </li>
                <li> 
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2018 METODOLOGIA DA PREVISÃO DAS RECEITAS.pdf'])}}">Metodologia LDO 2018</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2017.pdf'])}}">LDO 2017</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'Metodologia Ldo 2017.pdf'])}}">Metodologia LDO 2017</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2016.pdf'])}}">LDO 2016</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'Metodologia Ldo 2016.pdf'])}}">Metodologia LDO 2016</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'Lei 7228 Altera LDO 2015.pdf'])}}">Lei 7228 Altera LDO 2015</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2015.pdf'])}}">LDO 2015</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'Metodologia LDO 2015.pdf'])}}">Metodologia LDO 2015</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2014.pdf'])}}">LDO 2014</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'LDO 2013.pdf'])}}">LDO 2013</a>
                </li>
                <li>
                  <a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscal', ['tipoArquivo' => 'ldo', 'nomeArquivo' => 'Metodologia LDO 2013.pdf'])}}">Metodologia LDO 2013</a>
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