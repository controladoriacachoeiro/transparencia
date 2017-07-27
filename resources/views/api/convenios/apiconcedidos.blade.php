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