@extends('layouts.app') 
@section('htmlheader_title', 'Prestação de Contas') 

@section('cssheader') 
@endsection 

@section('main-content')

    @guest
        <?php  
            echo "<script> window.location.href = '/login';</script>";
        ?>
    @else

    <div class='row'>
        <div class='col-md-12'>
            <div id="navegacao" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Navegação</h3>                   
                </div>
                <div class="box-body">                                                        
                    <ol class="breadcrumb">
                        <li><a href="/">Início</a></li>                                                
                        <li class="active">Prestação de Contas</li>
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Balanço Anual</h3>
                    @if(!$dadosDb6->isEmpty())
                        <a class="btn btn-primary btn-print" href="/uploadBalancoAnual" role="button">Fazer Upload</a>
                    @endif
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
                </div>

                <!-- /.box-header -->
                <div class="box-group box-body text-justify"  id="accordion">
                    <!--2013-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    2013
                                </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="box-body">
                                <ul class="links-gestao">
                                    @foreach($dadosDb as $valor)
                                        @if($valor->ano == 2013 && ($valor->periodo_ug == null || $valor->periodo_ug == 'Nenhuma'))
                                            <li style="list-style-image: url('/img/documento.png')"> 
                                                <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivoAno', ['permissao' => $valor->descricao, 'ano' => $valor->ano, 'idArquivo' => $valor->idArquivo])}}"> {{ $valor->nomeExibicao }} </a>
                                                @if(Auth::user() != null)
                                                    @if(!$dadosDb6->isEmpty())
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
                                                                        <a class="btn btn-primary" href="{{route('apagarArquivoAno', ['idArquivo' => $valor->idArquivo, 'permissao' => $valor->descricao, 'ano' => $valor->ano])}}" role="button">Sim</a>
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            </li>   
                                        @elseif($valor->ano == 2013 && $valor->periodo_ug != null)
                                            <li>
                                                <a class="acessibilidade" href="#consolidado2013" data-toggle="collapse">{{$valor->periodo_ug}}</a>
                                                <ul id="consolidado2013" class="collapse" class="links-gestao">
                                                    <li style="list-style-image: url('/img/documento.png')"> 
                                                        <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivoAnoPeriodoUG', ['permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug, 'idArquivo' => $valor->idArquivo])}}"> {{ $valor->nomeExibicao }} </a>
                                                        @if(Auth::user() != null)
                                                            @if(!$dadosDb6->isEmpty())
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
                                                                                <a class="btn btn-primary" href="{{route('apagarArquivoAnoPeriodoUG', ['idArquivo' => $valor->idArquivo, 'permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug])}}" role="button">Sim</a>
                                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif

                                                    </li>  
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--2013-->

                    <!--2014-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    2014
                                </a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="box-body">
                                <ul class="links-gestao">
                                    @foreach($dadosDb as $valor)
                                        @if($valor->ano == 2014 && ($valor->periodo_ug == null || $valor->periodo_ug == 'Nenhuma'))
                                            <li style="list-style-image: url('/img/documento.png')"> 
                                                <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivoAno', ['permissao' => $valor->descricao, 'ano' => $valor->ano, 'idArquivo' => $valor->idArquivo])}}"> {{ $valor->nomeExibicao }} </a>
                                                @if(Auth::user() != null)
                                                    @if(!$dadosDb6->isEmpty())
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
                                                                        <a class="btn btn-primary" href="{{route('apagarArquivoAno', ['idArquivo' => $valor->idArquivo, 'permissao' => $valor->descricao, 'ano' => $valor->ano])}}" role="button">Sim</a>
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif

                                            </li>   
                                        @elseif($valor->ano == 2014 && $valor->periodo_ug != null)
                                            <li>
                                                <a class="acessibilidade" href="#consolidado2014" data-toggle="collapse">{{$valor->periodo_ug}}</a>
                                                <ul id="consolidado2014" class="collapse" class="links-gestao">
                                                    <li style="list-style-image: url('/img/documento.png')"> 
                                                        <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivoAnoPeriodoUG', ['permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug, 'idArquivo' => $valor->idArquivo])}}"> {{ $valor->nomeExibicao }} </a>
                                                        @if(Auth::user() != null)
                                                            @if(!$dadosDb6->isEmpty())
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
                                                                                <a class="btn btn-primary" href="{{route('apagarArquivoAnoPeriodoUG', ['idArquivo' => $valor->idArquivo, 'permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug])}}" role="button">Sim</a>
                                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif

                                                    </li>  
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--2014-->

                    @foreach($dadosDb2 as $distinctAno)
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$distinctAno->ano}}">
                                    {{$distinctAno->ano}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$distinctAno->ano}}" class="panel-collapse collapse">
                            <div class="box-body">
                                <ul class="links-gestao">
                                    @foreach($dadosDb5 as $unidadeGestora)
                                        @if($unidadeGestora->ano == $distinctAno->ano)

                                            <li>
                                                <a class="acessibilidade" href="#{{$unidadeGestora->periodo_ug[0]}}{{$distinctAno->ano}}" data-toggle="collapse">{{$unidadeGestora->periodo_ug}}</a>
                                                <ul id="{{$unidadeGestora->periodo_ug[0]}}{{$distinctAno->ano}}" class="collapse" class="links-gestao">
                                                    @foreach($dadosDb as $valor)
                                                        @if($valor->ano == $distinctAno->ano && $valor->periodo_ug == $unidadeGestora->periodo_ug)
                                                            <li style="list-style-image: url('/img/documento.png')"> 
                                                                <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivoAnoPeriodoUG', ['permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug, 'idArquivo' => $valor->idArquivo])}}"> {{ $valor->nomeExibicao }} </a>
                                                                @if(Auth::user() != null)
                                                                    @if(!$dadosDb6->isEmpty())
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
                                                                                        <a class="btn btn-primary" href="{{route('apagarArquivoAnoPeriodoUG', ['idArquivo' => $valor->idArquivo, 'permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug])}}" role="button">Sim</a>
                                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            </li> 
                                                        @endif
                                                    @endforeach 
                                                </ul>
                                            </li>
                                    
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                

                <div class="box-header with-border with-border-top" style="padding-top: 15px;">
                    <h3 class="box-title">Royalties</h3>
                    @if(!$dadosDb7->isEmpty())
                        <a class="btn btn-primary btn-print" href="/uploadRoyalties" role="button">Fazer Upload</a>
                    @endif
                </div>
                
                <div class="box-group box-body text-justify" id="accordion2" style="padding-bottom: 20px">		
                    @foreach($dadosDb4 as $distinctAno2)		
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2{{$distinctAno2->ano}}">
                                        {{$distinctAno2->ano}}
                                    </a>
                                </h4>
                            </div>

                            <div id="collapse2{{$distinctAno2->ano}}" class="panel-collapse collapse">
                                <div class="box-body">
                                    <ul class="links-gestao">								
                                        @foreach($dadosDb3 as $valor2)
                                            @if($valor2->ano == $distinctAno2->ano)
                                                <li style="list-style-image: url('/img/documento.png')"> 
                                                    <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivoAno', ['permissao' => $valor2->descricao, 'ano' => $valor2->ano, 'idArquivo' => $valor2->idArquivo])}}"> {{ $valor2->nomeExibicao }} </a>
                                                    @if(Auth::user() != null)
                                                        @if(!$dadosDb7->isEmpty())
                                                            <a class="acessibilidade" href="#" data-toggle="modal" data-target="#modalConfirmar{{$valor2->idArquivo}}" style="float: right"> Apagar </a>
                                                            <a class="acessibilidade" href="{{route('editarArquivo', ['idArquivo' => $valor2->idArquivo])}}" style="float: right; margin-right: 15px"> Editar </a>

                                                            <!-- Modal Confirmar Exclusão -->
                                                            <div id="modalConfirmar{{$valor2->idArquivo}}" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <!-- Conteúdo do Modal -->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Confirmar Exclusão</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Deseja mesmo apagar o arquivo {{$valor2->nomeExibicao}}?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-primary" href="{{route('apagarArquivoAno', ['idArquivo' => $valor2->idArquivo, 'permissao' => $valor2->descricao, 'ano' => $valor2->ano, 'periodoug' => $valor2->periodo_ug])}}" role="button">Sim</a>
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </li> 
                                            @endif  
                                        @endforeach 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($dadosDb3->isEmpty())
                        <div class="col-md-4 alert alert-danger" style="font-size:20px">
                            Nenhum aquivo encontrado.
                        </div> 
                    @endif  
                </div>

            </div>
            <!-- /.box -->
        </div>
    </div>

    @endguest

@endsection 

@section('scriptsadd')
<!-- <script>
	$("a").click(function() {
  $("ul").removeClass('in');
});

</script> -->
@endsection