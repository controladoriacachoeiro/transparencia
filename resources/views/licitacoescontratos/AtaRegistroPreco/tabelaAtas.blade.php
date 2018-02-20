@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Atas de Registro de Preço
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Data da Validade"){
                                echo "<th style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
                            }
                            else{                                       
                                echo "<th style='vertical-align:middle'>" . $valor . "</th>";                                             
                            }
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?PHP
                foreach ($dadosDb as $valor) {                    
                    echo "<tr>";
                    foreach ($colunaDados as $valorColuna) {                        
                        switch ($valorColuna) {
                            case 'Data da Validade':
                            echo  "<td>".$valor->DataValidade."</td>";;
                                break;
                            case 'Número da Ata':
                                echo "<td><a href='#' onclick=ShowAta('".  $valor->AtaID . "') data-toggle='modal' data-target='#myModal'>". $valor->NumeroAta ."</a></td>";
                                break;
                            case 'Tipo':                                                                    
                                echo "<td>".$valor->Tipo."</td>";                                                                                                                                        
                                break;
                            case 'Descrição':                                                                    
                                echo "<td>".$valor->Descricao."</td>";                                                                                                                                        
                                break;
                            case 'Número do Edital':
                                echo "<td>".$valor->Edital."</td>";
                                break;                                                                                                                                                                                                                 
                        }                        
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
@stop

@section('AtaDownload')
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Demais Atas</h3>
			</div>


            <div class="box-group box-body text-justify"  id="accordion">				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
								2017
							</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2017', 'arquivo' => 'ATA-048-2017.pdf'])}}">Ata 048/2017</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2017', 'arquivo' => 'ATA-049-2017.pdf'])}}">Ata 049/2017</a>
								</li>                                	
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2017', 'arquivo' => 'ATA-054-2017.pdf'])}}">Ata 054/2017</a>
								</li>	
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2017', 'arquivo' => 'ATA-055-2017.pdf'])}}">Ata 055/2017</a>
								</li>									
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2017', 'arquivo' => 'ATA-064-2017.pdf'])}}">Ata 064/2017</a>
								</li>                                
							</ul>
						</div>
					</div>
				</div>											
									
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
								2018
							</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
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
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-015-2018.pdf'])}}">Ata 015/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-016-2018.pdf'])}}">Ata 016/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-022-2018.pdf'])}}">Ata 022/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-064-2018.pdf'])}}">Ata 064/2018</a>
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
@stop

@section('scriptsadd')
@parent
<script>
    function ShowAta(id) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{route('ShowAta')}}", {AtaID: id}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Ata de Registro de Preço</span> ';            
                                                                                                                                                                                                
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DA ATA</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Número da Ata:</td>' +
                                            '<td>' + data[0].NumeroAta + '</td>'+                                                        
                                            '</tr>'+ 
                                            '<tr>'+                                                    
                                            '<td>Tipo:</td>' +
                                            '<td>' + data[0].Tipo + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Edital:</td>' +
                                            '<td>' + data[0].Edital + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Modalidade:</td>' +
                                            '<td>' + data[0].Modalidade + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Fornecedor:</td>' +
                                            '<td>' + data[0].Fornecedor + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data da Validade:</td>' +
                                            '<td>' + stringToDate(data[0].DataValidade) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                                                                   
                                            '<td>Data da Publicação:</td>' +
                                            '<td>' + stringToDate(data[0].DataPublicacao) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Descrição da Ata:</td>' +
                                            '<td>' + data[0].Descricao + '</td>'+                                                        
                                            '</tr>' +                                            
                                        '</tbody>' +
                                        '</table>';
                                        if (($.trim(data[0].IntegraAtaEXT) != '') && (data[0].IntegraAtaEXT != null)){
                                            body = body + '<a href="/licitacoescontratos/ataregistropreco/Download/' + data[0].AtaID + '" class="btn btn-info" role="button">Download da Ata</a>';    
                                        }                                                                                                                                                                                                                                                                      
                                body = body + '</div>' + '</div>';

            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
<script>
    var ExportButtons = document.getElementById('tabela');
    var instance = new TableExport(ExportButtons, {
        formats: ['xls','csv'],
        exportButtons: false,
        filename:'ata-registro-de-preco'
    });
    var exportDataXls = instance.getExportData()['tabela']['xls'];
    var exportDataCsv = instance.getExportData()['tabela']['csv'];

    var XLSbutton = document.getElementById('customXLSButton');
    XLSbutton.addEventListener('click', function (e) {
        instance.export2file(exportDataXls.data, exportDataXls.mimeType, exportDataXls.filename, exportDataXls.fileExtension);
    });


    var XLSbutton = document.getElementById('customCSVButton');
    XLSbutton.addEventListener('click', function (e) {
        instance.export2file(exportDataCsv.data, exportDataCsv.mimeType, exportDataCsv.filename, exportDataCsv.fileExtension);
    });
</script>
@stop