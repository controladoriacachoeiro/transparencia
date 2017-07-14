@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RREO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">            
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'balancoOrcamentario'])}}"><font size="4">Balanço Orçamentário</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoCorrenteLiquida'])}}"> <font size="4">Demonstrativo da Apuração da Receita Corrente Líquida</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoEnsino'])}}"> <font size="4">Demonstrativo da Despesa com Ensino</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoSaude'])}}"><font size="4">Demostrativo da Despesa com Saúde</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoFuncao'])}}"> <font size="4">Demonstrativo da Despesa por Função/Subfunção</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoPrevSocial'])}}"> <font size="4">Demonstrativo da Projeção Atuarial do Regime Próprio da Prev. Social</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoAtivos'])}}"><font size="4">Demostrativo da Receita Alienação Ativos</font></font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoPrevidenciaria'])}}"><font size="4">Demostrativo das Receitas e Despesas Previdenciárias</font></font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoNominal'])}}"><font size="4">Demostrativo do Resultado Nominal</font></font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoPrimario'])}}"><font size="4">Demostrativo do Resultado Primário</font></font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoRestoPagar'])}}"><font size="4">Demostrativo dos Restos a Pagar</font></font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'demostrativoSimplificado'])}}"><font size="4">Demostrativo Simplificado</font></font></a>
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