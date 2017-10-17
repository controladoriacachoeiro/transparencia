<?php

namespace App\Http\Controllers\Almoxarifado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Almoxarifado\AlmoxarifadoModel;
use App\Auxiliar as Auxiliar;

class AlmoxarifadoController extends Controller
{
    
    public function montarFiltroAlmoxarifado()
    {
    
        $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
        $dadosDb->select('NomeAlmoxarifado');
        $dadosDb->distinct('NomeAlmoxarifado');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->NomeAlmoxarifado);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

                                
        return View('patrimonio.Almoxarifado.filtroAlmoxarifado', compact('dadosDb'));
    }

    public function filtrar(Request $request)
    {
        
        $parametros = [
            'consulta' =>$request->slcAlmoxarifado
        ];
        
        $parametros = Auxiliar::ajusteArrayUrl($parametros);
        return redirect()->route('filtroAlmoxarifado2', $parametros);
    }

    public function FiltrarAlmoxarifado($orgao)
    {

        $orgao=Auxiliar::desajusteUrl($orgao);
        $dadosDb=[];
        $breadcrumbNavegacao=[];

        switch ($orgao) {
            case 'todos':
                $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
                $dadosDb->selectRaw('NomeAlmoxarifado, sum(ValorAquisicao) as ValorAquisicao');
                $colunaDados = [ 'Almoxarifado','Valor' ];
                $dadosDb->groupBy('NomeAlmoxarifado');
                $dadosDb = $dadosDb->get();
                // Filtro
                array_push($breadcrumbNavegacao, [
                'Filtro' => route('filtroAlmoxarifado')]);
                // TipoConsulta
                array_push($breadcrumbNavegacao, [
                $orgao => '#']);
                return View('patrimonio.Almoxarifado.tabelaPorAlmoxarifado', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
                break;
            default:
                $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
                $dadosDb->select('EstoqueID', 'NomeMaterial', 'ValorAquisicao');
                $dadosDb->where('NomeAlmoxarifado', '=', $orgao);
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Material', 'Valor'];
                // Filtro
                array_push($breadcrumbNavegacao, [
                'Filtro' => route('filtroAlmoxarifado')]);
                // TipoConsulta
                array_push($breadcrumbNavegacao, [
                'almoxarifado'=> '/patrimonios/almoxarifado/porAlmoxarifado/todos']);
                array_push($breadcrumbNavegacao, [
                $orgao => '#']);
                //$breadcrumbNavegacao = '';
                return View('patrimonio.Almoxarifado.tabelaPorAlmoxarifado', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
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
       public function ShowAlmoxarifado()
    {
        $ProdutoID =  isset($_GET['ProdutoID']) ? $_GET['ProdutoID'] : 'null';
        
        $dadosDb = AlmoxarifadoModel::orderBy('EstoqueID');
        $dadosDb->select('NomeAlmoxarifado','OrgaoLocalizacao', 'NomeGrupo', 'NomeMaterial', 'Especificacao','ValorAquisicao','Quantidade');
        $dadosDb->where('EstoqueID', '=', $ProdutoID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
}
