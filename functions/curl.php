<?php
    function useCEP($cep){
        $link = "https://viacep.com.br/ws/$cep/json/";
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $resposta = json_decode(curl_exec($ch),true);         
        curl_close($ch);   
        $bairro = strval($resposta['bairro']);
        return $bairro;
    }
    
?>