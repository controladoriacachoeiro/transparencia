@extends('layouts.app')
@section('htmlheader_title', '')

@section('cssheader')
@endsection

@section('main-content')
<br/>
<title>Resultados para: <?php echo $_GET['q']; ?></title>
<script>
  (function() {
    var cx = '010719052729445061611:ntj0aehspma';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>
@endsection

@section('scriptsadd')
@endsection