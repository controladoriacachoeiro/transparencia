<?php

namespace App\Http\Controllers\Receitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ReceitaModel;
use App\Auxiliar as Auxiliar;

class ReceitasController extends Controller
{
    //GET
    public function FiltroOrgao(){
        $dadosDb = ReceitaModel::orderBy('UnidadeGestora');
        $dadosDb->select('UnidadeGestora');
        $dadosDb->distinct('UnidadeGestora');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->UnidadeGestora);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('receitas/recebimentos.filtroOrgao', compact('dadosDb'));
    }

    //POST
    public function orgao(Request $request){                          
        if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {

            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarReceitasOrgao',
                                     ['dataini' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'orgao' => $request->selectTipoConsulta]);            
        }
        return view('receitas/recebimentos.filtroOrgao');
    }

    //GET
    //Se o valor for 'todos', será enviado para o nível 1 e
    //se o valor for diferente de 'todos' será enviado para o nível 2
    //mas referenciando no 'navegação' o nível 1. Ambos retornam a mesma view.
    public function MostrarReceitasOrgao($dataini, $datafim, $orgao){        
        if (($orgao == "todos") || ($orgao == "Todos")){
            $dadosDb = ReceitaModel::orderBy('UnidadeGestora');
            $dadosDb->selectRaw('DataArrecadacao, UnidadeGestora, CategoriaEconomica, sum(ValorArrecadado) as ValorArrecadado');
            $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
            $dadosDb->groupBy('UnidadeGestora');
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Órgão', 'Valor Arrecadado'];
            $Navegacao = array(
                    array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );
            $nivel = 1;
        }
        else{
            $dadosDb = ReceitaModel::orderBy('CategoriaEconomica');
            $dadosDb->selectRaw('DataArrecadacao, UnidadeGestora, CategoriaEconomica, sum(ValorArrecadado) as ValorArrecadado');            
            $dadosDb->where('UnidadeGestora', '=', $orgao);
            $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
            $dadosDb->groupBy('CategoriaEconomica');                                   
            $dadosDb = $dadosDb->get();                                
            $colunaDados = ['Categoria', 'Valor Arrecadado'];
            $Navegacao = array(            
                    array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );
            $nivel = 2;
        }
               
        return View('receitas/recebimentos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
    }

    public function MostrarReceitasOrgaoCategoria($dataini, $datafim, $orgao, $categoria){
        return 'oi';
    }    

    //GET        
    public function ShowReceita(){
        $ReceitaID =  isset($_GET['ReceitaID']) ? $_GET['ReceitaID'] : 'null';               

        $dadosDb = ReceitaModel::orderBy('UnidadeGestora');        
        $dadosDb->where('ReceitaID', '=', $ReceitaID);        
        $dadosDb = $dadosDb->get();                       

        return json_encode($dadosDb);
    }    
}