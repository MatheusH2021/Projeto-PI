<?php

    function inserirENC($a, $b, $c, $d){
        $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
        $stmt = $conn->prepare("INSERT INTO encomendas(cod_ras, cep, bairro, id_entregador) VALUES (:A, :B, :C, :D)");
        $stmt->bindParam(':A',$a);
        $stmt->bindParam(':B',$b);
        $stmt->bindParam(':C',$c);
        $stmt->bindParam(':D',$d);
        $stmt->execute();
        return True;
    }

    function inserirENT($a, $b, $c){
        $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
        $stmt = $conn->prepare("INSERT INTO entregadores (nome,bairro,cpf) VALUES (:A, :B, :C)");
        $stmt->bindParam(':A',$a);
        $stmt->bindParam(':B',$b);
        $stmt->bindParam(':C',$c);
        $stmt->execute();
        return True;
    }
    
?>