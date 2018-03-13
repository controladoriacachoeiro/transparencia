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
        
        $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio1 ));
        $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim1 ));
        

        if ($dataFim<$dataInicio)
        {
            return redirect()->back()->with('arrecadada', 'A data final de download não pode ser menor que a data inicial');
        }
        else
        {
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
        $dadosDb->select('AnoExercicio', 'DataArrecadacao', 'UnidadeGestora', 'CategoriaEconomica', 'Origem', 'Especie', 'Rubrica',
                           'Alinea', 'Subalinea', 'ValorArrecadado');
        $dadosDb->whereBetween('DataArrecadacao', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get(); 
        if($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemArrecadada', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Ano Exercício','Data Arrecadação','Unidade Gestora','Categoria Econômica','Origem','Espécie',
                                    'Rúbrica','Alínea','Subalínea','Valor Arrecadado']);
    
            foreach ($dadosDb as $data) {
                $data->DataArrecadacao = $this->ajeitaData($data->DataArrecadacao);
                $csv->insertOne($data->toArray());
            }
            $csv->output('Arrecadada '.$dataInicio.'-'.$dataFim.'.csv');
        }
    }

    public function iss(Request $request)
    {
        $request->datetimepickerDataInicio2 = str_replace("/", "-", $request->datetimepickerDataInicio2);
        $request->datetimepickerDataFim2 = str_replace("/", "-", $request->datetimepickerDataFim2);
        // return redirect()->route('downloadIss',
        //                             ['datainicio' => $request->datetimepickerDataInicio2,
        //                              'datafim' => $request->datetimepickerDataFim2]);
                                     
        $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio2 ));
        $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim2 ));
        

        if ($dataFim<$dataInicio)
        {
            return redirect()->back()->with('iss', 'A data final de download não pode ser menor que a data inicial');
        }
        else
        {
            return redirect()->route('downloadIss',
            ['datainicio' => $request->datetimepickerDataInicio2,
             'datafim' => $request->datetimepickerDataFim2]);
        }
    }

    public function downloadIss($dataInicio, $dataFim)
    {

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ISSModel::orderBy('DataNFSe');
        $dadosDb->select('DataNFSe', 'CNAEContribuinte', 'CNAETomador', 'CodigoServico', 'DescricaoServico', 'ValorServico', 'Quantidade',
                        'Desconto', 'Deducao', 'BaseCalculo','Aliquota','ValorISS','ValorNota','Retencoes','CategoriaEconomica','Origem',
                        'Especie','Rubrica','Alinea','Subalinea','UnidadeGestora');
        $dadosDb->whereBetween('DataNFSe', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemLancada', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Data NFSe', 'CNAE Contribuinte', 'CNAE Tomador', 'Código Serviço', 'Descrição Serviço', 'Valor Serviço', 'Quantidade',
            'Desconto', 'Dedução', 'Base Cálculo','Alíquota','Valor ISS','Valor Nota','Retenções','Categoria Econômica','Origem',
            'Espécie','Rúbrica','Alínea','Subalínea','Unidade Gestora']);
    
            foreach ($dadosDb as $data) {
                $csv->insertOne($data->toArray());
            }
            $csv->output('Lançada '.$dataInicio.'-'.$dataFim.'.csv');   
        }
    }

    public function ajeitaData($data){
        
        $elemento = explode("-",$data);
        $ano = $elemento[0];
        $mes = $elemento[1];
        $dia = $elemento[2];
        $resultado = $dia . '/' . $mes . '/' . $ano;

        return $resultado;
    }

}
