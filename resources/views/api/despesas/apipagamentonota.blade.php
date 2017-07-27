@extends('layouts.app')
@section('htmlheader_title', 'API Nota Pagamento')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/notapagamentos/{numeronota}/{ano}'</p>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Parâmetros</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>numeronota</td>
                                    <td>Número da nota</td>
                                    <td>varchar(20)</td>
                                </tr>
                                <tr>
                                    <td>ano</td>
                                    <td>Ano de exercício da nota</td>
                                    <td>varchar(4)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo 1</h3>
                <p><a href="/api/despesas/notapagamentos/18000003/2017">transparencia.cachoeiro.es.gov.br/api/despesas/notapagamentos/18000003/2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"PagamentoID":81445,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":"9999","ProdutoServico":"VENCIMENTOS FUNCION\u00c1RIOS M\u00caS 01\/2017","Beneficiario":"FOLHA DE PAGAMENTO GRUPO 1 PROPRIO","CPF_CNPJ":"27165588000190","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"PESSOAL E ENCARGOS SOCIAIS","ModalidadeAplicacao":"APLICACAO DIRETA DECORRENTE DE OPERENTRE ORGAO, FUNDOS E ENTIDADES INTORCAMENTO FISCAL E SEGURIDADE","ElemDespesa":"OBRIGACOES PATRONAIS","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O DE PESSOAS E CONTRATOS","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000024","NotaLiquidacao":"18000012","NotaPagamento":"18000003","OrdemBancaria":null,"DataPagamento":"2017-01-30","ValorPago":215.58}]</pre>
                </div>
                <h3>Exemplo 2</h3>
                <p><a href="/api/despesas/notapagamentos/18000003/2016">transparencia.cachoeiro.es.gov.br/api/despesas/notapagamentos/18000003/2016</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"PagamentoID":54727,"AnoExercicio":2016,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":"9999","ProdutoServico":"VENCIMENTOS FUNCION\u00c1RIOS M\u00caS 01\/2016","Beneficiario":"FOLHA DE PAGAMENTO GRUPO 1 PROPRIO","CPF_CNPJ":"27165588000190","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"PESSOAL E ENCARGOS SOCIAIS","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"VENCIMENTOS E VANTAGENS FIXAS - PESSOAL CIVIL","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O DE PESSOAS E CONTRATOS","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000020","NotaLiquidacao":"18000009","NotaPagamento":"18000003","OrdemBancaria":null,"DataPagamento":"2016-02-04","ValorPago":704}]</pre>
                </div>
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
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->    
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
@endsection