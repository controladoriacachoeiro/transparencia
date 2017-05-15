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
        $valor = ajusteUrl($valor);

        $url = str_replace('nivelAtual', $valor, $url);

        return $url;
    }
    
    function ajusteUrl($valor)
    {
        $arraySearch = [' ', '/', "'"];
        $arrayReplace = ['_', '@', "`"];
        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        return $valor;
    }
    
    function ajusteArrayUrl($valor)
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
    
    function desajusteUrl($valor)
    {
        $arraySearch = ['_', '@', "`"];
        $arrayReplace = [' ', '/', "'"];

        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        return $valor;
    }

?>