<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltroController extends Controller
{
    public function index()
    {
        $selectPeriodo = isset($_POST['selectPeriodo']) ? $_POST['selectPeriodo'] : null;
        $datetimepickerDataInicio = isset($_POST['datetimepickerDataInicio']) ? $_POST['datetimepickerDataInicio'] : null;
        $datetimepickerDataFim = isset($_POST['datetimepickerDataFim']) ? $_POST['datetimepickerDataFim'] : null;
        $selectAno = isset($_POST['selectAno']) ? $_POST['selectAno'] : null;
        $selectMes = isset($_POST['selectMes']) ? $_POST['selectMes'] : null;
        $selectBimestre = isset($_POST['selectBimestre']) ? $_POST['selectBimestre'] : null;
        $selectTrimestre = isset($_POST['selectTrimestre']) ? $_POST['selectTrimestre'] : null;
        $selectQuadrimestre = isset($_POST['selectQuadrimestre']) ? $_POST['selectQuadrimestre'] : null;
        $selectSemestre = isset($_POST['selectSemestre']) ? $_POST['selectSemestre'] : null;

        

        return View('filtros.filtro_principal', compact(
            'selectPeriodo',
            'datetimepickerDataInicio',
            'datetimepickerDataFim',
            'selectAno',
            'selectMes',
            'selectBimestre',
            'selectTrimestre',
            'selectQuadrimestre',
            'selectSemestre'));
    }
}