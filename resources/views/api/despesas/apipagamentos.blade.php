@extends('layouts.app')
@section('htmlheader_title', 'API Pagamentos')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/pagamentos/{dataInicial}/{dataFinal}</p>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Parâmetros</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Formato</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>dataInicial</td>
                                    <td>data que define a partir de que dia os pagamentos serão buscados</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td>dataFinal</td>
                                    <td>data que define a data máxima para a busca do pagamento</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/despesas/pagamentos/03-01-2017/03-01-2017">transparencia.cachoeiro.es.gov.br/api/despesas/pagamentos/03-01-2017/01-01-2013</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"PagamentoID":78991,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DA FAZENDA","Processo":"103","ProdutoServico":"REFERENTE A LIQUIDA\u00c7\u00c3O 08000001\/2017","Beneficiario":"CAIXA ECONOMICA FEDERAL","CPF_CNPJ":"00360305000104","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS DE CAPITAL","NaturezaDespesa":"AMORTIZACAO DA DIVIDA","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"PRINCIPAL DA D\u00cdVIDA CONTRATUAL RESGATADO","Programa":"OPERA\u00c7\u00d5ES ESPECIAIS","Acao":"PAGAMENTO DE D\u00cdVIDA CONTRATUAL","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ENCARGOS ESPECIAIS","SubFuncao":"SERVI\u00c7O DA D\u00cdVIDA INTERNA","NotaEmpenho":"08000001","NotaLiquidacao":"08000001","NotaPagamento":"08000066","OrdemBancaria":null,"DataPagamento":"2017-01-03","ValorPago":5174.91},{"PagamentoID":78997,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DA FAZENDA","Processo":"103","ProdutoServico":"REFERENTE A LIQUIDA\u00c7\u00c3O 08000002\/2017","Beneficiario":"CAIXA ECONOMICA FEDERAL","CPF_CNPJ":"00360305000104","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"JUROS E ENCARGOS DA DIVIDA","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"JUROS SOBRE A DIVIDA POR CONTRATO","Programa":"OPERA\u00c7\u00d5ES ESPECIAIS","Acao":"PAGAMENTO DE D\u00cdVIDA CONTRATUAL","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ENCARGOS ESPECIAIS","SubFuncao":"SERVI\u00c7O DA D\u00cdVIDA INTERNA","NotaEmpenho":"08000002","NotaLiquidacao":"08000002","NotaPagamento":"08000067","OrdemBancaria":null,"DataPagamento":"2017-01-03","ValorPago":13210.23}]</pre>
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