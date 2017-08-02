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

    public static function desajusteUrl($valor)
    {
        $arraySearch = ['_', '@', "`"];
        $arrayReplace = [' ', '/', "'"];

        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        return $valor;
    }

    public static function ajusteArrayUrl($valor)
    {
        $arraySearch = [' ', '/', "'"];
        $arrayReplace = ['_', '@', "`"];

        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        $valor = array_map('strtolower', $valor);

        // $arraySearch = [' ', '/', "'",'Á','Ã','Â','À','á','ã','â','à','É','Ê','é','ê','Ó','Õ','Ô','ó','õ','ô','Í','í','Ú','ú','Ç','ç'];
        // $arrayReplace = ['_', '@', "`",'A','A','A','A','a','a','a','a','E','E','e','e','O','O','O','o','o','o','I','i','U','u','C','c'];
        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        return $valor;
    }


    //Acrescentar asterisco no CPF
    public static function ModificarCPF($dados){
        for ($i = 0; $i < count($dados); $i++){
            $dados[$i]->CPF = '***'.'.'.substr($dados[$i]->CPF,3,3).'.'.substr($dados[$i]->CPF,6,3).'-**';
        }        
        return $dados;
    }
        

    //Ajusta a data de "20-12-2000" para '2000-12-20'
    public static function AjustarData($data)
    {
        $elemento = explode("-",$data);
        $dia = $elemento[0];
        $mes = $elemento[1];
        $ano = $elemento[2];
        $data = $ano . '-' . $mes . '-' . $dia;        

        return $data;
    }    
}