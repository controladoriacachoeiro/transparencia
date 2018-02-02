<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auxiliares\MenuAuxModel;

class AuxController extends Controller
{
    public function menu(){
        $menu = new MenuAuxModel();
        $menu->menuPrincipal();

        $result = $menu->menuPrincipal();

        return $result;
    }
}
