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
        $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
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
        $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
        $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
        return redirect()->route('BensAdquiridosOrgao',['orgao' => $request->slcOrgao,
                                                        'datainicio' => $request->datetimepickerDataInicio, 
                                                        'datafim' => $request->datetimepickerDataFim]);
    }

    public function FiltrarProdutosAdquiridos($orgao,$datainicio,$datafim)
    {
        $breadcrumbNavegacao=[];
        switch ($orgao) {
            case 'Todos':
                $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
                $dadosDb->selectRaw('OrgaoAdquirente, sum( PrecoUnitario * QuantidadeAdquirida ) AS ValorTotal');
                $dadosDb->whereBetween('DataAquisicao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('OrgaoAdquirente');
                $dadosDb = $dadosDb->get();
                $colunaDados = [ 'Órgão','Valor' ];

                $nivel=1;
                $Navegacao = array(            
                array('url' => '/licitacoescontratos/bensadquiridos/orgao' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $orgao)
                );
                break;
            default:
                $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
                $dadosDb->selectRaw('ProdutoID,IdentificacaoProduto,sum(QuantidadeAdquirida)as QuantidadeAdquirida,OrgaoAdquirente');
                $dadosDb->where('OrgaoAdquirente', '=', $orgao);
                $dadosDb->whereBetween('DataAquisicao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);                
                $dadosDb->groupBy('IdentificacaoProduto');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Produto','Quantidade'];

                $nivel=2;
                $Navegacao = array(            
                array('url' => '/licitacoescontratos/bensadquiridos/orgao' ,'Descricao' => 'Filtro'),
                array('url' => route('BensAdquiridosOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'Todos']),'Descricao' => 'Órgãos'),
                array('url' => '#' ,'Descricao' => $orgao)
                );
                break;
        }        
        return View('licitacoescontratos.ProdutosAdquiridos.tabelaProdutosPorOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
    }

    public function FiltrarProduto($orgao,$datainicio,$datafim,$produto)
    {
        $produto=Auxiliar::desajusteUrl($produto);
        $breadcrumbNavegacao=[];
        $dadosDb = ProdutosAdquiridosModel::orderBy('OrgaoAdquirente');
        $dadosDb->select('ProdutoID','DataAquisicao','IdentificacaoProduto','PrecoUnitario','QuantidadeAdquirida');
        $dadosDb->whereBetween('DataAquisicao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
        $dadosDb->where('OrgaoAdquirente','=',$orgao);
        $dadosDb->where('IdentificacaoProduto','=',$produto);
        // $dadosDb->groupBy('IdentificacaoProduto');
        // $dadosDb->groupBy('DataAquisicao');
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Data Aquisição','Produto','Preço Unidade','Quantidade' ];
        
        $nivel=3;
        $Navegacao = array(            
            array('url' => '/licitacoescontratos/bensadquiridos/orgao' ,'Descricao' => 'Filtro'),
            array('url' => route('BensAdquiridosOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'Todos']),'Descricao' => 'Órgãos'),
            array('url' => route('BensAdquiridosOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
            array('url' => '#','Descricao' => $produto),
        );

        return View('licitacoescontratos.ProdutosAdquiridos.tabelaProdutosPorOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
    }

    //GET
    public function ShowBemAdquirido()
    {
        $ProdutoID =  isset($_GET['BemID']) ? $_GET['BemID'] : 'null';
        
        $dadosDb = ProdutosAdquiridosModel::orderBy('ProdutoID');
        $dadosDb->where('ProdutoID', '=', $ProdutoID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
}
