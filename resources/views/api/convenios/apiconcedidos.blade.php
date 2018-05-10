@extends('layouts.app')
@section('htmlheader_title', 'API Recursos Concedidos')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Recursos Concedidos'));
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
                <p>transparencia.cachoeiro.es.gov.br/api/convenios/concedidos</p>
            
                <h3>Exemplo</h3>
                <p><a href="/api/convenios/concedidos">transparencia.cachoeiro.es.gov.br/api/convenios/concedidos</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"OrgaoConcedente":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","CNPJBeneficiario":"27165588000190","NomeBeneficiario":"LIGA URBARA DE STREETBALL - LUSB","NumeroConvenio":"000010","AnoConvenio":"2018","VigenciaInicial":"2018-05-07","VigenciaFinal":"2018-06-05","Objeto":" O presente termo de Colaboração, decorrente de chamamento público nº 001\/2018, tem por objeto a concessão de apoio da Administração Pública Municipal ao projeto \"III Copa LUSB de Basquete, a ser realizado no Município nos dias 19 e 20 de maio de 2018, n","ValorConvenio":8000,"ValorContrapartida":0,"DataAssinatura":"2018-05-03","NumeroProcesso":"005569","AnoProcesso":"2018","Status":"VIGENTE","CategoriaConvenio":"TERMO DE COLABORAÇÃO"}]</pre>
                </div>
                <h3>Detalhes das colunas</h3>
                <table id="tabela1" class="table table-bordered table-striped" summary="Tabela com os parâmetros, descrição, tipo e formato da url da api">
                    <thead>
                        <tr>
                            <th style='vertical-align:middle'>Coluna</th>
                            <th style='vertical-align:middle'>Tipo</th>
                            <th style='vertical-align:middle'>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>                          
                        <tr>
                            <td scope="col">OrgaoConcedente</td>
                            <td scope="col">string</td>
                            <td scope="col">Identificação do Órgão responsável pela concessão do recurso</td>
                        </tr>
                        <tr>
                            <td scope="col">CNPJBeneficiario</td>
                            <td scope="col">string</td>
                            <td scope="col">CNPJ da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                        </tr>
                        <tr>
                            <td scope="col">NomeBeneficiario</td>
                            <td scope="col">string</td>
                            <td scope="col">Nome ou razão social da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                        </tr>
                        <tr>
                            <td scope="col">NumeroConvenio</td>
                            <td scope="col">string</td>
                            <td scope="col">Número designado para o Convênio Cedido especificado</td>
                        </tr>
                        <tr>
                            <td scope="col">AnoConvenio</td>
                            <td scope="col">string</td>
                            <td scope="col">Ano do Convênio Cedido especificado</td>
                        </tr>
                        <tr>
                            <td scope="col">VigenciaInicial</td>
                            <td scope="col">date</td>
                            <td scope="col">Data da Vigência Inicial do Convênio Cedido</td>
                        </tr>
                        <tr>
                            <td scope="col">VigenciaFinal</td>
                            <td scope="col">date</td>
                            <td scope="col">Data da Vigência Final do Convênio Cedido</td>
                        </tr>
                        <tr>
                            <td scope="col">Objeto</td>
                            <td scope="col">string</td>
                            <td scope="col">Descrição detalhada do Objeto da Transferência Voluntária</td>
                        </tr>
                        <tr>
                            <td scope="col">ValorConvenio</td>
                            <td scope="col">double</td>
                            <td scope="col">Valor a ser cedido durante a vigência do termo</td>
                        </tr>
                        <tr>
                            <td scope="col">ValorContrapartida</td>
                            <td scope="col">double</td>
                            <td scope="col">Valor de contrapartida ofertada pelo município para realização do objeto</td>
                        </tr>
                        <tr>
                            <td scope="col">DataAssinatura</td>
                            <td scope="col">date</td>
                            <td scope="col">Data da assinatura do convênio cedido</td>
                        </tr>
                        <tr>
                            <td scope="col">NumeroProcesso</td>
                            <td scope="col">string</td>
                            <td scope="col">Número do processo designado ao convênio cedido</td>
                        </tr>
                        <tr>
                            <td scope="col">AnoProcesso</td>
                            <td scope="col">string</td>
                            <td scope="col">Ano do processo designado ao convênio cedido</td>
                        </tr>
                        <tr>
                            <td scope="col">Status</td>
                            <td scope="col">string</td>
                            <td scope="col">Status do convênio cedido</td>
                        </tr>
                        <tr>
                            <td scope="col">CategoriaConvenio</td>
                            <td scope="col">string</td>
                            <td scope="col">Categoria do convênio cedido</td>
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