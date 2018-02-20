@extends('layouts.app') 
@section('htmlheader_title', 'Atas de Registro de Preço') 

@section('cssheader') 
@endsection 

@section('main-content')
<div class='row'>
        <div class='col-md-12'>
            <div id="navegacao" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Navegação</h3>                   
                </div>
                <div class="box-body">                                                        
                    <ol class="breadcrumb">
                        <li><a href="/">Início</a></li>                                                
                        <li class="active">Atas de Registro de Preço</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Atas</h3>
			</div>

			<!-- /.box-header -->
			<div class="box-group box-body text-justify"  id="accordion">				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
								2018
							</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">								
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-001-2018.pdf'])}}">Ata 001/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-002-2018.pdf'])}}">Ata 002/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-003-2018.pdf'])}}">Ata 003/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-004-2018.pdf'])}}">Ata 004/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-005-2018.pdf'])}}">Ata 005/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-006-2018.pdf'])}}">Ata 006/2018</a>
								</li>                                
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-008-2018.pdf'])}}">Ata 008/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-011-2018.pdf'])}}">Ata 011/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-012-2018.pdf'])}}">Ata 012/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-013-2018.pdf'])}}">Ata 013/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-014-2018.pdf'])}}">Ata 014/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-016-2018.pdf'])}}">Ata 016/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-022-2018.pdf'])}}">Ata 022/2018</a>
								</li>
							</ul>
						</div>
					</div>
				</div>								
			</div>
			
		</div>
		<!-- /.box -->
	</div>
</div>

@endsection @section('scriptsadd')
<script>
	$("a").click(function() {
  $("ul").removeClass('in');
});

</script>
@endsection