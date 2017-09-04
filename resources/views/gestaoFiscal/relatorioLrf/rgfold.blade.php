@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RGF</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">            
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'pessoal'])}}"><font size="4">Demonstrativo da Despesa total com Pessoal</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'liquida'])}}"> <font size="4">Demonstrativo da Divida Consolidada Líquida</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'garantias'])}}"> <font size="4">Demonstrativo das Garantias e Contragarantias de Valores</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'credito'])}}"><font size="4">Demonstrativo das Operações de Crédito</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'caixa'])}}"> <font size="4">Demonstrativo de Disponibilidade de Caixa</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'quadrimestre'])}}"> <font size="4">Demonstrativo do Último Quadrimestre</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'limites'])}}"><font size="4">Demonstrativo dos Limites</font></font></a>
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