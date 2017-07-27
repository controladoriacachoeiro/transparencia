<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\EmpenhoModel;
use App\Models\Despesas\LiquidacaoModel;
use App\Models\Despesas\PagamentoModel;
use App\Models\Despesas\PagamentoRestoModel;

class ApiDespesasController extends Controller
{

    public function empenhos($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
        // $dadosDb->select('NotaEmpenho', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataEmpenho', 'ModalidadeLicitatoria', 'ProdutoServico', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorEmpenho');
        $dadosDb->whereBetween('DataEmpenho', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function notaEmpenho($numeroNota,$ano)
    {
        $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
        // $dadosDb->select('NotaEmpenho', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataEmpenho', 'ModalidadeLicitatoria', 'ProdutoServico', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorEmpenho');
        $dadosDb->whereYear('DataEmpenho', $ano);    
        $dadosDb->where('NotaEmpenho', '=', $numeroNota);   
        $dadosDb = $dadosDb->get();            

        return Json_encode($dadosDb);
    }

    public function liquidacoes($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
        // $dadosDb->select('NotaLiquidacao', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataLiquidacao', 'ModalidadeLicitatoria', 'ProdutoServico','NotaEmpenho', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorLiquidado');
        $dadosDb->whereBetween('DataLiquidacao', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }

    public function notaLiquidacao($numeroNota,$ano)
    {
        $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
        // $dadosDb->select('NotaLiquidacao', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataLiquidacao', 'ModalidadeLicitatoria', 'ProdutoServico','NotaEmpenho', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorLiquidado');
        $dadosDb->whereYear('DataLiquidacao', $ano);                             
        $dadosDb->where('NotaLiquidacao', '=', $numeroNota);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function pagamentos($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = PagamentoModel::orderBy('DataPagamento');
        // $dadosDb->select('NotaPagamento', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataPagamento', 'ModalidadeLicitatoria', 'ProdutoServico','NotaEmpenho','NotaLiquidacao', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorPago');
        $dadosDb->whereBetween('DataPagamento', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function notaPagamento($numeroNota,$ano)
    {
        $dadosDb = PagamentoModel::orderBy('DataPagamento');
        // $dadosDb->select('NotaPagamento', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataPagamento', 'ModalidadeLicitatoria', 'ProdutoServico','NotaEmpenho','NotaLiquidacao', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorPago');
        $dadosDb->whereYear('DataPagamento', $ano);                   
        $dadosDb->where('NotaPagamento', '=', $numeroNota);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }


    public function restospagar($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
        // $dadosDb->select('NotaPagamento', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataPagamento', 'ModalidadeLicitatoria', 'ProdutoServico','NotaEmpenho','NotaLiquidacao', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorPago');
        $dadosDb->whereBetween('DataPagamento', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }

    public function notaRestoPagar($numeroNota,$ano)
    {
        $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
        // $dadosDb->select('NotaPagamento', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
        //                    'AnoExercicio', 'DataPagamento', 'ModalidadeLicitatoria', 'ProdutoServico','NotaEmpenho','NotaLiquidacao', 'Beneficiario', 'CPF_CNPJ',
        //                    'ValorPago');
        $dadosDb->whereYear('DataPagamento', $ano);    
        $dadosDb->where('NotaPagamento', '=', $numeroNota);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }
}