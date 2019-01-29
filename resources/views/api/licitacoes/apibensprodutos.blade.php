@extends('layouts.app')
@section('htmlheader_title', 'API Bens e Produtos Adquiridos')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Bens e Produtos Adquiridos'));
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
                <pre class="acessibilidade">transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/bensadquiridos/{dataInicial}/{dataFinal}</pre>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela1" class="table table-bordered table-striped" summary="Tabela com os parâmetros, descrição, tipo e formato da url da api">
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
                                    <td scope="col">data que define a partir de que dia os bens e produtos adquiridos serão buscados</td>
                                    <td scope="col">date</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td scope="col">dataFinal</td>
                                    <td scope="col">define a data máxima para a busca dos bens e produtos adquiridos</td>
                                    <td scope="col">date</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/licitacoescontratos/bensadquiridos/20-07-2017/05-03-2018">transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/bensadquiridos/20-07-2017/05-03-2018</a></p>
                <h4>Retorno<h4>
                <div class="">
                <pre class="acessibilidade">[{"DataAquisicao":"2017-12-31","OrgaoAdquirente":"SEMDES - SECR. MUNICIPAL DE DESENVOLVIMENTO SOCIAL","IdentificacaoProduto":"BISCOITO, TIPO CREAM CRACKER, COMPOSIÇÃO BÁSICA: FARINHA DE TRIGO, GORDURA VEGETAL HIDROGENADA, AÇÚC","NomeFornecedor":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","CNPJFornecedor":"27.165.588\/0001-90","PrecoUnitario":2.3,"UnidadeMedida":"PACOTE","QuantidadeAdquirida":207}]</pre>
                </div>

                <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição do retorno da api">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">DataAquisicao</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data em que o bem/produto foi entregue</td>
                                </tr>
                                <tr>
                                    <td scope="col">OrgaoAdquirente</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão que adquiriu o bem/produto</td>
                                </tr>
                                <tr>
                                    <td scope="col">IdentificacaoProduto</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome do bem ou produto que foi adquirido</td>
                                </tr>
                                <tr>
                                    <td scope="col">NomeFornecedor</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Razão social ou nome fantasia do fornecedor</td>
                                </tr>
                                <tr>
                                    <td scope="col">CNPJFornecedor</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CNPJ do fornecedor que vendeu o produto</td>
                                </tr>
                                <tr>
                                    <td scope="col">PrecoUnitario</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Preço de cada item</td>
                                </tr>
                                <tr>
                                    <td scope="col">UnidadeMedida</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Unidade de Medida do bem/produto</td>
                                </tr>
                                <tr>
                                    <td scope="col">QuantidadeAdquirida</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Quantidade de cada item entregue</td>
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