<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Pessoal\ServidorModel;
use App\Models\Patrimonio\AlmoxarifadoModel;
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
    public function empenho(Request $request)
    {
        $request->datetimepickerDataInicio1 = str_replace("/", "-", $request->datetimepickerDataInicio1);
        $request->datetimepickerDataFim1 = str_replace("/", "-", $request->datetimepickerDataFim1);

        

        return redirect()->route('downloadEmpenho',
                                    ['datainicio' => $request->datetimepickerDataInicio1,
                                     'datafim' => $request->datetimepickerDataFim1]);
    }

    public function downloadEmpenho($dataInicio, $dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
        $dadosDb->select('NotaEmpenho', 'UnidadeGestora', 'Acao', 'ElemDespesa', 'FonteRecursos', 'Funcao', 'SubFuncao',
                           'AnoExercicio', 'DataEmpenho', 'ModalidadeLicitatoria', 'ProdutoServico', 'Beneficiario', 'CPF_CNPJ',
                           'ValorEmpenho');
         $dadosDb->whereBetween('DataEmpenho', [$dataInicio, $dataFim]);
         $dadosDb = $dadosDb->get();

         $this->createCsv($dadosDb, 'Empenhos');

    }

    private function createCsv(Collection $modelCollection, $tableName)
    {

        $csv = Writer::createFromFileObject(new SplTempFileObject());

    // This creates header columns in the CSV file - probably not needed in some cases.
        $csv->insertOne(Schema::getColumnListing($tableName));

        foreach ($modelCollection as $data) {
            $csv->insertOne($data->toArray());
        }

        $csv->output($tableName . '.csv');
    }
}
