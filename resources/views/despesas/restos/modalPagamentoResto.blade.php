@extends('layouts.app')

@section('htmlheader_title')
    Nota de Pagamento Nº {{$pagamentoResto[0]->NotaPagamento}}/{{$pagamentoResto[0]->AnoExercicio}}
@stop

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection


@section('main-content')
    <div class='row'>
        <div class='col-md-9'>
            @include('layouts.navegacao')
        </div>
        <div class='col-md-3'>
            <div id="divPeriodo" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Período</h3>
                </div>
                <div class="box-body">                    
                    Data Inicial: {{ str_replace('-', '/', $datainicio) }} <br>
                    Data Final: {{ str_replace('-', '/', $datafim) }}                                                               
                </div>
            </div>
        </div>
    </div>

        <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Dados da Pagamento</strong></h3>
                    </div>            
                    <div class="box-body">
                        <div class="row">                    
                            <div class="col-md-3">
                                <div class='detalheslici'>
                                    <div class="detalhestitle">
                                        <h4>Órgão</h4>
                                    </div>
                                    <p class="acessibilidade">{{$pagamentoResto[0]->Orgao}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class='detalheslici'>
                                    <div class="detalhestitle">
                                        <h4>Unidade Gestora</h4>
                                    </div>
                                    <p class="acessibilidade">{{$pagamentoResto[0]->UnidadeGestora}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class='detalheslici'>
                                    <div class="detalhestitle">
                                        <h4>Processo</h4>
                                    </div>
                                    @if (($pagamentoResto[0]->Subtitulo == '') || ($pagamentoResto[0]->Subtitulo == null))
                                        <p class="acessibilidade">Cachoeiro de Itapemirim</p>
                                    @else
                                        <p class="acessibilidade"> {{$pagamentoResto[0]->Subtitulo}} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class='detalheslici'>
                                    <div class="detalhestitle">
                                        <h4>Ação</h4>
                                    </div>                            
                                    <p class="acessibilidade">{{$pagamentoResto[0]->Acao}}</p>                  
                                </div>
                            </div>
                        </div>

                        <div class="row">                    
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Subtítulo</h4>
                                        </div>
                                        @if (($pagamentoResto[0]->Subtitulo == '') || ($pagamentoResto[0]->Subtitulo == null))
                                            <p class="acessibilidade">Cachoeiro de Itapemirim</p>
                                        @else
                                            <p class="acessibilidade"> {{$pagamentoResto[0]->Subtitulo}} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Elemento da Despesa</h4>
                                        </div>
                                        <p class="acessibilidade">{{$pagamentoResto[0]->ElemDespesa}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Programa</h4>
                                        </div>
                                            <p class="acessibilidade"> {{$pagamentoResto[0]->Programa}} </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Fonte de Recursos</h4>
                                        </div>                            
                                        <p class="acessibilidade">{{$pagamentoResto[0]->FonteRecursos}}</p>                  
                                    </div>
                                </div>
                            </div>

                            <div class="row">                    
                                    <div class="col-md-3">
                                        <div class='detalheslici'>
                                            <div class="detalhestitle">
                                                <h4>Função</h4>
                                            </div>
                                                <p class="acessibilidade">{{$pagamentoResto[0]->Funcao}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class='detalheslici'>
                                            <div class="detalhestitle">
                                                <h4>Subfunção</h4>
                                            </div>
                                            <p class="acessibilidade">{{$pagamentoResto[0]->SubFuncao}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class='detalheslici'>
                                            <div class="detalhestitle">
                                                <h4>Ano Exercício</h4>
                                            </div>
                                                <p class="acessibilidade"> {{$pagamentoResto[0]->AnoExercicio}} </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class='detalheslici'>
                                            <div class="detalhestitle">
                                                <h4>Data de Pagamento</h4>
                                            </div>                            
                                            <p class="acessibilidade">{{date('d/m/Y', strtotime($pagamentoResto[0]->DataPagamento))}}</p>                  
                                        </div>
                                    </div>
                                </div>

                                <div class="row">                    
                                        <div class="col-md-3">
                                            <div class='detalheslici'>
                                                <div class="detalhestitle">
                                                    <h4>Modalidade Licitatória</h4>
                                                </div>
                                                @if (($pagamentoResto[0]->ModalidadeLicitatoria == '') || ($pagamentoResto[0]->ModalidadeLicitatoria == null))
                                                    <p class="acessibilidade">Não Aplicável</p>
                                                @else
                                                    <p class="acessibilidade"> {{$pagamentoResto[0]->ModalidadeLicitatoria}} </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class='detalheslici'>
                                                <div class="detalhestitle">
                                                    <h4>Categoria Econômica</h4>
                                                </div>
                                                <p class="acessibilidade">{{$pagamentoResto[0]->CatEconomica}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class='detalheslici'>
                                                <div class="detalhestitle">
                                                    <h4>Modalidade Aplicação</h4>
                                                </div>
                                                    <p class="acessibilidade"> {{$pagamentoResto[0]->ModalidadeAplicacao}} </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class='detalheslici'>
                                                <div class="detalhestitle">
                                                    <h4>Natureza da Despesa</h4>
                                                </div>                            
                                                <p class="acessibilidade">{{$pagamentoResto[0]->NaturezaDespesa}}</p>                  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">  
                                            <div class="col-md-3">
                                                    <div class='detalheslici'>
                                                        <div class="detalhestitle">
                                                            <h4>Ordem Bancária</h4>
                                                        </div>
    
                                                    <p class="acessibilidade">{{$pagamentoResto[0]->OrdemBancaria}}</p>
                                                    </div>
                                            </div>    
                                            <div class="col-md-3">
                                                <div class='detalheslici'>
                                                    <div class="detalhestitle">
                                                        <h4>Nota Empenho</h4>
                                                    </div>

                                                    <p class="acessibilidade"> <a href='/despesas/empenhos/nota/{{$pagamentoResto[0]->NotaEmpenho}}/{{$pagamentoResto[0]->AnoNotaEmpenho}}'>{{$pagamentoResto[0]->NotaEmpenho}}</a></p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class='detalheslici'>
                                                    <div class="detalhestitle">
                                                        <h4>Nota Liquidação</h4>
                                                    </div>

                                                    <p class="acessibilidade"> <a href='/despesas/liquidacoes/nota/{{$pagamentoResto[0]->NotaLiquidacao}}/{{$pagamentoResto[0]->AnoNotaLiquidacao}}'>{{$pagamentoResto[0]->NotaLiquidacao}}</a></p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <div class='detalheslici'>
                                                        <div class="detalhestitle">
                                                            <h4>Nota Pagamento</h4>
                                                        </div>
    
                                                    <p class="acessibilidade">{{$pagamentoResto[0]->NotaPagamento}}</p>
                                                    </div>
                                                </div>

                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class='detalheslici'>
                                                        <div class="detalhestitle">
                                                            <h4>Descrição</h4>
                                                        </div>
                                                        <p class="acessibilidade">{{$pagamentoResto[0]->ProdutoServico}}</p>
                                                    </div>
                                            </div>
                                    </div>
                    </div>
                  </div>
                </div>
            </div>


            <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong>Credor</strong></h3>
                        </div>            
                        <div class="box-body">
                            <div class="row">                    
                                <div class="col-md-6">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Nome</h4>
                                        </div>
                                        <p class="acessibilidade">{{$pagamentoResto[0]->Beneficiario}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>CPF/CNPJ</h4>
                                        </div>
                                        <!-- FUNÇÃO PARA FORMATAR O CAMPO CPF E CNPJ PARA O USUARIO -->
                                        @php
                                            if (strlen(preg_replace("/\D/", '', $pagamentoResto[0]->CPF_CNPJ)) === 11) {
                                                $pagamentoResto[0]->CPF_CNPJ = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $pagamentoResto[0]->CPF_CNPJ);
                                            } else {
                                                $pagamentoResto[0]->CPF_CNPJ = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $pagamentoResto[0]->CPF_CNPJ);
                                            }
                                        @endphp

                                        <p class="acessibilidade">{{$pagamentoResto[0]->CPF_CNPJ}}</p>
                                    </div>
                                </div>
                            </div>
    
                                    
                        </div>
                      </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-12">
                          <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><strong>Valor Pago</strong></h3>
                            </div>            
                            <div class="box-body">
                                <div class="row">                    
                                    <div class="col-md-12">
                                        <div class='detalheslici'>
                                            <p class="acessibilidade"> <strong> R$ {{number_format($pagamentoResto[0]->ValorPago,2,",",".")}}</strong> </p>
                                        </div>
                                    </div>
                                
                             </div>       
                            </div>
                          </div>
                        </div>
                    </div>


@endsection