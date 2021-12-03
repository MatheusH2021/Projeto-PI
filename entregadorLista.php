<?php
    require_once 'template/header.php';
    include_once 'functions/delete.php'
?>
<?php    
      $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");  
?>
    <main class="container">
        <div id="title">
            <h3>Lista de Entregadores:</h3>
        </div>
        <table class="table">
            <thead>
                <td>ID</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Bairro</td>
                <td>Ações</td>
            </thead>
            <tbody>
            <?php
                $selecao =$conn->PREPARE("SELECT * FROM entregadores;");
                $selecao->execute();
                $resultado = $selecao->fetchAll();

                foreach($resultado as $info){
                    $id = $info['id'];
                    echo "<tr><td>";
                    echo $info['id'];
                    echo "</td><td>";
                    echo $info['nome'];
                    echo"</td><td>";
                    echo $info['cpf'];
                    echo"</td><td>";
                    echo $info['bairro'];
                    echo "<td>";
                    echo "<a onclick='recarregar()'class='btn btn-danger btn-sm'href='entregadorLista.php?id=".$id."'>Excluir</a>";
                    echo "</td></tr>";                    
                }
            ?>
            <?php
                include_once 'functions/delete.php';

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    deleteENT($id);
                } 
            ?>
            </tbody>
        </table>
    </main>
<?php
    require_once('template/footer.php');
?> 