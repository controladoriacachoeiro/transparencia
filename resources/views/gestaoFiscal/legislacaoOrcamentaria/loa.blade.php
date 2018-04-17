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
            <ul class="links-gestao">
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2018'])}}"><font size="4">Orçamento 2018</font></a>
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