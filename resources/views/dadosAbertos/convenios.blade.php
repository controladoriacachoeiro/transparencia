@extends('formFiltro')
@section('htmlheader_title')
    Download - Convênios e Transferências
@stop
@section('main-content')

<div class="row">
<div class="col-md-12">
   <div class=" box-body box box-solid">
      <div class="box-group" id="accordion">
         <!--Recebidos-->
         <div class="panel box box-primary">
            <div class="box-header with-border">
               <h4 class="box-title">
                  Convênios Recebidos
               </h4>
            </div>
            <div id="collapse1">
               <div class="box-body">
                  {{ Form::open(array('url' => '/dadosabertos/convenios/recebidos', 'method' => 'POST')) }}                                        
                  <div class="row form-group">
                     <div class="col-xs-2" style="width: 110px;">
                        {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                        {{ Form::close() }}
                     </div>
                     <div class="col-xs-2">
                        <span class="btn btn-primary" data-toggle="collapse" data-target="#recebido">Detalhes</span>
                     </div>
                  </div>
               </div>
               <!--Tabela de Descricao-->
               <div id="recebido" class="collapse">
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
                           <td>Texto</td>
                           <td>Identificação do Órgão Público ou outra entidade responsáel pela concessão do recurso</td>
                        </tr>
                        <tr>
                           <td>Prazo Vigência</td>
                           <td>Texto</td>
                           <td>Prazo de duração do Convênio ou outro instrumento</td>
                        </tr>
                        <tr>
                           <td>Objeto</td>
                           <td>Texto</td>
                           <td>Descrição detalhada do Objeto da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td>Valor a Receber</td>
                           <td>Texto</td>
                           <td>Valor a ser cedido durante a vigência do termo</td>
                        </tr>
                        <tr>
                           <td>Valor de Contrapartida</td>
                           <td>Texto</td>
                           <td>Valor de contrapartida ofertada pelo município para realização do objeto</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Fim Tabela de Descricao-->
            </div>
         </div>
         <!--Fim Recebidos-->
         <!--Cedidos-->
         <div class="panel box box-primary">
            <div class="box-header with-border">
               <h4 class="box-title">                  
                  Convênios Cedidos                  
               </h4>
            </div>
            <div id="collapse2">
               <div class="box-body">
                  {{ Form::open(array('url' => '/dadosabertos/convenios/cedidos', 'method' => 'POST')) }}                                              
                  <div class="row form-group">
                     <div class="col-xs-2" style="width: 110px;">
                        {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                        {{ Form::close() }}
                     </div>
                     <div class="col-xs-2">
                        <span class="btn btn-primary" data-toggle="collapse" data-target="#concedido">Detalhes</span>
                     </div>
                  </div>
               </div>
               <!--Tabela de Descricao-->
               <div id="concedido" class="collapse">
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
                           <td>Órgão</td>
                           <td>Texto</td>
                           <td>Identificação do Órgão responsáel pela concessão do recurso</td>
                        </tr>
                        <tr>
                           <td>CNPJ</td>
                           <td>Texto</td>
                           <td>CNPJ da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td>Beneficiário</td>
                           <td>Texto</td>
                           <td>Nome ou razão social da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td>Data Celebração</td>
                           <td>Texto</td>
                           <td>Identificação do Órgão Público ou outra entidade responsáel pela concessão do recurso</td>
                        </tr>
                        <tr>
                           <td>Prazo Vigência</td>
                           <td>Texto</td>
                           <td>Prazo de duração do Convênio ou outro instrumento</td>
                        </tr>
                        <tr>
                           <td>Objeto</td>
                           <td>Texto</td>
                           <td>Descrição detalhada do Objeto da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td>Valor a Receber</td>
                           <td>Texto</td>
                           <td>Valor a ser cedido durante a vigência do termo</td>
                        </tr>
                        <tr>
                           <td>Valor de Contrapartida</td>
                           <td>Texto</td>
                           <td>Valor de contrapartida ofertada pelo município para realização do objeto</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Fim Tabela de Descricao-->
            </div>
         </div>
         <!--Fim Cedidos-->  
      </div>
   </div>
</div>
@endsection
@section('scriptsadd')
<script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/js/options.min.js') }}"></script> 
<link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
<script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
<script>
   for (i = 1; i <= 4 ; i++) { 
       //configura os calendários de data de início e data fim
       datepickerFiltroDownload('#datetimepickerDataInicio'+i, '#datetimepickerDataFim'+i);
   }
</script> 
@endsection
