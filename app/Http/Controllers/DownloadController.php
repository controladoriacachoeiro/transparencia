<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Pessoal\ServidorModel;

class DownloadController extends Controller
{
    public function download($nomeArquivo)
    {
        switch ($nomeArquivo) {
            case 'Plano2014-2017':
                $file_path = public_path('Arquivos/ppa/Plano Plurianual 2014-2017.pdf');
                return response()->download($file_path);
            break;
            case 'Plano2010-2013':
                $file_path = public_path('Arquivos/ppa/Plano Plurianual 2010-2013.pdf');
                return response()->download($file_path);
            break;
            case 'Plano2010a2013':
                $file_path = public_path('Arquivos/ppa/Plano Plurianual 2010 a 2013 - Manual de Elaboração.pdf');
                return response()->download($file_path);
            break;
            case 'ldo2017':
                $file_path = public_path('Arquivos/ldo/LDO 2017.pdf');
                return response()->download($file_path);
            break;
            case 'metodologia2017':
                $file_path = public_path('Arquivos/ldo/Metodologia Ldo 2017.pdf');
                return response()->download($file_path);
            break;
            case 'ldo2016':
                $file_path = public_path('Arquivos/ldo/LDO 2016.pdf');
                return response()->download($file_path);
            break;
            case 'metodologia2016':
                $file_path = public_path('Arquivos/ldo/Metodologia Ldo 2016.pdf');
                return response()->download($file_path);
            break;
            case 'lei2015':
                $file_path = public_path('Arquivos/ldo/Lei 7228 Altera LDO 2015.pdf');
                return response()->download($file_path);
            break;
            case 'metodologia2015':
                $file_path = public_path('Arquivos/ldo/Metodologia LDO 2015.pdf');
                return response()->download($file_path);
            break;
            case 'ldo2015':
                $file_path = public_path('Arquivos/ldo/LDO 2015.pdf');
                return response()->download($file_path);
            break;
            case 'ldo2014':
                $file_path = public_path('Arquivos/ldo/LDO 2014.pdf');
                return response()->download($file_path);
            break;
            case 'ldo2013':
                $file_path = public_path('Arquivos/ldo/LDO 2013.pdf');
                return response()->download($file_path);
            break;
            case 'metodologia2013':
                $file_path = public_path('Arquivos/ldo/Metodologia LDO 2013.pdf');
                return response()->download($file_path);
            break;
            case 'loa2017':
                $file_path = public_path('Arquivos/loa/loa 2017.pdf');
                return response()->download($file_path);
            break;
            case 'loa2016':
                $file_path = public_path('Arquivos/loa/loa 2016.pdf');
                return response()->download($file_path);
            break;
            case 'loa2015':
                $file_path = public_path('Arquivos/loa/loa 2015.pdf');
                return response()->download($file_path);
            break;
            case 'loa2014':
                $file_path = public_path('Arquivos/loa/loa 2014.pdf');
                return response()->download($file_path);
            break;
            case 'loa2013':
                $file_path = public_path('Arquivos/loa/loa 2013.pdf');
                return response()->download($file_path);
            break;
            case 'pessoal':
                $file_path = public_path('Arquivos/rgf/Demonstrativo da Despesa total com Pessoal.zip');
                return response()->download($file_path);
            break;
            case 'liquida':
                $file_path = public_path('Arquivos/rgf/Demonstrativo da Divida Consolidada Líquida.zip');
                return response()->download($file_path);
            break;
            case 'garantias':
                $file_path = public_path('Arquivos/rgf/Demonstrativo das Garantias e Contragarantias de Valores.zip');
                return response()->download($file_path);
            break;
            case 'credito':
                $file_path = public_path('Arquivos/rgf/Demonstrativo das Operações de Crédito.zip');
                return response()->download($file_path);
            break;
            case 'caixa':
                $file_path = public_path('Arquivos/rgf/Demonstrativo de Disponibilidade de Caixa.zip');
                return response()->download($file_path);
            break;
            case 'limites':
                $file_path = public_path('Arquivos/rgf/Demonstrativo dos Limites.zip');
                return response()->download($file_path);
            break;
            case 'balancoOrcamentario':
                $file_path = public_path('Arquivos/rreo/Balanço Orçamentário.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoCorrenteLiquida':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Apuração da Receita Corrente Líquida.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoEnsino':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Despesa Com Ensino.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoSaude':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Despesa Com Saúde.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoFuncao':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Despesa por FunçãoSubfunção.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoPrevSocial':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Projeção Atuarial do Regime Próprio de Prev. Social.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoAtivos':
                $file_path = public_path('Arquivos/rreo/Demonstrativo da Receita Alienação Ativos.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoPrevidenciaria':
                $file_path = public_path('Arquivos/rreo/Demonstrativo das Receitas e Despesas Previdenciárias.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoNominal':
                $file_path = public_path('Arquivos/rreo/Demonstrativo do Resultado Nominal.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoPrimario':
                $file_path = public_path('Arquivos/rreo/Demonstrativo do Resultado Primário.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoRestoPagar':
                $file_path = public_path('Arquivos/rreo/Demonstrativo dos Restos a Pagar.zip');
                return response()->download($file_path);
            break;
            case 'demostrativoSimplificado':
                $file_path = public_path('Arquivos/rreo/Demonstrativo Simplificado.zip');
                return response()->download($file_path);
            break;
            case 'balancoAnual2013':
                $file_path = public_path('Arquivos/balanco anual/Balanço Patrimonial-2013.zip');
                return response()->download($file_path);
            break;
        }
    }
}
