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
                    <pre>[{"OrgaoConcedente":"SECRETARIA MUNICIPAL DE SAUDE","CNPJBeneficiario":"27192590000158","NomeBeneficiario":"HOSPITAL INFANTIL F.ASSIS-C.ES.J.RI","DataCelebracao":"2017-11-01","PrazoVigencia":12,"Objeto":"PRESTA\u00c7\u00c3O DE SERVI\u00c7OS DE PRONTO ATENDIMENTO INFANTIL, EM HOR\u00c1RIO ININTERRUPTO 07 DIAS POR SEMANA, PARA DESENVOLVER A\u00c7\u00d5ES DE URG\u00caNCIA PEDI\u00c1TRICA.","ValorACeder":4480021.6,"ValorContrapartida":0}]</pre>
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
                                    <td scope="col">Identificação do Órgão responsáel pela concessão do recurso</td>
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
                                    <td scope="col">DataCelebracao</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data da celebração do benefício</td>
                                </tr>
                                <tr>
                                    <td scope="col">PrazoVigencia</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Prazo de duração do Convênio ou outro instrumento</td>
                                </tr>
                                <tr>
                                    <td scope="col">Objeto</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Descrição detalhada do Objeto da Transferência Voluntária</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorACeder</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor a ser cedido durante a vigência do termo</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorContrapartida</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor de contrapartida ofertada pelo município para realização do objeto</td>
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