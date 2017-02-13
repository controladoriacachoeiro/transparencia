<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function index()
    {
        //Cria-se um array
        $obj = array();
        //Transforma o array em um array de objetos
        $obj = (object) $obj;

        // Instancia um objeto
        $obj->chart = (object) array();

        //Popula o array com os objetos
        for ($i = 0; $i < 5; $i++){
            $randomcolor = '#' . strtoupper(dechex(rand(0,10000000)));
            $obj->chart->$i = (object) array();
            $obj->chart->$i->label = "Órgão" . $i;
            $obj->chart->$i->fillColor = $randomcolor;
            $obj->chart->$i->strokeColor = $randomcolor;
            $obj->chart->$i->pointColor = $randomcolor;
            $obj->chart->$i->pointStrokeColor = "#c1c7d1";
            $obj->chart->$i->pointHighlightFill = "#fff";
            $obj->chart->$i->pointHighlightStroke = "#dcdcdc";
            $obj->chart->$i->data = [6 . $i, 6 . $i, 8 . $i];
          }

        return View('despesas.despesa', ['obj' => $obj]);
    }
}
