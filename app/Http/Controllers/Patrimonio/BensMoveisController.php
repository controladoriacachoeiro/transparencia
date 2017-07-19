<?php

namespace App\Http\Controllers\Patrimonio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Patrimonio\BensMoveisModel;
use App\Auxiliar as Auxiliar;

class BensMoveisController extends Controller
{   
    //GET 
    public function FiltroOrgao()
    {    
        $dadosDb = BensMoveisModel::orderBy('OrgaoLocalizacao');
        $dadosDb->select('OrgaoLocalizacao');
        $dadosDb->distinct('OrgaoLocalizacao');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->OrgaoLocalizacao);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('patrimonio.BensMoveis.FiltroBensMoveisOrgao', compact('dadosDb'));
    }

    //POST
    public function orgao(Request $request)
    {        
        if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {            

            return redirect()->route('BensOrgao',
                                     ['orgao' => $request->selectTipoConsulta]);            
        }
        return view('receitas/recebimentos.FiltroBensMoveisOrgao');
    }

    //GET
    public function BensOrgao($orgao)
    {        
        if (($orgao == "todos") || ($orgao == "Todos")){
            $dadosDb = BensMoveisModel::orderBy('OrgaoLocalizacao');
            $dadosDb->selectRaw('OrgaoLocalizacao, sum(ValorAquisicao) as ValorAquisicao');                
            $dadosDb->groupBy('OrgaoLocalizacao');
            $dadosDb = $dadosDb->get();
            $colunaDados = [ 'Órgão','Valor' ];
            $Navegacao = array(
                    array('url' => '/patrimonios/bensmoveis/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );
        }else{
            $dadosDb = BensMoveisModel::orderBy('Tipo');
            $dadosDb->selectRaw('IdentificacaoBem, OrgaoLocalizacao, Tipo, sum(ValorAquisicao) as ValorAquisicao');                
            $dadosDb->where('OrgaoLocalizacao', '=', $orgao);
            $dadosDb->groupBy('Tipo');
            $dadosDb = $dadosDb->get();
            $colunaDados = [ 'Tipo','Valor' ];
            $Navegacao = array(
                    array('url' => '/patrimonios/bensmoveis/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => route('BensOrgao', ['orgao' => 'todos']),'Descricao' => 'Órgãos'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );                        
        }
        return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET
    public function BensOrgaoTipo($orgao, $tipo){
        $tipo = str_replace('@', '/', $tipo);        
        $dadosDb = BensMoveisModel::orderBy('Descricao');
        $dadosDb->select('IdentificacaoBem', 'Descricao', 'ValorAquisicao');
        $dadosDb->where('OrgaoLocalizacao', '=', $orgao);
        $dadosDb->where('Tipo', '=', $tipo);
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Patrimônio', 'Descrição', 'Valor'];        
        $Navegacao = array(
                    array('url' => '/patrimonios/bensmoveis/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => route('BensOrgao', ['orgao' => 'todos']),'Descricao' => 'Órgãos'),
                    array('url' => route('BensOrgao', ['orgao' => $orgao]),'Descricao' => $orgao),
                    array('url' => '#' ,'Descricao' => $tipo)
            );
        
        return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }    

    //GET
    public function numeroPatrimonio(Request $request)    
    {        
        if (($request->txtpatrimonio != '') && ($request->txtpatrimonio != null)) {
            return redirect()->route('BensNumeroPatrimonio', ['numeropatrimonio' => $request->txtpatrimonio]);            
        }        
        return view('patrimonio.BensMoveis.filtroNumeroPatrimonio');
    }
    
    //GET
    public function BensNumeroPatrimonio($numeropatrimonio)
    {                                            
        $dadosDb = BensMoveisModel::orderBy('Descricao');
        $dadosDb->select('IdentificacaoBem', 'Descricao', 'ValorAquisicao');
        $dadosDb->where('IdentificacaoBem', '=', $numeropatrimonio);
        $colunaDados = ['Patrimônio', 'Descrição', 'Valor'];        
        $dadosDb = $dadosDb->get();
        $Navegacao = array(
                    array('url' => '/patrimonios/bensmoveis/numeropatrimonio' ,'Descricao' => 'Filtro'),                    
                    array('url' => '#' ,'Descricao' => $numeropatrimonio));
        
        return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'Navegacao'));                                                            
    }

    //GET
    public function showBemMovel()
    {
        $Patrimonio =  isset($_GET['Patrimonio']) ? $_GET['Patrimonio'] : 'null';
        $dadosDb = BensMoveisModel::orderBy('IdentificacaoBem');
        $dadosDb->where('IdentificacaoBem', '=', $Patrimonio);
        $dadosDb = $dadosDb->get();
        
        return json_encode($dadosDb);
    }
}
