@extends('layouts.app')

@section('htmlheader_title')
    Erro 404
@endsection

@section('main-content')

<div class="row">
    <div class=col-md-12>
        <p class="error text-center">Erro 404</p>   
    </div>
</div>

<div class="row">
    <div class=col-md-12>
        <p class="error-2 text-center">Ops! A página que você está procurando não foi encontrada. <a href="javascript:window.history.go(-1)">Voltar para página anterior</a></p>   
    </div>
</div>
      
@endsection

@section('scriptsadd')
    <script>
        $( "h1" ).first().css( "display", "none" );        
    </script>
@stop