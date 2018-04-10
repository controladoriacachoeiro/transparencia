<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\ContratosModel;
use App\Models\LicitacoesContratos\LicitacoesModel;
use App\Models\ProdutoAdquirido\ProdutosAdquiridosModel;

class ApiLicContratosController extends Controller
{

    public function licitacoes($status){
        $dadosDb = LicitacoesModel::orderBy('DataPropostas', 'desc');
        $dadosDb->select('DataPropostas', 'ModalidadeLicitatoria', 'NumeroEdital', 'Status', 'NumeroProcesso', 'OrgaoLicitante', 'ObjetoLicitado');
        $dadosDb->where('Status', '=', $status);
        $dadosDb->limit('25');
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }

    public function contratos($status)
    {
        $dadosDb = ContratosModel::orderBy('DataInicial','desc');
        $dadosDb->select('DataInicial', 'DataFinal', 'NomeContratado', 'CPF_CNPJContratado', 'OrgaoContratante',
            'Objeto','NumeroProcesso','ValorContratado');
        $dadosDb->where('Status', '=', $status);
        $dadosDb->limit('25');
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }

    public function bens($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ProdutosAdquiridosModel::orderBy('DataAquisicao');
        $dadosDb->select('DataAquisicao', 'OrgaoAdquirente', 'IdentificacaoProduto', 'NomeFornecedor', 'CNPJFornecedor', 'PrecoUnitario', 'UnidadeMedida', 'QuantidadeAdquirida');
        $dadosDb->whereBetween('DataAquisicao', [$dataInicio, $dataFim]);
        $dadosDb->limit('25');
        $dadosDb = $dadosDb->get();
    
        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }
}