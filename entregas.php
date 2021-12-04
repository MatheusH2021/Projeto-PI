<?php
    require_once 'template/header.php';
?>
<?php    
    $conn = new PDO("mysql:dbname=entregasja;host=localhost", "root", "");
?>
<main>
    <div id="title">
        <h3>Cadastro de Encomendas:</h3>
    </div>
    <div class="container-fluid">      
        <div class="formulario">
            <form autocomplete="off"class="form-control" method="POST">
                <label>Codigo Rastreador:</label>
                <input class="form-control"type="text" name="cod_ras">
                <br>
                <label>CEP</label>
                <input class="form-control" type="text" name="cep">
                <br>
                <button type="submit" class="btn btn-outline-warning" onclick ="recarregar()">Cadastrar</button>
                <?php
                    include_once 'functions/select.php';
                    include_once 'functions/insert.php';
                    include_once 'functions/curl.php';
                
                    if(isset($_POST['cod_ras'])&&isset($_POST['cep'])){
                        $rastreador = $_POST['cod_ras'];    
                        $cep = $_POST['cep'];            
                        
                        $bairro = useCEP($cep);
                        $id = selecionarENT($bairro); 
                
                        inserirENC($rastreador, $cep, $bairro, $id);
                            echo"<div style='margin-top: 5px;'class='alert alert-info' role='alert'>
                                Encomenda cadastrada com sucesso!
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