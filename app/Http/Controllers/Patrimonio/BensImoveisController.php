<?php

namespace App\Http\Controllers\Patrimonio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patrimonio\BensImoveisModel;
use App\Auxiliar as Auxiliar;

class BensImoveisController extends Controller
{   
    public function ListarImoveis(){
        $dadosDb = BensImoveisModel::orderBy('BemID');
        $dadosDb->select('BemID','UnidadeGestora','IdentificacaoBem', 'Descricao', 'Localizacao', 'DestinacaoAtual', 'Situacao', 'ValorAvaliacao', 'DataAvaliacao', 'Area');
        $dadosDb = $dadosDb->get();
        // dd($dadosDb[4]);
        foreach($dadosDb as $dados){
            if($dados->Localizacao == null){
                $dados->Localizacao = "Localização Não Informada";
            }

            if($dados->ValorAvaliacao == null){
                $dados->ValorAvaliacao = "A ser calculado";
            }
            
            if($dados->DataAvaliacao == null){
                $dados->DataAvaliacao = "Data desconhecida";
            }

            if($dados->Area == null){
                $dados->Area = "Área a ser calculada";
            }
        }

        $colunaDados = ['Imóvel', 'Unidade Gestora', 'Descrição', 'Localização'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Bens Imóveis')
        );

        return View('patrimonio/bensImoveis.tabelaImoveis', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET
    public function ShowImovel(){
        $BemID =  isset($_GET['BemID']) ? $_GET['BemID'] : 'null';
        
        $dadosDb = BensImoveisModel::where('BemID', '=', $BemID);
        $dadosDb = $dadosDb->get();

        foreach($dadosDb as $dados){
            if($dados->Localizacao == null){
                $dados->Localizacao = "Localização Não Informada";
            }

            if($dados->ValorAvaliacao == null){
                $dados->ValorAvaliacao = "A ser calculado";
            }
            
            if($dados->DataAvaliacao == null){
                $dados->DataAvaliacao = "Data desconhecida";
            }

            if($dados->Area == null){
                $dados->Area = "Área a ser calculada";
            }
        }

        return json_encode($dadosDb);
    }
}
