<?php

namespace App\Http\Controllers\Convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convenios\ConveniosRecebidosModel;
use App\Auxiliar as Auxiliar;

class ConveniosRecebidosController extends Controller
{

    public function MostrarConveniosRecebidos()
    {
        $dadosDb = ConveniosRecebidosModel::orderBy('DataCelebracao','desc');
        $dadosDb->select('ConveniosID','Concedente', 'DataCelebracao', 'PrazoVigencia', 'Objeto','ValorAReceber');
        $dadosDb->orderBy( 'DataCelebracao', 'desc');
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Data da Celebração','Objeto', 'Valor Recebido'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Convênios Recebidos')
        );
        return View('convenios/ConveniosRecebidos.convenioRecebidoTabela', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET
    public function ShowConvenioRecebido()
    {
        $ConvenioID =  isset($_GET['ConvenioID']) ? $_GET['ConvenioID'] : 'null';
        
        $dadosDb = ConveniosRecebidosModel::orderBy('ConveniosID');
        $dadosDb->select('ConveniosID', 'Concedente', 'DataCelebracao', 'PrazoVigencia', 'Objeto', 'ValorAReceber', 'ValorContrapartida', 'IntegraTermoNome');
        $dadosDb->where('ConveniosID', '=', $ConvenioID);
        $dadosDb = $dadosDb->get();
        
        return json_encode($dadosDb);
    }
    
    //GET
    public function DownloadConveniosRecebido($id){                        
        $dadosDb = ConveniosRecebidosModel::select('ConveniosID', 'IntegraTermo', 'IntegraTermoNome', 'IntegraTermoEXT');                       
        $dadosDb->where('ConveniosID', '=', $id);                            
        $dadosDb = $dadosDb->get();
                       
        $conteudo = $dadosDb[0]->IntegraTermo;
        $nome = $dadosDb[0]->IntegraTermoNome;
        $tipo = $dadosDb[0]->IntegraTermoEXT;
        $nome = $nome . "." . $tipo;

        header('Content-Type: text/html; charset=utf-8'); 
        header('Content-Type: filesize($conteudo)');
        header('Content-Type: $tipo');
        header("Content-Disposition: attachment; filename=$nome");

        return print($conteudo);        
    }
}
