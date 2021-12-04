<?php
    function selecionarENT($bairro){
        $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");   
        $selecao =$conn->PREPARE("SELECT id FROM entregadores  E WHERE E.bairro = '$bairro' LIMIT 1;");
        $selecao->execute();
        $resultado = $selecao->fetchAll();

        foreach($resultado as $info){
            $id = intval($info['id']);
        }
        return($id);
    }