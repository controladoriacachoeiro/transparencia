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

        $url = simplificarString(strtolower($url));

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

        return $valor;
    }
    
    function desajusteUrl($valor)
    {
        $arraySearch = ['_', '@', "`"];
        $arrayReplace = [' ', '/', "'"];

        $valor = str_replace($arraySearch,$arrayReplace, $valor);

        return $valor;
    }
        
    function simplificarString($string){
        $str = $string;
        $str = str_replace(['Á','Ã','Â','À'],'A', $str);
        $str = str_replace(['á','ã','â','à'],"a", $str);
        $str = str_replace(['É','Ê'],"E", $str);
        $str = str_replace(['é','ê'],"e", $str);
        $str = str_replace(['Ó','Õ','Ô'],"O", $str);
        $str = str_replace(['ó','õ','ô'],"o", $str);
        $str = str_replace(['Í'],"I", $str);
        $str = str_replace(['í'],"i", $str);
        $str = str_replace(['Ú'],"U", $str);
        $str = str_replace(['ú'],"u", $str);
        $str = str_replace(['Ç'],"C", $str);
        $str = str_replace(['ç'],"c", $str);
        $str = strtolower($str);

        return $str;
    }

?>