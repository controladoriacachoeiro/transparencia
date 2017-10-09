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
            $colunaDados = ['Categoria Econômica', 'Valor Arrecadado'];
            $Navegacao = array(            
                    array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );
            $nivel = 2;
        }
        $soma=Auxiliar::SomarCampo($dadosDb,'ValorArrecadado');      
        return View('receitas/recebimentos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel','soma'));
    }

    //GET
    public function MostrarReceitasOrgaoCategoria($dataini, $datafim, $orgao, $categoria){
        $dadosDb = ReceitaModel::orderBy('Especie');
        $dadosDb->selectRaw('DataArrecadacao, UnidadeGestora, CategoriaEconomica, Especie, Rubrica, sum(ValorArrecadado) as ValorArrecadado');            
        $dadosDb->where('UnidadeGestora', '=', $orgao);
        $dadosDb->where('CategoriaEconomica', '=', $categoria);
        $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
        $dadosDb->groupBy('Especie', 'Rubrica');                                   
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Espécie', 'Rubrica', 'Valor Arrecadado'];
        $Navegacao = array(
                array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' => '#' ,'Descricao' => $categoria)
        );
        $nivel = 3;
        $soma=Auxiliar::SomarCampo($dadosDb,'ValorArrecadado');
        return View('receitas/recebimentos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel','soma'));
    }

    //GET
    public function MostrarReceitasOrgaoCategoriaEspecie($dataini, $datafim, $orgao, $categoria, $especie, $rubrica){
        $especie = Auxiliar::desajusteUrl($especie);
        $rubrica = Auxiliar::desajusteUrl($rubrica);        

        $dadosDb = ReceitaModel::orderBy('Alinea');
        $dadosDb->selectRaw('DataArrecadacao, UnidadeGestora, CategoriaEconomica, Especie, Rubrica, Alinea, Subalinea, sum(ValorArrecadado) as ValorArrecadado');            
        $dadosDb->where('UnidadeGestora', '=', $orgao);
        $dadosDb->where('CategoriaEconomica', '=', $categoria);
        $dadosDb->where('Especie', '=', $especie);
        $dadosDb->where('Rubrica', '=', $rubrica);
        $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);                                           
        $dadosDb->groupBy('Alinea', 'Subalinea'); 
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Alínea', 'Subalínea', 'Valor Arrecadado'];
        $Navegacao = array(
                array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' => route('MostrarReceitasOrgaoCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $orgao, 'categoria' => $categoria]),'Descricao' => $categoria),
                array('url' => '#' ,'Descricao' => $especie . ' | ' . $rubrica)
        );
        $nivel = 4;
        $soma=Auxiliar::SomarCampo($dadosDb,'ValorArrecadado');
        return View('receitas/recebimentos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel','soma'));
    }

    //GET
    public function MostrarReceitasOrgaoCategoriaEspRubAliSub($dataini, $datafim, $orgao, $categoria, $especie, $rubrica, $alinea, $subalinea){
        $especie = Auxiliar::desajusteUrl($especie);
        $rubrica = Auxiliar::desajusteUrl($rubrica);
        $alinea = Auxiliar::desajusteUrl($alinea);
        $subalinea = Auxiliar::desajusteUrl($subalinea);
        
        $dadosDb = ReceitaModel::orderBy('DataArrecadacao');
        $dadosDb->selectRaw('ReceitaID, DataArrecadacao, UnidadeGestora, CategoriaEconomica, Especie, Rubrica, Alinea, Subalinea, ValorArrecadado');            
        $dadosDb->where('UnidadeGestora', '=', $orgao);
        $dadosDb->where('CategoriaEconomica', '=', $categoria);
        $dadosDb->where('Especie', '=', $especie);
        $dadosDb->where('Rubrica', '=', $rubrica);
        $dadosDb->where('Alinea', '=', $alinea);
        $dadosDb->where('Subalinea', '=', $subalinea);
        $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);                                                   
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Data da Arrecadação', 'Valor Arrecadado'];
        $Navegacao = array(
                array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' => route('MostrarReceitasOrgaoCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $orgao, 'categoria' => $categoria]),'Descricao' => $categoria),
                array('url' => route('MostrarReceitasOrgaoCategoriaEspecie', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $orgao, 'categoria' => $categoria, 'especie' => Auxiliar::AjusteUrl($especie), 'rubrica' => Auxiliar::AjusteUrl($rubrica)]),'Descricao' => $especie . ' | ' . $rubrica),
                array('url' => '#' ,'Descricao' => $alinea . ' | ' . $subalinea)
        );
        $nivel = 5;
        $soma=Auxiliar::SomarCampo($dadosDb,'ValorArrecadado');
        return View('receitas/recebimentos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel','soma'));
    }

    //GET
    public function FiltroCategoria(){
        $dadosDb = ReceitaModel::orderBy('CategoriaEconomica');
        $dadosDb->select('CategoriaEconomica');
        $dadosDb->distinct('CategoriaEconomica');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->CategoriaEconomica);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);        
        $dadosDb = $arrayDataFiltro;        
                                
        return View('receitas/recebimentos.filtroCategoria', compact('dadosDb'));
    }

    POST
    public function categoria(Request $request){                          
        if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {

            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarReceitasCategoria',
                                     ['dataini' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'categoria' => $request->selectTipoConsulta]);            
        }
        return view('receitas/recebimentos.filtroCategoria');
    }

    //GET
    //Se o valor for 'todos', será enviado para o nível 1 e
    //se o valor for diferente de 'todos' será enviado para o nível 2
    //mas referenciando no 'navegação' o nível 1. Ambos retornam a mesma view.
    public function MostrarReceitasCategoria($dataini, $datafim, $categoria){        
        if (($categoria == "todos") || ($categoria == "Todos")){
            $dadosDb = ReceitaModel::orderBy('CategoriaEconomica');
            $dadosDb->selectRaw('DataArrecadacao, CategoriaEconomica, sum(ValorArrecadado) as ValorArrecadado');
            $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
            $dadosDb->groupBy('CategoriaEconomica');
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Categoria Econômica', 'Valor Arrecadado'];
            $Navegacao = array(
                    array('url' => '/receitas/recebimentos/categoria' ,'Descricao' => 'Filtro'),
                    array('url' => '#' ,'Descricao' => $categoria)
            );
            $nivel = 1;
        }
        else{
            $dadosDb = ReceitaModel::orderBy('Especie');
            $dadosDb->selectRaw('DataArrecadacao, CategoriaEconomica, Especie, Rubrica, sum(ValorArrecadado) as ValorArrecadado');
            $dadosDb->where('CategoriaEconomica', '=', $categoria);
            $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
            $dadosDb->groupBy('Especie', 'Rubrica');
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Espécie','Rubrica', 'Valor Arrecadado'];
            $Navegacao = array(
                    array('url' => '/receitas/recebimentos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarReceitasCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => 'todos']),'Descricao' => 'Categorias'),
                    array('url' => '#' ,'Descricao' => $categoria)
            );
            $nivel = 2;
        }
        $soma=Auxiliar::SomarCampo($dadosDb,'ValorArrecadado');
        return View('receitas/recebimentos.tabelaCategoria', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel','soma'));
    }

    //GET
    public function MostrarReceitasCategoriaEspecie($dataini, $datafim, $categoria, $especie, $rubrica){
        $especie = Auxiliar::desajusteUrl($especie);
        $rubrica = Auxiliar::desajusteUrl($rubrica);

        $dadosDb = ReceitaModel::orderBy('Alinea');
        $dadosDb->selectRaw('DataArrecadacao, CategoriaEconomica, Especie, Rubrica, Alinea, Subalinea, sum(ValorArrecadado) as ValorArrecadado');            
        $dadosDb->where('CategoriaEconomica', '=', $categoria);
        $dadosDb->where('Especie', '=', $especie);
        $dadosDb->where('Rubrica', '=', $rubrica);
        $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
        $dadosDb->groupBy('Alinea', 'Subalinea');
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Alínea', 'Subalínea', 'Valor Arrecadado'];
        $Navegacao = array(
                array('url' => '/receitas/recebimentos/categoria' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarReceitasCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => 'todos']),'Descricao' => 'Categorias'),
                array('url' => route('MostrarReceitasCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => $categoria]),'Descricao' => $categoria),
                array('url' => '#' ,'Descricao' => $especie . ' | ' . $rubrica)
        );
        $nivel = 3;
        $soma=Auxiliar::SomarCampo($dadosDb,'ValorArrecadado');
        return View('receitas/recebimentos.tabelaCategoria', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel','soma'));
    }

    //GET
    public function MostrarReceitasCategoriaEspRubAliSub($dataini, $datafim, $categoria, $especie, $rubrica, $alinea, $subalinea){
        $especie = Auxiliar::desajusteUrl($especie);
        $rubrica = Auxiliar::desajusteUrl($rubrica);
        $alinea = Auxiliar::desajusteUrl($alinea);
        $subalinea = Auxiliar::desajusteUrl($subalinea);

        $dadosDb = ReceitaModel::orderBy('DataArrecadacao');
        $dadosDb->selectRaw('ReceitaID, DataArrecadacao, CategoriaEconomica, Especie, Rubrica, Alinea, Subalinea, ValorArrecadado');            
        $dadosDb->where('CategoriaEconomica', '=', $categoria);
        $dadosDb->where('Especie', '=', $especie);
        $dadosDb->where('Rubrica', '=', $rubrica);
        $dadosDb->where('Alinea', '=', $alinea);
        $dadosDb->where('Subalinea', '=', $subalinea);
        $dadosDb->whereBetween('DataArrecadacao', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Data da Arrecadação', 'Valor Arrecadado'];
        $Navegacao = array(
                array('url' => '/receitas/recebimentos/categoria' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarReceitasCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => 'todos']),'Descricao' => 'Categorias'),
                array('url' => route('MostrarReceitasCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => $categoria]),'Descricao' => $categoria),
                array('url' => route('MostrarReceitasCategoriaEspecie', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => $categoria, 'especie' => Auxiliar::AjusteUrl($especie), 'rubrica' => Auxiliar::AjusteUrl($rubrica)]),'Descricao' => $especie . ' | ' . $rubrica),
                array('url' => '#' ,'Descricao' => $alinea . ' | ' . $subalinea)
        );
        $nivel = 4;
        $soma=Auxiliar::SomarCampo($dadosDb,'ValorArrecadado');
        return View('receitas/recebimentos.tabelaCategoria', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel','soma'));
    }

    //GET
    //Usado para enviar via Ajax        
    public function ShowReceita(){
        $ReceitaID =  isset($_GET['ReceitaID']) ? $_GET['ReceitaID'] : 'null';               

        $dadosDb = ReceitaModel::where('ReceitaID', '=', $ReceitaID);        
        $dadosDb = $dadosDb->get();                       

        return json_encode($dadosDb);
    }
}