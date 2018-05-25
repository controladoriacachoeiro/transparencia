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
                  <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivo', ['permissao' => $valor->descricao, 'nomeArquivo' => $valor->nomeArquivo])}}"> {{ $valor->nomeExibicao }} </a>
                  @if(Auth::user() != null)
                      <a class="acessibilidade" href="#" data-toggle="modal" data-target="#modalConfirmar{{$valor->idArquivo}}" style="float: right"> Apagar </a>
                      <a class="acessibilidade" href="{{route('editarArquivo', ['idArquivo' => $valor->idArquivo])}}" style="float: right; margin-right: 15px"> Editar </a>

                       <!-- Modal Confirmar Exclusão -->
                      <div id="modalConfirmar{{$valor->idArquivo}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Conteúdo do Modal -->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Confirmar Exclusão</h4>
                            </div>
                            <div class="modal-body">
                              <p>Deseja mesmo apagar o arquivo {{$valor->nomeExibicao}}?</p>
                            </div>
                            <div class="modal-footer">
                              <a class="btn btn-primary" href="{{route('apagarArquivo', ['idArquivo' => $valor->idArquivo, 'permissao' => $valor->descricao])}}" role="button">Sim</a>
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    @endif
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