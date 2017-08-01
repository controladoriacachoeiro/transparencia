@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">PPA</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">        
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'Plano2014-2017'])}}"><font size="4">Plano Plurianual 2014-2017</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'Plano2010-2013'])}}"> <font size="4">Plano Plurianual 2010-2013</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'Plano2010a2013'])}}"> <font size="4">Plano Plurianual 2010 a 2013 - Manual de Elaboração</font></a>
            
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