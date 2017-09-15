@extends('layouts.app')
@section('htmlheader_title', 'API Contratos')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/contratos</p>
                

                <h3>Exemplo</h3>
                <p><a href="/api/licitacoescontratos/contratos">transparencia.cachoeiro.es.gov.br/api/api/licitacoescontratos/contratos</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"DataInicial":"2016-10-08","DataFinal":"2017-10-08","NomeContratado":"GUALIMP ASSESSORIA E CONSULTORIA LTDA EPP ","CNPJContratado":"39315221000194","OrgaoContratante":"SEME - SECRETARIA MUNICIPAL DE EDUCA\u00c7\u00c3O","Objeto":"CONTRATA\u00c7\u00c3O DE EMPRESA PARA REALIZA\u00c7\u00c3O DE CONCURSO P\u00daBLICO DE PROVAS E T\u00cdTULOS PARA PROVIMENTO DE CARGOS DA CATEGORIA \u201cEDUCA\u00c7\u00c3O B\u00c1SICA\u201d E \u201cAPOIO \u00c0 EDUCA\u00c7\u00c3O B\u00c1SICA\u201d DO MUNIC\u00cdPIO DE CACHOEIRO DE ITAPEMIRIM.","ProcessoLicitatorio":"341","ValorContratado":391000}]</pre>
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
                                    <td>Órgão contratante</td>
                                    <td>string</td>
                                    <td>Órgão cujo titular assina o contrato</td>
                                </tr>
                                <tr>
                                    <td>CNPJ do Contratado</td>
                                    <td>string</td>
                                    <td>CNPJ do fornecedor contratado/td>
                                </tr>
                                <tr>
                                    <td>Nome do Contratado</td>
                                    <td>string</td>
                                    <td>Nome do Contratado</td>
                                </tr>
                                <tr>
                                    <td>Data Inicial</td>
                                    <td>string</td>
                                    <td>Data de Assinatura, Publicação ou Início de Vigência do Contrato</td>
                                </tr>
                                <tr>
                                    <td>Data Final</td>
                                    <td>string</td>
                                    <td>Data do fim do contrato</td>
                                </tr>                      
                                <tr>
                                    <td>Objeto do Contrato</td>
                                    <td>string</td>
                                    <td>Descrição do objeto do contrato</td>
                                </tr>
                                <tr>
                                    <td>Valor do Contrato</td>
                                    <td>string</td>
                                    <td>Valor global do contrato</td>
                                </tr>
                                <tr>
                                    <td>Processo Licitatório</td>
                                    <td>string</td>
                                    <td>Informar o número do processo ou do edital de licitação que originou o contrato, ou informação de su dispensa, caso ocorra</td>
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