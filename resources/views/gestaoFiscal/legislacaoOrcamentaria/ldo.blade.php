@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">LDO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">            
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2018'])}}"><font size="4">MetodologiaLDO 2018</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2017'])}}"><font size="4">LDO 2017</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2017'])}}"> <font size="4">Metodologia LDO 2017</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2016'])}}"> <font size="4">LDO 2016</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2016'])}}"><font size="4">Metodologia LDO 2016</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'lei2015'])}}"> <font size="4">Lei 7228 Altera LDO 2015</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2015'])}}"> <font size="4">LDO 2015</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2015'])}}"><font size="4">Metodologia LDO 2015</font></font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2014'])}}"> <font size="4">LDO 2014</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2013'])}}"> <font size="4">LDO 2013</font></a>
            <br>
            <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
            <a target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2013'])}}"> <font size="4">Metodologia LDO 2013</font></a>
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