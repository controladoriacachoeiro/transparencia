@extends('layouts.app')
@section('htmlheader_title', 'API Nota Empenho')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/notaempenho/{numeronota}/{nota}'</p>
                
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
                <p><a href="/api/despesas/notaempenho/18000003/2017">transparencia.cachoeiro.es.gov.br/api/despesas/notaempenho/18000003/2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"EmprenhoID":58704,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":null,"ProdutoServico":"DESPESA COM ENERGIA EL\u00c9TRICA NO EXERC\u00cdCIO DE 2017 - - prot: 01 - 118\/2017","Beneficiario":"ESCELSA S\/A","CPF_CNPJ":"28152650000171","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"OUTROS SERV TERC - PESSOA JURIDICA","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O ADMINISTRATIVA","Subtitulo":null,"FonteRecursos":"COSIP","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000003","DataEmpenho":"2017-01-02","ValorEmpenho":83000}]</pre>
                </div>
                <h3>Exemplo 2</h3>
                <p><a href="/api/despesas/notaempenho/18000003/2016">transparencia.cachoeiro.es.gov.br/api/despesas/notaempenho/18000003/2016</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"EmprenhoID":36895,"AnoExercicio":2016,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":null,"ProdutoServico":"DESPESA COM RECOLHIMENTO DE 1% DO PIS\/PASEP NO EXERCICIO DE 2016 - PROT.43360\/2015","Beneficiario":"RECEITA FEDERAL","CPF_CNPJ":"00394460011348","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"OBRIGACOES TRIB E CONTRIBUTIVAS","Programa":"OPERA\u00c7\u00d5ES ESPECIAIS","Acao":"PAGAMENTO DE OBRIGA\u00c7\u00d5ES CONTRIBUTIVAS","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ENCARGOS ESPECIAIS","SubFuncao":"OUTROS ENCARGOS ESPECIAIS","NotaEmpenho":"18000003","DataEmpenho":"2016-01-04","ValorEmpenho":3000000}]</pre>
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