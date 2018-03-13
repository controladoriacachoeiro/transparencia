<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patrimonio\AlmoxarifadoModel;
use App\Models\Patrimonio\BensMoveisModel;
use App\Models\Patrimonio\BensImoveisModel;
use App\Models\Patrimonio\FrotaModel;
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
        $dadosDb->selectRaw('NomeMaterial, NomeAlmoxarifado, OrgaoLocalizacao, NomeGrupo, Especificacao, Quantidade, ValorAquisicao');
        $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Nome do Material', 'Nome do Almoxarifado', 'Órgão Localização', 'Nome do Grupo do Material', 'Especificação', 'Quantidade', 
                                'Valor da Aquisição']);

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
        $dadosDb->select('IdentificacaoBem', 'Descricao', 'OrgaoLocalizacao', 'ValorAquisicao');
        $dadosDb = $dadosDb->get();
        
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Identificação do Bem','Descrição','Órgão Localização','Valor Aquisição']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Bens Moveis'.'.csv');   
    }
    
    public function frota()
    {
        return redirect()->route('downloadFrota');
    }

    public function downloadFrota()
    {
        $dadosDb = FrotaModel::orderBy('PlacaVeiculo');
        $dadosDb->select('PlacaVeiculo', 'Propriedade', 'Marca', 'Modelo', 'Ano','Cor','DestinacaoAtual','Status');
        $dadosDb = $dadosDb->get();
        
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Placa','Propriedade','Marca','Modelo','Ano','Cor','Destinação Atual','Status']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Frota'.'.csv');   
    }

    public function bensimoveis()
    {
        return redirect()->route('downloadBensImoveis');
    }

    public function downloadBensImoveis()
    {
        $dadosDb = BensImoveisModel::orderBy('BemID');
        $dadosDb = $dadosDb->get();
        
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['BemID','Unidade Gestora','Identificação','Descrição','Localização','Destinação','Situação']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Bens Imóveis'.'.csv');   
    }


}
