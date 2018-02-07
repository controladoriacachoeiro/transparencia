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
                <p>transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/licandamento/{dataInicial}/{dataFinal}</p>
                
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
                                    <td scope="col">string</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td scope="col">dataFinal</td>
                                    <td scope="col">define a data máxima para a busca das licitações em andamento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/licitacoescontratos/licandamento/01-07-2017/09-08-2017">transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/licandamento/01-07-2017/09-08-2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre> [{"DataPropostas":"2017-07-11","OrgaoLicitante":"SEMUS - SECRETARIA MUNICIPAL DE SA\u00daDE","ObjetoLicitado":"AQUISI\u00c7\u00c3O DE MATERIAIS E APARELHOS DE EDUCA\u00c7\u00c3O E ESPORTIVOS; E APARELHOS DE FISIOTERAPIA","NumeroProcesso":"11","ModalidadeLicitatoria":"PREGAO"},{"DataPropostas":"2017-07-25","OrgaoLicitante":"SEMO - SECRETARIA MUNICIPAL DE OBRAS","ObjetoLicitado":"LOCA\u00c7\u00c3O DE PLOTTER COM INSUMOS","NumeroProcesso":"52","ModalidadeLicitatoria":"PREGAO"},{"DataPropostas":"2017-08-03","OrgaoLicitante":"SUBSECRETARIA DE SUPRIMENTOS","ObjetoLicitado":"RP HORTIFRUTIGRANJEIRO","NumeroProcesso":"16","ModalidadeLicitatoria":"PREGAO"},{"DataPropostas":"2017-08-09","OrgaoLicitante":"SUBSECRETARIA DE SUPRIMENTOS","ObjetoLicitado":"RP GENEROS ALIMENT\u00cdCIOS GERAL","NumeroProcesso":"21","ModalidadeLicitatoria":"PREGAO"}]</pre>
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
                                    <td scope="col">Órgão Licitante</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do Órgão que realiza a licitação</td>
                                </tr>
                                <tr>
                                    <td scope="col">Objeto Licitado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do objeto licitado, de forma clara e precisa</td>
                                </tr>
                                <tr>
                                    <td scope="col">Processo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo licitatório</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Licitatória</td>
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