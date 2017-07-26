@extends('layouts.app')
@section('htmlheader_title', 'API Nota Liquidação')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/{numeronota}/{ano}'</p>
                
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
                <p><a href="/api/despesas/notaliquidacao/18000003/2017">transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/18000003/2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"LiquidacaoID":89349,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":"207","ProdutoServico":"REFERENTE AO EMPENHO 18000008\/2017","Beneficiario":"IPACI-INST.PREV.AS.SERV.M.CAH.ITAP.","CPF_CNPJ":"02548293000171","ModalidadeLicitatoria":"APLICACOES DIRETAS","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"PESSOAL E ENCARGOS SOCIAIS","ModalidadeAplicacao":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","ElemDespesa":"VENCIMENTOS E VANTAGENS FIXAS - PESSOAL CIVIL","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O DE PESSOAS E CONTRATOS","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000008","NotaLiquidacao":"18000003","DataLiquidacao":"2017-01-02","ValorLiquidado":200}]</pre>
                </div>
                <h3>Exemplo 2</h3>
                <p><a href="/api/despesas/notaliquidacao/18000003/2016">transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/18000003/2016</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"LiquidacaoID":55219,"AnoExercicio":2016,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":"43883","ProdutoServico":"REFERENTE AO EMPENHO 18000007\/2016 - PROT: 01 - 42788\/2015 - INST: 1599743 - VENC: 04\/01\/2016","Beneficiario":"ESCELSA S\/A","CPF_CNPJ":"28152650000171","ModalidadeLicitatoria":"APLICACOES DIRETAS","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","ElemDespesa":"OUTROS SERV TERC - PESSOA JURIDICA","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O ADMINISTRATIVA","Subtitulo":null,"FonteRecursos":"COSIP","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000007","NotaLiquidacao":"18000003","DataLiquidacao":"2016-01-11","ValorLiquidado":28.74}]</pre>
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