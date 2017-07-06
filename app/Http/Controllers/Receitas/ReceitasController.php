<?php

namespace App\Http\Controllers\Receitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ReceitaModel;

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
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataInicio);

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
        if (($orgao == "todos") && ($orgao == "Todos")){
            $dadosDb = ReceitaModel::orderBy('UnidadeGestora');
            $dadosDb->select('DataArrecadacao','UnidadeGestora', 'CategoriaEconomica', 'Subalinea', 'sum(ValorArrecadado) as ValorArrecadado');        
            $dadosDb->groupBy('UnidadeGestora');               
            $dadosDb = $dadosDb->get();                                
            $colunaDados = [ 'Órgão', 'Categoria','Subalínea', 'Data da Arrecadação', 'Valor'];
            $Navegacao = array(            
                    array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );                        
        }
        else{
            $dadosDb = ReceitaModel::orderBy('UnidadeGestora');
            $dadosDb->select('ReceitaID','DataArrecadacao','UnidadeGestora', 'CategoriaEconomica', 'Subalinea', 'ValorArrecadado');
            $dadosDb->where('UnidadeGestora', '=', $orgao);        
            $dadosDb->groupBy('UnidadeGestora');               
            $dadosDb = $dadosDb->get();                                
            $colunaDados = [ 'Órgão', 'Categoria','Subalínea', 'Data da Arrecadação', 'Valor'];
            $Navegacao = array(            
                    array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );
        }        
               
        return View('receitas/recebimentos.tabelaRecebimentos', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim'));
    }

    // //GET        
    // public function showPagamento(){
    //     $Matricula =  isset($_GET['Matricula']) ? $_GET['Matricula'] : 'null';
    //     $Mes =  isset($_GET['Mes']) ? $_GET['Mes'] : 'null';
    //     $Ano =  isset($_GET['Ano']) ? $_GET['Ano'] : 'null';        

    //     $dadosDb = FolhaPagamentoModel::orderBy('Nome');        
    //     $dadosDb->where('Matricula', '=', $Matricula);
    //     $dadosDb->where('MesPagamento', '=', $Mes);
    //     $dadosDb->where('AnoPagamento', '=', $Ano);
    //     $dadosDb = $dadosDb->get();                       

    //     return json_encode($dadosDb);
    // }    
}