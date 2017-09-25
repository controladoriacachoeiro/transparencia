@extends('layouts.app')
@section('htmlheader_title', 'API Arrecadada')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/receitas/arrecadadas/{dataInicial}/{dataFinal}</p>
                
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
                                    <td>data que define a partir de que dia as receitas arrecadadas serão buscados</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td>dataFinal</td>
                                    <td>define a data máxima para a busca das receitas arrecadadas</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/receitas/arrecadadas/03-07-2017/03-07-2017">transparencia.cachoeiro.es.gov.br/api/receitas/arrecadadas/03-07-2017/03-07-2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"ReceitaID":18442,"AnoExercicio":2017,"DataArrecadacao":"2017-07-03","UnidadeGestora":"SECRETARIA MUNICIPAL DA FAZENDA","CategoriaEconomica":"RECEITAS CORRENTES","Origem":"RECEITA DE SERVICOS","Especie":null,"Rubrica":null,"Alinea":"SERVICOS ADMINISTRATIVO","Subalinea":"OUTROS SERV ADMINISTRATIVOS","ValorArrecadado":158.46}}]</pre>
                </div>

                <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ano Exercício</td>
                                    <td>string</td>
                                    <td>Ano do exercício ao qual se refere o orçamento da receita</td>
                                </tr>
                                <tr>
                                    <td>Data Arrecadaão</td>
                                    <td>string</td>
                                    <td>Informar a data que a receita foi realizada</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Informar a unidade gestora responsál pela arrecadação da receita</td>
                                </tr>
                                <tr>
                                    <td>Categoria Econômica</td>
                                    <td>string</td>
                                    <td>Receitas Correntes, Receitas de Capital</td>
                                </tr>
                                <tr>
                                    <td>Origem</td>
                                    <td>string</td>
                                    <td>Receita Tributária, Receita de Contribuições, Receita Patrimonial, Receita Agropecuária, Receita Industrial, Receita de Serviços, Transferências Correntes, Outras Receitas Correntes, Operações de Crédito, Alienação de Bens, Amortização de Empréstimos, Transferências de Capital, Outras Receitas de Capital.</td>
                                </tr>
                                <tr>
                                    <td>Espécie</td>
                                    <td>string</td>
                                    <td>Impostos, Taxas, Contribuição de Melhoria, Contribuições Sociais, Contribuições de Intervenção no Domínio Econômico, Contribuição para o Custeio do Serviço de Iluminação Pública, Receitas Imobiliárias, Receitas de Valores Mobiliários, Receita de Concessões e Permissões, Compensações Financeiras, Receita da Produção Vegetal, etc.</td>
                                </tr>
                                <tr>
                                    <td>Rubrica</td>
                                    <td>string</td>
                                    <td>Impostos sobre o Comércio Exterior, Impostos sobre o Patrimônio e a Renda, Impostos sobre a Produção e a Circulação, Impostos Extraordinários, Taxas pelo Exercício do Poder de Polícia, Taxas pela Prestação de Serviços, Remuneração de Depósitos Bancários, Dividendos, Arrendamentos, Aluguéis, etc.</td>
                                </tr>
                                <tr>
                                    <td>Alínea</td>
                                    <td>string</td>
                                    <td>Imposto sobre a Circulação de Mercadoria e Serviços – ICMS, Imposto sobre a Renda e Proventos de Quaisquer Natureza, Imposto sobre a Propriedade de Veículos Automotores, Imposto sobre transmissão causa-mortis e doação.</td>
                                </tr>
                                <tr>
                                    <td>Subalínea</td>
                                    <td>string</td>
                                    <td>ICMS-Indústria, ICMS-Comércio, ICMS-Serviços de Energia Elétrica, ICMS-Serviços de Comunicação, ICMS-Importação, ICMS-Simples Nacional, ICMS-Comércio Exterior, Imposto de Renda Pessoa Física – IRPF, Imposto de Renda Pessoa Jurídica – IRPJ, IPVA, ITCD.</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Valor da receita realizada</td>
                                </tr>
                            </tbody>
                        </table>
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