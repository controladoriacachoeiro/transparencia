@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">LOA</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">
            <ul style="list-style-type:circle;line-height:2;font-size:18;">
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2018'])}}"><font size="4">Projeto LOA 2018</font></a>
            </li>        
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2017'])}}"><font size="4">Orçamento 2017</font></a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2016'])}}"> <font size="4">Orçamento 2016</font></a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2015'])}}"> <font size="4">Orçamento 2015</font></a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2014'])}}"> <font size="4">Orçamento 2014</font></a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2013'])}}"> <font size="4">Orçamento 2013</font></a>
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