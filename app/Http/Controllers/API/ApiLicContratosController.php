<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\ContratosModel;
use App\Models\LicitacoesContratos\LicitacoesAndamentoModel;
use App\Models\ProdutoAdquirido\ProdutosAdquiridosModel;

class ApiLicContratosController extends Controller
{

    public function andamento($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = LicitacoesAndamentoModel::orderBy('DataPropostas');
        $dadosDb->select('DataPropostas', 'OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'ModalidadeLicitatoria', 'DataPropostas');
        $dadosDb->whereBetween('DataPropostas', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function contratos()
    {
        $dadosDb = ContratosModel::orderBy('DataInicial','desc');
        $dadosDb->select('DataInicial', 'DataFinal', 'NomeContratado', 'CNPJContratado', 'OrgaoContratante',
          'Objeto','ProcessoLicitatorio','ValorContratado');
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function bens($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ProdutosAdquiridosModel::orderBy('DataAquisicao');
        // $dadosDb->select('DataAquisicao','IdentificacaoProduto', 'OrgaoAdquirente', 'NomeFornecedor', 'CNPJFornecedor', 'PrecoUnitario',
        //                  'UnidadeMedida','QuantidadeAdquirida');
        $dadosDb->whereBetween('DataAquisicao', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();
    
        return Json_encode($dadosDb);
    }
}