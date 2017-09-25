@extends('layouts.app')
@section('htmlheader_title', 'Prestação de Contas')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Balanço Anual</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'balancoAnual2013'])}}"><font size="4">2013</font></a>
            <br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Prestação de Contas Anual (TCE-ES)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">
            <br>
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