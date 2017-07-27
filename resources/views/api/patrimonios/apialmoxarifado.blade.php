@extends('layouts.app')
@section('htmlheader_title', 'API Almoxarifado')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/patrimonios/almoxarifado</p>
                
            

                <h3>Exemplo</h3>
                <p><a href="/api/patrimonios/almoxarifado">transparencia.cachoeiro.es.gov.br/api/patrimonios/almoxarifado</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"NomeMaterial":"PENICILINA G. PROCA\u00cdNA + POT\u00c1SSIO","NomeAlmoxarifado":"SEMUS - FARMACIA","NomeGrupo":"MEDICAMENTOS","Especificacao":"CONCENTRA\u00c7\u00c3O: 300.000 +100.000UI.\n- APRESENTA\u00c7\u00c3O: SOLU\u00c7\u00c3O INJET\u00c1VEL.\n","Quantidade":"70","ValorAquisicao":2.2178}]</pre>
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