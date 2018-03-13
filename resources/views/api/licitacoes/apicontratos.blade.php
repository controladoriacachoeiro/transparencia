@extends('layouts.app')
@section('htmlheader_title', 'API Contratos')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Contratos'));
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
                <pre>transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/contratos</pre>
                

                <h3>Exemplo</h3>
                <p><a href="/api/licitacoescontratos/contratos">transparencia.cachoeiro.es.gov.br/api/api/licitacoescontratos/contratos</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"DataInicial":"2017-12-18","DataFinal":"2018-12-17","NomeContratado":"SUPRISERVICE INFORMATICA LTDA","CNPJContratado":"03607073000134","OrgaoContratante":"SEMFA - SECRETARIA MUNICIPAL DE FAZENDA","Objeto":"AQUISI\u00c7\u00c3O DE COMPUTADORES E ACESS\u00d3RIOS DE INFORM\u00c1TICA","ProcessoLicitatorio":null,"ValorContratado":91231.75}]</pre>
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
                                    <td scope="col">OrgaoContratante</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão cujo titular assina o contrato</td>
                                </tr>
                                <tr>
                                    <td scope="col">CNPJContratado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CNPJ do fornecedor contratado/td>
                                </tr>
                                <tr>
                                    <td scope="col">NomeContratado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome do Contratado</td>
                                </tr>
                                <tr>
                                    <td scope="col">DataInicial</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data de Assinatura, Publicação ou Início de Vigência do Contrato</td>
                                </tr>
                                <tr>
                                    <td scope="col">DataFinal</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data do fim do contrato</td>
                                </tr>                      
                                <tr>
                                    <td scope="col">ObjetoContrato</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Descrição do objeto do contrato</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorContrato</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor global do contrato</td>
                                </tr>
                                <tr>
                                    <td scope="col">ProcessoLicitatorio</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informar o número do processo ou do edital de licitação que originou o contrato, ou informação de su dispensa, caso ocorra</td>
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