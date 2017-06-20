<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas\EmpenhoModel;
use App\Models\Despesas\LiquidacaoModel;
use App\Models\Despesas\PagamentoModel;
use App\Models\Despesas\PagamentoRestoModel;

class ApiController extends Controller
{

    public function empenhos($dataInicio,$dataFim)
    {
        include (base_path().'/public/functionsphp/FunctionsAux.php');

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
        $dadosDb->whereBetween('DataEmpenho',[$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }

    public function liquidacoes($dataInicio,$dataFim)
    {
        include (base_path().'/public/functionsphp/FunctionsAux.php');

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
        $dadosDb->whereBetween('DataLiquidacao',[$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }

    public function pagamentos($dataInicio,$dataFim)
    {
        include (base_path().'/public/functionsphp/FunctionsAux.php');

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = PagamentoModel::orderBy('DataPagamento');
        $dadosDb->whereBetween('DataPagamento',[$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }

    public function restospagar($dataInicio,$dataFim)
    {
        include (base_path().'/public/functionsphp/FunctionsAux.php');

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
        $dadosDb->whereBetween('DataPagamento',[$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }

    public function notasEmpenho($numeroNota)
    {
        $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
        $dadosDb->where('NotaEmpenho', '=', $numeroNota);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function notasLiquidacao($numeroNota)
    {
        $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
        $dadosDb->where('NotaLiquidacao', '=', $numeroNota);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);

        return Json_encode($dadosDb);
    }

    public function notasPagamento($numeroNota)
    {
        $dadosDb = PagamentoModel::orderBy('DataPagamento');
        $dadosDb->where('NotaPagamento', '=', $numeroNota);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);

        return Json_encode($dadosDb);
    }

    public function notasRestoPagar($numeroNota)
    {
        $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
        $dadosDb->where('NotaPagamento', '=', $numeroNota);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);

        return Json_encode($dadosDb);
    }
}