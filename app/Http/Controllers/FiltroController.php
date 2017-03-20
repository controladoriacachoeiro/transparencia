<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Auxiliares\UnidadeGestoraModel;

class FiltroController extends Controller
{
    public function index($tipoFiltro)
    {
        switch($tipoFiltro){
            case 'orgao':
                $arrayDataFiltro = UnidadeGestoraModel::select('Descricao')->get();
                break;
        }

        return View('filtros.filtro_principal', compact('tipoFiltro','arrayDataFiltro'));
    }

    public function filtrar()
    {
        $tipoFiltro =  isset($_POST['hiddenTipoFiltro']) ? $_POST['hiddenTipoFiltro'] : 'null';
        $unidadeGestora = isset($_POST['selectTipoFiltro']) ? $_POST['selectTipoFiltro'] : 'null';
        $selectPeriodo = isset($_POST['selectPeriodo']) ? $_POST['selectPeriodo'] : 'null';
        $datetimepickerDataInicio = isset($_POST['datetimepickerDataInicio']) ? date("Y-m-d", strtotime(str_replace('/','-',$_POST['datetimepickerDataInicio']))) : 'null';
        $datetimepickerDataFim = isset($_POST['datetimepickerDataFim']) ? date("Y-m-d", strtotime(str_replace('/','-',$_POST['datetimepickerDataFim']))) : 'null';
        $selectAno = isset($_POST['selectAno']) ? $_POST['selectAno'] : 'null';
        $selectMes = isset($_POST['selectMes']) ? $_POST['selectMes'] : 'null';
        $selectBimestre = isset($_POST['selectBimestre']) ? $_POST['selectBimestre'] : 'null';
        $selectTrimestre = isset($_POST['selectTrimestre']) ? $_POST['selectTrimestre'] : 'null';
        $selectQuadrimestre = isset($_POST['selectQuadrimestre']) ? $_POST['selectQuadrimestre'] : 'null';
        $selectSemestre = isset($_POST['selectSemestre']) ? $_POST['selectSemestre'] : 'null';        
        
        return redirect()->route('despesa.empenho', [
            'tipoFiltro' => $tipoFiltro,
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
}