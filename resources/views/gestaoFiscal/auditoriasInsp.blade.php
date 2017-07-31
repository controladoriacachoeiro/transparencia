@extends('layouts.app')
@section('htmlheader_title', 'Auditorias e Inspeções')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Auditorias de 2017</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">            
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'relatAudInter01-2017'])}}"><font size="4">Relatório de auditoria interna 01-2017</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'relatAudInter02-2017'])}}"><font size="4">Relatório de auditoria interna 02-2017</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'relatAudInter03-2017'])}}"><font size="4">Relatório de auditoria interna 03-2017</font></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <!--<div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Prestação de Contas Anual (TCE-ES)</h3>
            </div>            
            <div class="box-body text-justify">
            <br>
            <br>
            </div>
          </div>
        </div>-->

      </div>

@endsection

@section('scriptsadd')
@endsection