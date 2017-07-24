<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patrimonio\AlmoxarifadoModel;
use App\Models\Patrimonio\BensMoveisModel;
use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;

class DownloadPatrimoniosController extends Controller
{
    /* Está sendo usada a biblioteca League/Csv para criar o arquivo csv sem instancia-lo na memória do servidor
      a documentação da biblioteca está disponivel em http://csv.thephpleague.com/8.0/ 
      É necessario a instalação da dependencia pelo composer*/

    public function almoxarifado(Request $request)
    {
        return redirect()->route('downloadAlmoxarifado');
    }

    public function downloadAlmoxarifado()
    {

        $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
        $dadosDb->selectRaw('NomeMaterial,NomeAlmoxarifado,NomeGrupo,Especificacao,sum(Quantidade)as Quantidade,sum(ValorAquisicao) as ValorAquisicao');
        $dadosDb->where('Quantidade','>','0');
        $dadosDb->where('ValorAquisicao','>','0');
        $dadosDb->groupBy('NomeMaterial');
        $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Item','Almoxarifado localizado','Órgão','Grupo Material','Especificação','Quantidade',
                                'Valor do Item']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Almoxarifado'.'.csv');   
    }

    public function bensMoveis(Request $request)
    {
        return redirect()->route('downloadBensMoveis');
    }

    public function downloadBensMoveis()
    {
        $dadosDb = BensMoveisModel::orderBy('IdentificacaoBem');
        $dadosDb->select('IdentificacaoBem', 'Descricao', 'OrgaoLocalizacao', 'Observacao', 'ValorAquisicao');
        $dadosDb = $dadosDb->get();
        
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Número Patrimônio','Descrição','Órgão','Observação','Valor']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Bens Moveis'.'.csv');   
    }
}
