<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class Auxiliar
{    
    
    public static function linkReplace($url, $valor)
    {
        $valor = ajusteUrl($valor);

        $url = str_replace('nivelAtual', $valor, $url);

        return $url;
    }
    
    public static function ajusteUrl($valor)
    {
        $arraySearch = [' ', '/', "'"];
        $arrayReplace = ['_', '@', "`"];
        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        return $valor;
    }    
}