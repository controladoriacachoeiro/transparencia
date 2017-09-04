@extends('layouts.app')
@section('htmlheader_title', 'API Recursos Concedidos')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/convenios/concedidos</p>
            
                <h3>Exemplo</h3>
                <p><a href="/api/convenios/concedidos">transparencia.cachoeiro.es.gov.br/api/convenios/concedidos</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"OrgaoConcedente":"SECRETARIA MUNICIPAL DE AGRICULTURA E ABASTECIMENTO","CNPJBeneficiario":"20587922000154","NomeBeneficiario":"COOPERATIVA DA AGRICULTURA FAMILIAR DE CACHOEIRO DE ITAPEMIRIM","DataCelebracao":"2016-11-28","PrazoVigencia":12,"Objeto":"OBJETIVA O ESTABELECIMENTO DE PARCERIA ENTRE O CONCEDENTE E O CONVENENTE VISANDO APOIAR A ESTRUTURA\u00c7\u00c3O PRODUTIVA DE EMPREENDIMENTOS COLETIVOS DA AGRICULTURA FAMILIAR NO MUNIC\u00cdPIO, A PARTIR DA AQUISI\u00c7\u00c3O E INSTALA\u00c7\u00c3O DE EQUIPAMENTOS, M\u00c1QUINAS E IMPLEMENTOS NECESS\u00c1RIOS PARA A PRODU\u00c7\u00c3O, BENEFICIAMENTO, ARMAZENAMENTO E A COMERCIALIZA\u00c7\u00c3O DE PRODUTOS E MAT\u00c9RIAS-PRIMAS PROCEDENTES DAS UNIDADES FAMILIARES.","ValorACeder":86133.33,"ValorContrapartida":0}]</pre>
                </div>
                <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descriçao</th>
                                </tr>
                            </thead>
                            <tbody>                          
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Identificação do Órgão responsáel pela concessão do recurso</td>
                                </tr>
                                <tr>
                                    <td>CNPJ</td>
                                    <td>string</td>
                                    <td>CNPJ da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                                </tr>
                                <tr>
                                    <td>Beneficiário</td>
                                    <td>string</td>
                                    <td>Nome ou razão social da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                                </tr>
                                <tr>
                                    <td>Data Celebração</td>
                                    <td>string</td>
                                    <td>Identificação do Órgão Público ou outra entidade responsáel pela concessão do recurso</td>
                                </tr>
                                <tr>
                                    <td>Prazo Vigência</td>
                                    <td>string</td>
                                    <td>Prazo de duração do Convênio ou outro instrumento</td>
                                </tr>
                                <tr>
                                    <td>Objeto</td>
                                    <td>string</td>
                                    <td>Descrição detalhada do Objeto da Transferência Voluntária</td>
                                </tr>
                                <tr>
                                    <td>Valor a Receber</td>
                                    <td>string</td>
                                    <td>Valor a ser cedido durante a vigência do termo</td>
                                </tr>
                                <tr>
                                    <td>Valor de Contrapartida</td>
                                    <td>string</td>
                                    <td>Valor de contrapartida ofertada pelo município para realização do objeto</td>
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