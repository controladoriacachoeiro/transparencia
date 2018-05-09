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
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2017', 'arquivo' => 'ATA-044-2017.pdf'])}}">Ata 044/2017</a>
								</li>
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
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2017', 'arquivo' => 'ATA-063-2017.pdf'])}}">Ata 063/2017</a>
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
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-007-2018.pdf'])}}">Ata 007/2018</a>
								</li>                                
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-008-2018.pdf'])}}">Ata 008/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-009-2018.pdf'])}}">Ata 009/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-010-2018.pdf'])}}">Ata 010/2018</a>
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
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-017-2018.pdf'])}}">Ata 017/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-018-2018.pdf'])}}">Ata 018/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-019-2018.pdf'])}}">Ata 019/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-020-2018.pdf'])}}">Ata 020/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-021-2018.pdf'])}}">Ata 021/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-022-2018.pdf'])}}">Ata 022/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-023-2018.pdf'])}}">Ata 023/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-024-2018.pdf'])}}">Ata 024/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-025-2018.pdf'])}}">Ata 025/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-026-2018.pdf'])}}">Ata 026/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-027-2018.pdf'])}}">Ata 027/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-028-2018.pdf'])}}">Ata 028/2018</a>
								</li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-029-2018.pdf'])}}">Ata 029/2018</a>
								</li>                                
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-030-2018.pdf'])}}">Ata 030/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-031-2018.pdf'])}}">Ata 031/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-032-2018.pdf'])}}">Ata 032/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-035-2018.pdf'])}}">Ata 035/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-036-2018.pdf'])}}">Ata 036/2018</a>
                                </li>  
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-037-2018.pdf'])}}">Ata 037/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-038-2018.pdf'])}}">Ata 038/2018</a>
                                </li>                              
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-039-2018.pdf'])}}">Ata 039/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-040-2018.pdf'])}}">Ata 040/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-041-2018.pdf'])}}">Ata 041/2018</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-042-2018.pdf'])}}">Ata 042/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-043-2018.pdf'])}}">Ata 043/2018</a>
                                </li>                                                             
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-044-2018.pdf'])}}">Ata 044/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-045-2018.pdf'])}}">Ata 045/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-046-2018.pdf'])}}">Ata 046/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-047-2018.pdf'])}}">Ata 047/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-048-2018.pdf'])}}">Ata 048/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-049-2018.pdf'])}}">Ata 049/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-050-2018.pdf'])}}">Ata 050/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-053-2018.pdf'])}}">Ata 053/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-054-2018.pdf'])}}">Ata 054/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-055-2018.pdf'])}}">Ata 055/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-056-2018.pdf'])}}">Ata 056/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-057-2018.pdf'])}}">Ata 057/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-058-2018.pdf'])}}">Ata 058/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-059-2018.pdf'])}}">Ata 059/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-060-2018.pdf'])}}">Ata 060/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-061-2018.pdf'])}}">Ata 061/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-062-2018.pdf'])}}">Ata 062/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-063-2018.pdf'])}}">Ata 063/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-064-2018.pdf'])}}">Ata 064/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-065-2018.pdf'])}}">Ata 065/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-067-2018.pdf'])}}">Ata 067/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-068-2018.pdf'])}}">Ata 068/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-069-2018.pdf'])}}">Ata 069/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-076-2018.pdf'])}}">Ata 076/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-078-2018.pdf'])}}">Ata 078/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-079-2018.pdf'])}}">Ata 079/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-080-2018.pdf'])}}">Ata 080/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-081-2018.pdf'])}}">Ata 081/2018</a>
                                </li> 
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('DownloadAtaArquivo', ['ano' => '2018', 'arquivo' => 'ATA-082-2018.pdf'])}}">Ata 082/2018</a>
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