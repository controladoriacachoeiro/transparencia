<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\ServidorModel;
use App\Models\Pessoal\FolhaPagamentoModel;
use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;
use App\Auxiliar as Auxiliar;

class DownloadPessoalController extends Controller
{
    /* Está sendo usada a biblioteca League/Csv para criar o arquivo csv sem instancia-lo na memória do servidor
      a documentação da biblioteca está disponivel em http://csv.thephpleague.com/8.0/ 
      É necessario a instalação da dependencia pelo composer*/

    public function servidor(Request $request)
    {

        return redirect()->route('downloadServidor',
                                    ['situacao' => $request->selectSituacao]);
        
    }

    public function downloadServidor($situacao){

        $dadosDb = ServidorModel::orderBy('Nome');

        //if ($situacao != 'Todos'){
        $dadosDb->where('Situacao', '=', $situacao);
        $dadosDb->select('Matricula', 'CPF', 'Nome', 'Cargo', 'Funcao', 'TipoVinculo', 'DataExercicio', 'DataDemissao', 'Situacao', 'OrgaoLotacao', 'CargaHoraria', 'Sigla');
        //}
        
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemSituacao', 'Não foram encontrados arquivos para download');
        } else {
            $dadosDb = Auxiliar::ModificarCPF($dadosDb);

            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Matrícula', 'CPF', 'Nome', 'Cargo', 'Função', 'Tipo Vínculo', 'Data Exercício', 'Data Demissão', 
                            'Situação', 'Órgão Lotação', 'Carga Horária', 'Sigla']);
    
            foreach ($dadosDb as $data) {
    
                if($data->DataExercicio != null){
                    $data->DataExercicio = $this->ajeitaData($data->DataExercicio);
                }
    
                if($data->DataDemissao != null){
                    $data->DataDemissao = $this->ajeitaData($data->DataDemissao);
                }
                      
                $csv->insertOne($data->toArray());
            }
            $csv->output('Servidor'.'.csv');   
        }
        
    }

    public function folhapagamento(Request $request)
    {
        return redirect()->route('downloadFolhaPagamento',
                                    ['mes' => $request->txtMes,
                                     'ano' => $request->selectAno]);
    }

    public function downloadFolhaPagamento($mes,$ano)
    {
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->select('Matricula', 'Nome', 'CPF', 'MesPagamento', 'AnoPagamento', 'CodigoEvento', 'DescricaoEvento', 'TipoEvento', 'Quantidade', 'Valor');
        $dadosDb->where('MesPagamento', '=', $mes);
        $dadosDb->where('AnoPagamento', '=', $ano);
        $dadosDb = $dadosDb->get();
        
        if ($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemFolhaPagamento', 'Não foram encontrados arquivos para download');
        } else {
            $eventos = [612, 617, 618, 630, 631, 632, 640, 516, 560, 511, 626, 504, 602, 605, 510, 512, 582, 584, 587, 588, 589, 601, 602, 607, 611, 619, 625, 626, 650, 682];
            $dadosDbAux = [];        
            
            for ($i = 0; $i < count($dadosDb); $i++){
                $aux = false;
                foreach ($eventos as $value){
                    if ($dadosDb[$i]->CodigoEvento == $value){
                        $aux = true;
                        break;
                    }
                }
                if ($aux != true){
                array_push($dadosDbAux, $dadosDb[$i]);
                }
            }
    
            $dadosDb = $dadosDbAux;
            $dadosDb = Auxiliar::ModificarCPF($dadosDb);
            
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Matrícula', 'Nome', 'CPF', 'Mês do Pagamento', 'Ano do Pagamento', 'Código do Evento', 'Descrição do Envento', 'Tipo de Evento', 'Quantidade', 'Valor']);
    
            foreach ($dadosDb as $data) {
                $csv->insertOne($data->toArray());
            }
            $csv->output('Folha Pagamento'.'.csv');
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

    public function CarregaSituacao(){
        $dadosDb = ServidorModel::orderBy('Situacao');
        $dadosDb->select('Situacao');
        $dadosDb->distinct('Situacao');
        $dadosDb = $dadosDb->get();        

        $arrayDataFiltro =[];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro,$valor->Situacao);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;
                                
        return View('dadosAbertos.pessoal',compact('dadosDb'));
    }
}
