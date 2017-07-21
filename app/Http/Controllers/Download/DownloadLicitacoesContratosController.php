<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\ContratosModel;
use App\Models\LicitacoesContratos\LicitacoesAndamentoModel;
use App\Models\ProdutoAdquirido\ProdutosAdquiridosModel;
use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;

class DownloadLicitacoesContratosController extends Controller
{
    /* Está sendo usada a biblioteca League/Csv para criar o arquivo csv sem instancia-lo na memória do servidor
      a documentação da biblioteca está disponivel em http://csv.thephpleague.com/8.0/ 
      É necessario a instalação da dependencia pelo composer*/

    public function andamento(Request $request)
    {
        $request->datetimepickerDataInicio1 = str_replace("/", "-", $request->datetimepickerDataInicio1);
        $request->datetimepickerDataFim1 = str_replace("/", "-", $request->datetimepickerDataFim1);
        return redirect()->route('downloadAndamento',
                                    ['datainicio' => $request->datetimepickerDataInicio1,
                                     'datafim' => $request->datetimepickerDataFim1]);
    }

    public function downloadAndamento($dataInicio, $dataFim)
    {

        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = LicitacoesAndamentoModel::orderBy('DataPropostas');
        $dadosDb->select('DataPropostas', 'OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'ModalidadeLicitatoria', 'DataPropostas');
        $dadosDb->whereBetween('DataPropostas', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Data Arrecadação','Órgão','Ano Exercício','Categoria Econômica','Origem','Espécie',
                                'Rubrica','Alínea','Subalínea']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Licitacoes em Andamento'.$dataInicio.'-'.$dataFim.'.csv');   
    }

    public function contrato(Request $request)
    {
        return redirect()->route('downloadContrato');
    }

    public function downloadContrato()
    {
        $dadosDb = ContratosModel::orderBy('DataInicial');
        $dadosDb->select('DataInicial', 'DataFinal', 'NomeContratado', 'CNPJContratado', 'OrgaoContratante',
         'Objeto','ProcessoLicitatorio','ValorContratado');
        //$dadosDb->whereBetween('DataInicial', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Data Inicial','Data Final','Nome do Contratado','CNPJ do Contratado','Órgão Contratante',
                        'Objeto do Contrato','Processo Licitatório','Valor do Contrato']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Contratos'.'.csv');   
    }

    public function bensAdquiridos(Request $request)
    {
        $request->datetimepickerDataInicio3 = str_replace("/", "-", $request->datetimepickerDataInicio3);
        $request->datetimepickerDataFim3 = str_replace("/", "-", $request->datetimepickerDataFim3);
        return redirect()->route('downloadBensAdquirido',
                                    ['datainicio' => $request->datetimepickerDataInicio3,
                                     'datafim' => $request->datetimepickerDataFim3]);
    }

    public function downloadBensAdquiridos($dataInicio, $dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ProdutosAdquiridosModel::orderBy('DataAquisicao');
        $dadosDb->select('DataAquisicao','IdentificacaoProduto', 'OrgaoAdquirente', 'NomeFornecedor', 'CNPJFornecedor', 'PrecoUnitario',
                         'UnidadeMedida','QuantidadeAdquirida');
        $dadosDb->whereBetween('DataAquisicao', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();


        return json_encode($dadosDb);
        
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Data Aquisicao','Item','Órgão','Fornecedor','CNPJ',
                        'Preço Unidade','Unidade de Medida','Quantidade']);

        foreach ($dadosDb as $data) {
            $csv->insertOne($data->toArray());
        }
        $csv->output('Bens Adquirido'.$dataInicio.'-'.$dataFim.'.csv');   
    }
}
