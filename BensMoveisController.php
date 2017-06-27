<?php

namespace App\Http\Controllers\Patrimonio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Patrimonio\BensMoveisModel;
use App\Auxiliar as Auxiliar;

class BensMoveisController extends Controller
{
    
    public function montaFiltroOrgao()
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
        $consulta='patrimonio';
        $subConsulta='bensmoveis';
        $tipoConsulta='orgaos';
                                
        return View('patrimonio.BensMoveis.FiltroBensMoveisOrgao', compact('dadosDb', 'consulta', 'subConsulta', 'tipoConsulta'));
    }

    public function filtrar(Request $request)
    {
        
        $parametros = [
            'consulta' =>$request->selectTipoConsulta
        ];
        
        $parametros = Auxiliar::ajusteArrayUrl($parametros);
        return redirect()->route('filtroBensMoveis', $parametros);
    }

    public function orgao($orgao)
    {

        $orgao=Auxiliar::desajusteUrl($orgao);
        $dadosDb=[];
        $breadcrumbNavegacao=[];

        $link = route('filtroBensMoveis', [
                        'consulta' => $orgao]);              
        // Filtro
        array_push($breadcrumbNavegacao, [
            'Filtro' => route('MontaBensMoveis')]);
        // TipoConsulta
        array_push($breadcrumbNavegacao, [
            $orgao => '#']);


        switch ($orgao) {
            case 'todos':
                $dadosDb = BensMoveisModel::orderBy('Descricao');
                $dadosDb->selectRaw('OrgaoLocalizacao, sum(ValorAquisicao) as ValorAquisicao');
                $colunaDados = [ 'Orgão','Valor' ];
                $dadosDb->groupBy('OrgaoLocalizacao');
                $dadosDb = $dadosDb->get();
                return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
                break;
            default:
                $dadosDb = BensMoveisModel::orderBy('Descricao');
                $dadosDb->select('IdentificacaoBem', 'Descricao', 'ValorAquisicao');
                $dadosDb->where('OrgaoLocalizacao', '=', $orgao);
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Número Patrimonio', 'Descrição', 'Valor'];
                //$breadcrumbNavegacao = '';
                return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
                break;
        }
        return View('patrimonio.BensMoveis.BensMoveisTabela');
    }

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
            'Orgão' => route('filtroBensMoveis',['tipoConsulta'=>'todos'])]);
        
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
                $breadcrumbNavegacao = '';
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
