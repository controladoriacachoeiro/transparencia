<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\AtaRegistroPrecoModel;
use App\Models\ArquivosIntegra\ArquivosIntegraModel;

class AtaRegistroPrecoController extends Controller
{
    //GET
    public function ListarAtas(){
        $dadosDb = AtaRegistroPrecoModel::orderByRaw('CONCAT(AnoAta, NumeroAta) DESC');
        $dadosDb->select('AtaID','NumeroAta', 'AnoAta', 'DataFinal', 'Descricao', 'Fornecedor');        
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Nº da Ata', 'Fornecedor', 'Data da Validade', 'Descrição'];
        $Navegacao = array(
                array('url' => '#' ,'Descricao' => 'Atas de Registro de Preço')
        );

        return View('licitacoescontratos/AtaRegistroPreco.tabelaAtas', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowAta(){
        $AtaID =  isset($_GET['AtaID']) ? $_GET['AtaID'] : 'null';                

        $dadosDb = AtaRegistroPrecoModel::where('AtaID', '=', $AtaID);
        $dadosDb = $dadosDb->first();

        $arquivos = ArquivosIntegraModel::select('ArquivoID', 'DescricaoArquivo')->where('CodigoDocumento', '=', $dadosDb->CodigoAta)->get();

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