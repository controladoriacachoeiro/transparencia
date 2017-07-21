<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ReceitaModel;
use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;

class DownloadReceitasController extends Controller
{
    /* Está sendo usada a biblioteca League/Csv para criar o arquivo csv sem instancia-lo na memória do servidor
      a documentação da biblioteca está disponivel em http://csv.thephpleague.com/8.0/ 
      É necessario a instalação da dependencia pelo composer*/

    public function arrecadada(Request $request)
    {
        $request->datetimepickerDataInicio1 = str_replace("/", "-", $request->datetimepickerDataInicio1);
        $request->datetimepickerDataFim1 = str_replace("/", "-", $request->datetimepickerDataFim1);
        return redirect()->route('downloadArrecadada',
                                    ['datainicio' => $request->datetimepickerDataInicio1,
                                     'datafim' => $request->datetimepickerDataFim1]);
    }

    public function downloadArrecadada($dataInicio, $dataFim)
    {

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ReceitaModel::orderBy('DataArrecadacao');
        $dadosDb->select('DataArrecadacao', 'UnidadeGestora', 'AnoExercicio', 'CategoriaEconomica', 'Origem', 'Especie', 'Rubrica',
                           'Alinea', 'Subalinea', 'ValorArrecadado');
         $dadosDb->whereBetween('DataArrecadacao', [$dataInicio, $dataFim]);
         $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Data Arrecadação','Órgão','Ano Exercício','Categoria Econômica','Origem','Espécie',
                                'Rubrica','Alínea','Subalínea']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Arrecadada'.$dataInicio.'-'.$dataFim.'.csv');   
    }


}
