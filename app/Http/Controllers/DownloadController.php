<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Pessoal\ServidorModel;
use App\Models\Patrimonio\AlmoxarifadoModel;

use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;

class DownloadController extends Controller
{
    public function download($nomeArquivo)
    {        
        switch ($nomeArquivo) {
            case 'Plano2018-2021':
                $file_path = public_path('Arquivos/ppa/Plano Plurianual 2018-2021.pdf');
            break;
            case 'Ata-Audiencia-Plano2018-2021':
                $file_path = public_path('Arquivos/ppa/Ata_Audiencia_Publica_PPA_2018-2021.pdf');
            break;
            case 'Plano2014-2017':
                $file_path = public_path('Arquivos/ppa/Plano Plurianual 2014-2017.pdf');
            break;
            case 'Plano2010-2013':
                $file_path = public_path('Arquivos/ppa/Plano Plurianual 2010-2013.pdf');
            break;
            case 'Plano2010a2013':                
                $file_path = public_path('Arquivos/ppa/Plano Plurianual 2010 a 2013 - Manual de Elaboração.pdf');                
            break;
            case 'ldo2017':
                $file_path = public_path('Arquivos/ldo/LDO 2017.pdf');
            break;
            case 'metodologia2017':
                $file_path = public_path('Arquivos/ldo/Metodologia Ldo 2017.pdf');
            break;
            case 'ldo2016':
                $file_path = public_path('Arquivos/ldo/LDO 2016.pdf');
            break;
            case 'metodologia2016':
                $file_path = public_path('Arquivos/ldo/Metodologia Ldo 2016.pdf');
            break;
            case 'lei2015':
                $file_path = public_path('Arquivos/ldo/Lei 7228 Altera LDO 2015.pdf');
            break;
            case 'metodologia2015':
                $file_path = public_path('Arquivos/ldo/Metodologia LDO 2015.pdf');
            break;
            case 'ldo2015':
                $file_path = public_path('Arquivos/ldo/LDO 2015.pdf');
            break;
            case 'metldo2018':
                $file_path = public_path('Arquivos/ldo/LDO 2018 METODOLOGIA DA PREVISÃO DAS RECEITAS.pdf');
            break;
            case 'ldo2018':
                $file_path = public_path('Arquivos/ldo/LDO 2018.pdf');
            break;
            case 'ldo2014':
                $file_path = public_path('Arquivos/ldo/LDO 2014.pdf');
            break;
            case 'ldo2013':
                $file_path = public_path('Arquivos/ldo/LDO 2013.pdf');
            break;
            case 'metodologia2013':
                $file_path = public_path('Arquivos/ldo/Metodologia LDO 2013.pdf');
            break;
            case 'Ata-Audiencia-LDO-LOA2018':
                $file_path = public_path('Arquivos/loa/Ata_Audiencia_Publica_LDO_LOA_2018.pdf');
            break;
            case 'loa2018':
                $file_path = public_path('Arquivos/loa/loa 2018.pdf');
            break;
            case 'loa2017':
                $file_path = public_path('Arquivos/loa/loa 2017.pdf');
            break;
            case 'loa2016':
                $file_path = public_path('Arquivos/loa/loa 2016.pdf');
            break;
            case 'loa2015':
                $file_path = public_path('Arquivos/loa/loa 2015.pdf');
            break;
            case 'loa2014':
                $file_path = public_path('Arquivos/loa/loa 2014.pdf');
            break;
            case 'loa2013':
                $file_path = public_path('Arquivos/loa/loa 2013.pdf');
            break;
            case 'pessoal':
                $file_path = public_path('Arquivos/rgf/Demonstrativo da Despesa total com Pessoal.zip');
            break;
            case 'liquida':
                $file_path = public_path('Arquivos/rgf/Demonstrativo da Divida Consolidada Líquida.zip');
            break;
            case 'garantias':
                $file_path = public_path('Arquivos/rgf/Demonstrativo das Garantias e Contragarantias de Valores.zip');
            break;
            case 'credito':
                $file_path = public_path('Arquivos/rgf/Demonstrativo das Operações de Crédito.zip');
            break;
            case 'caixa':
                $file_path = public_path('Arquivos/rgf/Demonstrativo de Disponibilidade de Caixa.zip');
            break;
            case 'limites':
                $file_path = public_path('Arquivos/rgf/Demonstrativo dos Limites.zip');
            break;
            case 'balancoOrcamentario':
                $file_path = public_path('Arquivos/rreo/Balanço Orçamentário.zip');
            break;
            case 'demostrativoCorrenteLiquida':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Apuração da Receita Corrente Líquida.zip');
            break;
            case 'demostrativoEnsino':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Despesa Com Ensino.zip');
            break;
            case 'demostrativoSaude':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Despesa Com Saúde.zip');
            break;
            case 'demostrativoFuncao':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Despesa por FunçãoSubfunção.zip');
            break;
            case 'demostrativoPrevSocial':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Projeção Atuarial do Regime Próprio de Prev. Social.zip');
            break;
            case 'demostrativoAtivos':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Receita Alienação Ativos.zip');
            break;
            case 'demostrativoPrevidenciaria':
                $file_path = public_path('Arquivos/rreo/Demonstrativo das Receitas e Despesas Previdenciárias.zip');
            break;
            case 'demostrativoNominal':
                $file_path = public_path('Arquivos/rreo/Demonstrativo do Resultado Nominal.zip');
            break;
            case 'demostrativoPrimario':
                $file_path = public_path('Arquivos/rreo/Demonstrativo do Resultado Primário.zip');
            break;
            case 'demostrativoRestoPagar':
                $file_path = public_path('Arquivos/rreo/Demonstrativo dos Restos a Pagar.zip');
            break;
            case 'demostrativoSimplificado':
                $file_path = public_path('Arquivos/rreo/Demonstrativo Simplificado.zip');
            break;
            case 'balancoAnual2013':
                $file_path = public_path('Arquivos/balancoAnual/Balanço Patrimonial-2013.zip');
            break;
            case 'relatAudInter01-2017':
                $file_path = public_path('Arquivos/auditoriasInsp/Auditoria_interna_01_2017.pdf');
            break;
            case 'relatAudInter02-2017':
                $file_path = public_path('Arquivos/auditoriasInsp/Auditoria_interna_02_2017.pdf');
            break;
            case 'relatAudInter03-2017':
                $file_path = public_path('Arquivos/auditoriasInsp/Auditoria_interna_03_2017.pdf');                
            break;
            case 'relatAudInter03-2017':
                $file_path = public_path('Arquivos/auditoriasInsp/Auditoria_interna_03_2017.pdf');                
            break;
            case 'ppacao':
                $file_path = public_path('/Arquivos/ppacao/2017/ProgProjAcoes.pdf');                
            break;
            case 'royalties2017receitadespesa':
                $file_path = public_path('/Arquivos/royalties/2017/royalties-2017-receita-despesa.pdf');
            break;
            case 'royalties2017relacaopagtos':
                $file_path = public_path('/Arquivos/royalties/2017/royalties-2017-relacao-pagtos.pdf');
            break;
        }
        return response()->file($file_path);
    }    

    public function downloadTabela()
    {
        $dadosDb =  isset($_GET['Dados']) ? $_GET['Dados'] : 'null';               
        $csv = Writer::createFromFileObject(new SplTempFileObject());
    
        foreach ($dadosDb as $data) {
            $csv->insertOne($data);
        }
        //return ($csv);
        $csv->output('Empenho.csv');
    }

    //Para baixar os arquivos das Desdepas de Publicidades
    //GET        
    public function DownloadDespesaPublicidades($arquivo){                                
        $file_path = public_path('Arquivos/publicidades/'.$arquivo);
        return response()->download($file_path);        
    }
}
