@extends('layouts.app')
@section('htmlheader_title', 'API Recursos Recebidos')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/convenios/recebidos</p>
            
                <h3>Exemplo</h3>
                <p><a href="/api/convenios/recebidos">transparencia.cachoeiro.es.gov.br/api/convenios/recebidos</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"DataCelebracao":"2017-07-06","PrazoVigencia":"2017-10-03","Objeto":"PRORROGAR A VIG\u00caNCIA DO CONV\u00caNIO N\u00ba 001\/2016, FIRMADO EM 08\/01\/2016, OBJETIVANDO DAR CONTINUIDADE AO CREDENCIAMENTO DE INSTITUI\u00c7\u00c3O ESPECIALIZADA PARA SERVI\u00c7O DE AN\u00c1LISE CL\u00cdNICA LABORATORIAL, DE FORMA ININTERRUPTA, SENDO: DE SEGUNDA A SEXTA-FEIRA DAS 7H AS 19H E EM ESCALA DE SOBREAVISO, NOS DEMAIS HOR\u00c1RIOS, FINAIS DE SEMANA E FERIADOS, PARA ATENDER A DEMANDA DOS PRONTOS ATENDIMENTO MUNICIPAL DA UNIDADE DE SA\u00daDE PAULO PEREIRA GOMES E ITAOCA, CENTRO DE REFER\u00caNCIA E INFECTOLOGIA ABEL SANTANA CRIAS E PR\u00c9-NATAL PROVENIENTE DAS UNIDADES B\u00c1SICAS DE SA\u00daDE E UNIDADES DA ESTRAT\u00c9GIA DE SA\u00daDE DA FAM\u00cdLIA NO MUNIC\u00cdPIO DE CACHOEIRO DE ITAPEMIRIM.","ValorAReceber":null,"ValorContrapartida":null}]</pre>
                </div>
                <h3>Detalhes das colunas</h3>
                          <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>                           
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