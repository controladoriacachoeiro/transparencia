<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\AtaRegistroPrecoModel;
use App\Models\ArquivosIntegra\ArquivosIntegraModel;
use App\Auxiliar as Auxiliar;

class AtaRegistroPrecoController extends Controller
{
    // GET
    public function Filtro(){
        $dadosDb = AtaRegistroPrecoModel::select('Situacao')->distinct('Situacao')->get();       
        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->Situacao);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('licitacoescontratos/AtaRegistroPreco.filtroAtas', compact('dadosDb'));
    }

    // POST
    public function FiltroRedirect(Request $request){        
        if($request->slcDescricao == null || $request->slcDescricao == ''){
            $request->slcDescricao = "Todos";
        }
        
        // Descrição é referente ao Nome do Fornecedor, Número da Ata ou Descrição da Ata
        $request->slcDescricao = Auxiliar::ajusteUrl($request->slcDescricao);
        
        return redirect()->route('ListarAtas',
                                ['situacao' => $request->slcSituacao,
                                 'descricao' => $request->slcDescricao]);
    }

    //GET
    public function ListarAtas($situacao, $descricao){
        $descricao = Auxiliar::desajusteUrl($descricao);
        
        $dadosDb = AtaRegistroPrecoModel::orderByRaw('CONCAT(AnoAta, NumeroAta) DESC');
        $dadosDb->select('AtaID','NumeroAta', 'AnoAta', 'DataFinal', 'Descricao', 'Fornecedor', 'Situacao');        

        if($situacao != 'Todos'){
            $dadosDb->where('Situacao', '=', $situacao);
        }
        
        if($descricao != 'Todos'){

            $arrayPalavras = explode(' ', $descricao);
            
            foreach ($arrayPalavras as $palavra) {
                if($situacao != 'Todos'){
                    $dadosDb->whereRaw('((Descricao LIKE "%' . $palavra . '%") OR (Fornecedor LIKE "%' . $palavra . '%") OR (NumeroAta LIKE "%' . $palavra . '%") OR (AnoAta LIKE "%' . $palavra . '%")) AND Situacao = "' . $situacao . '"');
                } else{
                    $dadosDb->whereRaw('(Descricao LIKE "%' . $palavra . '%") OR (Fornecedor LIKE "%' . $palavra . '%") OR (NumeroAta LIKE "%' . $palavra . '%") OR (AnoAta LIKE "%' . $palavra . '%")');
                }
            }
            
            $arrayPalavras2 = explode('/', $descricao);
            
            if(count($arrayPalavras2) > 1){
                if($situacao != 'Todos'){
                    $dadosDb->orWhereRaw('(NumeroAta LIKE "%' . $arrayPalavras2[0] . '%" AND AnoAta LIKE "%' . $arrayPalavras2[1] . '%") AND (Situacao = "' . $situacao . '")');
                } else{
                    $dadosDb->orWhereRaw('NumeroAta LIKE "%' . $arrayPalavras2[0] . '%" AND AnoAta LIKE "%' . $arrayPalavras2[1] . '%"');
                }
            }
        }
        
        $dadosDb = $dadosDb->get();

        $colunaDados = ['Nº da Ata', 'Fornecedor', 'Situação', 'Data da Validade', 'Descrição'];
        $Navegacao = array(
            array('url' => '/licitacoescontratos/ataregistropreco/' ,'Descricao' => 'Filtro'),
            array('url' => '#' ,'Descricao' => 'Atas de Registro de Preço')
        );
        
        return View('licitacoescontratos/AtaRegistroPreco.tabelaAtas', compact('dadosDb', 'colunaDados', 'Navegacao', 'situacao', 'descricao'));
    }

    //GET        
    public function ShowAta(){
        $AtaID =  isset($_GET['AtaID']) ? $_GET['AtaID'] : 'null';                

        $dadosDb = AtaRegistroPrecoModel::where('AtaID', '=', $AtaID);
        $dadosDb = $dadosDb->first();

        $arquivos = ArquivosIntegraModel::orderBy('DescricaoArquivo')
        ->select('ArquivoID', 'DescricaoArquivo')        
        ->where('CodigoDocumento', '=', $dadosDb->CodigoAta)
        ->groupBy('DescricaoArquivo')
        ->get();

        $aux = [];
        if(count($arquivos) > 0){                        
            foreach($arquivos as $arquivo){
                array_push($aux, array('ArquivoID' => $arquivo->ArquivoID, 'DescricaoArquivo' => $arquivo->DescricaoArquivo));
            }            
        }
        $dadosDb->Arquivos = $aux;

        return json_encode($dadosDb);
    }
    
    //GET        
    public function DownloadAta($id){                        
        $dadosDb = AtaRegistroPrecoModel::select('AtaID', 'IntegraAta', 'IntegraAtaNome', 'IntegraAtaEXT');                       
        $dadosDb->where('AtaID', '=', $id);        
        $dadosDb = $dadosDb->get();

        $conteudo = $dadosDb[0]->IntegraAta;
        $nome = $dadosDb[0]->IntegraAtaNome;
        $tipo = $dadosDb[0]->IntegraAtaEXT;
        $nome = $nome . "." . $tipo;

        header('Content-Type: text/html; charset=utf-8');
        header('Content-Type: filesize($conteudo)');
        header('Content-Type: $tipo');
        header("Content-Disposition: attachment; filename=$nome");

        return print($conteudo);        
    }

    //Para baixar os arquivos das atas (Provisório)
    //GET        
    public function DownloadArquivo($ano, $arquivo){                                
        $file_path = public_path('Arquivos/atasregistropreco/'.$ano.'/'.$arquivo);
        return response()->file($file_path);        
    }
}