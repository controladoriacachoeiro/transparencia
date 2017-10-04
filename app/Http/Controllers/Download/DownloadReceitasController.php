<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ReceitaModel;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Receitas\ISSModel;
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
        // return redirect()->route('downloadArrecadada',
        //                             ['datainicio' => $request->datetimepickerDataInicio1,
        //                              'datafim' => $request->datetimepickerDataFim1]);
        
        
        if ($request->datetimepickerDataFim1<$request->datetimepickerDataInicio1)
        {
            return redirect()->back()->with('message1', 'a data fnal não pode ser menor que a data incial');
        }
        else
        {
            session()->flush();
            return redirect()->route('downloadArrecadada',
            ['datainicio' => $request->datetimepickerDataInicio1,
             'datafim' => $request->datetimepickerDataFim1]);
        }
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

    public function iss(Request $request)
    {
        $request->datetimepickerDataInicio2 = str_replace("/", "-", $request->datetimepickerDataInicio2);
        $request->datetimepickerDataFim2 = str_replace("/", "-", $request->datetimepickerDataFim2);
        return redirect()->route('downloadIss',
                                    ['datainicio' => $request->datetimepickerDataInicio2,
                                     'datafim' => $request->datetimepickerDataFim2]);
    }

    public function downloadIss($dataInicio, $dataFim)
    {

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ISSModel::orderBy('DataNFSe');
        $dadosDb->select('DataNFSe', 'CNAEContribuinte', 'CNAETomador', 'CodigoServico', 'DescricaoServico', 'ValorServico', 'Quantidade',
                        'Desconto', 'Deducao', 'BaseCalculo','Aliquota','ValorIss','ValorNota','Retencoes','CategoriaEconomica','Origem',
                        'Especie','Rubrica','Alinea','Subalinea','UnidadeGestora');
         $dadosDb->whereBetween('DataNFSe', [$dataInicio, $dataFim]);
         $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Data NFSe', 'CNAE Contribuinte', 'CNAE Tomador', 'Codigo Servico', 'Descricao Servico', 'Valor Servico', 'Quantidade',
        'Desconto', 'Deduçao', 'Base Calculo','Aliquota','Valor Iss','Valor Nota','Retencoes','Categoria Economica','Origem',
        'Especie','Rubrica','Alinea','Subalinea','Unidade Gestora']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Lançada '.$dataInicio.'-'.$dataFim.'.csv');   
    }


}
