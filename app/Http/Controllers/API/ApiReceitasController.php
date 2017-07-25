<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ReceitaModel;
class ApiReceitasController extends Controller
{

    public function arrecadadas($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ReceitaModel::orderBy('DataArrecadacao');
        // $dadosDb->select('DataArrecadacao', 'UnidadeGestora', 'AnoExercicio', 'CategoriaEconomica', 'Origem', 'Especie', 'Rubrica',
        //                    'Alinea', 'Subalinea', 'ValorArrecadado');
        $dadosDb->whereBetween('DataArrecadacao', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb);
    }

}