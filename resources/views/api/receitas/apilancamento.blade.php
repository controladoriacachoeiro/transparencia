@extends('layouts.app')
@section('htmlheader_title', 'API Lançada')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Lançada'));
    ?>

    <div class='row'>
        <div class='col-md-12'>
            @include('layouts.navegacao')
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <pre class="acessibilidade">transparencia.cachoeiro.es.gov.br/api/receitas/lancamentos/{dataInicial}/{dataFinal}</pre>
                
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
                                    <td scope="col">date</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td scope="col">dataFinal</td>
                                    <td scope="col">define a data máxima para a busca das receitas arrecadadas</td>
                                    <td scope="col">date</td>
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
                    <pre class="acessibilidade">[{"DataNFSe":"2017-07-03","UnidadeGestora":"Prefeitura Municipal de Cachoeiro de Itapemirim","CategoriaEconomica":"RECEITAS CORRENTES","Origem":"RECEITAS TRIBUTARIAS","Especie":"RECEITAS TRIBUTARIAS - IMPOSTOS","Rubrica":"IMPOSTO S\/ A PROD. E A CIRCULAÇÃO","Alinea":"IMP. S\/ SERV. QUALQUER NATUREZA","Subalinea":"IMPOSTO SOBRE SERVIÇOS DE QUALQUER NATUREZA","ValorISS":66.54,"CodigoServico":1712,"DescricaoServico":"ADMINISTRAÇÃO EM GERAL, INCLUSIVE DE BENS E NEGÓCIOS DE TERCEIROS"}]</pre>
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
                                    <td scope="col">DataNFSe</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Informar a data que a receita foi realizada</td>
                                </tr>
                                <tr>
                                    <td scope="col">UnidadeGestora</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informar a unidade gestora responsável pela arrecadação da receita</td>
                                </tr>
                                <tr>
                                    <td scope="col">CategoriaEconomica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Receitas Correntes, Receitas de Capital</td>
                                </tr>
                                <tr>
                                    <td scope="col">Origem</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Receita Tributária, Receita de Contribuições, Receita Patrimonial, Receita Agropecuária, Receita Industrial, Receita de Serviços, Transferências Correntes, Outras Receitas Correntes, Operações de Crédito, Alienação de Bens, Amortização de Empréstimos, Transferências de Capital, Outras Receitas de Capital.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Especie</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Impostos, Taxas, Contribuição de Melhoria, Contribuições Sociais, Contribuições de Intervenção no Domínio Econômico, Contribuição para o Custeio do Serviço de Iluminação Pública, Receitas Imobiliárias, Receitas de Valores Mobiliários, Receita de Concessões e Permissões, Compensações Financeiras, Receita da Produção Vegetal, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Rubrica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Impostos sobre o Comércio Exterior, Impostos sobre o Patrimônio e a Renda, Impostos sobre a Produção e a Circulação, Impostos Extraordinários, Taxas pelo Exercício do Poder de Polícia, Taxas pela Prestação de Serviços, Remuneração de Depósitos Bancários, Dividendos, Arrendamentos, Aluguéis, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alinea</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Imposto sobre a Circulação de Mercadoria e Serviços – ICMS, Imposto sobre a Renda e Proventos de Quaisquer Natureza, Imposto sobre a Propriedade de Veículos Automotores, Imposto sobre transmissão causa-mortis e doação.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subalinea</td>
                                    <td scope="col">string</td>
                                    <td scope="col">ICMS-Indústria, ICMS-Comércio, ICMS-Serviços de Energia Elétrica, ICMS-Serviços de Comunicação, ICMS-Importação, ICMS-Simples Nacional, ICMS-Comércio Exterior, Imposto de Renda Pessoa Física – IRPF, Imposto de Renda Pessoa Jurídica – IRPJ, IPVA, ITCD.</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorISS</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor da receita realizada</td>
                                </tr>
                                <tr>
                                    <td scope="col">CodigoServico</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Código referente ao serviço realizado.</td>
                                </tr>
                                <tr>
                                    <td scope="col">DescricaoServico</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Descrição do serviço realizado.</td>
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