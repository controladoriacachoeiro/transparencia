@extends('layouts.app')
@section('htmlheader_title', 'API Bens Móveis')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/patrimonios/bensmoveis</p>
                
            

                <h3>Exemplo</h3>
                <p><a href="/api/patrimonios/bensmoveis">transparencia.cachoeiro.es.gov.br/api/patrimonios/bensmoveis</p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"BemID":47906,"IdentificacaoBem":142752,"Descricao":"MONITOR","Tipo":"APARELHOS ELETR\u00d4NICOS","ValorAquisicao":330,"OrgaoLocalizacao":"GER\u00caNCIA DE OUVIDORIA MUNICIPAL DE SA\u00daDE","Observacao":"MONITOR LED DE 19,5 POLEGADAS\/ MARCA DATEN\/ MODELO 20M35PD-M\/ COR PRETO\/ SERIE 170302335\/"}]</pre>
                </div>
                <h3> Detalhes das colunas</h3>
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
                                    <td>Número Patrimônio</td>
                                    <td>string</td>
                                    <td>Código Identificador do bem</td>
                                </tr>
                                <tr>
                                    <td>Descrição</td>
                                    <td>string</td>
                                    <td>Descrição permita entender o que é o bem móvel</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão onde o bem está localizado</td>
                                </tr>
                                <tr>
                                    <td>Observação</td>
                                    <td>string</td>
                                    <td>Observações a respeito do bem móvel</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Valor de avaliação do bem imóvel</td>
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