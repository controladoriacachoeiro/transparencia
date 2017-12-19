@extends('layouts.app')
@section('htmlheader_title', 'API Lançada')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/receitas/lancamentos/{dataInicial}/{dataFinal}</p>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Parâmetros</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                    <th scope="col" style='vertical-align:middle'>Formato</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">dataInicial</td>
                                    <td scope="col">data que define a partir de que dia as receitas arrecadadas serão buscados</td>
                                    <td scope="col">string</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td scope="col">dataFinal</td>
                                    <td scope="col">define a data máxima para a busca das receitas arrecadadas</td>
                                    <td scope="col">string</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/receitas/lancamentos/03-07-2017/03-07-2017">transparencia.cachoeiro.es.gov.br/api/receitas/lancamentos/03-07-2017/03-07-2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"IssID":2293760,"DataNFSe":"2017-07-03","CNAEContribuinte":null,"CNAETomador":null,"CodigoServico":401,"DescricaoServico":"MEDICINA E BIOMEDICINA","ValorServico":200,"Quantidade":1,"Desconto":0,"Deducao":0,"BaseCalculo":200,"Aliquota":5,"ValorISS":10,"ValorNota":200,"Retencoes":null,"CategoriaEconomica":"RECEITAS CORRENTES","Origem":"RECEITAS TRIBUTARIAS","Especie":"RECEITAS TRIBUTARIAS - IMPOSTOS","Rubrica":"IMPOSTO S\/ A PROD. E A CIRCULA\u00c7\u00c3O","Alinea":"IMP. S\/ SERV. QUALQUER NATUREZA","Subalinea":"IMPOSTO SOBRE SERVI\u00c7OS DE QUALQUER NATUREZA","UnidadeGestora":"Prefeitura Municipal de Cachoeiro de Itapemirim"}]</pre>
                </div>

                <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">Ano Exercício</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da receita</td>
                                </tr>
                                <tr>
                                    <td scope="col">Data Arrecadaão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informar a data que a receita foi realizada</td>
                                </tr>
                                <tr>
                                    <td scope="col">Órgão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informar a unidade gestora responsál pela arrecadação da receita</td>
                                </tr>
                                <tr>
                                    <td scope="col">Categoria Econômica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Receitas Correntes, Receitas de Capital</td>
                                </tr>
                                <tr>
                                    <td scope="col">Origem</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Receita Tributária, Receita de Contribuições, Receita Patrimonial, Receita Agropecuária, Receita Industrial, Receita de Serviços, Transferências Correntes, Outras Receitas Correntes, Operações de Crédito, Alienação de Bens, Amortização de Empréstimos, Transferências de Capital, Outras Receitas de Capital.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Espécie</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Impostos, Taxas, Contribuição de Melhoria, Contribuições Sociais, Contribuições de Intervenção no Domínio Econômico, Contribuição para o Custeio do Serviço de Iluminação Pública, Receitas Imobiliárias, Receitas de Valores Mobiliários, Receita de Concessões e Permissões, Compensações Financeiras, Receita da Produção Vegetal, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Rubrica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Impostos sobre o Comércio Exterior, Impostos sobre o Patrimônio e a Renda, Impostos sobre a Produção e a Circulação, Impostos Extraordinários, Taxas pelo Exercício do Poder de Polícia, Taxas pela Prestação de Serviços, Remuneração de Depósitos Bancários, Dividendos, Arrendamentos, Aluguéis, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alínea</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Imposto sobre a Circulação de Mercadoria e Serviços – ICMS, Imposto sobre a Renda e Proventos de Quaisquer Natureza, Imposto sobre a Propriedade de Veículos Automotores, Imposto sobre transmissão causa-mortis e doação.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subalínea</td>
                                    <td scope="col">string</td>
                                    <td scope="col">ICMS-Indústria, ICMS-Comércio, ICMS-Serviços de Energia Elétrica, ICMS-Serviços de Comunicação, ICMS-Importação, ICMS-Simples Nacional, ICMS-Comércio Exterior, Imposto de Renda Pessoa Física – IRPF, Imposto de Renda Pessoa Jurídica – IRPJ, IPVA, ITCD.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Valor</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Valor da receita realizada</td>
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