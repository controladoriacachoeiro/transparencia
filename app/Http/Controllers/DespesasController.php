<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas\DespesaModel;

class DespesasController extends Controller
{
    public function index()
    {
        $despesas = DespesaModel::all();

        return View('despesas.despesa', compact('despesas'));
    }

    public function teste()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $empenho = isset($_POST['empenho']) ? $_POST['empenho'] : null;

        if ($id != null){
            $despesas = DespesaModel::where('despesa_id', '=', $id)->get();
        } elseif ($empenho != null) {
            $despesas = DespesaModel::where('despesa_empenho', '=', $empenho)->get();
        } else {
            $despesas = DespesaModel::all();
            }

        return View('despesas.teste', compact('despesas'));

    }
}
