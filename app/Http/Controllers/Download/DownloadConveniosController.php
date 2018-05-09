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

        if ($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemRecebidos', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Data Celebração','Prazo Vigência','Objeto','Valor a Receber','Valor de Contrapartida']);
    
            foreach ($dadosDb as $data) {
                $data->DataCelebracao = $this->ajeitaData($data->DataCelebracao);
                $data->PrazoVigencia = $this->ajeitaData($data->PrazoVigencia);
                $csv->insertOne($data->toArray());
            }
            $csv->output('Convênios Recebidos'.'.csv');   
        }
    }

    public function cedidos(Request $request)
    {
        return redirect()->route('downloadCedidos');
    }

    public function downloadCedidos()
    {
        $dadosDb = ConveniosCedidosModel::orderBy('DataAssinatura','desc');
        $dadosDb->select('OrgaoConcedente', 'CNPJBeneficiario', 'NomeBeneficiario', 'NumeroConvenio', 'AnoConvenio', 'VigenciaInicial', 'VigenciaFinal', 'Objeto', 'ValorConvenio', 'ValorContrapartida', 'DataAssinatura', 'NumeroProcesso', 'AnoProcesso', 'Status', 'CategoriaConvenio');
        $dadosDb = $dadosDb->get();

        if ($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemCedidos', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Órgão Concedente', 'CNPJ do Beneficiário', 'Nome do Beneficiário', 'Número do Convênio', 'Ano do Convênio', 'Vigência Inicial', 'Vigência Final', 'Objeto', 'Valor do Convênio', 'Valor de Contrapartida', 'Data da Assinatura', 'Número do Processo', 'Ano do Processo', 'Status', 'Categoria do Convênio']);
    
            foreach ($dadosDb as $data) {
                if($data->DataAssinatura != null){
                    $data->DataAssinatura = $this->ajeitaData($data->DataAssinatura);
                }

                if($data->VigenciaInicial != null){
                    $data->VigenciaInicial = $this->ajeitaData($data->VigenciaInicial);
                }

                if($data->VigenciaFinal != null){
                    $data->VigenciaFinal = $this->ajeitaData($data->VigenciaFinal);
                }
                
                $csv->insertOne($data->toArray());
            }
            $csv->output('Convênios Cedidos'.'.csv');   
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
