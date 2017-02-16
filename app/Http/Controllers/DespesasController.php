<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas\DespesaModel;

class DespesasController extends Controller
{
    public function index()
    {
        $despesas = DespesaModel::get();
        return View('despesas.despesa', compact('despesas', 'randomcolor'));
    }

    public function teste()
    {
        $despesas = DespesaModel::get();
        return View('despesas.teste', compact('despesas', 'randomcolor'));

    }
}
