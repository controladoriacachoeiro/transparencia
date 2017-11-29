<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\AtaRegistroPrecoModel;

class AtaRegistroPrecoController extends Controller
{
    //GET
    public function ListarAtas(){        
        $dadosDb = AtaRegistroPrecoModel::orderBy('DataPublicacao');
        $dadosDb->select('AtaID','NumeroAta', 'Tipo', 'Edital', 'DataValidade', 'Descricao');                      
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Número da Ata', 'Tipo', 'Número do Edital', 'Data da Validade', 'Descrição'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Atas de Registro de Preço')
        );
                
        return View('licitacoescontratos/AtaRegistroPreco.tabelaAtas', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowAta(){
        $AtaID =  isset($_GET['AtaID']) ? $_GET['AtaID'] : 'null';                

        $dadosDb = AtaRegistroPrecoModel::select('AtaID', 'NumeroAta', 'Tipo', 'Edital', 'Modalidade', 'Fornecedor', 'DataValidade', 'DataPublicacao', 'Descricao', 'IntegraAtaEXT');      
        $dadosDb->where('AtaID', '=', $AtaID);
        $dadosDb = $dadosDb->get();

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
}