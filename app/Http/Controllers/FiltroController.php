<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Auxiliares\AuxiliarDespesaModel;
use App\Models\Auxiliares\MenuAuxModel;

class FiltroController extends Controller
{
    public function index($consulta, $subConsulta, $tipoConsulta)
    {
        $dados = $this->buscaDadosDb($consulta, $subConsulta, $tipoConsulta);

        $labelFiltro = $dados['label'];
        $arrayDataFiltro = $dados['data'];    
        
        $tipoConsultaSelect = 'default';

        return View('filtros.filtro_principal', compact('consulta', 'subConsulta','tipoConsulta','tipoConsultaSelect','labelFiltro','arrayDataFiltro'));
    }

    public function buscaDadosDb($consulta, $subConsulta, $tipoConsulta)
    {
        $dados = [];
        $campoFiltro = '';
        switch($tipoConsulta){
            case 'orgaos':
                $labelFiltro = 'Órgãos';
                switch($subConsulta){
                    case 'empenhos':
                        $campoFiltro = 'UnidadeGestoraEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro = 'UnidadeGestoraLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro = 'UnidadeGestoraPagamento';
                        break;
                }
                break;
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
            case 'funcoes':
                $labelFiltro = 'Funções';
                switch($subConsulta){
                    case 'empenhos':
                        $campoFiltro = 'FuncaoEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro = 'FuncaoLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro = 'FuncaoPagamento';
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
            case 'nota':
                $labelFiltro = 'Nota';
                $dados = 'null';
                break;
        }

        $dados = AuxiliarDespesaModel::select($campoFiltro)
        ->whereNotNull($campoFiltro)
        ->get();



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

        return $dados;
    }

    public function filtrar()
    {
        include (base_path().'\public\functionsphp\FunctionsAux.php');

        // Verificar qual o tipo de consulta (despesa, receita, pessoal, etc.) e fazer o redirecionamento para o controle correspondente

        
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

        // return redirect()->route('rota.despesas', $parametros);
        
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
        
        return redirect()->route('rota.despesas', $parametros);
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