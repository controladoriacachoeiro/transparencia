@extends('formFiltro')

@section('htmlheader_title')
    Relatórios da  LRF
@stop
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
                        <li class="active">RGF - Relatório de Gestão Fiscal</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">RGF - Relatório de Gestão Fiscal</h3>
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
			<div class="box-group box-body text-justify" id="accordion">
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
                                    @foreach($dadosDb3 as $quadrimestre)
                                        @if($quadrimestre->ano == $distinctAno->ano)
                                    
                                            <li>
                                                <a class="acessibilidade" href="#{{$quadrimestre->periodo_ug[0]}}quadrimestre{{$distinctAno->ano}}" data-toggle="collapse">{{$quadrimestre->periodo_ug}}</a>
                                                <ul id="{{$quadrimestre->periodo_ug[0]}}quadrimestre{{$distinctAno->ano}}" class="collapse" class="links-gestao">
                                                @foreach($dadosDb as $valor)
                                                    @if($valor->ano == $distinctAno->ano && $valor->periodo_ug == $quadrimestre->periodo_ug)
                                                        <li style="list-style-image: url('/img/documento.png')"> 
                                                            <a class="acessibilidade" target="_blank" href="{{route('MostrarArquivoAnoPeriodoUG', ['permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug, 'nomeArquivo' => $valor->nomeArquivo])}}"> {{ $valor->nomeExibicao }} </a>
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
                                                                        <a class="btn btn-primary" href="{{route('apagarArquivoAnoPeriodoUG', ['idArquivo' => $valor->idArquivo, 'permissao' => $valor->descricao, 'ano' => $valor->ano, 'periodoug' => $valor->periodo_ug])}}" role="button">Sim</a>
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>

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
                
                @if($dadosDb->isEmpty())
                <div class="col-md-4 alert alert-danger" style="font-size:20px">
                    Nenhum aquivo encontrado.
                </div> 
                @endif   
			</div>    
		</div>
		<!-- /.box -->
	</div>
</div>

@endsection

@section('scriptsadd')
    <!-- <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script>  
    <script>
        // LoadPage
        $(function () {
            $(document).ready(function() {
                var sAno = document.getElementById("selectAno");
                var select = document.getElementById("selectQuadrimestre");
                var optionArrayAno = [];
                var optionArrayPeriodo = [];
               
                $.each(arrayGenerico('anos'), function (key, value) {
                    optionArrayAno.push(value+'|'+value);
                });

                //Incluir o ano de 2012 no array
                optionArrayAno.push('2012|2012');
        
                $.each(montarObjDropdown(optionArrayAno), function (key, value) {
                    sAno.options.add(value);
                });

                optionArrayPeriodo = optionArray('quadrimestre');

                $.each(montarObjDropdown(optionArrayPeriodo), function (key, value) {
                    select.options.add(value);
                });
            });
        });

        function selecAnoDropdown() {
            var selectAno = parseInt(document.getElementById("selectAno").value);
            
            var select = "";
            var arrayPeriodo = "";
            select = document.getElementById("selectQuadrimestre");
            arrayPeriodo = optionArray('quadrimestre', selectAno);
            select.innerHTML = "";
            $.each(montarObjDropdown(arrayPeriodo), function (key, value) {
                select.options.add(value);
            });
        };
    </script> -->
@endsection