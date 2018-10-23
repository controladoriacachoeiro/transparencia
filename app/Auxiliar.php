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

    //Acrescentar asterisco no CPF nas informações de empehno
    public static function ModificarCPF_CNPJ($dados){
        for ($i = 0; $i < count($dados); $i++){
            if (strlen($dados[$i]->CPF_CNPJ) == 11){
                $dados[$i]->CPF_CNPJ = '***'.'.'.substr($dados[$i]->CPF_CNPJ,3,3).'.'.substr($dados[$i]->CPF_CNPJ,6,3).'-**';
            }
        }      
        return $dados;
    }
    
    //faz a soma dos campos
    public static function SomarCampo($dados,$campo){
        $result=0;
        for ($i = 0; $i < count($dados); $i++){   
        $result=$result+$dados[$i]->$campo;
        }      
        return $result;
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

    //Ajusta a data de "2000-12-20" para '20/12/2000'
    public static function DesajustarDataComBarra($data)
    {
        $elemento = explode("-",$data);
        $ano = $elemento[0];
        $mes = $elemento[1];
        $dia = $elemento[2];
        $data = $dia . '/' . $mes . '/' . $ano;        

        return $data;
    }


    //Criar link para acessar a informação do processo físico
    public static function LinkProcesso($numero, $ano)
    {   try{            
            if((!empty($numero)) && ($numero != ' ') && (!empty($ano)) && ($ano != ' ')){
                $pieces = explode("-", $numero);                
                if(count($pieces) == 2){                
                    return 'www2.cachoeiro.es.gov.br:8080/ZimWeb/servlet/ZII?tipo_processo=' . $pieces[0] . '&numero_processo=' . $pieces[1] . '&ano_processo=' . (string)$ano . '&connection=producao&program=pwcd001&Procurar=Processar';
                }
                else{
                    return 'www2.cachoeiro.es.gov.br:8080/ZimWeb/servlet/ZII?tipo_processo=1&numero_processo=' . $pieces[0] . '&ano_processo=' . (string)$ano . '&connection=producao&program=pwcd001&Procurar=Processar';
                }
            }
            else{
                return '';
            }

        }catch(\Exception $e){
            return '';
        }        
    }

    //função para formatar cpf e cnpj
    function formatarCnpjCpf($cnpj_cpf)
    {
    if (strlen(preg_replace("/\D/", '', $cnpj_cpf)) === 11) {
        $response = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    } else {
        $response = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }

    return $response;
    }


}