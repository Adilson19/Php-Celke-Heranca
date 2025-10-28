<?php
    session_start();
    ob_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Celke</title>
</head>
<body>
    <h1>Listar contas a pagar</h1><br><br>
    <a href="cadastrar.php">Cadastrar</a><br><br><br>
    <?php 
        if(isset($_SESSION['msg'])){
            echo($_SESSION['msg']);
            unset($_SESSION['msg']);
        }
        require './Conn.php';
        require './ContasPagar.php';

        $listContasPg = new ContasPagar();
        $list_contas_pgs = $listContasPg->listar();
        //var_dump($list_contas_pgs);
        foreach($list_contas_pgs as $row_conta_pg){
            extract($row_conta_pg);
            echo "ID: ". $id ." <br>";
            echo "Nome: ". $nome ."<br>";
            echo "Valor: ". number_format($valor, 2, ",", ".") ." KZ<br>";
            echo "Vencimento: ". date('d/M/Y', strtotime($vencimento)) ." <br>";
            echo "Observação: ". $obs ." <br>";
            echo "<a href='visualizar.php?id=" . $id . "'>Visualização</a><br>";
            echo "<a href='editar.php?id=" . $id . "'>Editar</a><br>";
            echo "<a href='apagar.php?id=" . $id . "'>Apagar</a><br>";
            echo "<hr>";
        }
    ?>
</body>
</html>