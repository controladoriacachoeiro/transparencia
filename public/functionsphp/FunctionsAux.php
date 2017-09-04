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

    function PopularTituloFiltro($subConsulta, $tipoConsulta)
    {
        $titulo = ["",""];
        switch ($subConsulta) {            
            case 'empenhos':
                $titulo[0] = 'Empenhos';
                break;
            case 'liquidacoes':
                $titulo[0] = 'Liquidações';
                break;
            case 'pagamentos':
                $titulo[0] = 'Pagamentos';
                break;
            case 'restosapagar':
                $titulo[0] = 'Restos a Pagar';
                break;
            case 'servidores':
                $titulo[0] = 'Servidores';
                break;
            default:
                $titulo[0] = 'título1';
                break;
        }

        switch ($tipoConsulta) {            
            case 'orgaos':
                $titulo[1] = 'Por Órgão';
                break;
            case 'fornecedores':
                $titulo[1] = 'Por Fornecedor';
                break;
            case 'funcoes':
                $titulo[1] = 'Por Função';
                break;
            case 'elementos':
                switch ($subConsulta){
                    case 'empenhos':
                        $titulo[1] = 'Por Elemento de Despesa';
                    break;
                    case 'liquidacoes':
                        $titulo[1] = 'Por Elemento de Liquidação';
                        break;
                    case 'pagamentos':
                        $titulo[1] = 'Por Elemento de Pagamento';
                        break;
                    case 'restosapagar':
                        $titulo[1] = 'Por Elemento de Resto a Pagar';
                        break;                    
                }                
                break;
            case 'nota':
                switch ($subConsulta){
                    case 'empenhos':
                        $titulo[1] = 'Nota de Empenho';
                    break;
                    case 'liquidacoes':
                        $titulo[1] = 'Nota de Liquidação';
                        break;
                    case 'pagamentos':
                        $titulo[1] = 'Nota de Pagamento';
                        break;
                    case 'restosapagar':
                        $titulo[1] = 'Nota de Resto a Pagar';
                        break;                    
                }          
                break;
            case 'nome':
                $titulo[1] = 'Por Nome';
                break;
            case 'cargofuncao':
                $titulo[1] = 'Por Cargo/Função';
                break;            
            case 'matricula':
                $titulo[1] = 'Por Matrícula';
                break;
            default:
                $titulo[1] = 'título2';
                break;
        }
        return $titulo;
    }

?>