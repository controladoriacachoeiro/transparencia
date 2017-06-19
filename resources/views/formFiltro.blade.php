@extends('layouts.app')
@section('htmlheader_title')
    Filtro
@stop

@section('cssheader')
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@extends('layouts.breadcrumb')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div id="corpo" class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtro2</h3>                    
                </div>
                <div class="box-body">
                    @yield('contentForm')
                </div>
            </div>
        </div>
    </div>
@stop


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100688690-1', 'auto');
  ga('send', 'pageview');
</script>