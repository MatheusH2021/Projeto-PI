<?php 
    include_once 'template/header.php';
?>

<main>
    <div id="title">
    <h3>Consultar encomenda:</h3>
    </div>
    <div class="container-fluid"> 
        <div class="formulario">
            <form autocomplete="off" method="POST" class="form-control">
                <input class="form-control"type="text" name="busca" placeholder="Digite seu codigo de rastreio...">
                <button type="submit" class="btn btn-outline-warning">Buscar</button>
            </form>
        </div>
    </div>    
    <div class="container">
        <?php
            $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
                    
                if(isset($_POST['busca'])){
                    $busca = $_POST['busca'];
                    $sel = $conn->PREPARE("SELECT encomendas.id as id, encomendas.cod_ras as rastreador, encomendas.cep as cep, encomendas.bairro as bairro, entregadores.nome as entregador FROM encomendas LEFT JOIN entregadores on encomendas.id_entregador = entregadores.id WHERE cod_ras = '$busca'");
                    $sel->execute();
                    $result = $sel->fetchAll();
                    
                    echo "<div id='title'>
                                <h3>Informações da encomenda:</h3>
                            </div>
                            <table class='table'>
                            <thead>
                                <td>ID</td>
                                <td>COD Rastreador</td>
                                <td>CEP</td>
                                <td>Bairro</td>
                                <td>Entregador</td>
                            </thead>
                        <tbody>";

                foreach($result as $info){
                    
                    echo "<tr><td>";
                    echo $info['id'];
                    echo "</td><td>";
                    echo $info["rastreador"];
                    echo "</td><td>";
                    echo $info["cep"];
                    echo "</td><td>";
                    echo $info["bairro"];
                    echo "</td><td>";
                    echo $info["entregador"];
                    echo "</td><tr>";
                    echo "</tbody>";
                    echo "</table>";

                    }       
                }
            
        ?>
    </div>
    </div>
</main>


<?php
    require_once 'template/footer.php';
?>