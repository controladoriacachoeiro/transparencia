<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComumController extends Controller
{
    public function index(){

        $meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ];

        $receitaLancada = [ 43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175 ];
        $receitaArrecadada = [ 13214, 42343, 43255, 53456, 65462, 53465, 54663, 65436 ];

        $despesaEmpenhada = [ 43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175 ];
        $despesaLiquidada = [ 13214, 42343, 43255, 53456, 65462, 53465, 54663, 65436 ];
        $despesaPaga = [ 154175, 152503, 137133, 157177, 165462, 139931, 169658, 143934 ];

        $receitaPrevista = 123 . ' Milhões';

        return View('index', compact('meses', 'receitaLancada', 'receitaArrecadada',
        'despesaEmpenhada', 'despesaLiquidada', 'despesaPaga', 'receitaPrevista'));
    }
}