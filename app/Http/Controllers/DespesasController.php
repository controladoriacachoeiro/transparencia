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
        $despesas = DespesaModel::all();

        return View('despesas.teste', compact('despesas'));

    }

    public function testeFilter($id)
    {
        $despesas = DespesaModel::where('despesa_id', '=', $id)->get();

        return View('despesas.teste', compact('despesas'));
    }
}
