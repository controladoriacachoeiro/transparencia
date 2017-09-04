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
                                    ['nome' => $request->txtNome]);
        
    }

    public function downloadServidor($nome)
    {

        $dadosDb = ServidorModel::orderBy('Nome');
        if ($nome != 'todos'){                                                                                                    
            $dadosDb->where('Nome', 'like', '%' . $nome . '%');                        
        }
        $dadosDb = $dadosDb->get();
        $dadosDb = Auxiliar::ModificarCPF($dadosDb);

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['ID','Matricula','CPF','Nome','Cargo','Funcao','Tipo Vinculo','Data Exercício','Data Demissão',
                        'Situação','Orgão','Carga Horária','Referência','Sigla','Referência Sigla']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Servidor'.'.csv');   
    }

    public function folhapagamento(Request $request)
    {
        return redirect()->route('downloadFolhaPagamento',
                                    ['mes' => $request->txtMes,
                                     'ano' => $request->txtAno]);
    }

    public function downloadFolhaPagamento($mes,$ano)
    {
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->where('MesPagamento', '=', $mes);
        $dadosDb->where('AnoPagamento', '=', $ano);
        $dadosDb = $dadosDb->get();
        $eventos = [612, 617, 618, 630, 640, 631, 632, 516, 560, 511];
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
        $csv->insertOne(['ID','Matrícula','Nome','CPF','Mês','Ano','Evento','Descricao Envento','Tipo Evento','Quantidade','Valor']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Folha Pagamento'.'.csv');   
    }
}
