<?php
    function deleteENT($id){
        $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
        $stmt = $conn->prepare("DELETE FROM entregadores WHERE id = :ID");
        $stmt->bindParam(":ID", $id);
        $stmt->execute();
    return True;       
    }

    function deleteENC($id){
        $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
        $stmt = $conn->prepare("DELETE FROM encomendas WHERE id = :ID");
        $stmt->bindParam(":ID", $id);
        $stmt->execute();
    return True;
    }
?>