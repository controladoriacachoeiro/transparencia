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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb);
        
        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb);            

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb);        

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb); 

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb);

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb);

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb);

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
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

        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        $dadosDb = $this->CamuflarCPF($dadosDb);

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }

    public function CamuflarCPF($dadosDb){
        //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
        for ($i = 0; $i < count($dadosDb); $i++){
            if (strlen($dadosDb[$i]->CPF_CNPJ) == 11){
                $dadosDb[$i]->CPF_CNPJ = '***'.'.'.substr($dadosDb[$i]->CPF_CNPJ,3,3).'.'.substr($dadosDb[$i]->CPF_CNPJ,6,3).'-**';
            }
        }
        return $dadosDb;
    }
}