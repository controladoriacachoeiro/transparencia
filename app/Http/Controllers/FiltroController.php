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
        switch($tipoConsulta){
            case 'orgaos':
                $labelFiltro = 'Órgãos';
                $dados = AuxiliarDespesaModel::select('UnidadeGestora')
                    ->whereNotNull('UnidadeGestora')
                    ->get();
                break;
            case 'fornecedores':
                $labelFiltro = 'Fornecedores';
                $dados = AuxiliarDespesaModel::select('Beneficiario')
                    ->whereNotNull('Beneficiario')
                    ->get();
                break;
            case 'funcoes':
                $labelFiltro = 'Funções';
                $dados = AuxiliarDespesaModel::select('Funcao')
                    ->whereNotNull('Funcao')
                    ->get();
                break;
            case 'elementos':
                $labelFiltro = 'Elementos';
                $dados = AuxiliarDespesaModel::select('ElemDespesa')
                    ->whereNotNull('ElemDespesa')
                    ->get();
                break;
            case 'nota':
                $labelFiltro = 'Nota';
                $dados = 'null';
                break;
        }

        $arrayDataFiltro = [];
        $json = json_decode($dados, true);
        foreach ($json as $k=>$v){
            array_push($arrayDataFiltro, array_values($v)[0]);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);

        return View('filtros.filtro_principal', compact('consulta', 'subConsulta', 'tipoConsulta','labelFiltro','arrayDataFiltro'));
    }

    public function filtrar()
    {
        $consulta =  isset($_POST['hiddenConsulta']) ? $_POST['hiddenConsulta'] : 'null';
        $subConsulta =  isset($_POST['hiddenSubConsulta']) ? $_POST['hiddenSubConsulta'] : 'null';
        $tipoConsulta =  isset($_POST['hiddenTipoConsulta']) ? $_POST['hiddenTipoConsulta'] : 'null';
        $unidadeGestora = isset($_POST['selectTipoConsulta']) ? $_POST['selectTipoConsulta'] : 'null';
        $selectPeriodo = isset($_POST['selectPeriodo']) ? $_POST['selectPeriodo'] : 'null';
        $datetimepickerDataInicio = isset($_POST['datetimepickerDataInicio']) ? date("Y-m-d", strtotime(str_replace('/','-',$_POST['datetimepickerDataInicio']))) : 'null';
        $datetimepickerDataFim = isset($_POST['datetimepickerDataFim']) ? date("Y-m-d", strtotime(str_replace('/','-',$_POST['datetimepickerDataFim']))) : 'null';
        $selectAno = isset($_POST['selectAno']) ? $_POST['selectAno'] : 'null';
        $selectMes = isset($_POST['selectMes']) ? $_POST['selectMes'] : 'null';
        $selectBimestre = isset($_POST['selectBimestre']) ? $_POST['selectBimestre'] : 'null';
        $selectTrimestre = isset($_POST['selectTrimestre']) ? $_POST['selectTrimestre'] : 'null';
        $selectQuadrimestre = isset($_POST['selectQuadrimestre']) ? $_POST['selectQuadrimestre'] : 'null';
        $selectSemestre = isset($_POST['selectSemestre']) ? $_POST['selectSemestre'] : 'null';

        switch($consulta){
            case 'despesas':
                switch($subConsulta){
                    case 'empenhos':
                        return redirect()->route('despesa.empenho', [
                            'consulta' => $consulta,
                            'subConsulta' => $subConsulta,
                            'tipoConsulta' => $tipoConsulta,
                            'unidadeGestora' => $unidadeGestora,
                            'periodo' => $selectPeriodo,
                            'dataInicio' => $datetimepickerDataInicio,
                            'dataFim' => $datetimepickerDataFim,
                            'ano' => $selectAno,
                            'mes' => $selectMes,
                            'bimestre' => $selectBimestre,
                            'trimestre' => $selectTrimestre,
                            'quadrimestre' => $selectQuadrimestre,
                            'semestre' => $selectSemestre
                        ]);
                }
            break;
        }
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