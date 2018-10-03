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
                        <li class="active">Lei de Diretrizes Orçamentárias</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">LDO - Lei de Diretrizes Orçamentárias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">  

            <!-- Sucesso -->
            @if(session()->has('sucesso'))
                <br>
                <div class="col-md-12 alert alert-success" style="font-size:20px">
                    {{ session()->get('sucesso') }}
                </div>
            @endif
            <!--Fim sucesso-->

            <!-- Erro -->
            @if(session()->has('message'))
                <br>
                <div class="col-md-12 alert alert-danger" style="font-size:20px">
                    {{ session()->get('message') }}
                </div>
            @endif
            <!--Fim erro-->

            <ul class="links-gestao">
              @foreach($dadosDb as $valor)
                <li style="list-style-image: url('/img/documento.png')"> 
                  <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivo', ['permissao' => $valor->descricao, 'idArquivo' => $valor->idArquivo])}}"> {{ $valor->nomeExibicao }} </a>
                </li>   
              @endforeach   
            </ul>

              @if($dadosDb->isEmpty())
                <div class="col-md-4 alert alert-danger" style="font-size:20px">
                    Nenhum aquivo encontrado.
                </div> 
              @endif  
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