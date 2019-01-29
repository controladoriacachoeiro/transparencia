@extends('layouts.app')
@section('htmlheader_title', 'API Bens Móveis')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Bens Móveis'));
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
                <pre class="acessibilidade">transparencia.cachoeiro.es.gov.br/api/patrimonios/bensmoveis</pre>
                
            

                <h3>Exemplo</h3>
                <p><a href="/api/patrimonios/bensmoveis">transparencia.cachoeiro.es.gov.br/api/patrimonios/bensmoveis</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre class="acessibilidade">[{"BemID":1,"IdentificacaoBem":23,"Descricao":"ARMARIO ALTO EM MDF","Tipo":"MOBILIARIO EM GERAL","ValorAquisicao":1,"OrgaoLocalizacao":"GERÊNCIA DE FISCALIZAÇÃO AMBIENTAL"}]</pre>
                </div>
                <h3> Detalhes das colunas</h3>
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
                                    <td scope="col">IdentificacaoBem</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Código Identificador do bem</td>
                                </tr>
                                <tr>
                                    <td scope="col">Descricao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Descrição que permita entender o que é o bem móvel</td>
                                </tr>
                                <tr>
                                    <td scope="col">Tipo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Tipo do bem móvel</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorAquisicao</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor de avaliação do bem móvel</td>
                                </tr>                                              
                                <tr>
                                    <td scope="col">OrgaoLocalizacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão onde o bem está localizado</td>
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