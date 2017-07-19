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

            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarReceitasOrgao',
                                     ['dataini' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'orgao' => $request->selectTipoConsulta]);            
        }
        return view('receitas/recebimentos.filtroOrgao');

        
        
        // $parametros = Auxiliar::ajusteArrayUrl($parametros);
        // return redirect()->route('filtroBensMoveis', $parametros);
    }

    // public function orgao($orgao)
    // {
    //     $orgao=Auxiliar::desajusteUrl($orgao);
    //     $dadosDb=[];
    //     $breadcrumbNavegacao=[];

    //     switch ($orgao) {
    //         case 'todos':
    //             $dadosDb = BensMoveisModel::orderBy('Descricao');
    //             $dadosDb->selectRaw('OrgaoLocalizacao, sum(ValorAquisicao) as ValorAquisicao');                
    //             $dadosDb->groupBy('OrgaoLocalizacao');
    //             $dadosDb = $dadosDb->get();

    //             $colunaDados = [ 'Orgão','Valor' ];
    //             // Filtro
    //             array_push($breadcrumbNavegacao, [
    //             'Filtro' => route('MontaBensMoveis')]);
    //             // TipoConsulta
    //             array_push($breadcrumbNavegacao, [
    //             $orgao => '#']);
    //             return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
    //             break;
    //         default:
    //             $dadosDb = BensMoveisModel::orderBy('Tipo');
    //             $dadosDb->selectRaw('IdentificacaoBem, Tipo, sum(ValorAquisicao) as ValorAquisicao');                
    //             $dadosDb->where('OrgaoLocalizacao', '=', $orgao);
    //             $dadosDb->groupBy('Tipo');
    //             $dadosDb = $dadosDb->get();

    //             $colunaDados = ['Número Patrimonio', 'Descrição', 'Valor'];
    //             // Filtro
    //             array_push($breadcrumbNavegacao, [
    //             'Filtro' => route('MontaBensMoveis')]);
    //             // TipoConsulta
    //             array_push($breadcrumbNavegacao, [
    //             'órgãos'=> '/patrimonios/bensmoveis/orgaos/todos']);
    //             array_push($breadcrumbNavegacao, [
    //             $orgao => '#']);
    //             //$breadcrumbNavegacao = '';
    //             return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
    //             break;
    //     }
    //     return View('patrimonio.BensMoveis.BensMoveisTabela');
    // }

    public function porOrgao($orgao)
    {
        $orgao=Auxiliar::desajusteUrl($orgao);
        $dadosDb=[];

        $link = route('filtroBensMoveis', [
                        'consulta' => $orgao]);
        // Filtro
        array_push($breadcrumbNavegacao, [
            'Filtro' => route('MontaBensMoveis')]);
        // TipoConsulta
        array_push($breadcrumbNavegacao, [
            'Orgão' => route('filtroBensMoveis', ['tipoConsulta'=>'todos'])]);
        
        array_push($breadcrumbNavegacao, [
            $orgao => '#']);
        
        $dadosDb = BensMoveisModel::orderBy('Descricao');
        $dadosDb->select('IdentificacaoBem', 'Descricao', 'ValorAquisicao');
        $dadosDb->where('OrgaoLocalizacao', '=', $orgao);
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Número Patrimonio', 'Descrição', 'Valor'];
        
        
        return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
    }

    public function filtrarPatrimonio(Request $request)
    {
        if ($request->txtpatrimonio == '') {
            $parametros = [
            'consulta' =>'todos'
            ];
        } else {
            $parametros = [
            'consulta' =>$request->txtpatrimonio
            ];
        }
        $parametros = Auxiliar::ajusteArrayUrl($parametros);
        return redirect()->route('filtroPorPatrimonio', $parametros);
    }
    
    public function porPatrimonio($Patrimonio)
    {
        $Patrimonio=Auxiliar::desajusteUrl($Patrimonio);
        $dadosDb=[];
        $breadcrumbNavegacao=[];
        switch ($Patrimonio) {
            case 'todos':
                $dadosDb = BensMoveisModel::orderBy('Descricao');
                $dadosDb->select('IdentificacaoBem', 'Descricao', 'ValorAquisicao');
                $colunaDados = ['Número Patrimonio', 'Descrição', 'Valor'];
                $dadosDb = $dadosDb->get();
                return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
                break;
            default:
                $dadosDb = BensMoveisModel::orderBy('Descricao');
                $dadosDb->select('IdentificacaoBem', 'Descricao', 'ValorAquisicao');
                $dadosDb->where('IdentificacaoBem', '=', $Patrimonio);
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Número Patrimonio', 'Descrição', 'Valor'];
                array_push($breadcrumbNavegacao, [
                'Filtro' => route('MontaBensMoveis')]);
                // TipoConsulta
                array_push($breadcrumbNavegacao, [
                $Patrimonio => '#']);
                return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
                break;
        }
        return View('patrimonio.BensMoveis.BensMoveisTabela');
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
