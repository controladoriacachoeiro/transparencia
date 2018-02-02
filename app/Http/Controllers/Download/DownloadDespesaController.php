<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\EmpenhoModel;
use App\Models\Despesas\LiquidacaoModel;
use App\Models\Despesas\PagamentoModel;
use App\Models\Despesas\PagamentoRestoModel;

use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;

class DownloadDespesaController extends Controller
{
    /* Está sendo usada a biblioteca League/Csv para criar o arquivo csv sem instancia-lo na memória do servidor
      a documentação da biblioteca está disponivel em http://csv.thephpleague.com/8.0/ 
      É necessario a instalação da dependencia pelo composer*/

    public function empenho(Request $request)
    {
        $request->datetimepickerDataInicio1 = str_replace("/", "-", $request->datetimepickerDataInicio1);
        $request->datetimepickerDataFim1 = str_replace("/", "-", $request->datetimepickerDataFim1);
        // return redirect()->route('downloadEmpenho',
        //                             ['datainicio' => $request->datetimepickerDataInicio1,
        //                              'datafim' => $request->datetimepickerDataFim1]);
        
        $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio1 ));
        $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim1 ));
        

        if ($dataFim<$dataInicio)
        {
            return redirect()->back()->with('empenho', 'A data final de download não pode ser menor que a data inicial');
        }
        else
        {
            return redirect()->route('downloadEmpenho',
            ['datainicio' => $request->datetimepickerDataInicio1,
             'datafim' => $request->datetimepickerDataFim1]);
        }
    }

    public function downloadEmpenho($dataInicio, $dataFim)
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

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['ID','Ano Exercício','Orgão','Processo','Produto/Serviço','Credor Nome','CPF/CNPJ','Modalidade Licitatória',
                                'Categoria Econômica','Natureza','Modalidade Aplicação','Descrição','Programa','Ação','Subtítulo',
                                'Fonte Recursos','Função','Subfunção','Nota','Data','Valor']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Empenho'.$dataInicio.'-'.$dataFim.'.csv');   
    }

    public function liquidacao(Request $request)
    {
        $request->datetimepickerDataInicio2 = str_replace("/", "-", $request->datetimepickerDataInicio2);
        $request->datetimepickerDataFim2 = str_replace("/", "-", $request->datetimepickerDataFim2);
        // return redirect()->route('downloadLiquidacao',
        //                             ['datainicio' => $request->datetimepickerDataInicio2,
        //                              'datafim' => $request->datetimepickerDataFim2]);

        $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio2 ));
        $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim2 ));
        

        if ($dataFim<$dataInicio)
        {
            return redirect()->back()->with('liquidacao', 'A data final de download não pode ser menor que a data inicial');
        }
        else
        {
            return redirect()->route('downloadLiquidacao',
            ['datainicio' => $request->datetimepickerDataInicio2,
             'datafim' => $request->datetimepickerDataFim2]);

        }                                
    }

    public function downloadLiquidacao($dataInicio, $dataFim)
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

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['ID','Ano Exercício','Orgão','Processo','Produto/Serviço','Credor Nome','CPF/CNPJ','Modalidade Licitatória',
                                'Categoria Econômica','Natureza','Modalidade Aplicação','Descrição','Programa','Ação','Subtítulo',
                                'Fonte Recursos','Função','Subfunção','Nota Empenho','Nota Liquidação','Data','Valor']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Liquidacao'.$dataInicio.'-'.$dataFim.'.csv');  
    }

    public function pagamento(Request $request)
    {
        $request->datetimepickerDataInicio3 = str_replace("/", "-", $request->datetimepickerDataInicio3);
        $request->datetimepickerDataFim3 = str_replace("/", "-", $request->datetimepickerDataFim3);
        // return redirect()->route('downloadPagamento',
        //                             ['datainicio' => $request->datetimepickerDataInicio3,
        //                              'datafim' => $request->datetimepickerDataFim3]);

        $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio3 ));
        $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim3 ));
        

        if ($dataFim<$dataInicio)
        {
            return redirect()->back()->with('pagamento', 'A data final de download não pode ser menor que a data inicial');
        }
        else
        {
            return redirect()->route('downloadPagamento',
            ['datainicio' => $request->datetimepickerDataInicio3,
             'datafim' => $request->datetimepickerDataFim3]);
        }
    }

    public function downloadPagamento($dataInicio, $dataFim)
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

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['ID','Ano Exercício','Orgão','Processo','Produto/Serviço','Credor Nome','CPF/CNPJ','Modalidade Licitatória',
                                'Categoria Econômica','Natureza','Modalidade Aplicação','Descrição','Programa','Ação','Subtítulo',
                                'Fonte Recursos','Função','Subfunção','Nota Empenho','Nota Liquidação','Nota Pagamento','Ordem Bancária','Data','Valor']);
        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Pagamento'.$dataInicio.'-'.$dataFim.'.csv');  
    }

    public function restoPagar(Request $request)
    {
        $request->datetimepickerDataInicio4 = str_replace("/", "-", $request->datetimepickerDataInicio4);
        $request->datetimepickerDataFim4 = str_replace("/", "-", $request->datetimepickerDataFim4);
        // return redirect()->route('downloadRestoPagar',
        //                             ['datainicio' => $request->datetimepickerDataInicio4,
        //                              'datafim' => $request->datetimepickerDataFim4]);

        $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio4 ));
        $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim4 ));
        

        if ($dataFim<$dataInicio)
        {
            return redirect()->back()->with('resto', 'A data final de download não pode ser menor que a data inicial');
        }
        else
        {
            return redirect()->route('downloadRestoPagar',
            ['datainicio' => $request->datetimepickerDataInicio4,
             'datafim' => $request->datetimepickerDataFim4]);

        }  
    }

    public function downloadRestoPagar($dataInicio, $dataFim)
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

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['ID','Ano Exercício','Orgão','Processo','Produto/Serviço','Credor Nome','CPF/CNPJ','Modalidade Licitatória',
                                'Categoria Econômica','Natureza','Modalidade Aplicação','Descrição','Programa','Ação','Subtítulo',
                                'Fonte Recursos','Função','Subfunção','Nota Empenho','Nota Liquidação','Nota Pagamento','Ordem Bancária','Data','Valor']);
        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('RestoPagar'.$dataInicio.'-'.$dataFim.'.csv');  
    }

    //Camuflar CPF do fornecedor se o CPF_CPJ tiver 11 caracteres
    public function CamuflarCPF($dadosDb){    
        for ($i = 0; $i < count($dadosDb); $i++){
            if (strlen($dadosDb[$i]->CPF_CNPJ) == 11){
                $dadosDb[$i]->CPF_CNPJ = '***'.'.'.substr($dadosDb[$i]->CPF_CNPJ,3,3).'.'.substr($dadosDb[$i]->CPF_CNPJ,6,3).'-**';
            }
        }
        return $dadosDb;
    }

}
