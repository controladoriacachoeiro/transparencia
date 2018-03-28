<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\ContratosModel;

class ContratosController extends Controller
{
    public function Filtro(){
        $dadosDb = ContratosModel::select('Status')->distinct('Status')->get();       
        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->Status);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('licitacoescontratos/contratos.filtroContratos', compact('dadosDb'));
    }

    public function FiltroRedirect(Request $request)
    {        
        return redirect()->route('MostrarContratos',
                                ['status' => $request->slcStatus]);
    }


    //GET
    public function MostrarContratos($status){        
        $dadosDb = ContratosModel::orderBy('DataFinal');
        $dadosDb->select('ContratoID','NomeContratado', 'Objeto', 'ValorContratado','DataFinal', 'NumeroContrato', 'AnoContrato', 'Status'); 
        
        if($status != 'Todos'){
            $dadosDb->where('Status', '=', $status);            
        }

        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Data de Vencimento','Contratado', 'Nº Contrato', 'Status', 'Objeto', 'Valor Contratado'];
        $Navegacao = array(
                array('url' => '/licitacoescontratos/contratos/' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => 'Contratos')
        );
                
        return View('licitacoescontratos/contratos.tabelaContratos', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowContrato(){
        $ContratoID =  isset($_GET['ContratoID']) ? $_GET['ContratoID'] : 'null';        
        
        $dadosDb = ContratosModel::where('ContratoID', '=', $ContratoID);        
        $dadosDb = $dadosDb->get();
        
        return json_encode($dadosDb, JSON_UNESCAPED_UNICODE);        
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