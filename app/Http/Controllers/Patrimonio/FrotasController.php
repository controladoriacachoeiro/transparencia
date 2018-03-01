<?php

namespace App\Http\Controllers\Patrimonio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patrimonio\FrotaModel;
use App\Auxiliar as Auxiliar;

class FrotasController extends Controller
{   
    public function ListarFrotas(){        
        $dadosDb = FrotaModel::orderBy('PlacaVeiculo');
        $dadosDb->select('FrotaID','PlacaVeiculo','Ano','Marca', 'Modelo','Status');
        $dadosDb->whereNotNull('PlacaVeiculo');             
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Placa','Marca', 'Modelo', 'Ano', 'Status'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Frota')
        );
                
        return View('patrimonio/frota.tabelaFrota', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowFrota(){
        $frotaID =  isset($_GET['FrotaID']) ? $_GET['FrotaID'] : 'null';        
        
        $dadosDb = FrotaModel::where('FrotaID', '=', $frotaID);                                   
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
}