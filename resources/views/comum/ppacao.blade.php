@extends('layouts.app')
@section('htmlheader_title', 'Programas, Projetos e Ações')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-body text-justify">
                <h4 style="margin-bottom: 30px;">Conheça os programas, projetos e ações de cada secretaria, com suas respectivas metas e valores.</h4>
                <!--<a  href="/download/ppacao" style="16px"><i class="fa fa-download" aria-hidden="true"></i> Clique aqui para baixar o demonstrativo.</a>-->                
                <a target="_blank" class="btn btn-primary" href="/download/ppacao" role="button">Exibir Demonstrativo</a>
            </div>
            <div style="height: 450px">
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