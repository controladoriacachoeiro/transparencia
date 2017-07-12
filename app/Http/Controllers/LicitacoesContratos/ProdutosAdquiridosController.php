<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdutoAdquirido\ProdutosAdquiridosModel;
use App\Auxiliar as Auxiliar;

class ProdutosAdquiridosController extends Controller
{
    
    public function montarFiltroProdutosAdquiridos()
    {
        $dadosDb = ProdutosAdquiridosModel::orderBy('ProdutoID');
        $dadosDb->select('OrgaoAdquirente');
        $dadosDb->distinct('OrgaoAdquirente');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->OrgaoAdquirente);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        return View('LicitacoesContratos/ProdutosAdquiridos.filtroProdutosAdquiridos', compact('dadosDb'));
    }

    public function filtrar(Request $request)
    {
        $parametros = [
            'consulta' =>$request->slcOrgao
        ];
        
        $parametros = Auxiliar::ajusteArrayUrl($parametros);
        return redirect()->route('filtrarOrgaoAdquirido', $parametros);
    }

    public function FiltrarProdutosAdquiridos($orgao)
    {
        $orgao=Auxiliar::desajusteUrl($orgao);
        $dadosDb=[];
        $breadcrumbNavegacao=[];

        switch ($orgao) {
            case 'todos':
                $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
                $dadosDb->selectRaw('OrgaoAdquirente, sum( PrecoUnitario * QuantidadeAdquirida ) AS ValorTotal');
                $colunaDados = [ 'Orgão','Valor' ];
                $dadosDb->groupBy('OrgaoAdquirente');
                $dadosDb = $dadosDb->get();
                // Filtro
                array_push($breadcrumbNavegacao, [
                'Filtro' => route('filtroOrgaoAdquirido')]);
                // TipoConsulta
                array_push($breadcrumbNavegacao, [
                $orgao => '#']);
                return View('LicitacoesContratos/ProdutosAdquiridos.tabelaProdutosPorOrgao', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
                break;
            default:
                $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
                $dadosDb->select('ProdutoID','IdentificacaoProduto', 'PrecoUnitario', 'QuantidadeAdquirida');
                $dadosDb->where('OrgaoAdquirente', '=', $orgao);
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Produto', 'Valor Unidade','Quantidade'];
                // Filtro
                array_push($breadcrumbNavegacao, [
                'Filtro' => route('filtroOrgaoAdquirido')]);
                // TipoConsulta
                array_push($breadcrumbNavegacao, [
                'todos'=> '/licitacoescontratos/bensadquiridos/todos']);
                array_push($breadcrumbNavegacao, [
                $orgao => '#']);
                //$breadcrumbNavegacao = '';
                return View('LicitacoesContratos/ProdutosAdquiridos.tabelaProdutosPorOrgao', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
                break;
        }
        return View('patrimonio.BensMoveis.BensMoveisTabela');
    }

        //GET
    public function ShowBemAdquirido()
    {
        $ProdutoID =  isset($_GET['BemID']) ? $_GET['BemID'] : 'null';
        
        $dadosDb = ProdutosAdquiridosModel::orderBy('ProdutoID');
        $dadosDb->select('DataAquisicao','OrgaoAdquirente', 'CNPJFornecedor', 'NomeFornecedor', 'IdentificacaoProduto','PrecoUnitario','UnidadeMedida','QuantidadeAdquirida');
        $dadosDb->where('ProdutoID', '=', $ProdutoID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
}
