@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">LOA</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">
        <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'loa2017'])}}"><font size="4">Orçamento 2017</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'loa2016'])}}"> <font size="4">Orçamento 2016</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'loa2015'])}}"> <font size="4">Orçamento 2015</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'loa2014'])}}"> <font size="4">Orçamento 2014</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a href="{{route('download', ['nomeArquivo' => 'loa2013'])}}"> <font size="4">Orçamento 2013</font></a>

            
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