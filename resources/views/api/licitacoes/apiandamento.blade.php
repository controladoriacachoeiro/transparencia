@extends('layouts.app')
@section('htmlheader_title', 'API Licitações em Andamento')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Licitações em Andamento'));
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
                <pre>transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/licandamento/{dataInicial}/{dataFinal}</pre>
                
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
                                    <td scope="col">data que define a partir de que dia licitações em andamento serão buscados</td>
                                    <td scope="col">date</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td scope="col">dataFinal</td>
                                    <td scope="col">define a data máxima para a busca das licitações em andamento</td>
                                    <td scope="col">date</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/licitacoescontratos/licandamento/01-07-2017/05-03-2018">transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/licandamento/01-07-2017/05-03-2018</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre> [{"DataPropostas":"2017-10-06","OrgaoLicitante":"SEMDEF - SECRETARIA MUNICIPAL DE DEFESA SOCIAL","ObjetoLicitado":"AQUISI\u00c7\u00c3O DE APARELHOS DE AR CONDICIONADO PARA ATENDER A SECRETARIA MUNICIPAL DE DEFESA SOCIAL","NumeroProcesso":"286","ModalidadeLicitatoria":"PREGAO"}]</pre>
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
                                    <td scope="col">OrgaoLicitante</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do Órgão que realiza a licitação</td>
                                </tr>
                                <tr>
                                    <td scope="col">ObjetoLicitado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do objeto licitado, de forma clara e precisa</td>
                                </tr>
                                <tr>
                                    <td scope="col">Processo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo licitatório</td>
                                </tr>
                                <tr>
                                    <td scope="col">ModalidadeLicitatoria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação da modalidade, se pregão, concorrência, tomada de preços, convite</td>
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