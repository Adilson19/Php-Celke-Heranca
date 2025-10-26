<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    <h1>Listar contas a pagar</h1>
    <a href="cadastrar.php">Cadastrar</a><br><br>
    <?php 
        require './Conn.php';
        require './ContasPagar.php';

        $listContasPg = new ContasPagar();
        $list_contas_pgs = $listContasPg->listar();
        //var_dump($list_contas_pgs);
        foreach($list_contas_pgs as $row_conta_pg){
            extract($row_conta_pg);
            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "Valor: " . number_format($valor, 2, ",", ".") . " KZ<br>";
            echo "Vencimento: ".date('d/M/Y', strtotime($vencimento))." <br>";
            echo "Obs: $obs <br>";
            echo "<hr>";
        }
    ?>
</body>
</html>