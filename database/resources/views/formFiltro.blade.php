@extends('layouts.app')

@section('cssheader')
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div id="corpo" class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        @yield('filtro_titulo', '')
                    </h3>                    
                </div>
                <div class="box-body">
                    @yield('contentForm')
                </div>
            </div>
        </div>
    </div>
@stop