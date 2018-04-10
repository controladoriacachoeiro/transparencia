@extends('layouts.app')
@section('htmlheader_title', 'API Licitações')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Licitações'));
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
                <pre>transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/licitacoes/{status}</pre>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela1" class="table table-bordered table-striped" summary="Tabela com os parâmetros, descrição, tipo e formato da url da api">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Parâmetros</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">status</td>
                                    <td scope="col">Status da Licitação</td>
                                    <td scope="col">string</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/licitacoescontratos/licitacoes/Concluída">transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/licitacoes/Concluída</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre> [{"DataPropostas":"2018-04-04","ModalidadeLicitatoria":"Pregão Presencial","NumeroEdital":6,"Status":"Concluída","NumeroProcesso":"01-7685","OrgaoLicitante":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","ObjetoLicitado":"CONTRATAÇÃO DE EMPRESA ESPECIALIZADA EM PRESTAÇÃO DE SERVIÇO ELÉTRICO, INCLUINDO LOCAÇÃO E INSTALAÇÃO DE ILUMINAÇÃO PARA A EXPOSIÇÃO AGROPECUÁRIA 2018"}]</pre>
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
                                    <td scope="col">DataPropostas</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Indica o dia da Proposta</td>
                                </tr>
                                <tr>
                                    <td scope="col">ModalidadeLicitatoria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação da modalidade: se pregão, concorrência, tomada de preços ou convite</td>
                                </tr>  
                                <tr>
                                    <td scope="col">NumeroEdital</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Indica o número do Edital ao qual essa licitação está vinculada</td>
                                </tr>  
                                <tr>
                                    <td scope="col">NumeroProcesso</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indica o número do Processo ao qual essa licitação está vinculada</td>
                                </tr> 
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