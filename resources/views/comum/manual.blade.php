@extends('layouts.app')
@section('htmlheader_title', 'Manual de Navegação')

@section('cssheader')
@endsection

@section('main-content')
      <div class="row">
        <div class="col-md-8">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in eleifend augue, eget lobortis magna. Aenean vitae dui ligula. Integer in congue dolor. Donec id condimentum justo. Maecenas sit amet elit odio. Morbi ultrices nisi felis, quis gravida magna vulputate ut. Vestibulum euismod elit at orci bibendum dictum. Donec a justo lorem. Fusce ullamcorper, nunc ac venenatis dapibus, nisl ante condimentum nibh, eget posuere lectus quam et nulla. Nullam sit amet viverra lacus. Mauris tempor lobortis mi sit amet cursus. Nunc orci erat, suscipit ut diam nec, lacinia faucibus mauris.</p>

                <p>Morbi tincidunt eget nulla in tincidunt. Morbi consequat malesuada mollis. Cras mattis iaculis leo ut dapibus. Sed semper gravida justo, et molestie quam venenatis eget. Nulla facilisis massa maximus enim rhoncus, ac sollicitudin justo cursus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris aliquet magna est. Ut finibus justo id ligula pellentesque sagittis. Vivamus mollis elementum congue. In a nibh dui.</p>

                <a href="#" target="_blank" class="btn btn-success">
                    <span class="glyphicon glyphicon-cloud-download"></span> Baixar Manual de Navegação 
                </a>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100688690-1', 'auto');
  ga('send', 'pageview');

</script>
@endsection