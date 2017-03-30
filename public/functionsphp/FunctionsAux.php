<?php

    function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    
    function linkReplace($url, $valor)
    {
        $valor = caracteresReplace($valor);

        $url = str_replace('tipoConsultaSelecionadaReplace', $valor, $url);

        return $url;
    }
    
    function caracteresReplace($valor)
    {
        $arraySearch = [' ', '/'];
        $arrayReplace = ['_', '@'];

        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        return $valor;
    }

?>