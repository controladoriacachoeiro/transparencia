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