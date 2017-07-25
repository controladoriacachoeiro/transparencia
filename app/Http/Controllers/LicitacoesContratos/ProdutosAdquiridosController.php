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

        return View('licitacoescontratos.ProdutosAdquiridos.filtroProdutosAdquiridos', compact('dadosDb'));
    }

    public function Filtrar(Request $request)
    {
        // $parametros = [
        //     'consulta' =>$request->slcOrgao
        // ];
        
        // $parametros = Auxiliar::ajusteArrayUrl($parametros);
        // dd($paramentros);
        return redirect()->route('BensAdquiridosOrgao', ['orgao' => $request->slcOrgao]);
    }

    public function FiltrarProdutosAdquiridos($orgao)
    {
        // $orgao = Auxiliar::desajusteUrl($orgao);
        // $dadosDb=[];
        $breadcrumbNavegacao=[];

        switch ($orgao) {
            case 'Todos':
                $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
                $dadosDb->selectRaw('OrgaoAdquirente, sum( PrecoUnitario * QuantidadeAdquirida ) AS ValorTotal');
                $colunaDados = [ 'Orgão','Valor' ];
                $dadosDb->groupBy('OrgaoAdquirente');
                $dadosDb = $dadosDb->get();

                $Navegacao = array(            
                array('url' => '/licitacoescontratos/bensadquiridos/orgao' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $orgao)
                );

                return View('licitacoescontratos.ProdutosAdquiridos.tabelaProdutosPorOrgao', compact('dadosDb', 'colunaDados', 'Navegacao'));

                break;
            default:
                $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
                $dadosDb->select('ProdutoID','IdentificacaoProduto', 'PrecoUnitario', 'QuantidadeAdquirida');
                $dadosDb->where('OrgaoAdquirente', '=', $orgao);
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Produto', 'Valor Unidade','Quantidade'];

                $Navegacao = array(            
                array('url' => '/licitacoescontratos/bensadquiridos/orgao' ,'Descricao' => 'Filtro'),
                array('url' => 'http://localhost/licitacoescontratos/bensadquiridos/orgao/Todos' ,'Descricao' =>'Todos'),
                array('url' => '#' ,'Descricao' => $orgao)
                );
                                
                return View('licitacoescontratos.ProdutosAdquiridos.tabelaProdutosPorOrgao', compact('dadosDb', 'colunaDados', 'Navegacao'));

                break;
        }        
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
