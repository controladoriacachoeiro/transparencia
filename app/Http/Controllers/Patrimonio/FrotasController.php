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
        $dadosDb->select('FrotaID','PlacaVeiculo','Marca', 'Modelo','Status');
        $dadosDb->whereNotNull('PlacaVeiculo');             
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Placa','Marca', 'Modelo','Status'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Frota')
        );
                
        return View('patrimonio/frota.tabelaFrota', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowFrota(){
        $frotaID =  isset($_GET['FrotaID']) ? $_GET['FrotaID'] : 'null';        
        
        $dadosDb = FrotaModel::select('FrotaID','PlacaVeiculo','Propriedade','Marca', 'Modelo','Ano','Status', 'Categoria','Subcategoria');
        $dadosDb->where('FrotaID', '=', $frotaID);                            
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
}
