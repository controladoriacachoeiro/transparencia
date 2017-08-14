<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\ContratosModel;

class ContratosController extends Controller
{
    //GET
    public function ListarContratos(){        
        $dadosDb = ContratosModel::orderBy('DataFinal','desc');
        $dadosDb->select('ContratoID','NomeContratado','OrgaoContratante', 'Objeto', 'ValorContratado','DataFinal');               
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Data de Vencimento','Contratado', 'Contratante','Objeto', 'Valor Contratado'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Contratos Vigentes')
        );
                
        return View('licitacoescontratos/contratos.tabelaContratos', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowContrato(){
        $contratoID =  isset($_GET['ContratoID']) ? $_GET['ContratoID'] : 'null';        
        
        $dadosDb = ContratosModel::select('ContratoID','NomeContratado','CNPJContratado','DataInicial', 'DataFinal','ProcessoLicitatorio','OrgaoContratante', 'Objeto', 'ValorContratado', 'IntegraContratoNome');
        $dadosDb->where('ContratoID', '=', $contratoID);                            
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
    //GET        
    public function DownloadContrato($id){                        
        $dadosDb = ContratosModel::select('ContratoID', 'IntegraContrato', 'IntegraContratoNome', 'IntegraContratoEXT');                       
        $dadosDb->where('ContratoID', '=', $id);                            
        $dadosDb = $dadosDb->get();
                       
        $conteudo = $dadosDb[0]->IntegraContrato;
        $nome = $dadosDb[0]->IntegraContratoNome;
        $tipo = $dadosDb[0]->IntegraContratoEXT;
        $nome = $nome . "." . $tipo;

        header('Content-Type: text/html; charset=utf-8'); 
        header('Content-Type: filesize($conteudo)');
        header('Content-Type: $tipo');
        header("Content-Disposition: attachment; filename=$nome");

        return print($conteudo);        
    }
}