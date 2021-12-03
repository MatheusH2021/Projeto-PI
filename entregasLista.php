<?php
    require_once 'template/header.php';
?>
<?php    
    $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
?>
    <main class="container">
        <div id="title">
            <h3>Lista de Entregas:</h3>
        </div>
        <table class="table">
            <thead>
                <td>ID</td>
                <td>Rastreador</td>
                <td>CEP</td>
                <td>Bairro</td>
                <td>Entregador</td>
                <td>Ações</td>
            </thead>
            <tbody>
            <?php
                $sel = $conn->PREPARE("SELECT encomendas.id as id, encomendas.cod_ras as rastreador, encomendas.cep as cep, encomendas.bairro as bairro, entregadores.nome as entregador FROM encomendas LEFT JOIN entregadores on encomendas.id_entregador = entregadores.id");
                $sel->execute();
                $result = $sel->fetchAll();
                            
                foreach($result as $res){
                    $id = $res['id'];
                    echo "<tr><td>";
                    echo $res['id'];
                    echo "</td><td>";
                    echo $res["rastreador"];
                    echo "</td><td>";
                    echo $res["cep"];
                    echo "</td><td>";
                    echo $res["bairro"];
                    echo "</td><td>";
                    echo $res["entregador"];
                    echo "</td><td>";
                    echo "<a onclick='recarregar()'class='btn btn-danger btn-sm'href='entregasLista.php?id=".$id."'>Excluir</a>";
                    echo "</td></tr>";    
                } 
            ?>
            <?php
                include_once 'functions/delete.php';
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    deleteENC($id);
                } 
            ?>
            </tbody>
        </table>
    </main>
<?php
    require_once('template/footer.php');
?> 