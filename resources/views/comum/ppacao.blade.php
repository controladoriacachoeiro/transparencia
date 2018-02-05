@extends('layouts.app')
@section('htmlheader_title', 'Programas, Projetos e Ações')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body text-justify">
                <h4 style="margin-bottom: 30px;">Conheça os programas, projetos e ações de cada secretaria, com suas respectivas metas e valores.</h4>                
                <a target="_blank" class="btn btn-primary" href="/download/ppacao" role="button">Exibir Demonstrativo</a>
            </div>
            <div style="height: 30px">
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