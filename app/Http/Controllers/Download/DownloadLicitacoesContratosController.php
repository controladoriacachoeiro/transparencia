<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\ContratosModel;
use App\Models\LicitacoesContratos\LicitacoesAndamentoModel;
use App\Models\LicitacoesContratos\LicitacoesConcluidasModel;
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
        // $request->datetimepickerDataInicio1 = str_replace("/", "-", $request->datetimepickerDataInicio1);
        // $request->datetimepickerDataFim1 = str_replace("/", "-", $request->datetimepickerDataFim1);
        // // return redirect()->route('downloadAndamento',
        // //                             ['datainicio' => $request->datetimepickerDataInicio1,
        // //                              'datafim' => $request->datetimepickerDataFim1]);

        // $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio1 ));
        // $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim1 ));
        

        // if ($dataFim<$dataInicio)
        // {
        //     return redirect()->back()->with('andamento', 'A data final de download não pode ser menor que a data inicial');
        // }
        // else
        // {
        //     return redirect()->route('downloadAndamento',
        //     ['datainicio' => $request->datetimepickerDataInicio1,
        //      'datafim' => $request->datetimepickerDataFim1]);
        // }
        return redirect()->route('downloadAndamento');   
    }

    public function downloadAndamento()
    {        
        $dadosDb = LicitacoesAndamentoModel::orderBy('DataPropostas');
        $dadosDb->select('DataPropostas', 'OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'ModalidadeLicitatoria', 'NumeroEdital', 'AnoEdital', 'Status');        
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemAndamento', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Data das Propostas','Órgão Licitante','Objeto licitado','Processo','Modalidade Licitatória', 'Número do Edital', 'Ano do Edital', 'Status']);
    
            foreach ($dadosDb as $data) {
                $data->DataPropostas = $this->ajeitaData($data->DataPropostas);
                $csv->insertOne($data->toArray());
            }
            $csv->output('Licitações em Andamento.csv');   
        }
    }


    public function concluida(Request $request)
    {        
        return redirect()->route('downloadConcluida');   
    }

    public function downloadConcluida()
    {        
        $dadosDb = LicitacoesConcluidasModel::orderBy('DataPropostas');
        $dadosDb->select('OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'ModalidadeLicitatoria', 'DataPropostas', 'NumeroEdital', 'AnoEdital');        
        
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemConcluidas', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());        
            $csv->insertOne(['Órgão', 'Objeto licitado', 'Processo', 'Modalidade Licitatória', 'Data das Propostas', 'Número do Edital', 'Ano do Edital']);
    
            foreach ($dadosDb as $data) {
                if ($data->DataPropostas != null){
                    $data->DataPropostas = $this->ajeitaData($data->DataPropostas);
                }
                $csv->insertOne($data->toArray());
            }
            $csv->output('Licitações Concluídas.csv');   
        }
    }

    public function contrato(Request $request)
    {
        return redirect()->route('downloadContrato');
    }

    public function downloadContrato()
    {
        $dadosDb = ContratosModel::orderBy('DataInicial');
        $dadosDb->select('OrgaoContratante', 'CNPJContratado', 'NomeContratado', 'DataInicial', 'DataFinal', 
         'Objeto', 'ValorContratado', 'ProcessoLicitatorio');
        //$dadosDb->whereBetween('DataInicial', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemContratos', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Órgão Contratante', 'CNPJ do Contratado', 'Nome do Contratado', 'Data Inicial','Data Final', 
                            'Objeto do Contrato','Valor do Contrato','Processo Licitatório']);
    
            foreach ($dadosDb as $data) {
                if ($data->DataFinal != null){
                    $data->DataInicial = $this->ajeitaData($data->DataInicial);
                    $data->DataFinal = $this->ajeitaData($data->DataFinal);
                }
                $csv->insertOne($data->toArray());
            }
            $csv->output('Contratos'.'.csv');   
        }
    }

    public function bensAdquiridos(Request $request)
    {
        $request->datetimepickerDataInicio3 = str_replace("/", "-", $request->datetimepickerDataInicio3);
        $request->datetimepickerDataFim3 = str_replace("/", "-", $request->datetimepickerDataFim3);
        // return redirect()->route('downloadBensAdquirido',
        //                             ['datainicio' => $request->datetimepickerDataInicio3,
        //                              'datafim' => $request->datetimepickerDataFim3]);

        $dataInicio=date("Y-m-d",strtotime($request->datetimepickerDataInicio3 ));
        $dataFim=date("Y-m-d",strtotime($request->datetimepickerDataFim3 ));
        

        if ($dataFim<$dataInicio)
        {
            return redirect()->back()->with('bens', 'A data final de download não pode ser menor que a data inicial');
        }
        else
        {
            return redirect()->route('downloadBensAdquirido',
            ['datainicio' => $request->datetimepickerDataInicio3,
             'datafim' => $request->datetimepickerDataFim3]);
        }   
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

        if($dadosDb->isEmpty()){
            return redirect()->back()->with('mensagemBens', 'Não foram encontrados arquivos para download');
        } else {
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne(['Data Aquisição','Item','Órgão','Fornecedor','CNPJ',
                            'Preço Unidade','Unidade de Medida','Quantidade']);
    
            foreach ($dadosDb as $data) {
                if ($data->DataAquisicao != null){
                    $data->DataAquisicao = $this->ajeitaData($data->DataAquisicao);
                }
                $csv->insertOne($data->toArray());
            }
            $csv->output('Bens Adquiridos '.$dataInicio.'-'.$dataFim.'.csv');   
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
