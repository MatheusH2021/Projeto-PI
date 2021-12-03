<?php
    require_once 'template/header.php'
?>
<?php    
    $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
?>
<main>
    <div id="title">
        <h3>Cadastro de Entregador:</h3>
    </div>
    <div class="container-fluid">      
        <div class="formulario">
            <form autocomplete="off"class="form-control" method="POST">
                <label>Nome</label>
                <input class="form-control"type="text" name="nome">
                <br>
                <label>CPF</label>
                <input class="form-control" type="text" name="cpf">
                <br>
                <label>Selecione um Bairro:</label>       
                <select class="form-control" name="bairro" placeholder="Selecione um Bairro">
                    <option value="Aloísio Souto Pinto">Aloísio Souto Pinto</option>
                    <option value="Boa Vista">Boa Vista</option>
                    <option value="Brasília">Brasília</option>
                    <option value="Dom Helder Camara">Dom Helder Camara</option>
                    <option value="Francisco Simão dos Santos Figueira">Francisco Simão dos Santos Figueira</option>
                    <option value="Heliópolis">Heliópolis</option>
                    <option value="José Maria Dourado">José Maria Dourado</option>
                    <option value="Lacerdópolis">Lacerdópolis</option>
                    <option value="Magano">Magano</option>
                    <option value="Novo Heliopolis">Novo Heliopolis</option>
                    <option value="Santo Antônio">Santo Antônio</option>
                    <option value="São José">São José</option>
                    <option value="Severiano de Moraes Filho">Severiano de Moraes Filho</option>
                </select>
                <button onclick="recarregar()" type="submit" class="btn btn-outline-warning">Cadastrar</button>
                <?php
                    include_once 'functions/insert.php';

                    if(isset($_POST['nome'])&&isset($_POST['bairro'])&&isset($_POST['cpf'])){
                        $nome = $_POST['nome'];    
                        $cpf = $_POST['cpf'];
                        $bairro = $_POST['bairro'];
                        
                        inserirENT($nome, $bairro, $cpf);
                        echo"<div style='margin-top: 5px;'class='alert alert-info' role='alert'>
                                Entregador cadastrado com sucesso!
                            </div>";     
                    }else{
                        echo"<div style='margin-top: 5px;'class='alert alert-danger' role='alert'>
                        Insira todas as informações!
                        </div>";
                    }
                ?>
            </form>
        </div>
    </div>
</main>
<?php
    require_once('template/footer.php');
?>