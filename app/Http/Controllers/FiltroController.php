<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Auxiliares\AuxiliarDespesaModel;
use App\Models\Auxiliares\MenuAuxModel;

class FiltroController extends Controller
{
    public function index($consulta, $subConsulta, $tipoConsulta)
    {
        $dados = [];
        // Define o campo na qual poderá ser filtrado
        $campoFiltro = '';
        switch($tipoConsulta){
            // Despesas + Receitas + servidores
            case 'orgaos':
                $labelFiltro = 'Órgãos';
                switch($subConsulta){
                    // Despesas
                    case 'empenhos':
                        $campoFiltro = 'UnidadeGestoraEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro = 'UnidadeGestoraLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro = 'UnidadeGestoraPagamento';
                        break;
                    // Receitas
                    case 'lancamentos':
                        $campoFiltro = '*';
                        break;
                    case 'recebimentos':
                        $campoFiltro = '*';
                        break;
                    // Servidores
                    case 'servidores':
                        $campoFiltro = '*';
                        break;
                }
                break;
            // Despesas + servidores
            case 'funcoes':
                $labelFiltro = 'Funções';
                switch($subConsulta){
                    // Despesas
                    case 'empenhos':
                        $campoFiltro = 'FuncaoEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro = 'FuncaoLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro = 'FuncaoPagamento';
                        break;
                    // Servidores
                    case 'servidores':
                        $campoFiltro = '*';
                        break;
                }
                break;
            // Despesas
            case 'fornecedores':
                $labelFiltro = 'Fornecedores';
                switch($subConsulta){
                    case 'empenhos':
                        $campoFiltro = 'BeneficiarioEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro = 'BeneficiarioLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro = 'BeneficiarioPagamento';
                        break;
                }
                break; 
            case 'elementos':
                $labelFiltro = 'Elementos';
                switch($subConsulta){
                    case 'empenhos':
                        $campoFiltro = 'ElemDespesaEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro = 'ElemDespesaLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro = 'ElemDespesaPagamento';
                        break;
                }
                break;
            // Receitas
            case 'categorias':
                $labelFiltro = 'Categorias';
                switch($subConsulta){
                    case 'lancamentos':
                        $campoFiltro = '*';
                        break;
                    case 'recebimentos':
                        $campoFiltro = '*';
                        break;
                }
                break;
            // Licitações e Contratos
            case 'andamentos':
                $labelFiltro = 'Andamentos';
                $campoFiltro = '*';
                break;           
            case 'concluidos':
                $labelFiltro = 'Concluidos';
                $campoFiltro = '*';
                break;           
            case 'contratos':
                $labelFiltro = 'Contratos';
                $campoFiltro = '*';
                break;           
            case 'bens_produtos_adquiridos':
                $labelFiltro = 'Bens e Produtos Adquiridos';
                $campoFiltro = '*';
                break;
            // Gestão Fiscal
            case 'ppa':
                $labelFiltro = 'PPA';
                $campoFiltro = '*';
                break;
            case 'ldo':
                $labelFiltro = 'LDO';
                $campoFiltro = '*';
                break; 
            case 'loa':
                $labelFiltro = 'LOA';
                $campoFiltro = '*';
                break;
            case 'rgf':
                $labelFiltro = 'RGF';
                $campoFiltro = '*';
                break; 
            case 'rreo':
                $labelFiltro = 'RREO';
                $campoFiltro = '*';
                break;
            case 'prestacoes_contas':
                $labelFiltro = 'Prestações de Contas';
                $campoFiltro = '*';
                break; 
            case 'auditorias_inspecoes':
                $labelFiltro = 'Auditorias e Inspeções';
                $campoFiltro = '*';
                break;
            // Patrimônio
            case 'bens_moveis':
                $labelFiltro = 'Bens Móveis';
                $campoFiltro = '*';
                break;
            case 'bens_imoveis':
                $labelFiltro = 'Bens Imóveis';
                $campoFiltro = '*';
                break;
            case 'frota':
                $labelFiltro = 'Frota';
                $campoFiltro = '*';
                break;
            // Pessoal
            case 'estrutura_pessoal':
                $labelFiltro = 'Estrutura de Pessoal';
                $campoFiltro = '*';
                break;
            // case 'servidores':
            //     $labelFiltro = 'Servidores';
            //     $campoFiltro = '*';
            //     break;
            case 'folha_pagamento':
                $labelFiltro = 'Folha de Pagamento';
                $campoFiltro = '*';
                break;
            case 'concurso_publico':
                $labelFiltro = 'Concurso Público';
                $campoFiltro = '*';
                break;
            // Convênios e Transferências
            case 'recursos_recebidos_uniao':
                $labelFiltro = 'Recursos Recebidos da União';
                $campoFiltro = '*';
                break;
            case 'recursos_recebidos_estado':
                $labelFiltro = 'Recursos Recebidos do Estado';
                $campoFiltro = '*';
                break;
            case 'recursos_concedidos_pelo_municipio':
                $labelFiltro = 'Recursos Concedidos Pelo Município';
                $campoFiltro = '*';
                break;
            // Mais Informações
            case 'obras':
                $labelFiltro = 'Obras';
                $campoFiltro = '*';
                break;
            case 'outros':
                $labelFiltro = 'Outros';
                $campoFiltro = '*';
                break;
            
        }

        // Select nas tabelas auxiliares
        if($tipoConsulta != 'nota'){
            switch($consulta){
                case 'despesas':
                    $dados = AuxiliarDespesaModel::select($campoFiltro)
                    ->whereNotNull($campoFiltro)
                    ->get();
                    break;
                // case 'receitas':
                //     break;
                // case 'licitacoes_contratos':
                //     break;
                // case 'gestao_fiscal':
                //     break;
                // case 'patrimonio':
                //     break;
                // case 'pessoal':
                //     break;
                // case 'convenios_transferencias':
                //     break;
                // case 'informacoes':
                //     break;
                // default:
                //     $campoFiltro = 'UnidadeGestoraEmpenho';
                //     $dados = AuxiliarDespesaModel::select($campoFiltro)
                //     ->whereNotNull($campoFiltro)
                //     ->get();
                //     break;
            }
            $dados = str_replace("'", "`",$dados);
        } else {
            $labelFiltro = 'Nota';
            $dados = 'null';
        }

        $arrayDataFiltro = [];
        if($dados === 'null')
        {
            array_push($arrayDataFiltro, '');
            $arrayDataFiltro = json_encode($arrayDataFiltro);
        } 
        else 
        {
            $json = json_decode($dados, true);
            foreach ($json as $k=>$v){
                array_push($arrayDataFiltro, array_values($v)[0]);
            }
            $arrayDataFiltro = json_encode($arrayDataFiltro);

        }

        $dados = [
            'label' => $labelFiltro,
            'data' => $arrayDataFiltro
        ];
        

        $labelFiltro = $dados['label'];
        $arrayDataFiltro = $dados['data'];

        return View('filtros.filtro_principal', compact('consulta', 'subConsulta','tipoConsulta','labelFiltro','arrayDataFiltro'));
    }

