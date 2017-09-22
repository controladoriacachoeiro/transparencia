<?php

namespace App\Http\Controllers\Patrimonio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patrimonio\BensImoveisModel;
use App\Auxiliar as Auxiliar;

class BensImoveisController extends Controller
{   
    public function ListarImoveis(){        
        $dadosDb = BensImoveisModel::orderBy('IdentificacaoBem');
        $dadosDb->select('BemID','UnidadeGestora','IdentificacaoBem', 'Descricao');
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Orgão','Imóvel', 'Descrição'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Bens Imóveis')
        );
                
        return View('patrimonio/bensImoveis.tabelaImoveis', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowImovel(){
        $BemID =  isset($_GET['BemID']) ? $_GET['BemID'] : 'null';        
        
//        $dadosDb = BensImoveisModel::select('FrotaID','PlacaVeiculo','Propriedade','Marca', 'Modelo','Ano','Status', 'Categoria','Subcategoria');
        $dadosDb=BensImoveisModel::where('BemID', '=', $BemID);   
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
}
