<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convenios\ConveniosCedidosModel;
use App\Models\Convenios\ConveniosRecebidosModel;
use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;

class DownloadConveniosController extends Controller
{
    /* Está sendo usada a biblioteca League/Csv para criar o arquivo csv sem instancia-lo na memória do servidor
      a documentação da biblioteca está disponivel em http://csv.thephpleague.com/8.0/ 
      É necessario a instalação da dependencia pelo composer*/

    public function recebidos(Request $request)
    {
        return redirect()->route('downloadRecebidos');
    }

    public function downloadRecebidos()
    {

        $dadosDb = ConveniosRecebidosModel::orderBy('DataCelebracao','desc');
        $dadosDb->select('DataCelebracao', 'PrazoVigencia', 'Objeto','ValorAReceber','ValorContrapartida');
        $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Data Celebração','Prazo Vigência','Objeto','Valor a Receber','Valor de Contrapartida']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Convenio Recebido'.'.csv');   
    }

    public function cedidos(Request $request)
    {
        return redirect()->route('downloadCedidos');
    }

    public function downloadCedidos()
    {
        $dadosDb = ConveniosCedidosModel::orderBy('DataCelebracao','desc');
        $dadosDb->select('OrgaoConcedente', 'CNPJBeneficiario', 'NomeBeneficiario', 'DataCelebracao','PrazoVigencia','Objeto','ValorACeder','ValorContrapartida');
        $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Órgão','CNPJ','Beneficiário','Data Celebração','Prazao',
                        'Objeto','Valor Cedido','Valor Contrapartida']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Convenio Cedido'.'.csv');   
    }
}