    public function filtrar()
    {
        include (base_path().'/public/functionsphp/FunctionsAux.php');
        
        $consulta =  isset($_POST['hiddenConsulta']) ? $_POST['hiddenConsulta'] : 'null';
        $subConsulta =  isset($_POST['hiddenSubConsulta']) ? $_POST['hiddenSubConsulta'] : 'null';
        $tipoConsulta =  isset($_POST['hiddenTipoConsulta']) ? $_POST['hiddenTipoConsulta'] : 'null';
        $tipoConsultaSelecionada = isset($_POST['selectTipoConsulta']) ? $_POST['selectTipoConsulta'] : 'null';
        if($tipoConsultaSelecionada === 'null'){
            $tipoConsultaSelecionada = isset($_POST['txtTipoConsulta']) ? $_POST['txtTipoConsulta'] : 'null';
        }
        $selectPeriodo = isset($_POST['selectPeriodo']) ? $_POST['selectPeriodo'] : 'null';
        $datetimepickerDataInicio = isset($_POST['datetimepickerDataInicio']) ? date("Y-m-d", strtotime(str_replace('/','-',$_POST['datetimepickerDataInicio']))) : 'null';
        $datetimepickerDataFim = isset($_POST['datetimepickerDataFim']) ? date("Y-m-d", strtotime(str_replace('/','-',$_POST['datetimepickerDataFim']))) : 'null';
        $selectAno = isset($_POST['selectAno']) ? $_POST['selectAno'] : 'null';
        $selectMes = isset($_POST['selectMes']) ? $_POST['selectMes'] : 'null';
        $selectBimestre = isset($_POST['selectBimestre']) ? $_POST['selectBimestre'] : 'null';
        $selectTrimestre = isset($_POST['selectTrimestre']) ? $_POST['selectTrimestre'] : 'null';
        $selectQuadrimestre = isset($_POST['selectQuadrimestre']) ? $_POST['selectQuadrimestre'] : 'null';
        $selectSemestre = isset($_POST['selectSemestre']) ? $_POST['selectSemestre'] : 'null';
        
        $parametros = [
            'consulta' => $consulta,
            'subConsulta' => $subConsulta,
            'tipoConsulta' => $tipoConsulta,
            'nivel1' => $tipoConsultaSelecionada
        ];
        
        $parametros = ajusteArrayUrl($parametros);
        
        session_start();
        $_SESSION["parametrosTemporal"] = [
            'periodo' => $selectPeriodo,
            'dataInicio' => $datetimepickerDataInicio,
            'dataFim' => $datetimepickerDataFim,
            'ano' => $selectAno,
            'mes' => $selectMes,
            'bimestre' => $selectBimestre,
            'trimestre' => $selectTrimestre,
            'quadrimestre' => $selectQuadrimestre,
            'semestre' => $selectSemestre
        ];
        
        return redirect()->route('rota.consulta', $parametros);
    }

    public function subConsulta($consulta,$subConsulta)
    {
        return View('filtros.subConsulta', compact('consulta', 'subConsulta'));
    }

    public function consulta($consulta)
    {
        return View('filtros.consulta', compact('consulta'));
    }
}