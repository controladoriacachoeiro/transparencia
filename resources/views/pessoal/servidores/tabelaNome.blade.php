@extends('tabela')

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            echo "<th style='vertical-align:middle'>" . $valor . "</th>";
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
                            case 'Nome':
                                    echo "<td><a href='". route('ServidoresNomeToPagamentos', ['matricula' => $valor->Matricula]) ."'>". $valor->Nome ."</a></td>";
                                break;
                            case 'Órgão Lotação':                                                                    
                                echo "<td>".$valor->OrgaoLotacao."</td>";                                                                                                                                        
                                break;
                            case 'Matrícula':                                                                    
                                echo "<td>".$valor->Matricula."</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Cargo':                                                                    
                                    echo "<td>".$valor->Cargo."</td>";                                                                                                                                                                                                                
                                break;
                            case 'Função':                                                                    
                                    echo "<td>".$valor->Funcao."</td>";                                                                                                                                                                                                                
                                break;                                                                  
                            case 'Situação':
                                echo "<td>" . $valor->Situacao . "</td>";
                                break;
                            case 'Mês':
                                echo "<td>" . $valor->MesPagamento . "</td>";
                                break;
                            case 'Ano':
                                echo "<td>" . $valor->AnoPagamento . "</td>";
                                break;

                            // case 'Nota de Liquidação':
                            //     $numNota = '"' . $valor->NotaLiquidacao.'"';
                            //     $anoExercicio = '"' . $valor->AnoExercicio .'"';
                            //     echo "<td><a href='#' onclick=notaShow(". $numNota . ',' . $anoExercicio .") data-toggle='modal' data-target='#myModal'>". $valor->NotaLiquidacao ."</a></td>";
                            //     break;
                            // case 'Data de Liquidação':
                            //     echo "<td>" . date("d-m-Y", strtotime($valor->DataLiquidacao )) . "</td>";
                            //     break;
                            // case 'Valor Liquidação':
                            //     echo "<td>" . number_format($valor->ValorLiquidado, 2, ',', '.') . "</td>";
                            //     //echo "<td>" . $valor->ValorLiquidado . "</td>";
                            //     break;
                            
                            // case 'Data do Pagamento':
                            //     echo "<td>" . date("d-m-Y", strtotime($valor->DataPagamento )) . "</td>";
                            //     break;                                                                
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
@stop