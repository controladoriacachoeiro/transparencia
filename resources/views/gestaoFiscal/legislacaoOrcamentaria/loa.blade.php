@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

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
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'Ata-Audiencia-LDO-LOA2018'])}}">Ata da Audiência Pública LDO e LOA de 2018</a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2018'])}}">Orçamento 2018</a>
            </li>        
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2017'])}}">Orçamento 2017</a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2016'])}}">Orçamento 2016</a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2015'])}}">Orçamento 2015</a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2014'])}}">Orçamento 2014</a>
            </li>
            <li>
              <a target="_blank" href="{{route('download', ['nomeArquivo' => 'loa2013'])}}">Orçamento 2013</a>
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